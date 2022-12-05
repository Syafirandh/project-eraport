<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class db{
	var $con;
	function __construct(){
		$this->$con=mysqli_connect("localhost","root","") or die(mysqli_error());
		mysqli_select_db($this->$con,"e-academic") or die(mysqli_error());
	}

	public function getTahunPelajaran(){
		$query="SELECT * from tahun_akademik";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}

	public function getDesignation($department){
		$query="SELECT * from designation_master where depart_id=".$department."";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}
	
	public function getAllEmployee(){
		$query="SELECT e.emp_id ,e.name ,e.phone ,e.email ,e.emp_address ,d.desig_name from employee AS e,designation_master AS d where e.desig_id=d.desig_id ";
		$result=mysqli_query($this->$con,$query) or die(mysqli_error());
		return $result;
	}

	public function getEmployee($designation){
		$query="SELECT * from employee where desig_id=".$designation."";
		$result=mysqli_query($this->$con,$query);
		return $result;
	}

	public function closeCon(){
		mysqli_close($this->$con);
	}
}
?>