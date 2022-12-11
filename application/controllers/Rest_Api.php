<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require APPPATH . 'libraries/RestController.php';

//use chriskacerguis\RestServer\RestController;
class Rest_Api extends CI_Controller {
	public function index(){
		echo "this is index function";
	}
}