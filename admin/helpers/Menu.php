<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => ''
		),
		
		array(
			'path' => 'data_banner', 
			'label' => 'Data Banner', 
			'icon' => ''
		),
		
		array(
			'path' => 'data_masjid', 
			'label' => 'Data Masjid', 
			'icon' => '','submenu' => array(
		array(
			'path' => 'data_masjid/Index', 
			'label' => 'Data Masjid', 
			'icon' => ''
		),
		
		array(
			'path' => 'data_masjid/lengkapi_data_masjid', 
			'label' => 'Lengkapi Data Masjid', 
			'icon' => ''
		),
		
		array(
			'path' => 'data_masjid/cek_data_mesjid', 
			'label' => 'Cek Data Mesjid', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'data_menus', 
			'label' => 'Data Menus', 
			'icon' => ''
		),
		
		array(
			'path' => 'info_masjid', 
			'label' => 'Info Masjid', 
			'icon' => ''
		),
		
		array(
			'path' => 'artikel_masjid', 
			'label' => 'Artikel Masjid', 
			'icon' => ''
		),
		
		array(
			'path' => 'users', 
			'label' => 'Users', 
			'icon' => ''
		),
		
		array(
			'path' => 'banner_donasi', 
			'label' => 'Banner Donasi', 
			'icon' => ''
		)
	);
		
	
	
			public static $role = array(
		array(
			"value" => "admin", 
			"label" => "admin", 
		),
		array(
			"value" => "admin-masjid", 
			"label" => "admin-masjid", 
		),
		array(
			"value" => "user", 
			"label" => "user", 
		),);
		
}