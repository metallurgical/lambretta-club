<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index () {
		$this->load->view('admin/dashboard');
	}

	public function member () {

		$crud = new grocery_CRUD();
        $state = $crud->getState();
        $data['page_header_title'] = ucfirst($this->uri->segment(2)) . " Management";
        $crud->set_table('members');
        $output = $crud->render();
        $output->data = $data;
        $this->load->view('CRUD', $output);
	}

	public function event () {

		$crud = new grocery_CRUD();
        $state = $crud->getState();
        $data['page_header_title'] = ucfirst($this->uri->segment(2)) . " Management";
        $crud->set_table('events');
        $output = $crud->render();
        $output->data = $data;
        $this->load->view('CRUD', $output);
	}

	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */