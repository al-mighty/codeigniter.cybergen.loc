<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Controller {
    protected $table_name='user';
    public function index()
    {

    }

    function get_users($data)
    {
        $this->db->select($data['fields']);
        $this->db->order_by($data['order']);
        $query=$this->db->get_where($this->table_name,$data['conditions']);
//        var_dump();die;
        return $query->result_array();
    }
//update user

    function delete($data)
    {
        foreach ($data as $user_id)
        {
            $fields=array(
                'del_flag'=>1
            );

            $conditions=array(
                'id'=>$user_id,

            );
            $this->db->where($conditions);
            $this->db->update($this->table_name,$fields);
        }
    }
    public function update($data)
    {
        $fields=array(
            'name'=>$data['user_name']
        );

//        if del_flag=1=>deleted
        $conditions=array(
            'id'=>$data['user_id'],
            'del_flag'=>0
        );
        $query=$this->db->get_where($this->table_name,$conditions);
        $results=$query->result_array();
        if(!empty($results)){
//            update
            $fields['updated_date']=date('Y-m-d H:i:s');
            $this->db->where($conditions);
            $this->db->update($this->table_name,$fields);
        }
        else
        {
            $fields['created_date']=date('Y-m-d H:i:s');
            $this->db->insert($this->table_name,$fields);
        }

    }

    function get_articles()
    {
        $query=$this->db->query->get('articles');
        return $query->result_array();
    }

}
