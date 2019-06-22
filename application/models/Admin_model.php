<?php
class Admin_model extends CI_Model {
	
	private $MainCategoryName = "index";

	public function __construct()
	{
		
	}
	
	public function fetch_all_rows($table_name)
	{
		return $this->db->count_all($table_name);
	}
	
	public function return_total_rows($table_name, $where_field="", $where_value="") {
		if ($where_field !== "" && $where_value !== "") {
			$this->db->where($where_field, $where_value);
		}
		$query = $this->db->get($table_name);
		return $query->num_rows();
	}
	
	public function fetch_columns_where($ColumnNames, $TableName, $WhereArray)
	{
		//columns to select should be in string format like this below
		//"title, content, date"
		$this->db->select($ColumnNames);
		
		//where array format should be like theses below
		//$array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
		//$array = array('name' => $name, 'title' => $title, 'status' => $status);
		$this->db->where($WhereArray);
		
		$query = $this->db->get($TableName);
		
		return $query->result_array();
	}
	
	public function check_session_cookie()
	{
		if (NULL === $this->session->userdata('username')) 
		{
			$this->db->where('username', get_cookie('rentals'));
			$query = $this->db->get('admin');
			
			if ($query->num_rows() == 1) 
			{
				$row = $query->row();
				//set up a session for the user
				$newdata = array(
						'admin_id'	=>	$row->id,
						'username'  => $row->username,
						'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				
				return TRUE;
			}
			else 
			{
				return FALSE;
			}
		}
		else {
			return TRUE;
		}
	}
	
	private function make_dir($dir_path)
	{
		if (!file_exists($dir_path)) {
			if (mkdir($dir_path)) {
				return true;
			}
		}
	}
	
	private function make_file($file_path, $data)
	{
		$fp = fopen($file_path, "w");
		flock($fp, LOCK_EX);
		if (fwrite($fp, $data) !== FALSE) {
			flock($fp, LOCK_UN);
			fclose($fp);
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	private function getLastInsertedId()
	{
		return (NULL !== $this->db->insert_id()) ? $this->db->insert_id() : FALSE;
	}
	
	public function confirm_replace_password()
	{
		$username = $this->session->userdata('username');
		
		//check if the password attached to this username corresponds with the one from the form
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		
		if ($query->num_rows() > 0) {
			$row = $query->row();
			
			//get the password from the form
			$password = $this->input->post('curpassword');
			
			$admin_id = $row->id;
			$db_password = $row->password;
			$secret_salt = strtolower($row->username);
			$hs_password = hash_hmac("sha256", $password, $secret_salt);
			
			if ($hs_password == $db_password) {
				//get the password from the form
				$newpassword = $this->input->post('newpassword');
				$newhs_password = hash_hmac("sha256", $newpassword, $secret_salt);
				
				$data = array(
					'password' => $newhs_password
				);
				
				$this->db->where('id', $admin_id);
				$this->db->update('admin', $data);
				
				return TRUE;
			}else {
				return FALSE;
			}
		}else {
			return FALSE;
		}
	}
	
	public function confirm_admin_login()
	{
		//get the username from the input field
		$username = $this->input->post('username');
		
		
		//run a query to check if this username exists
		$this->db->where('username', $username);
		$query = $this->db->get('admin', 1);
		
		//check if the query fetched any result
		if ($query->num_rows() == 1) {
			//get the salt and password from the database;
			$row = $query->row();
			
			//get the password from the input field
			$password = $this->input->post('password');
			
			$db_password = $row->password;
			$secret_salt = strtolower($row->username);
			$hs_password = hash_hmac("sha256", $password, $secret_salt);
			
			if ($hs_password == $db_password) {
				//set up a session for the user
				$newdata = array(
						'admin_id'	=>	$query->row()->id,
						'username'  => $username,
						'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				
				//if the user checked remember, then store a cookie
				if ($this->input->post('remember') == 'Yes') {
					$cookie = array(
							'name'   => 'gella',
							'value'  => $username,
							'expire' => '259200',
							'domain' => '',
							'path'   => '/'
					);
					
					$this->input->set_cookie($cookie);
				}
				
				return TRUE;
			}else {
				return FALSE;
			}
		}else {
			return FALSE;
		}
		
		
	}
	
	public function add_new_admin()
	{
		//grab the username from the form
		$username = $this->input->post('username');
		
		//check if the username already exists
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		
		if ($query->num_rows() == 0) {
			$row = $query->row();
			
			$password = $this->input->post('password');
			$secret_salt = strtolower($username);
			$hs_password = $hashed = hash_hmac("sha256", $password, $secret_salt);
			
			$data = array(
					'id' => '',
					'username' => $username,
					'password' => $hs_password,
					'phone'	=> $this->input->post('phone'),
					'email'	=> $this->input->post('email')
			);
			
			$this->db->insert('admin', $data);
			
			//Check the number of affected rows
			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}
		}else {
			return FALSE;
		}
	}
	
	public function add_demo_admin($username, $password, $phone, $email)
	{
		
		//check if the username already exists
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		
		if ($query->num_rows() == 0) {
			$row = $query->row();
			
			$secret_salt = strtolower($username);
			$hs_password = $hashed = hash_hmac("sha256", $password, $secret_salt);
			
			$data = array(
					'id' => '',
					'username' => $username,
					'password' => $hs_password,
					'phone'	=> $phone,
					'email'	=> $email
			);
			
			$this->db->insert('admin', $data);
			
			//Check the number of affected rows
			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}else {
				return FALSE;
			}
		}else {
			return FALSE;
		}
	}
	
	public function fetch_all_admins()
	{
		$query = $this->db->get('admin');
		return $query->result();
	}
	
	public function fetch_all_rows_datas($primary_key, $tablename, $product_id = "")
	{
		if ($product_id !== "") {
			$this->db->where($primary_key, $product_id);
		}
		$query = $this->db->get($tablename);
		return $query->result();
	}
	
	
	/*public function fetch_new_orders($limit, $page_number)
	{
		//grab all the landed properties from the land table
		$this->db->order_by('time', 'DESC');
		$this->db->limit($limit, $page_number);
		
		$this->db->where('status', 'open');
		$query = $this->db->get('order');
		return $query->result();
	}*/
	
	public function fetch_orders($limit, $page_number, $whrArray) 
	{
		//grab all the landed properties from the land table
		$this->db->order_by('time', 'DESC');
		$this->db->limit($limit, $page_number);
		
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('product', 'order.product_id = product.product_id');
		$this->db->join('category', 'product.product_category_id = category.category_id');
		
		$this->db->where($whrArray);
		
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function delete_order_details($order_id) 
	{
		
		$this->db->delete('order', array('order_id' => $order_id));
		
	}
	
	public function delete_notification_details($notification_id) 
	{
		
		$this->db->delete('notification', array('id' => $notification_id));
		
	}
	
	public function close_order($order_id) {
		$data = array(
				'status' => 'closed'
		);
		
		$this->db->where('order_id', $order_id);
		$this->db->update('order', $data);
		return true;
	}
	
	
	public function insert_category($img_data)
	{
		/*we copy the vendors template from vendors.php into the new file we are going to create*/
		//First give the file a name
		/*$page_name = $property_id . "_" . url_title($part_page_name, 'underscore', TRUE) . ".php";*/
		$category_slug = url_title($this->input->post('category_name'), 'dash', TRUE);
		
		//category folder path
		$category_folder_path = "./application/views/category/".$category_slug;
		
		if ($this->make_dir($category_folder_path)) {
			//next fetch the template [property.php] details and copy into this new file
			$data = file_get_contents('./application/views/templates/cat.php');
			
			//next set the file path and create the file
			$file_path = $category_folder_path . "/" . $this->MainCategoryName . ".php";
			$this->make_file($file_path, $data);
			
			$data = array(
					'category_id' => '',
					'category_name' => $this->input->post('category_name'),
					'category_slug' => $category_slug,
					'category_banner'	=>	$img_data['category_banner']
			);
			
			$this->db->insert('category', $data);
			
			//Check the number of affected rows
			if ($this->db->affected_rows() > 0) {
				return TRUE;
			}else {
				return FALSE;
			}
			
		}else {
			return FALSE;
		}
	}
	
	public function fetch_categories($limit, $page_number)
	{
		//grab all the landed properties from the land table
		$this->db->order_by('category_id', 'DESC');
		$this->db->limit($limit, $page_number);
		
		$query = $this->db->get('category');
		return $query->result();
	}
	
	public function fetch_category_details($category_id)
	{
		$this->db->where('category_id', $category_id);
		$query = $this->db->get('category');
		if ($query->num_rows() == 1) {
			return $query->row();
		}else {
			return FALSE;
		}
	}
	
	public function update_categoy_details($category_id, $imgData = array())
	{
		//set the category banner name
		if (count($imgData) !== 0) {
			$category_banner = $imgData['category_banner'];
			
			//then delete the old vendor logo
			$old_category_banner = "./assets/images/category/" . $this->input->post('hidden_category_banner');
			unlink($old_category_banner);
		}
		else
		{
			$category_banner = $this->input->post('hidden_category_banner');
		}
		
		//set the category name
		if ($this->input->post('category_name') !== $this->input->post('hidden_category_name')) {
			
			$category_name = $this->input->post('category_name');
			$slug = url_title($category_name, 'dash', TRUE);
		
			//category folder path
			$new_category_folder_path = "./application/views/category/".$slug;
			$old_category_folder_path = "./application/views/category/".$this->input->post('hidden_category_slug');
			
			//rename catgory
			rename($old_category_folder_path, $new_category_folder_path);
			
		}else {
			$category_name = $this->input->post('hidden_category_name');
			$slug = $this->input->post('hidden_category_slug');
		}
		
		$data = array(
				'category_name' => $category_name,
				'category_slug'	=>	$slug,
				'category_banner'	=>	$category_banner
		);
		
		$this->db->where('category_id', $category_id);
		$this->db->update('category', $data);
		
		return TRUE;
	}
	
	public function insert_product($img_data="")
	{
		//create a page in the main product category
		$main_category_id = $this->input->post('category_id');
		//get the catgory slug
		$whereclause = array('category_id' => $main_category_id);
		$main_category_slugs = $this->fetch_columns_where("category_slug", "category", $whereclause);
		foreach($main_category_slugs as $key => $value) {
			$main_category_slug = $value["category_slug"];
		}
		
		$title = $this->input->post('food_name');
		$slug = url_title($title, 'dash', TRUE);
		$page_name = $slug . time();
		
		//next fetch the template [property.php] details and copy into this new file
		$data = file_get_contents('./application/views/templates/single_product.php');
		
		//next set the file path and create the file
		$file_path = './application/views/category/'. $main_category_slug . "/" . $page_name . ".php";
		if ($this->make_file($file_path, $data)) {
			//check if 
			$data = array(
					'product_id' => '',
					'product_name'	=> $this->input->post('food_name'),
					'product_slug'	=> $page_name,
					'product_description'	=> $this->input->post('food_description'),
					'product_price'	=> $this->input->post('product_price'),
					'product_category_id'	=> $this->input->post('category_id'),
					'featured'	=> 'no',
					'product_added_date'	=> time()
			);
			
			$this->db->insert('product', $data);
			//last inserted id
			$product_id = $this->getLastInsertedId();
			
			//insert images
			for ($i = 0; $i < count($img_data); $i++) {
				$Arr = array(
						'image_id' => '',
						'item_id' => $product_id ,
						'item_image_path'	=>	$img_data[$i],
				);
				
				$this->db->insert("item_pictures", $Arr);
			}
			return TRUE;
		}else {
			return FALSE;
		}
	}
	
	public function fetch_products($limit="", $page_number="")
	{
		//grab all the food details from the food table
		$this->db->order_by('product_id', 'DESC');
		
		if ($limit !== "" && $page_number !== "") {
			$this->db->limit($limit, $page_number);
		}
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category', 'category.category_id = product.product_category_id');
		$this->db->order_by('product.product_id', 'DESC');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function fetch_foods_array($limit="", $page_number="")
	{
		//grab all the food details from the food table
		$this->db->order_by('food_id', 'DESC');
		
		if ($limit !== "" && $page_number !== "") {
			$this->db->limit($limit, $page_number);
		}
		
		$this->db->select('food.food_id, food.food_name, food.food_price, food.add_home, category.category_name, vendors.vendor_name');
		$this->db->from('food');
		$this->db->join('category', 'category.category_id = food.food_category_id');
		$this->db->join('vendors', 'vendors.vendor_id = food.food_brand_id');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function fetch_vendor_menus_and_foods($vendorsId)
	{
		$this->db->distinct();
		$query = $this->db->select('food_category_id');
		$this->db->where('food_brand_id', $vendorsId);
		$query = $this->db->get('food');
		return $query->result_array();
		
	}
	
	public function fetch_the_food_array($menuId) 
	{
		//$this->db->where('food_category_id', $menuId);
		//$query = $this->db->get('food');
		
		$this->db->select('food.food_id, food.food_name, food.food_price, food.food_picture, food.food_description, food.food_category_id, category.category_name');
		$this->db->from('food');
		$this->db->join('category', 'category.category_id = food.food_category_id');
		$this->db->where('food.food_category_id', $menuId);
		
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function add_remove_food_home() {
		
		$columnValue = $this->input->post('columnValue');
		$columnName = $this->input->post('columnName');
		
		$data = array(
				'featured' => $columnValue
		);
		$this->db->where('product_id', $columnName);
		
		$this->db->update('product', $data);
			
	}
	
	public function fetch_customized_search($sentArrays, $fetch_what)
	{
		
		if ($fetch_what == "fetch_vendors") {
			$fetch = "food.food_brand_id";
		}
		else 
		{
			$fetch = "food.food_category_id";
		}
		
		
		$this->db->select('food.food_id, food.food_name, food.food_price, category.category_name, vendors.vendor_name');
		$this->db->from('food');
		$this->db->join('category', 'category.category_id = food.food_category_id');
		$this->db->join('vendors', 'vendors.vendor_id = food.food_brand_id');
		
		for($i = 0; $i < count($sentArrays); $i++) {
			if ($sentArrays[$i] !== null) {
				$this->db->or_where($fetch, $sentArrays[$i]);
			}
		} 
		
		$query = $this->db->get();
		
		return $query;
	}
	
	public function fetch_product_details($food_id)
	{
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category', 'category.category_id = product.product_category_id');
		$this->db->where(array('product.product_id' => $food_id));
		$query = $this->db->get();
		
		if ($query->num_rows() == 1) {
			
			$result = $query->result_array();
			
			for ($x = 0; $x < count($result); $x++) {
				$product_id = $result[$x]['product_id'];
				
				//get all the prices for this product
				$this->db->select('item_image_path, image_id');
				$this->db->where('item_id', $product_id);
				
				$query = $this->db->get('item_pictures');
				
				if ($query->num_rows() > 0) {
					$returned_price_result = $query->result_array();
					$arrayofpics = array();
					if ($query->num_rows() > 0) {
						//if prices are greater than one
						for($w = 0; $w < count($returned_price_result); $w++) {
							array_push($arrayofpics, $returned_price_result[$w]);
						}
					}
					
					$result[$x]['item_pictures'] = $arrayofpics;//$returned_price_result;
				}
			}
			
			return $result;
			
		}else {
			return FALSE;
		}
	}
	
	public function update_product_details($food_id, $img_data = array())
	{
		//set the logo name and the banner name
		if (count($img_data) > 0) {
			//insert images
			for ($i = 0; $i < count($img_data); $i++) {
				$Arr = array(
						'image_id' => '',
						'item_id' => $food_id,
						'item_image_path'	=>	$img_data[$i],
				);
				
				$this->db->insert("item_pictures", $Arr);
			}
		}
		
		//check to see if the slug is different
		$product_name = $this->input->post('food_name');
		$hidden_slug = $this->input->post('hidden_slug');
		$hidden_category_slug = $this->input->post('hidden_category_slug');
		
		
		$new_slug = url_title($product_name, 'dash', TRUE);
		
		
		if ($new_slug !== $hidden_slug) {
			
			$old_product_name = './application/views/category/'. $hidden_category_slug . "/" . $hidden_slug . ".php";
			$new_product_name = './application/views/category/'. $hidden_category_slug . "/" . $new_slug . ".php";
			
			//rename product
			rename($old_product_name, $new_product_name);
			
			$slug = $new_slug;
		}else {
			$slug = $hidden_slug;
		}
		
		$hidden_category_id = $this->input->post('hidden_category_id');
		$category_id = $this->input->post('category_id');
		
		if ($category_id !== $hidden_category_id) {
			//get new category slug
			$category_row = $this->fetch_category_details($category_id);
			$category_slug = $category_row->category_slug;
			
			$old_product_location = './application/views/category/'. $hidden_category_slug . "/" . $slug . ".php";
			$new_product_location = './application/views/category/'. $category_slug . "/" . $slug . ".php";
			
			//move product
			rename($old_product_location, $new_product_location);
			
		}else {
			$category_id = $hidden_category_id;
		}
		
		$data = array(
				'product_name'	=> $product_name,
				'product_slug'	=> $slug,
				'product_description'	=>	$this->input->post('food_description'),
				'product_price'	=>	$this->input->post('product_price'),
				'product_category_id'	=> $category_id
		);
		
		$this->db->where('product_id', $food_id);
		$this->db->update('product', $data);
		
		return TRUE;
	}
	
	public function delete_product($order_id) 
	{
		//first we need to run a query to get the image of the food and delete it.
		$this->db->where('product_id', $order_id); 
		$query = $this->db->get('product');
		
		if ($query->num_rows() == 1) {
			
			$row = $query->row();
			
			//create a page in the main product category
			$main_category_id = $row->product_category_id;
			//get the catgory slug
			$whereclause = array('category_id' => $main_category_id);
			$main_category_slugs = $this->fetch_columns_where("category_slug", "category", $whereclause);
			foreach($main_category_slugs as $key => $value) {
				$main_category_slug = $value["category_slug"];
			}
			
			//Author Slug
			$blogSlug = $row->product_slug;
			$authorPageLocation = "./application/views/category/" . $main_category_slug . "/" . $blogSlug . ".php";
			unlink($authorPageLocation);
			
			//delete picturs
			$whereclause = array('item_id' => $order_id);
			$item_image_paths = $this->fetch_columns_where("item_image_path", "item_pictures", $whereclause);
			foreach($item_image_paths as $key => $value) {
				$item_image_path = $value["item_image_path"];
				$item_image_location = "./assets/images/products/" . $item_image_path;
				unlink($item_image_location);
			}
			
			$this->db->delete("item_pictures", array('item_id' => $order_id));
			$this->db->delete("product", array('product_id' => $order_id));
			
		}
	}
	
	public function delete_product_image()
	{
		//delete picturs
		$image_id = $this->input->post('image_id');
		$product_id = $this->input->post('product_id');
		
		
		$whereclause = array('image_id' => $image_id, 'item_id' => $product_id);
		$item_image_paths = $this->fetch_columns_where("item_image_path", "item_pictures", $whereclause);
		foreach($item_image_paths as $key => $value) {
			$item_image_path = $value["item_image_path"];
			$item_image_location = "./assets/images/products/" . $item_image_path;
			unlink($item_image_location);
		}
		
		$this->db->delete("item_pictures", $whereclause);
		
		return TRUE;
	}
	
	public function fetch_notifications($limit="", $page_number="")
	{
		//grab all the category details from the category table
		$this->db->order_by('id', 'DESC');
		
		if ($limit !== "" && $page_number !== "") {
			$this->db->limit($limit, $page_number);
		}
		
		$this->db->from('notification');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function fetch_notification_message($notification_id)
	{
		$this->db->where('id', $notification_id);
		$query = $this->db->get('notification');
		if ($query->num_rows() == 1) {
			return $query->row();
		}else {
			return FALSE;
		}
	}
	
	public function delete_property()
	{
		$table_name = $this->input->post('table');
		$property_id = $this->input->post('delete-property-id');
		
		$this->db->where('id', $property_id); 
		$query = $this->db->get($table_name);
		
		if ($query->num_rows() == 1) {
			
			$this->db->delete($table_name, array('id' => $property_id));
	
			return TRUE;
		}else {
			return FALSE;
		}
	}
}

?>