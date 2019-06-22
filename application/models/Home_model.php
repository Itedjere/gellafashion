<?php


class Home_model extends CI_Model {
	
	public $total_num_rows;
	public $db_query_string = "";
	public $db_query;

	public function __construct()
	{
		$this->load->database();
	}
	
	public function fetch_category_id($category_slug)
	{
		$this->db->select('category_id');
		$this->db->where('category_slug', $category_slug);
		$query = $this->db->get('category');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->category_id;
		}else {
			return FALSE;
		}
		
	}
	
	public function fetch_category_name($category_slug)
	{
		$this->db->select('category_name');
		$this->db->where('category_slug', $category_slug);
		$query = $this->db->get('category');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->category_name;
		}else {
			return FALSE;
		}
		
	}
	
	public function fetch_total_category_on_id($category_id) 
	{
		$this->db->select('product_id');
		$this->db->where('product_category_id', $category_id);
		$query = $this->db->get('product');
		
		return $query->num_rows();
	}
	
	public function is_product_on_category($category_slug, $product_slug)
	{
		//first get the category id
		$this->db->select('category_id');
		$this->db->where('category_slug', $category_slug);
		$query = $this->db->get('category');
		
		if ($query->num_rows() > 0) {
			
			$row = $query->row();
			
			$this->db->select('product_id');
			
			$array = array('product_category_id' => $row->category_id, 'product_slug' => $product_slug);
			$this->db->where($array);
			$query = $this->db->get('product');
			
			if ($query->num_rows() > 0) {
				return TRUE;
			}else {
				return FALSE;
			}
			
		}else {
			return FALSE;
		}
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
	
	public function total_num_rows()
	{
		return $this->total_num_rows;
	}
	
	public function db_query_string() 
	{
		return $this->db_query;
	}
	
	public function fetch_product_name_by_product_id($food_id) 
	{
		$this->db->select('food_category_id');
		$this->db->where('food_id', $food_id);
		$query = $this->db->get('food');
		
		$row = $query->row();
		//menu id
		$menu_id = $row->food_category_id;
		
		//now use the menu id to get its name from the menu table
		$this->db->select('category_name');
		$this->db->where('category_id', $menu_id);
		$query = $this->db->get('category');
		
		$row = $query->row();
		//menu name
		return $row->category_name;
	}
	
	public function fetch_num_categories($limit = "") 
	{
		
		$this->db->select('category_name, category_slug, category_banner, category_description');
		if ($limit !== "") {
			$this->db->limit($limit);
		}
		$this->db->order_by('category_id', 'DESC');
		$query = $this->db->get('category');
		
		return $query->result_array();
	}
	
	public function fetch_categories() 
	{
		$query = $this->db->get('category');
		return $query->result_array();
	}
	
	public function insert_customer()
	{
		$customer = array(
			'order_id' 	=> '',
			'first_name' 		=> $this->input->post('firstName'),
			'phone' 	=> $this->input->post('userPhone'),
			'email' 	=> $this->input->post('userEmail'),
			'information' 	=> $this->input->post('userMessage'),
			'product_id' 		=> $this->input->post('product_id'),
			'status'	=> 'open',
			'time'		=> time()
		);
		
		$this->db->insert('order', $customer);
		
		return TRUE;
	}
	
	   // Insert ordered product detail in "order_detail" table in database.
	public function insert_order_detail($order_datas)
	{
		$this->db->insert_batch('order_details', $order_datas);
	}
	
	public function fetch_order_date($order_id)
	{
		
		$this->db->select('time');
		$array = array('order_id' => $order_id);
		$this->db->where($array);
		$query = $this->db->get('order');
		
		return $query->row_array();
	}
	
	public function fetch_order_details($order_id)
	{
		$this->db->select('product.product_name, product.product_slug, order_details.quantity, category.category_slug, size_and_price.product_price');
		$this->db->from('order_details');
		$this->db->join('product', 'order_details.product_id = product.product_id');
		$this->db->join('size_and_price', 'order_details.price_size_id = size_and_price.id');
		$this->db->join('category', 'product.product_category_id = category.category_id');
		
		$this->db->where('order_details.order_id', $order_id);
		
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function insert_contact_form_details($training_request)
	{
		$data = array(
				'id' => '',
				'firstName'=> $this->input->post('firstName'),
				'phone' => $this->input->post('userPhone'),
				'email' => $this->input->post('userEmail'),
				'message' => $this->input->post('userMessage'),
				'training' => $training_request,
				'time' => time()
		);
		
		$this->db->insert('notification', $data);
		
		return TRUE;
	}
	
	public function insert_client_request_details()
	{
		$data = array(
				'id' => '',
				'type' => 'request',
				'property_id' => $this->input->post('propertyId'),
				'name'=> $this->input->post('userName'),
				'phone' => $this->input->post('userPhone'),
				'email' => $this->input->post('userEmail'),
				'message' => $this->input->post('userMessage'),
				'time' => time()
		);
		
		$this->db->insert('notification', $data);
		
		return TRUE;
	}
	
	public function fetch_vendor_food_menus($vendorUrl)
	{
		$this->db->select('vendor_id');
		$this->db->where('vendor_slug', $vendorUrl);
		$query = $this->db->get('vendors');
		
		
		
		if ($query->num_rows() > 0) {
			//get the vendor id fitst
			$row = $query->row();
			$vendorId = $row->vendor_id;
			
			//next get the vendor menus
			$this->db->distinct();
			$query = $this->db->select('food_category_id');
			$this->db->order_by('food_category_id', 'DESC');
			$this->db->where('food_brand_id', $vendorId);
			$query = $this->db->get('food');
			$vendorMenusArray = $query->result_array();
			
			//set an empty array that will contain all the food details under each menu
			$menusFood = array();
			
			//next loop round with this vendor menus to get the different foods attached to them
			for($x = 0;  $x < count($vendorMenusArray); $x++) {
				
				$this->db->select('food.food_id, food.food_name, food.food_price, food.food_picture, food.food_description, food.food_category_id, category.category_name');
				$this->db->from('food');
				$this->db->join('category', 'category.category_id = food.food_category_id');
				
				$array = array('food.food_category_id' => $vendorMenusArray[$x]['food_category_id'], 'food.food_brand_id' => $vendorId);
				$this->db->where($array);
				
				$query = $this->db->get();
				$menusFood[$x] = $query->result_array();
			}
			
			//at the end return the array
			return $menusFood;
			
		}else {
			return FALSE;
		}
	}
	
	public function fetch_vendor_unique_details($vendorUrl)
	{
		$this->db->where('vendor_slug', $vendorUrl);
		$query = $this->db->get('vendors');
		return $query->row_array();
	}
	
	public function fetch_vendor_unique_details_by_id($vendorId)
	{
		$this->db->where('vendor_id', $vendorId);
		$query = $this->db->get('vendors');
		return $query->row_array();
	}
	
	public function fetch_vendor_menu_list($vendorUrl)
	{
		$this->db->select('vendor_id');
		$this->db->where('vendor_slug', $vendorUrl);
		$query = $this->db->get('vendors');
		
		//get the vendor id fitst
		$row = $query->row();
		$vendorId = $row->vendor_id;
		
		//next get the vendor menus id
		$this->db->distinct();
		$query = $this->db->select('food_category_id');
		$this->db->where('food_brand_id', $vendorId);
		$query = $this->db->get('food');
		$vendorMenusArray = $query->result_array();
		
		//prepare an sql statement to bring the category details
		$this->db->select('category_id, category_name');
		$this->db->order_by('category_id', 'DESC');
		
		//next loop round with this vendor menus id to get the different menu names and Id
		for($x = 0;  $x < count($vendorMenusArray); $x++) {
			
			$this->db->or_where('category_id', $vendorMenusArray[$x]['food_category_id']); 
			
		}
		
		$query = $this->db->get('category');
		
		return $query->result_array();
	}
	
	
	public function fetch_featured_products()
	{
		
		$this->db->select('*');
		$this->db->from('product');
		$this->db->join('category', 'category.category_id = product.product_category_id');
		$this->db->where(array('product.featured' => 'yes'));
		$this->db->order_by('product.product_id', 'DESC');
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			
			for ($x = 0; $x < count($result); $x++) {
				$product_id = $result[$x]['product_id'];
				
				//get all the prices for this product
				$this->db->select('item_image_path');
				$this->db->where('item_id', $product_id);
				$this->db->limit(1);
				
				$query = $this->db->get('item_pictures');
				
				if ($query->num_rows() > 0) {
					$result[$x]['item_pictures'] = $query->row_array();
				}
			}
			return $result;
		}else {
			return FALSE;
		}
	}
	
	public function fetch_all_collections()
	{
		$this->db->from('category');
		$this->db->order_by('category_id', 'DESC');
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			for($i = 0; $i < count($result); $i++) {
				
				$this->db->order_by('product_id', 'DESC');
				$this->db->where('product_category_id', $result[$i]['category_id']);
				$query = $this->db->get('product');
				$result[$i]['product_details'] = $query->result_array();
				
				if (count($result[$i]['product_details']) > 0) {
					//$this->add_pics_to_array($result[$i]['product_details']);
					//$this->add_pics_to_array($result[$i]['product_details']);
					//$result[$i]['product_details']['count'] = count($result[$i]['product_details']);
					for($y = 0; $y < count($result[$i]['product_details']); $y++) {
						
						$product_id = $result[$i]['product_details'][$y]['product_id'];
						//$result[$i]['product_details'][$y]['prod'] = $product_id;
						//get all the prices for this product
						$this->db->select('item_image_path');
						$this->db->where('item_id', $product_id);
						$this->db->limit(1);
						
						$query = $this->db->get('item_pictures');
						
						if ($query->num_rows() > 0) {
							$returned_price_result = $query->row_array();
							$result[$i]['product_details'][$y]['item_image_path'] = $returned_price_result['item_image_path'];
						}
					}
				}
			}
			return $result;
			
		}else {
			return FALSE;
		}
	}
	
	public function fetch_specific_collection($whrarray, $limit, $page_number)
	{
		
		$this->db->where($whrarray);
		$this->db->order_by('product_id', 'DESC');
		$this->db->limit($limit, $page_number);
		$query = $this->db->get('product');
		
		$result = $query->result_array();
		
		//$this->add_pics_to_array($result, "all");
		
		for ($x = 0; $x < count($result); $x++) {
			$product_id = $result[$x]['product_id'];
			
			//get all the prices for this product
			$this->db->select('item_image_path');
			$this->db->where('item_id', $product_id);
			
			$query = $this->db->get('item_pictures');
			
			if ($query->num_rows() > 0) {
				$result[$x]['item_pictures'] = $query->row_array();//$returned_price_result;
			}
		}
		
		return $result;
	}
	
	public function fetch_single_product_details($product_id, $category_id)
	{		
		$this->db->select('*');
		$array = array('product_category_id' => $category_id, 'product_id' => $product_id);
		$this->db->where($array);
		$query = $this->db->get('product');
		
		$result = $query->result_array();
		
		//$this->add_pics_to_array($result, "all");
		
		for ($x = 0; $x < count($result); $x++) {
			$product_id = $result[$x]['product_id'];
			
			//get all the prices for this product
			$this->db->select('item_image_path');
			$this->db->where('item_id', $product_id);
			
			$query = $this->db->get('item_pictures');
			
			if ($query->num_rows() > 0) {
				$returned_price_result = $query->result_array();
				$arrayofpics = array();
				if ($query->num_rows() > 1) {
					//if prices are greater than one
					for($w = 0; $w < count($returned_price_result); $w++) {
						array_push($arrayofpics, $returned_price_result[$w]['item_image_path']);
					}
				}else {
					//there is only one size and hence one price
					$arrayofpics[0] = $returned_price_result[0]['item_image_path'];
				}
				
				$result[$x]['item_pictures'] = $arrayofpics;//$returned_price_result;
			}
		}
		
		return $result;
	}
	
	public function fetch_recommended_products($product_id, $category_id)
	{
		
		$this->db->select('*');
		$array = array('product_category_id' => $category_id, 'product_id !=' => $product_id);
		$this->db->where($array);
		$this->db->limit(4);
		$query = $this->db->get('product');
		
		$result = $query->result_array();
		
		//$this->add_pics_to_array($result, "all");
		
		for ($x = 0; $x < count($result); $x++) {
			$product_id = $result[$x]['product_id'];
			
			//get all the prices for this product
			$this->db->select('item_image_path');
			$this->db->where('item_id', $product_id);
			
			$query = $this->db->get('item_pictures');
			
			if ($query->num_rows() > 0) {
				$result[$x]['item_pictures'] = $query->row_array();//$returned_price_result;
			}
		}
		
		return $result;
	}
}


?>