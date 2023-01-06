<?php 
// class Study extends CI_Controller{
// 	public function index(){
// 		log_message('error', 'error msg in this line');
// 		log_message('debug', 'error msg in this line');
// 		log_message('info', 'Index Method Called');
// 		echo "index";
// 	}



// $firstName='Pawan';
// $second_name='Sharma';
// public function getFirstname(){
// return $this->firstName;
// }

// public function getSecondname(){
// return $this->second_name;
// }
// }
// $obj=new Study;
// echo $obj->getFirstname();



//public methods and variables
// class Base{
// public $name;
// public function __construct($n){
// $this->name=$n;
// }

// public function show(){
// echo "Your name: ".$this->name;
// }
// }

// $obj=new Base('Yahoo Baba');
// $obj->name="technical data";
// $obj->show();

//protected methods and variables
// class Base{
// protected $name;
// public function __construct($n){
// $this->name=$n;
// }

// protected function show(){
// echo "Your name: ".$this->name;
// }
// }


// class Derived extends Base{
// public function get(){
// echo "Your name: ".$this->name;
// }
// }
// $obj=new Derived('Yahoo Baba');
// //$obj->name="papappa";
// $obj->get();



//private methods and variables
// class Base{
// private $name;
// public function __construct($n){
// $this->name=$n;
// }

// protected function show(){
// echo "Your name: ".$this->name;
// }
// }


// class Derived extends Base{
// public function get(){
// echo "Your name: ".$this->name;
// }
// }
// $obj=new Derived('Yahoo Baba');
// $obj->name="papappa";
// $obj->get();


//constructor and destructor method
class abc{
	public function __destruct(){
		echo "This is destruct function";
	}
	public function __construct(){
		echo "This is construction function";
	}
	public function hello(){
		echo "Hello Everyone";
	}
}

 //$test= new abc();

//Abstract Class
// abstract class parentClass{
// public $name;
// abstract public function calc($a, $b);
// }

// class childClass extends parentClass{
// public function calc($c,$d){
// echo "Hello";
// }
// }

// $obj=new childClass();
// $obj->calc(10,20);


//Interface
// interface parent1{
// function calc($a,$b);
// }
// interface parent2{
// function sub($c,$d);
// }

// class childClass implements parent1,parent2{
// public function calc($a,$b){
// echo $a+$b.'<br>';
// }

// public function sub($c,$d){
// echo $c-$d;
// }
// }

// $obj=new childClass();
// $obj->calc(10,20);
// $obj->sub(20,10);


//static members and methods
// class test{
// static function abc($f , $l){

// echo $f .','.$l;

// }
// }
// test::abc("jeewak" , "kumar");

// class personal{
// public static $name="Yahoo Baba";
// public static function show(){
// echo self::$name;
// }
// }

// echo personal::$name;
// personal::show();

// class personal{
// public static $name="Yahoo Baba";
// }

// class account extends personal{
// public function show(){
// echo parent::$name;
// }
// }

// $obj= new account();
// $obj->show();

//Encapsulation
// class abc{
// private $name;
// public function showName($newName){
// $this->name = $newName;
// return $this->name;
// }
// }
// //instantiate object
// $obj = new abc();
// echo $obj->showName("Jeewak kumar");
// }


// Polymorphism
// abstract class class1{
// abstract function fun1();
// }

// class class2 extends class1{
// function fun1(){
// echo "Fun1";
// }
// }

// class class3 extends class1{
// function fun1(){
// echo "Fun2";
// }
// }

// $obj=new class3();
// $obj->fun1();

// interface class1{
// function fun1();
// }

// class class2 implements class1{
// function fun1(){
// echo "Fun1";
// }
// }

// class class3 implements class1{
// function fun1(){
// echo "Fun2";
// }
// }

// $obj=new class3();
// $obj->fun1();

//overridding
// class base{
// public $name="Parent Class";
// public function calc($a, $b){
// return $a*$b;
// }
// }

// class derived extends base{
// public $name="Child Class";
// public function calc($a, $b){
// return $a+$b;
// }
// }

// $obj=new derived();
// echo $obj->name;
// echo $obj->calc(10,20);

//Traits
// trait hello{
// public function sayhello(){
// echo "Hello evrone<br>";
// }
// }
// trait bye{
// public function saybye(){
// echo "bye bye everone";
// }
// }
// class base{
// use hello,bye;
// }

// $test= new base();
// $test->sayhello();
// $test->saybye();

trait hello{
	public function sayhello(){
		echo "Hello evrone<br>";
	}

	public function sayHii(){
		echo "Hii evrone";
	}
}

class base{
	use hello;
}

$test= new base();
$test->sayhello();
$test->sayHii();

?>