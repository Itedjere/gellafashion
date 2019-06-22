<?php

class Home extends CI_controller {
	
	//public $userEmail = array('info@wavelengthips.com', 'wavelengthips@gmail.com', 'oneal@wavelengthips.com');
	public $userEmail = array('itedjereg77@gmail.com');
	public $admin_form_subject = "A Client Sent You A Message";
	public $contact_form_subject = "Thank You For Contacting Us";
	public $order_form_subject = "Your Order Has Been Received";
	public $admin_order_subject = "A New Order";
	public $auto_order_subject = "Your Order Invoice";
	public $currency_symbol = "₦";
	
	public function __construct()
	{
		parent::__construct();
		
		//load form validation library
		$this->load->library('form_validation');
		
		//load Admin_model model
		$this->load->model('Home_model');
		
		//load shopping cart model
		$this->load->library('cart');
		
		//load form validation library
		$this->load->library('pagination');
	}
	
	public function index()
	{
		
		$data['nav'] = array('home' => 'active', 'about' => '', 'collect' => '', 'training' => '', 'contact' => '');
		//get featured product
		$data['fetch_featured_products'] = $this->Home_model->fetch_featured_products();
		$this->general_page_template("public/index", $data);
		/*echo "<pre>";
			print_r($data['fetch_featured_products']);
			echo "</pre>";*/
		
	}
	
	public function view_category_products()
	{
		
		if ($this->uri->total_segments() == 2) {
			//gt th catgory slug
			$data['main_category_slug'] = $main_category_slug = $this->uri->segment(2);
			//get the category id
			$WhereArray = array('category_slug' => $main_category_slug);
			$result = $this->Home_model->fetch_columns_where('category_id, category_name', 'category', $WhereArray);
			
			if (count($result) < 1) {
				redirect('Home');
			}
			
			foreach($result as $category) {
				$main_category_id = $category['category_id'];
				$data['main_category_name'] = $data['sub_category_name'] = $category['category_name'];
			}
			
			//get total num rowws
			$config['total_rows'] = $this->Home_model->fetch_total_category_on_id($main_category_id);
		  
			$config['base_url'] = site_url("category/".$main_category_slug."/");
			$config['per_page'] = 32;
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
			//==slider products==//
			$whrarray = array('product_category_id' => $main_category_id);
			$data['collections'] = $this->Home_model->fetch_specific_collection($whrarray, $config['per_page'], $page_number);
			
			$data['cat_body'] = $this->load->view('templates/cat_body', $data, TRUE);
			$data['nav'] = array('home' => '', 'about' => '', 'collect' => 'active', 'training' => '', 'contact' => '');
			$this->general_page_template("category/".$main_category_slug."/index", $data);
			
			
		}else {
			redirect('index');
		}
		
	}
	
	public function single_product()
	{
		if ($this->uri->total_segments() == 3) {
			
			if((isset($_POST) && (!empty($_POST)))){
				if ($this->input->post('ajax') != 1) {
					if ($this->form_validation->run('contact-form') !== FALSE)
					{
						$this->send_email();
					}
				}
			}
			
			//gt th catgory slug
			$data['main_category_slug'] = $main_category_slug = $this->uri->segment(2);
			
			//gt the product slug
			$product_slug = $this->uri->segment(3);
			
			//get the category id
			$WhereArray = array('category_slug' => $main_category_slug);
			$result = $this->Home_model->fetch_columns_where('category_id, category_name', 'category', $WhereArray);
			
			if (count($result) < 1) {
				redirect("index");
			}
			
			foreach($result as $category) {
				$main_category_id = $category['category_id'];
				$data['main_category_name'] = $category['category_name'];
			}
			
			//get the product id
			$WhereArray = array('product_slug' => $product_slug);
			$result = $this->Home_model->fetch_columns_where('product_id, product_name', 'product', $WhereArray);
			
			if (count($result) < 1) {
				redirect("index");
			}
			
			foreach($result as $category) {
				$product_id = $category['product_id'];
				$data['product_name'] = $category['product_name'];
			}
			
			$data['product_details'] = $this->Home_model->fetch_single_product_details($product_id, $main_category_id);
			
			$data['recommended_products'] = $this->Home_model->fetch_recommended_products($product_id, $main_category_id);
			
			$data['product_body'] = $this->load->view('templates/product_body', $data, TRUE);
			
			$data['nav'] = array('home' => '', 'about' => '', 'collect' => 'active', 'training' => '', 'contact' => '');
			$this->general_page_template('category/'.$main_category_slug.'/'.$product_slug, $data);
			
			
			
		}else {
			redirect("index");
		}
		
	}
	
	public function about()
	{
		$data['nav'] = array('home' => '', 'about' => 'active', 'collect' => '', 'training' => '', 'contact' => '');
		$this->general_page_template("public/about", $data);
	}
	
	public function collections()
	{
		
		$data['nav'] = array('home' => '', 'about' => '', 'collect' => 'active', 'training' => '', 'contact' => '');
		$data['collections'] = $this->Home_model->fetch_all_collections();
		$this->general_page_template("public/collections", $data);
		
		/*echo "<pre>";
		print_r($data['collections']);
		echo "</pre>";*/
	}
	
	public function training()
	{
		$data['nav'] = array('home' => '', 'about' => '', 'collect' => '', 'training' => 'active', 'contact' => '');
		
		if((isset($_POST) && (!empty($_POST)))){
			if ($this->input->post('ajax') != 1) {
				if ($this->form_validation->run('contact-form') === FALSE)
				{
					$this->contact_template("public/training", $data);
				}else {
					$this->send_email();
					$this->contact_template("public/training", $data);
				}
			}else {
				$this->send_email();
			}
		}else {
			$this->contact_template("public/training", $data);
		}
	}
	
	
	
	public function contact()
	{
		$data['nav'] = array('home' => '', 'about' => '', 'collect' => '', 'training' => '', 'contact' => 'active');
		
		if((isset($_POST) && (!empty($_POST)))){
			if ($this->input->post('ajax') != 1) {
				if ($this->form_validation->run('contact-form') === FALSE)
				{
					$this->contact_template("public/contact", $data);
				}else {
					$this->send_email();
					$this->contact_template("public/contact", $data);
				}
			}else {
				$this->send_email();
			}
		}else {
			$this->contact_template("public/contact", $data);
		}
	}
	
	public function contact_template($filename, $data = array()) 
	{
		$this->general_page_template($filename, $data);
	}
	
	public function contact_advertiser()
	{
		if((isset($_POST) && (!empty($_POST)))){
			$this->send_email();
		}
	}
	
	private function send_email()
	{
		$data['firstName'] = $this->input->post('firstName');
		$data['userPhone'] = $this->input->post('userPhone');
		$data['userEmail'] = $this->input->post('userEmail');
		$data['userMessage'] = $this->input->post('userMessage');
		
		if ($this->input->post('form_type') == "advertiser_form") {
			
			$data['product_name'] = $this->input->post('product_name');
			$data['category'] = $this->input->post('category');
			$this->admin_form_subject = "A Client Is Interested In Your Product";
			
			$body = 'auto_response_body';
		}
		 
		if ($this->input->post('form_type') == "contact_form") {
			$body = 'contact_form_body';
		}
		
		if ($this->input->post('form_type') == "training_form") {
			$body = 'training_form_body';
		}
		
		//$this->email_submission_function($data, $this->userEmail, $this->admin_form_subject, $body); 
		
		
		if (($this->input->post('form_type') == "contact_form") || ($this->input->post('form_type') == "training_form")) {
			$training_request = ($this->input->post('form_type') == "contact_form") ? "no" : "yes";
			$this->Home_model->insert_contact_form_details($training_request);
		}
		
		if ($this->input->post('form_type') == "advertiser_form") {
			$this->Home_model->insert_customer();
		}
		
		if ($this->input->post('ajax') != 1) {
			$data['error'] = '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success!</strong> Your Message Has Been Sent Successfully.</div>';
		}else {
			echo "sent";
		}
		
		
	}
	
	private function email_submission_function($ArrayOfData, $EmailRecipientArray, $EmailSubject, $EmailBody)
	{
		$email_config = Array(
			'protocol'  => 'smtp',
			'smtp_host' => 'localhost',
			'smtp_port' => '25',
			'smtp_user' => 'info@wavelengthips.com',
			'smtp_pass' => 'wavelength1',
			'mailtype'  => 'html',
			'starttls'  => true,
			'newline'   => "\r\n"
		);

		$this->load->library('email', $email_config);
		
		$this->email->from('select@soseptraining.com.ng', 'Select Now');
				 
		$this->email->to($EmailRecipientArray);  // replace it with receiver mail id
		$this->email->subject($EmailSubject); // replace it with relevant subject
   
		$body = $this->load->view('templates/'.$EmailBody, $ArrayOfData, TRUE);
		$this->email->message($body);
		//$this->email->message($EmailBody);
		
		if ($this->email->send()) {
			return TRUE;
		}
	}
	
	private function general_page_template($PageName, $data=array()) 
	{
		$data['categorys'] = $this->Home_model->fetch_categories();
		$data['home_header'] = $this->load->view('templates/home_header', '', TRUE);
		$data['home_navigation'] = $this->load->view('templates/home_navigation', $data, TRUE);
		$data['home_footer'] = $this->load->view('templates/home_footer', $data, TRUE);
		
		$this->load->view($PageName, $data);
	}
	
}

?>