<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 *  ======================================= 
 *  Author     : Larry Akah
 *  License    : Protected 
 *  Email      : larryakah@gmail.com 
 *  =======================================
 */ 
 require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
 
 class IOFactory extends PHPExcel_IOFactory{
	public function __construct(){
	}
}