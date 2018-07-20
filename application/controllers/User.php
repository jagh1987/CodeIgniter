<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'/libraries/REST_Controller.php';

class User extends REST_Controller {
    
    function __construct(){

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: 'origin, x-requested-with, content-type");
        
        parent::__construct();
        //Load user model
		$helper= $this->load->model('user_model');
    }

    public function index_get()
    {
        //echo 'todos los usuarios';
        $users= $this->user_model->getUsers();

        if(!is_null($users)){
            $this->response(array('response'=>$users->result_array()),200);
        }
        else{
            $this->response(array('error'=>'There is not any user in DB...'),404);
        }
    }
    public function find_get($id)
    {
        if(!$id){
            $this->response(null,400);
        }
        //echo 'todos los usuarios';
        $user= $this->user_model->getUser($id);

        if(!is_null($user)){
            $this->response(array('response'=>$user),200);
        }
        else{
            $this->response(array('error'=>'User not founded...'),404);
        }
    }
    public function index_post()
    {
        if(!$this->post('user')){
            $this->response(null,400);
        }
        $id= $this->user_model->addNewUser($this->post('user'));

        if(!is_null($id)){
            $this->response(array('response'=>$id),200);
        }
        else{
            $this->response(array('error'=>'Server Error...'),400);
        }
    }
    
    public function index_put($id)
    {
        if(!$this->post('user')||!$id){
            $this->response(null,400);
        }
        $update= $this->user_model->updateUser($id,$this->post('user'));
        if(!is_null($update)){
            $this->response(array('response'=>'Usuario Actualizado'),200);
        }
        else{
            $this->response(array('error'=>'Server Error...'),400);
        }
    }
    
    public function index_delete($id)
    {/*
        if(!$id){
            $this->response(null,400);
        }
        $delete=$this->user_model->deleteUser($id);
        if(!is_null($delete)){
            $this->response(array('response'=>'Usuario Eliminado'),200);
        }
        else{
            $this->response(array('error'=>'Server Error...'),400);
        }
        */
        $this->response(array('response'=>'Usuario Eliminado...'),200);
    }
}