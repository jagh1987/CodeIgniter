<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashBoard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 function __construct(){
		 parent::__construct();
		//$this->load->helper('stringFunctions');
		$this->load->helper('form');
		$this->load->helper('url');
		//Load user model
		$helper= $this->load->model('user_model');
		//Load Main Menu
		$this->load->library('menu',array('Index','About', 'Portfolio'));		
	 }

	 /**
	  * Show User List On Dashboard
	  */
	public function index()
	{
		//Load main menú and user list
		$data['MainMenu']=  $this->menu->loadMenu();
		$data['users']= $this->user_model->getUsers();

		//Load dashboard index
		$this->load->view('DashBoard/header');
		$this->load->view('DashBoard/index', $data);
		$this->load->view('DashBoard/footer');
	}
	/**
	 * Show a for to add a new user
	 */
	public function addUserForm()
	{
		//Load main menu
		$data['MainMenu']=  $this->menu->loadMenu();

		//Show add user form
		$this->load->view('DashBoard/header');
		$this->load->view('DashBoard/addUserForm', $data);		
		$this->load->view('DashBoard/footer');
	}
	public function viewUser()
	{
		//Load Menu
		$data['MainMenu']=  $this->menu->loadMenu();

		//Get the id by querystring
		$data['idUser']= $this->uri->segment(3);
		
		//if the id is in the url, show user detail
		if($data['idUser'])
		{
			$data["User"]= $this->user_model->getUser($data['idUser']);

			//Call the asnwer model
			$this->load->model('answer_model');

			$data['q1']= json_decode($this->answer_model->getUserAnswer($data['User']["id"],1));
			$data['q2']= $this->answer_model->getUserAnswer($data['User']["id"],2);
			$data['q3']= json_decode($this->answer_model->getUserAnswer($data['User']["id"],3));

			$this->load->view('DashBoard/header');
			$this->load->view('DashBoard/questions', $data);
			$this->load->view('DashBoard/footer');
		}
		else
		{
			redirect('DashBoard/index', 'refresh');			
		}
	}
	
	/**
	 * Save user data and open questionnaire
	 */
	public function updateUser()
	{
		//Load Menu
		$data['MainMenu']=  $this->menu->loadMenu();

		//Get the id by querystring
		$User["id"]= $this->uri->segment(3);

		$data['User'] = array(
			'id' => $this->input->post('userName'),
			'userName'=> $this->input->post('userName'),
			'Name'=> $this->input->post('Name'),
			'LastName'=> $this->input->post('LastName')
		);
		$data['User']["id"]= $this->user_model->updateUser($User["id"], $data["User"]);
		
		$data['users']= $this->user_model->getUsers();
		$this->load->view('DashBoard/header');
		$this->load->view('DashBoard/index', $data);
		$this->load->view('DashBoard/footer');
	}
	/**
	 * Delete User
	 */
	public function deleteUser()
	{
		//Load Menu
		$data['MainMenu']=  $this->menu->loadMenu();

		//Get the id by querystring
		$User["id"]= $this->uri->segment(3);
		if(null !== $User["id"])
		{
			$this->user_model->deleteUser($User["id"]);
		}
		$data['users']= $this->user_model->getUsers();
		$this->load->view('DashBoard/header');
		$this->load->view('DashBoard/index', $data);
		$this->load->view('DashBoard/footer');
	}
	/**
	 * Save user data and open questionnaire
	 */
	public function questions()
	{
		//Load Menu
		$data['MainMenu']=  $this->menu->loadMenu();
		
		//GetSer Data From post
		$data['User'] = array('id' => 0,'userName'=> $this->input->post('userName'),'Name'=> $this->input->post('Name'),'LastName'=> $this->input->post('LastName'));

		//GetSer Data From post
		$data['User']["id"]= $this->user_model->addNewUser($data["User"]);

		$this->load->view('DashBoard/header');
		$this->load->view('DashBoard/questions', $data);
		$this->load->view('DashBoard/footer');
	}
	/**
	 * Save user answers and after that show the user detail
	 */
	public function Savequestions()
	{
		//Load Menu
		$data['MainMenu']=  $this->menu->loadMenu();
		$data['User'] = array(
			'id' => 0,
			'userName'=> $this->input->post('userName'),
			'Name'=> $this->input->post('Name'),
			'LastName'=> $this->input->post('LastName')
		);

		if($this->input->post('userid')!=null && $this->input->post('userid')!=0)
		{
			//Capture Answer to Question 1
			$q1 = array('sel1' => $this->input->post('sel1'),'sel2' => $this->input->post('sel2'),  'sel3' => $this->input->post('sel3'),  'sel4' => $this->input->post('sel4'));
			
			//Capture Answer to Question 2
			$q2 = $this->input->post('q2');
			
			//Capture Answer to Question 3
			$q3 = array('txt1' => $this->input->post('txt1'), 'txt2' => $this->input->post('txt2'), 'txt3' => $this->input->post('txt3'), 'txt4' => $this->input->post('txt4'), 'txt5' => $this->input->post('txt5'), 'txt6' => $this->input->post('txt6'));

			//Call the asnwer model
			$this->load->model('answer_model');

			//Save Answer to Question 1
			$data['Answer']["id"]= $this->answer_model->addAnswer($this->input->post('userid'),1, json_encode($q1));
			//Save Answer to Question 2
			$data['Answer']["id"]= $this->answer_model->addAnswer($this->input->post('userid'),2, $q2);
			//Save Answer to Question 3
			$data['Answer']["id"]= $this->answer_model->addAnswer($this->input->post('userid'),3, json_encode($q3));

			//Show the user view
			$this->viewUser();
		}
		else
		{
			//If no userid was provided, redirect user to dashboard
			$this->index();
		}
	}
}
