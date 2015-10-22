<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// both admin and user
	// can login using this
	// function
	public function index () {

		$this->load->view('login');

		if ( $this->input->post() ) {

			$formData = $this->input->post();

			// member login
			$table = 'members';
			$where = array(
					'member_username' => $formData['member_username'],
					'member_password' => $formData['member_password']
				);
			$member = $this->seat_model->get_specified_row( $table, $where );

			if ( !empty( $member ) ) {

				$array = array(
					'user_id'       => $member['member_id'],
					'user_category' => 'member',
					'user_name'     => $member['member_name'],
					'user_username' => $member['member_username'],
					'user_email'    => $member['member_email'],
					'user_created'  => $member['member_date_created']
				);				
				$this->session->set_userdata( $array );
				redirect('member');
			}
			else {

				// admin login
				$table = 'admin';
				$where = array(
						'admin_username' => $formData['member_username'],
						'admin_password' => $formData['member_password']
				);
				$admin = $this->seat_model->get_specified_row( $table, $where );

				if ( !empty( $admin ) ) {

					$array = array(
							'user_id'       => $admin['admin_id'],
							'user_category' => 'admin'
						);				
					$this->session->set_userdata( $array );
					redirect('admin');
				}
				else {

					$messageType = 'login_failed';
					$this->seat_model->display_message( $messageType );
				}

				
			}
		}
	}

	public function register () {

		$this->load->view('register');

		if ( $this->input->post() ) {

			$formData = $this->input->post();

			$table = 'members';
			$arrayData = array(
					'member_username'     => $formData['member_username'],
					'member_password'     => $formData['member_password'],
					'member_email'        => $formData['member_email'],
					'member_ic'           => $formData['member_ic'],
					'member_name'         => $formData['member_name'],
					'member_gender'       => $formData['member_gender'],
					'member_address'      => $formData['member_address'],
					'member_date_created' => date('Y-m-d H:i:s')
				);
	
			$member_id = $this->seat_model->insert_data( $arrayData, $table );

			if ( $member_id ) {

				$messageType = 'register';
				$this->seat_model->display_message( $messageType );
			}
		}

	}

	public function logout () {
		$this->session->sess_destroy();
		redirect('login');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */