<?php

class Admin extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function checksignin($email,$pass)
    {
    	//$this->db->where('role_id',3);
    	$this->db->where('email',$email);
    	$this->db->where('password',md5($pass));
    	$query = $this->db->get('users');
		return $query->result();
    }

    function checkemail($email)
    {
        $this->db->where('email',$email);
        $query = $this->db->get('users');
        return count($query->result());
    }

    function checkemail1($id,$email)
    {
        $this->db->where('email',$email);
        $this->db->where('id !=',$id);
        $query = $this->db->get('users');
        return count($query->result());
    }

    function getmembers($keyword,$type,$from,$sum)
    {
        if($type=="name"){ $this->db->like('name',$keyword); }
        else if($type=="nip"){ $this->db->like('nip',$keyword); }
        else if($type=="add"){ $this->db->like('address',$keyword); }
        else if($type=="telp"){ $this->db->like('phone',$keyword); }

        $this->db->where('role_id !=',3);
        $this->db->where('deleted !=',1);
        $this->db->order_by('id','desc');
        if($from==0 && $sum==0)
        {
            $query = $this->db->get('users');
        }else{
            $query = $this->db->get('users',$sum,$from);
        }
        return $query->result();
    }

    function getdatabydate($table,$from,$till)
    {
        if($from!="" && $till!=""){
            $this->db->where('created >=',$from);
            $this->db->where('created <=',$till." 23:59:59");
        }
        $query = $this->db->get($table);
        return $query->result(); 
    }

    function getvisibilities($id)
    {
        $this->db->where('user_id',$id);
        $query = $this->db->get('profile_visibilities');
        return $query->result();
    }

    function getmembersthismonth($month)
    {
        $this->db->where('month(created)', $month);
        $query = $this->db->get('users');
        return $query->result();
    }

    function getlastprint($id)
    {
        $this->db->where('user_id',$id);
        $this->db->order_by('created','desc');
        $query = $this->db->get('status_prints',1);
        if(count($query->result()) == 0){
            return "";
        }else{
            foreach($query->result() as $row){
                $date = $row->created;
            }
            return $date;
        }
    }

    function getreactivemembers()
    {
        $this->db->like('description_log','reactive');
        $query = $this->db->get('logs');
        return $query->result();           
    }

    function getallprintedcard()
    {
        $query = $this->db->get('status_prints');
        return $query->result();
    }

    function getqtystock()
    {
        $query = $this->db->get('inventories',1);
        foreach($query->result() as $row){
            $qty = $row->qty;
        }   
        return $qty;
    }

    function getbanners()
    {
        $query = $this->db->get('banners');
        return $query->result();
    }

    function getactivities($keyword,$from,$sum)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('activities', 'activities.user_id = users.id');
        if($keyword!="" || $keyword!=NULL){
            $this->db->like('title',$keyword);
        }
        $this->db->order_by('activity_id','desc');

        if($from==0 && $sum==0)
        {
            
        }else{
            $this->db->limit($sum,$from);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getactivitydetail($id)
    {
        $this->db->where('activity_id',$id);
        $query = $this->db->get('activities');
        return $query->result();
    }

    function getgalleryhddetail($id)
    {
        $this->db->where('gallery_header_id',$id);
        $query = $this->db->get('gallery_headers');
        return $query->result();
    }

    function getmemberdetail($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        return $query->result();
    }

    function getmembername($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
        foreach($query->result() as $row){
            $name = $row->name;
        }
        return $name;
    }

    function getpagecontent($id)
    {
        $this->db->where('cms_id',$id);
        $query = $this->db->get('cms');
        return $query->result();  
    }

    function getallhdgallery($from,$sum)
    {
        if($from==0 && $sum==0){
            $query = $this->db->get('gallery_headers');
        }else{
            $query = $this->db->get('gallery_headers',$sum,$from);
        }
        return $query->result();
    }

    function getdtgallerydetail($id)
    {
        $this->db->where('gallery_detail_id',$id);
        $query = $this->db->get('gallery_detail');
        return $query->result();
    }

    function getalldtgallery($id,$from,$sum)
    {
        $this->db->where('gallery_header_id',$id);
        $this->db->order_by('created','desc');
        if($from==0 && $sum==0){
            $query = $this->db->get('gallery_detail');
        }else{
            $query = $this->db->get('gallery_detail',$sum,$from);
        }
        return $query->result();
    }

    function getlogs($dari,$sampai,$from,$sum)
    {
        if($dari!=""){
            $this->db->where('created >=',$dari);
        }
        if($sampai!=""){
            $this->db->where('created <=',$sampai." 23:59:59");   
        }
        $this->db->order_by('created','desc');
        if($from==0 && $sum==0){
            $query = $this->db->get('logs');
        }
        else
        {
            $query = $this->db->get('logs',$sum,$from);   
        }
        return $query->result();
    }

    function checkprintstatus($arrayid)
    {
        $data = array();
        for($i=0;$i<count($arrayid);$i++)
        {
            $temp = count($this->getprintbyID($arrayid[$i]));
            if($temp==0){ array_push($data,0); }
            else{ array_push($data,1); }
        }
        return $data;
    }

    function checktakenstatus($arrayid)
    {
        $data = array();
        for($i=0;$i<count($arrayid);$i++)
        {
            $temp = count($this->gettakenbyID($arrayid[$i]));
            if($temp==0){ array_push($data,0); }
            else{ array_push($data,1); }
        }
        return $data;
    }

    function getprintbyID($id)
    {
        $this->db->where('user_id',$id);
        $query = $this->db->get('status_prints');
        return $query->result();
    }

    function gettakenbyID($id)
    {
        $this->db->where('user_id',$id);
        $query = $this->db->get('getcard');
        return $query->result();
    }

    function getmonthlystatistic($tabel,$month,$year)
    {
        $this->db->where('month(created)',$month);
        $this->db->where('year(created)',$year);
        $query = $this->db->get($tabel);
        return count($query->result());
    }

    function insertdata($tabel,$data)
    {
        $this->db->insert($tabel,$data);
    }

    function insertid($tabel,$data)
    {
        $this->db->insert($tabel,$data);
        $id = $this->db->insert_id();
        return $id;
    }

    function updatemember($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('users',$data);
    }

    function updateactivity($id,$data)
    {
        $this->db->where('activity_id',$id);
        $this->db->update('activities',$data);
    }

    function updatepage($id,$data)
    {
        $this->db->where('cms_id',$id);
        $this->db->update('cms',$data);
    }

    function updateinventories($id,$data)
    {
        $this->db->where('inventory_id',$id);
        $this->db->update('inventories',$data);
    }

    function updategalleryhd($id,$data)
    {
        $this->db->where('gallery_header_id',$id);
        $this->db->update('gallery_headers',$data);   
    }

    function updatevisibilities($id,$data)
    {
        $this->db->where('user_id',$id);
        $this->db->update('profile_visibilities',$data); 
    }

    function deletemember($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('users');
    }

    function deleteactivity($id)
    {
        $this->db->where('activity_id',$id);
        $this->db->delete('activities');
    }

    function deletebanner($id)
    {
        $this->db->where('banner_id',$id);
        $this->db->delete('banners');
    }

    function deletegalleryhd($id)
    {
        $this->db->where('gallery_header_id',$id);
        $this->db->delete('gallery_headers');
    }

    function deletegallerydt($id)
    {
        $this->db->where('gallery_detail_id',$id);
        $this->db->delete('gallery_detail');
    }

}

?>