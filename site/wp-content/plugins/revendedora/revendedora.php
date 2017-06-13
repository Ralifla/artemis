<?php
/*
 * Plugin Name: Revendedora AJAX
 * Description: Registration with ajax.
 * Version: 1.0
 * Author: rUmbelino
 * Author URI: https://github.com/rUmbelino
 */

// constructor of the html
function form_creation(){
	$path = plugin_dir_path( __FILE__ );
	require_once($path.'inc/form-cadastro.php');
}add_shortcode('revendedora_ajax_form', 'form_creation');



// js files
function wptuts_scripts_basic(){
	wp_enqueue_style( 'loading', plugins_url( '/css/ring.css', __FILE__ ));
	wp_enqueue_style( 'revendedora-style', plugins_url( '/css/revendedora-style.css', __FILE__ ));
	
	wp_enqueue_script( 'geral', plugins_url( '/js/geral-revendedora.js', __FILE__ ), array( 'jquery' ));
	wp_enqueue_script( 'validate', plugins_url( '/js/jquery.validate.min.js', __FILE__ ), array( 'jquery' ));
	wp_enqueue_script( 'masked', plugins_url( '/js/maskedinput.min.js', __FILE__ ), array( 'jquery' ));
	wp_enqueue_script( 'ajax', plugins_url( '/js/ajax-revendedora.js', __FILE__ ), array( 'geral' ));
	
	wp_localize_script( 'ajax', 'ajax_url',array( 
		'path'       => getcwd(),
		'check_cpf'  => plugins_url( '/inc/check-cpf.php', __FILE__ ),
		'first_step' => plugins_url( '/inc/first-step.php', __FILE__ ),
		'second_step' => plugins_url( '/inc/second-step.php', __FILE__ )
	));
}add_action( 'wp_enqueue_scripts', 'wptuts_scripts_basic' );



?>