<?php
/*
Plugin Name: ToDo
Description: A ToDo crud example
Version: 1.0.0
Author:
Author URI:
GitHub Plugin URI: https://github.com/bayon/ToDo

*/
 // function to create the DB / Options / Defaults
function sp_db_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "todo";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'sp_db_install');

//menu items
add_action('admin_menu','sp_todo_modifymenu');
function sp_todo_modifymenu() {

	//this is the main item for the menu
	add_menu_page('todo', //page title
	'todo', //menu title
	'manage_options', //capabilities
	'sp_todo_list', //menu slug
	'sp_todo_list' //function
	);

	//this is a submenu
	add_submenu_page('sp_todo_list', //parent slug
	'Add New Todo', //page title
	'Add New', //menu title
	'manage_options', //capability
	'sp_todo_create', //menu slug
	'sp_todo_create'); //function

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update ToDo', //page title
	'Update', //menu title
	'manage_options', //capability
	'sp_todo_update', //menu slug
	'sp_todo_update'); //function
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'todo-list.php');
require_once(ROOTDIR . 'todo-create.php');
require_once(ROOTDIR . 'todo-update.php');
