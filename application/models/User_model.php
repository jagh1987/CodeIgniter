<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
    /**
     * Add new User to db
     */
    function addNewUser($data){

        //Insert the user to  database
        $this->db->insert('user', array("userName"=>$data["userName"],"Name"=>$data["Name"],"LastName"=>$data["LastName"]));

        //Return the id generated
        return  $this->db->insert_id();;
    }
    /**
     * Add new User to db
     */
    function updateUser($id,$data){

        $datos= array(
            "userName"=>$data["userName"],
            "Name"=>$data["Name"],
            "LastName"=>$data["LastName"]);

        //set the id to update
        $this->db->where('id',$id);
        //Insert the user to  database
        $this->db->update('user', $datos);
    }
    /**
     * Delete User from db
     */
    function deleteUser($id){

        //Delete user by id
        $this->db->delete('user',array('id'=>$id));
    }
    /**
     * Get an specific user
     */
    function getUser($id){

        //Filter the user list by id
        $this->db->where('id',$id);
        $query= $this->db->get('user');

        //if the user was founded, return user data, else return alse
        if($query->num_rows()>0)
        {
            return $query->result_array()[0];
        }            
        else {
            return false;
        }
    }
    /**
     * Get User list
     */
    function getUsers(){
        $query= $this->db->get('user');
        if($query->num_rows()>0) return 
            $query;
        else
            false;
    }
}