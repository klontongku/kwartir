<?php
class Forgot extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function select($config = array(), $custom_table = false){
        // var_dump($config);die();
        $data = array(
                'field' => '*',
                'join' => array(),
                'like' => array(),
                'orlike' => array(),
                'where' => array(),
                'or' => array(),
                'order' => array(),
                'limit' => array()
            );
        foreach ($config as $key => $val){
            $data[$key] = $val;
        }
 
        $this->db->select($data['field']);
        if($custom_table){
            $this->db->from($custom_table);                       
        }else{
           $this->db->from('forgots');
        }        
        $data_join = '';
        if(count($data['join']) > 0) {
            foreach ($data['join'] as $key => $val){
                $this->db->join($key,$val,'left');
            }
        }
        // var_dump($data_join);die();
        if(count($data['where']) > 0) $this->db->where($data['where']);
        if(count($data['or']) > 0) $this->db->or_where($data['or']);
 
        if(count($data['like']) > 0){
            foreach ($data['like'] as $key => $val){
                if(is_array($val)) $this->db->like($key,$val[0],$val[1]);
                else $this->db->like($key,$val);
            }
        }

        if(count($data['orlike']) > 0){
            foreach ($data['orlike'] as $key => $val){
                if(is_array($val)) $this->db->or_like($key,$val[0],$val[1]);
                else $this->db->or_like($key,$val);
            }
        }
 
        if(count($data['order']) > 0) {
            foreach ($data['order'] as $key => $val){
                $this->db->order_by($key,$val);
            }
        }
 
        if(count($data['limit']) == 1) $this->db->limit($data['limit'][0]);
 
        if(count($data['limit']) == 2) $this->db->limit($data['limit'][0],$data['limit'][1]);
        $query = $this->db->get();
        return $query->result_array();
    }

    function insert($data){
        $this->db->insert('forgots', $data);
    }

    function customInsert($table, $data){
        $this->db->insert($table, $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function update($id, $data = array()){
        $this->db->where('id_forgot', $id);
        $this->db->update('forgots', $data); 
        
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

}
?>