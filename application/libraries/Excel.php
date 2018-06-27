<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 *  ======================================= 
 *  Author     : Larry Akah
 *  License    : Protected 
 *  Email      : larryakah@gmail.com 
 *  =======================================
 */  
require_once APPPATH."/third_party/PHPExcel.php";
 
class Excel extends PHPExcel{
	
    public function init(){
        return new PHPExcel();
    }
}