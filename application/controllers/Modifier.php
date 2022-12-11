<?php
//defined('BASEPATH') OR exit('No direct script access allowed'); 
class Modifier{
	// public $firstName='Pawan';
	// public $second_name='Sharma';

	// public function getFirstname(){
	// 	return $this->firstName;
	// }

	// public function getSecondname(){
	// 	return $this->second_name;
	// }



	public $name;
	public function show(){
		echo $this->name;
	}
}
$test=new Modifier();
$test->name='pawan';
$test->show();
// $obj=new Modifier;
// echo $obj->getFirstname();
