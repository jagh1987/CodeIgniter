<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH .'/libraries/REST_Controller.php';

class Useranswers extends REST_Controller {
    
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
        //echo 'all answers';
        $answers= $this->answer_model->getAnswers();

        if(!is_null($answers)){
            $this->response(array('response'=>$answers->result_array()),200);
        }
        else{
            $this->response(array('error'=>'There is not any user in DB...'),404);
        }
    }
    public function find_get($userid)
    {
        //Answer from an specific user
        $answers= $this->answer_model->getAnswerOfUser($userid);

        if(!is_null($answers)){
            $this->response(array('response'=>$answers->result_array()),200);
        }
        else{
            $this->response(array('error'=>'There is not any answers in DB...'),404);
        }
    }
    public function find2_get($userid,$questionNumber)
    {
        //Answer from an specific user
        $answers= $this->answer_model->getUserAnswer($userid, $questionNumber);
        
        if(!is_null($answers)){
            $this->response(array('response'=>$answers),200);
        }
        else{
            $this->response(array('error'=>'There is not any answers in DB...'),404);
        }
    }
}