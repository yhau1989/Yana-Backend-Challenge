<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
		if ($this->input->post()) {
			$data = $this->User_model->login($_POST['email'], $_POST['password']);
			if ($data['status'] == 0) {
				header('Location: ' . strtolower(base_url()) . 'main/usuarios');
			} else {
				$data['user'] = $_POST['email'];
				$this->load->view('login', $data);
			}
		} else {
			if (isset($this->session->userlogin)) {
			} else {
				$data = null;
				$this->load->view('login', $data);
			}
		}
	}
}
