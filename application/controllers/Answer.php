<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'/libraries/REST_Controller.php';

class Answer extends REST_Controller {
    
    function __construct(){

        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        header("Access-Control-Allow-Headers: 'origin, x-requested-with, content-type");
        
        parent::__construct();
        //Load user model
		$helper= $this->load->model('answer_model');
    }

    public function index_get()
    {
        //echo 'todos los usuarios';
        $answers= $this->answer_model->getAnswers();

        if(!is_null($answers)){
            $this->response(array('response'=>$answers->result_array()),200);
        }
        else{
            $this->response(array('error'=>'There is not any answers in DB...'),404);
        }
    }
    public function find_get($id)
    {
        if(!$id){
            $this->response(null,400);
        }
        //echo 'todos los usuarios';
        $answer= $this->answer_model->getAnswer($id);

        if(!is_null($answer)){
            $this->response(array('response'=>$answer),200);
        }
        else{
            $this->response(array('error'=>'Answer not founded...'),404);
        }
    }
    public function index_post()
    {
        if(!$this->post('answer')){
            $this->response(null,400);
        }
        $id= $this->answer_model->addAnswer($this->post('answer'));

        if(!is_null($id)){
            $this->response(array('response'=>$id),200);
        }
        else{
            $this->response(array('error'=>'Server Error...'),400);
        }
    }
    
    public function index_put($id)
    {
        if(!$this->post('answer')||!$id){
            $this->response(null,400);
        }
        $update= $this->answer_model->updateAnswer($id,$this->post('answer'));
        if(!is_null($update)){
            $this->response(array('response'=>'Answer Updated'),200);
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
        $delete=$this->useanswer_modelr_model->deleteAnswer($id);
        if(!is_null($delete)){
            $this->response(array('response'=>'Usuario Eliminado'),200);
        }
        else{
            $this->response(array('error'=>'Server Error...'),400);
        }
        */
        $this->response(array('response'=>'Answer Deleted...'),200);
    }
}