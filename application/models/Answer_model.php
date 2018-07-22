<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Answer_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    /**
     * Add new Answer to db
     */
    function addAnswer($userid,$qNumber, $response){

        //First validate that this answer not exist in db.
        $this->db->where("(userid='".$userid."' AND questionNumber='".$qNumber."')", NULL, FALSE);
        $answer= $this->db->get('answer');
        
        if($answer->num_rows()==0)
        {
            //Insert the user to  database
            $this->db->insert('answer', array("userid"=>$userid,"questionNumber"=>$qNumber,"answer"=>$response));

            //Return the id generated
            return  $this->db->insert_id();
        }
        else {
            //If the answer already exist for this user only update
            $answ= $answer->result_array()[0];
            $this->updateAnswer($answ["id"],$response);
        }
    }

    /**
     * Add new User to db
     */
    function updateAnswer($id, $response){        
        $datos= array("answer"=>$response);

        //set the id to update
        $this->db->where('id',$id);
        //Insert the user to  database
        $this->db->update('answer', $datos);
    }
    /**
     * Delete Answer from db
     */
    function deleteAnswer($id){

        //Delete user by id
        //$this->db->delete('user',array('id'=>$id));
    }
    /**
     * Get an specific user
     */
    function getAnswer($id){

        //Filter the user list by id
        $this->db->where('id',$id);
        $query= $this->db->get('answer');

        //if the user was founded, return user data, else return alse
        if($query->num_rows()>0)
        {
            return $query->result_array()[0];
        }            
        else {
            return false;
        }
    }
    function getUserAnswer($userid, $qNumber){
        //Filter the user list by id
        $this->db->where("(userid='".$userid."' AND questionNumber='".$qNumber."')", NULL, FALSE);
        $query= $this->db->get('answer');

        //if the user was founded, return user data, else return alse
        if($query->num_rows()>0)
        {
            return $query->result_array()[0]["answer"];
        }            
        else {
            return false;
        }
    }
    /**
     * Get Answer list
     */
    function getAnswers(){
        $this->db->order_by("userid asc,questionNumber asc");
        $query= $this->db->get('answer');
        if($query->num_rows()>0) return 
            $query;
        else
            false;
    }
    
    /**
     * Get Answer list from specific user id
     */
    function getAnswerOfUser($userid){
        $this->db->order_by("questionNumber asc");
        $this->db->where("(userid='".$userid."')", NULL, FALSE);
        $query= $this->db->get('answer');
        if($query->num_rows()>0) return 
            $query;
        else
            false;
    }
}