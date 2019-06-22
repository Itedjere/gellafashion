<?php

$config = array(

		'login' => array(
				array(
						'field' => 'username',
						'label' => 'Username',
						'rules' => 'trim|required'
				),
				array(
						'field' => 'password',
						'label' => 'Password',
						'rules' => 'trim|required'
				)
		),
		'create-admin' => array(
						array(
								'field'	=> 'username',
								'label'	=>	'Username',
								'rules'	=>	'trim|required|alpha_numeric|is_unique[admin.username]'
						),
						array(
								'field'	=> 'password',
								'label'	=>	'Password',
								'rules'	=>	'trim|required|alpha_numeric|min_length[8]'
						),
						array(
								'field'	=> 'passconf',
								'label'	=>	'PasswordConfirmation',
								'rules'	=>	'trim|required|matches[password]'
						),
						array(
								'field'	=> 'phone',
								'label'	=>	'Phone Number',
								'rules'	=>	'trim|required|numeric'
						),
						array(
								'field'	=> 'email',
								'label'	=>	'Email',
								'rules'	=>	'trim|required|valid_email'
						)
		),
		'change-password' => array(
					array(
						'field'	=> 'curpassword',
						'label'	=>	'Current Password',
						'rules'	=>	'trim|required|alpha_numeric|min_length[8]'
					),
					array(
						'field'	=> 'newpassword',
						'label'	=>	'New Password',
						'rules'	=>	'trim|required|alpha_numeric|min_length[8]'
					),
					array(
						'field'	=> 'confpassword',
						'label'	=>	'ConfirmationPassword',
						'rules'	=>	'trim|required|matches[newpassword]'
					)
		),
		'contact-form' => array(
					array(
						'field'	=> 'firstName',
						'label'	=>	'Name',
						'rules'	=>	'trim|required|alpha_numeric_spaces'
					),
					array(
						'field'	=> 'userEmail',
						'label'	=>	'Email',
						'rules'	=>	'trim|valid_email'
					),
					array(
						'field'	=> 'userPhone',
						'label'	=>	'Phone',
						'rules'	=>	'trim|required|numeric'
					),
					array(
						'field'	=> 'userMessage',
						'label'	=>	'Message',
						'rules'	=>	'trim|required'
					)
		),
		'buy-the-food'	=>	array(
					array(
						'field'	=> 'first_name',
						'label'	=>	'First Name',
						'rules'	=>	'trim|required|alpha_numeric_spaces'
					),
					array(
						'field'	=> 'last_name',
						'label'	=>	'Last Name',
						'rules'	=>	'trim|required|alpha_numeric_spaces'
					),
					array(
						'field'	=> 'street_address_1',
						'label'	=>	'House Address',
						'rules'	=>	'trim|required'
					),
					array(
						'field'	=> 'city',
						'label'	=>	'City',
						'rules'	=>	'trim|required'
					),
					array(
						'field'	=> 'state',
						'label'	=>	'State',
						'rules'	=>	'required'
					),
					array(
						'field'	=> 'phone',
						'label'	=>	'Phone Number',
						'rules'	=>	'trim|required|numeric'
					),
					array(
						'field'	=> 'email',
						'label'	=>	'Email',
						'rules'	=>	'trim|valid_email'
					)
					
		),
		'add_category-form' => array(
				array(
						'field' => 'category_name',
						'label' => 'Category Name',
						'rules' => 'required|alpha_numeric_spaces'
				)
		),
		'add_brand-form' => array(
				array(
						'field' => 'brand_name',
						'label' => 'Vendor Name',
						'rules' => 'required'
				),
				array(
						'field' => 'brand_address',
						'label' => 'Vendor Address',
						'rules' => 'required'
				),
				array(
						'field' => 'brand_niche',
						'label' => 'Vendor Niche',
						'rules' => 'required'
				),
				array(
						'field' => 'brand_bio',
						'label' => 'Vendor Description',
						'rules' => 'required'
				)
		),
		'add_food-form' => array(
				array(
						'field' => 'category_id',
						'label' => 'Product Category',
						'rules' => 'required'
				),
				array(
						'field' => 'food_name',
						'label' => 'Product Name',
						'rules' => 'required'
				),
				array(
						'field' => 'food_description',
						'label' => 'Product Description',
						'rules' => 'required'
				),
				array(
						'field' => 'product_price',
						'label' => 'Product Price',
						'rules' => 'required'
				)
		),
		'edit_food-form' => array(
				array(
						'field' => 'category_id',
						'label' => 'Product Category',
						'rules' => 'required'
				),
				array(
						'field' => 'food_name',
						'label' => 'Product Name',
						'rules' => 'required'
				),
				array(
						'field' => 'product_sku',
						'label' => 'Product Stock Keeping Unit',
						'rules' => 'required'
				),
				array(
						'field' => 'food_description',
						'label' => 'Product Description',
						'rules' => 'required'
				)
		)

);

?>