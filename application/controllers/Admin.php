<?php

class Admin extends CI_controller {
	
	public function __construct()
	{
		parent::__construct();
		//load session library
		$this->load->library('session');
		
		//load cookie helper library
		$this->load->helper('cookie');
		
		//load form validation library
		$this->load->library('form_validation');
		
		//load form pagination library
		$this->load->library('pagination');
		
		//load file helper
		$this->load->helper('file');
		
		//load date helper
		$this->load->helper('date');
		
		//load shopping cart model
		$this->load->library('cart');
		
		//load Admin_model model
		$this->load->model('Admin_model');
		
		//load Home_model model
		$this->load->model('Home_model');
	}
	
	public function admin_header()
	{
		if (NULL === $this->session->userdata('username') || NULL === get_cookie('gella')) {
			if ($this->Admin_model->check_session_cookie() !== TRUE) 
			{
				redirect('Admin/login');
			}
		}
	}
	
	
	
	public function index()
	{
		$this->admin_header();
		
		//get the total new orders
		$data["there_is_new_order"] = $this->Admin_model->return_total_rows('order', 'status', 'open');
		
		$config['total_rows'] = $data["there_is_new_order"];
		  
		$config['base_url'] = site_url("Admin/");
		$config['per_page'] = 2;
		$config['uri_segment'] = '2';
		$config['num_links'] = round($config['total_rows'] / $config['per_page']);
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_link'] = FALSE;
		
		$config['last_link'] = FALSE;
		
		$config['next_link'] = FALSE;
		
		$config['prev_link'] = FALSE;
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$page_number = $this->uri->segment(2);
		$whrArray = array('order.status' => 'open');
		$data['orders'] = $this->Admin_model->fetch_orders($config['per_page'], $page_number, $whrArray);
		
		$data['total_num_pages'] = ceil($config['total_rows'] / $config['per_page']);
		$data['total_num_rows'] = $config['total_rows'];
		
		//get Order History
		$data['total_order_history'] = $this->Admin_model->return_total_rows('order', 'status', 'closed');
		
		$url_segments = $this->uri->total_segments();
		$data['page_num'] = ($url_segments !== 2) ? 1 : $this->uri->segment(2);
		
		$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
		$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
		$this->load->view('admins/index', $data);
	}
	
	public function fetch_order_details() 
	{
		//$_POST['order_id'] = 2;
		if((isset($_POST) && (!empty($_POST)))){
			$result = $this->Admin_model->fetch_order_details();
			//$resultedArrays = $result->result();
			//My problem now is how i can convert this object into an array for use in javascript.
			//I am thinking of JSON.
			echo json_encode($result->result_array());
			
			
		}
	}
	
	public function order_history()
	{
		$this->admin_header();
		
		//get the total new orders
		$data["there_is_new_order"] = $this->Admin_model->return_total_rows('order', 'status', 'open');
		
		$config['total_rows'] = $this->Admin_model->return_total_rows('order', 'status', 'closed');
		  
		$config['base_url'] = site_url("Admin/order_history");
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['num_links'] = round($config['total_rows'] / $config['per_page']);
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_link'] = FALSE;
		
		$config['last_link'] = FALSE;
		
		$config['next_link'] = FALSE;
		
		$config['prev_link'] = FALSE;
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$page_number = $this->uri->segment(3);
		$whrArray = array('order.status' => 'closed');
		$data['closed_orders'] = $this->Admin_model->fetch_orders($config['per_page'], $page_number, $whrArray);
		
		/*echo "<pre>";
		print_r($data['closed_orders']);
		echo "</pre>";*/
		
		$data['total_num_pages'] = ceil($config['total_rows'] / $config['per_page']);
		$data['total_num_rows'] = $config['total_rows'];
		
		//get Order History
		$data['total_new_order'] = $this->Admin_model->return_total_rows('order', 'status', 'open');
		
		$url_segments = $this->uri->total_segments();
		$data['page_num'] = ($url_segments !== 3) ? 1 : $this->uri->segment(3);
		
		$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
		$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
		$this->load->view('admins/order_history', $data);
	}
	
	public function delete_orders() 
	{
		$orders_id = $this->input->post('hidden_order_ids');
		$page_name = $this->input->post('pageName');
		
		$arrayOfOrderIds = explode("|", $orders_id);
		for($i = 0; $i < count($arrayOfOrderIds); $i++) {
			if ($arrayOfOrderIds[$i] !== "") {
				if ($page_name == "new_orders" || $page_name == "order_history") {
					$this->Admin_model->delete_order_details($arrayOfOrderIds[$i]);
				}elseif ($page_name == "notification") {
					$this->Admin_model->delete_notification_details($arrayOfOrderIds[$i]);
				}
			}
		}
		
		//get the table name of the id to be deleted. that will enable us know which view to redirect
		switch ($page_name) {
			case "new_orders":
				$redirection_path = "Admin";
				break;
			case "order_history":
				$redirection_path = "Admin/order_history";
				break;
			case "notification":
				$redirection_path = "Admin/notifications";
				break;
			default:
				$redirection_path = "";
		}
		
		redirect($redirection_path);
	}
	
	public function close_orders() 
	{
		$orders_id = $this->input->post('hidden_close_order_ids');
		if ($this->Admin_model->close_order($orders_id)) {
			redirect('Admin');
		}
	}
	
	
	
	
	public function login()
	{
		if (isset($_POST) && !empty($_POST)) {
			if ($this->form_validation->run('login') === FALSE) {
				
				$this->login_template();
				
			}else {
				//validate the login details in the model and get TRUE or FALSE
				$result = $this->Admin_model->confirm_admin_login();
				
				if ($result === TRUE) {
					//redirect the user to the admin home page if TRUE
					redirect('Admin');
				}else {
					//take the user back to the login page if FALSE;
					$data['login_error_message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Invalid Username or Password</div>';
					
					$this->login_template($data);
				}
			}
		}else {
			$this->login_template();
		}
	}
	
	public function login_template($data = array())
	{
		$data['nav'] = array('home' => '', 'about' => '', 'collect' => '', 'training' => '', 'contact' => '');
		
		$data['categorys'] = $this->Home_model->fetch_categories();
		$data['home_header'] = $this->load->view('templates/home_header', $data, TRUE);
		$data['home_navigation'] = $this->load->view('templates/home_navigation', $data, TRUE);
		$data['home_footer'] = $this->load->view('templates/home_footer', $data, TRUE);
		
		$this->load->view('admins/login', $data);
	}
	
	public function create_admin($data = array())
	{
		//get the total new orders
		$data["there_is_new_order"] = $this->Admin_model->return_total_rows('order', 'status', 'open');
		
		$this->admin_header();
		if ($this->session->userdata('admin_id') != 1) {
			redirect('Admin');
		}
		$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
		$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
		$this->load->view('admins/create_admin', $data);
	}
	
	public function create_new_admin()
	{
		if((isset($_POST) && (!empty($_POST)))){
			if ($this->form_validation->run('create-admin') === FALSE) {
				
				$this->create_admin();
				
			}else {
				$result = $this->Admin_model->add_new_admin();
				
				if ($result === TRUE) {
					redirect('Admin/manage_admins');
				}else {
					
					$data['create_admin_error_message'] = '<div class="alert alert-danger col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Username already exist!</div>';
					$this->create_admin($data);
					
				}
			}
		}else {
			$this->create_admin();
		}
	}
	
	public function create_demo_admin()
	{
		$username = "tailor";
		$password = "12345tailor";
		$phone = "08058866352";
		$email = "itedjereg@yahoo.com";
		
		if ($this->Admin_model->add_demo_admin($username, $password, $phone, $email))
			echo "Admin created Successfull";
		else
			echo "Error";
	}
	
	public function manage_admins()
	{
		$this->admin_header();
		
		//get the total new orders
		$data["there_is_new_order"] = $this->Admin_model->return_total_rows('order', 'status', 'open');
		
		if ($this->session->userdata('admin_id') != 1) {
			redirect('Admin');
		}
		$data['total_num_admins'] = $this->Admin_model->fetch_all_rows('admin');
		
		$data['admins'] = $this->Admin_model->fetch_all_admins();
		
		$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
		$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
		$this->load->view('admins/manage_admins', $data);
	}
	
	
	public function add_category()
	{
		
		$data['total_num_category'] = $this->Admin_model->fetch_all_rows('category');
		
		//fetch the total number of tags
		$data['total_num_products'] = $this->Admin_model->fetch_all_rows('product');
		
		//fetch the categories
		//$data['categories'] = $this->Admin_model->fetch_all_rows_datas('category_id', 'category');
		
		if((isset($_POST) && (!empty($_POST)))){
			if ($this->form_validation->run('add_category-form') === FALSE)
			{
				$this->add_category_template('add_category', $data);
			}
			else 
			{
				//Set All The Configurations Needed For File Upload
				$config['upload_path'] = './assets/images/category/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = 2048;
	
				$this->load->library('upload', $config);
				
				
				//Next Check if the Food Logo Has Been Uploaded
				if (!$this->upload->do_upload('category_banner'))
				{
					$data['msg'] = $this->upload->display_errors('<div class="alert alert-danger col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
	
					$this->add_category_template('add_category', $data);
				}
				else 
				{
					$imgdata['category_banner'] = $this->upload->data('file_name');
					
					if ($this->Admin_model->insert_category($imgdata) === TRUE) {
						$data['msg'] = '<div class="alert alert-success col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>The Category Has Been Added Successfully.</div>';
			
						$this->add_category_template('add_category', $data);
					}
					else
					{
						$data['msg']  = '<div class="alert alert-danger col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>An Error Was Encountered While Adding The Category. Pls Try Again</div>';
						
						$this->add_category_template('add_category', $data);
					}
				}
			}
		}
		else 
		{
			$this->add_category_template('add_category', $data);
		}
	}
	
	public function categories()
	{
		//check for session and cookie presence
		$this->admin_header();
		
		$config['total_rows'] = $this->Admin_model->fetch_all_rows('category');
		  
		$config['base_url'] = site_url("Admin/categories/");
		$config['per_page'] = 5;
		$config['uri_segment'] = '3';
		$config['num_links'] = round($config['total_rows'] / $config['per_page']);
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_link'] = FALSE;
		
		$config['last_link'] = FALSE;
		
		$config['next_link'] = FALSE;
		
		$config['prev_link'] = FALSE;
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$page_number = $this->uri->segment(3);
		$data['categories'] = $this->Admin_model->fetch_categories($config['per_page'], $page_number);
		
		$data['total_num_pages'] = ceil($config['total_rows'] / $config['per_page']);
		$data['total_num_rows'] = $config['total_rows'];
		
		$url_segments = $this->uri->total_segments();
		$data['page_num'] = ($url_segments !== 3) ? 1 : $this->uri->segment(3);
		
		
		$this->add_category_template('categories', $data);
	}
	
	public function edit_category()
	{
		if ($this->uri->total_segments() == 3) {
			$category_id = $this->uri->segment(3);
			
			
			if((isset($_POST) && (!empty($_POST)))){
				if ($this->form_validation->run('add_category-form') === FALSE)
				{
					$this->edit_category_segment($category_id);
				}
				else 
				{
					//set the array that will carry the uploaded image name to the Admin Model empty
					//if an image was selected, the array will be populated with element
					$imgdata = array();
					
					if (!empty($_FILES['category_banner']['name'])) 
					{
						$_FILES['userfile']['name']     = $_FILES['category_banner']['name'];
						$_FILES['userfile']['type']     = $_FILES['category_banner']['type'];
						$_FILES['userfile']['tmp_name'] = $_FILES['category_banner']['tmp_name'];
						$_FILES['userfile']['error']    = $_FILES['category_banner']['error'];
						$_FILES['userfile']['size']     = $_FILES['category_banner']['size'];
						
						//Set All The Configurations Needed For File Upload
						$config['upload_path'] = './assets/images/category/';
						$config['allowed_types'] = 'gif|jpg|png';
						$config['max_size'] = 2048;
			
						$this->load->library('upload', $config);
									
						//Next Check if the vendor Logo Has Been Uploaded
						if (!$this->upload->do_upload())
						{
							$data['msg'] = $this->upload->display_errors('<div class="alert alert-danger col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
			
							$this->edit_category_segment($category_id, $error);
						}
						else
						{
							$imgdata['category_banner'] = $this->upload->data('file_name');
						}
					}
					if ($this->Admin_model->update_categoy_details($category_id, $imgdata) === TRUE) {
						$data['msg'] = '<div class="alert alert-success col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>This Category Details Has Been Updated Successfully.</div>';
			
						$this->edit_category_segment($category_id, $data);
					}
					else
					{
						$data['msg']  = '<div class="alert alert-danger col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>An Error Was Encountered While Updating This Food Item. Pls Try Again</div>';
						$this->edit_category_segment($category_id, $data);
					}
				}
			}else {
				$this->edit_category_segment($category_id);
			}
			
		}else {
			redirect('Admin/category_list');
		}
	}
	
	public function edit_category_segment($category_id, $data = array())
	{
		//check for session and cookie presence
		$this->admin_header();
		
		$result = $this->Admin_model->fetch_category_details($category_id);
		
		if ($result !== FALSE) {
			$data['category_details'] = $result;
			$this->add_category_template('edit_category', $data);
		}else {
			redirect('Admin/categories');
		}
	}
	
	public function add_category_template($filename, $data = array())
	{
		
		$this->admin_header();
		$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
		$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
		$this->load->view('admins/'.$filename, $data);
	}
	
	
	
	public function add_product()
	{
		//fetch the categories
		$data['categories'] = $this->Admin_model->fetch_all_rows_datas('category_id', 'category');
		
		if((isset($_POST) && (!empty($_POST)))){
			if ($this->form_validation->run('add_food-form') === FALSE)
			{
				$this->add_food_template('add_food', $data);
			}
			else 
			{
				$number_of_files_uploaded = count($_FILES['userFile']['name']);
				
				$imgdata = array();
				
				for ($i = 0; $i < $number_of_files_uploaded; $i++) {
					
					$_FILES['userfile']['name']     = $_FILES['userFile']['name'][$i];
					$_FILES['userfile']['type']     = $_FILES['userFile']['type'][$i];
					$_FILES['userfile']['tmp_name'] = $_FILES['userFile']['tmp_name'][$i];
					$_FILES['userfile']['error']    = $_FILES['userFile']['error'][$i];
					$_FILES['userfile']['size']     = $_FILES['userFile']['size'][$i];
					
					//Set All The Configurations Needed For File Upload
					$config['upload_path'] = './assets/images/products/';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = 2048;
			
					$this->load->library('upload', $config);
					
					
					//Next Check if the vendor Logo Has Been Uploaded
					if (!$this->upload->do_upload())
					{
						$data['msg'] = $this->upload->display_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
		
						$this->$this->add_food_template('add_food', $data);
					}
					else 
					{
						$imgdata[$i] = $this->upload->data('file_name');
						
					}
				}
				
				//we want to run this block only if at least there was an uploaded image
				if (count($imgdata) > 0) {
					
					if ($this->Admin_model->insert_product($imgdata) === TRUE) {
						$data['msg'] = '<div class="alert alert-success col-sm-offset-2 col-sm-8"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>The Product Has Been Added Successfully.</div>';
			
						$this->add_food_template('add_food', $data);
					}
					else
					{
						$data['msg']  = '<div class="alert alert-danger col-sm-offset-2 col-sm-8"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>An Error Was Encountered While Adding The Product. Pls Try Again</div>';
						
						$this->add_food_template('add_food', $data);
					}
				}
				
			}
		}
		else 
		{
			$this->add_food_template('add_food', $data);
		}
	}
	
	public function products()
	{
		$this->admin_header();
		
		//check for session and cookie presence
		//$this->admin_header();
		
		$config['total_rows'] = $this->Admin_model->fetch_all_rows('product');
		  
		$config['base_url'] = site_url("Admin/products/");
		$config['per_page'] = 5;
		$config['uri_segment'] = '3';
		$config['num_links'] = round($config['total_rows'] / $config['per_page']);
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_link'] = FALSE;
		
		$config['last_link'] = FALSE;
		
		$config['next_link'] = FALSE;
		
		$config['prev_link'] = FALSE;
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$page_number = $this->uri->segment(3);
		$data['products'] = $this->Admin_model->fetch_products($config['per_page'], $page_number);
		
		$data['total_num_pages'] = ceil($config['total_rows'] / $config['per_page']);
		$data['total_num_rows'] = $config['total_rows'];
		
		$url_segments = $this->uri->total_segments();
		$data['page_num'] = ($url_segments !== 3) ? 1 : $this->uri->segment(3);
		
		$this->add_food_template('foods', $data);
	}
	
	public function edit_product()
	{
		if ($this->uri->total_segments() == 3) {
			$food_id = $this->uri->segment(3);
			
			if((isset($_POST) && (!empty($_POST)))){
				if ($this->form_validation->run('add_food-form') === FALSE)
				{
					$this->edit_food_segment($food_id);
				}
				else 
				{
					if ($_FILES['userFile']['name'][0] !== "") {
						$number_of_files_uploaded = count($_FILES['userFile']['name']);
					}else {
						$number_of_files_uploaded = 0;
					}
					
					/*echo "<pre>";
					print_r($number_of_files_uploaded);
					echo "</pre>";*/
					
					if ($this->input->post('hidddenuserFile')) {
						$number_of_existed_files = count($this->input->post('hidddenuserFile'));
					}else {
						$number_of_existed_files = 0;
					}
					
					
					$imgdata = array();
					
					if ($number_of_files_uploaded > 0) {
						for ($i = 0; $i < $number_of_files_uploaded; $i++) {
							
							$_FILES['userfile']['name']     = $_FILES['userFile']['name'][$i];
							$_FILES['userfile']['type']     = $_FILES['userFile']['type'][$i];
							$_FILES['userfile']['tmp_name'] = $_FILES['userFile']['tmp_name'][$i];
							$_FILES['userfile']['error']    = $_FILES['userFile']['error'][$i];
							$_FILES['userfile']['size']     = $_FILES['userFile']['size'][$i];
							
							//Set All The Configurations Needed For File Upload
							$config['upload_path'] = './assets/images/products/';
							$config['allowed_types'] = 'gif|jpg|png';
							$config['max_size'] = 2048;
					
							$this->load->library('upload', $config);
							
							
							//Next Check if the vendor Logo Has Been Uploaded
							if (!$this->upload->do_upload())
							{
								$data['msg'] = $this->upload->display_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>');
				
								$this->edit_food_segment($food_id, $data);
							}
							else 
							{
								$imgdata[$i] = $this->upload->data('file_name');
								
							}
						}
					}elseif ($number_of_files_uploaded == 0 && $number_of_existed_files == 0) {
						$data['msg'] = '<div class="alert alert-error col-sm-offset-2 col-sm-8"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please Select A Picture For This Product.</div>';
				
						$this->edit_food_segment($food_id, $data);
					}
					
					if ($this->Admin_model->update_product_details($food_id, $imgdata) === TRUE) {
						$data['msg'] = '<div class="alert alert-success col-sm-offset-2 col-sm-8"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>This Product Details Has Been Updated Successfully.</div>';
			
						$this->edit_food_segment($food_id, $data);
					}
					else
					{
						$data['msg']  = '<div class="alert alert-danger col-sm-offset-2 col-sm-8"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>An Error Was Encountered While Updating This Product Details. Pls Try Again</div>';
						$this->edit_food_segment($food_id, $data);
					}
					
				}
			}else {
				$this->edit_food_segment($food_id);
			}
			
		}else {
			redirect('admin/products');
		}
	}
	
	public function add_fod_home() 
	{
		
		//check for session and cookie presence
		$this->admin_header();
		
		$data['total_num_rows'] = $this->Admin_model->fetch_all_rows('food');
		
		$data['foods'] = $this->Admin_model->fetch_foods();
		
		$this->add_food_template('add_food_home', $data);
	}
	
	public function add_remove_food_home() 
	{
		if((isset($_POST) && (!empty($_POST)))){
			
			$this->Admin_model->add_remove_food_home();
			
		}
	}
	
	public function edit_food_segment($food_id, $data = array())
	{
		//check for session and cookie presence
		$this->admin_header();
		
		//fetch all the categories
		$data['categories'] = $this->Admin_model->fetch_all_rows_datas('category_id', 'category');
		
		$result = $this->Admin_model->fetch_product_details($food_id);
		
		/*echo "<pre>";
		print_r($result);
		echo "</pre>";*/
		
		if ($result !== FALSE) {
			$data['food_details'] = $result;
			$this->add_food_template('edit_food', $data);
			
		}else {
			redirect('Admin/products');
		}
	}
	
	public function add_food_template($filename, $data = array())
	{
		//get the total new orders
		$data["there_is_new_order"] = $this->Admin_model->return_total_rows('order', 'status', 'open');
		
		$this->admin_header();
		$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
		$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
		$this->load->view('admins/'.$filename, $data);
	}
	
	public function delete_products() 
	{
		$food_id = $this->input->post('hidden_order_ids');
		
		$arrayOfFoodIds = explode("|", $food_id);
		for($i = 0; $i < count($arrayOfFoodIds); $i++) {
			if ($arrayOfFoodIds[$i] !== "") {
				$this->Admin_model->delete_product($arrayOfFoodIds[$i]);
			}
		}
		
		redirect('Admin/products');
	}
	
	public function delete_product_image()
	{
		if ($this->Admin_model->delete_product_image() !== FALSE) {
			echo "success";
		}else {
			echo "error";
		}
	}
	
	public function fetch_customised_request() 
	{
		//get the javascrit json string and decode it to php array
		$menusArray = $this->input->post("menusArray");
		$fetch_what = $this->input->post("fetch_what");
		$menusArray = json_decode($menusArray);
		
		//next send the array to the database and fetch details
		$query = $this->Admin_model->fetch_customized_search($menusArray, $fetch_what);
		
		echo json_encode($query->result_array());
	}
	
	
	
	
	
	
	
	
	
	
	
	
	public function delete_property()
	{
		//get the table name of the id to be deleted. that will enable us know which view to redirect
		$table_name = $this->input->post('table');
		switch ($table_name) {
			case "admin":
				$redirection_path = "Admin/manage_admins";
				break;
			case "notification":
				$redirection_path = "Admin/notifications";
				break;
			default:
				$redirection_path = "";
		}
		if ($this->Admin_model->delete_property() === TRUE) {
			redirect($redirection_path);
		}else {
			redirect($redirection_path);
		}
	}
	
	public function settings()
	{
		//get the total new orders
		$data["there_is_new_order"] = $this->Admin_model->return_total_rows('order', 'status', 'open');
		
		if (isset($_POST) && !empty($_POST)) {
			if ($this->form_validation->run('change-password') === FALSE) {
				
				$this->admin_header();
				$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
				$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
				$this->load->view('admins/settings', $data);
				
			}else {
				$result = $this->Admin_model->confirm_replace_password();
				
				if ($result === TRUE) {
					
					$data['create_admin_success_message'] = 'Password Changed Successfully';
					$this->admin_header();
					
					$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
					$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
					$this->load->view('admins/settings', $data);
				}else {
					
					$data['create_admin_error_message'] = 'Invalid Password Or No Session Found';
					
					$this->admin_header();
					$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
					$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
					$this->load->view('admins/settings', $data);
				}
			}
		}else {
			$this->admin_header();
			$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
			$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
			$this->load->view('admins/settings', $data);
		}
		
	}
	
	public function logout() 
	{
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === TRUE) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			//next delete the cookie from the browser
			if (get_cookie('gella') !== NULL) {
				delete_cookie('gella');
			}
			
			// user logout redirect to login page
			redirect('Admin/login');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('Admin');
			
		}
		
	}
	
	public function notifications()
	{
		$this->admin_header();
		
		$config['total_rows'] = $this->Admin_model->fetch_all_rows('notification');
		  
		$config['base_url'] = base_url("Admin/notifications/");
		$config['per_page'] = 10;
		$config['uri_segment'] = '3';
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = round($config['total_rows'] / $config['per_page']);
		
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		
		$config['first_link'] = FALSE;
		
		$config['last_link'] = FALSE;
		
		$config['next_link'] = FALSE;
		
		$config['prev_link'] = FALSE;
		
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$page_number = $this->uri->segment(3);
		
		$data['notification'] = $this->Admin_model->fetch_notifications($config['per_page'], $page_number);
		
		$data['total_num_pages'] = ceil($config['total_rows'] / $config['per_page']);
		$data['total_num_rows'] = $config['total_rows'];
		$data['page_num'] = ($this->uri->segment(3) === NULL) ? 1 : $this->uri->segment(3);
		
		$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
		$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
		$this->load->view('admins/notification', $data);
	}
	
	public function view_notification()
	{
		//check for session and cookie presence
		$this->admin_header();
		
		//check and confirm if the total url segment is 3
		$url_segments = $this->uri->total_segments();
		
		if ($url_segments == 3) {
			//retrieved the unreviewed property id
			$notification_id = $this->uri->segment(3);
			
			//retrieve from the database all the details of this property
			$result = $this->Admin_model->fetch_notification_message($notification_id);
			
			if ($result === FALSE) {
				redirect('Admin/notifications');
			}else {
				$data['notification_details'] = $result;
				
				$data['header'] = $this->load->view('templates/admin_header', $data, TRUE);
				$data['footer'] = $this->load->view('templates/admin_footer', '', TRUE);
				$this->load->view('admins/notification_message', $data);
			}
		}else {
			redirect('Admin/notifications');
		}
	}
	
	
}

?>