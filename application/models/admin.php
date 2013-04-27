<?php

class Admin extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function checksignin($email,$pass)
    {
    	$this->db->where('role_id',3);
    	$this->db->where('email',$email);
    	$this->db->where('password',md5($pass));
    	$query = $this->db->get('users');
		return $query->result();
    }

    function getmembers($keyword,$type,$from,$sum)
    {
        if($type=="name"){ $this->db->like('name',$keyword); }
        else if($type=="nip"){ $this->db->like('nip',$keyword); }
        else if($type=="add"){ $this->db->like('address',$keyword); }
        else if($type=="telp"){ $this->db->like('phone',$keyword); }

        $this->db->where('role_id !=',3);
        $this->db->order_by('id','desc');
        if($from==0 && $sum==0)
        {
            $query = $this->db->get('users');
        }else{
            $query = $this->db->get('users',$sum,$from);
        }
        return $query->result();
    }

    function getmemberdetail($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('users');
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
        $query = $this->db->get('print_logs');
        return $query->result();
    }

    function gettakenbyID($id)
    {
        $this->db->where('user_id',$id);
        $query = $this->db->get('getcard');
        return $query->result();
    }

}

?>