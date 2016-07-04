<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('article_model'));
    }

    public function index()
    {


//        $this->load->model('article_model');
//        $data['article']=$this->article_model->
        $user_id=$user_name=$submit=$delete=null;
        extract($_POST);
        $data['user_id']=$user_id;
        $data['user_name']=$user_name;

        if(isset($submit)){
            $this->article_model->update($data);
        }
        elseif(isset($delete)){
            $this->article_model->delete($user_id);
        }

        $data['fields']=array(
            'id',
            'name',
            'created_date'
        );
        $data['conditions']=array(
            'del_flag'=>0
        );
        $data['order']='created_date asc';

        $data['results']=$this->article_model->get_users($data);
//        var_dump($data['results']);die;
        $this->load->view('article/article_view',$data);
    }

//    function about()
//    {
//        $data['name']="Slava";
//        $data['surname']="alekseevich";
//        $this->load->view('about_view',$data);
//    }
}
