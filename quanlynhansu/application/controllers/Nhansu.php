<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nhansu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('nhansu_model');
		$ketqua = $this->nhansu_model->getAllData();
		//bien ket qua thanh mot mang
		$ketqua = array('mangketqua' => $ketqua );
		//truyen ket quar sang co view
		$this->load->view('nhansu_view', $ketqua);
	}
	public function nhansu_add()
	{
		//upload anh
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}	

		# lay du lieu
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$diachi = $this->input->post('diachi');
		$sdt = $this->input->post('sdt');
		$sodonhang = $this->input->post('sodonhang');
		$facebook = $this->input->post('facebook');
		$avatar = base_url()."uploads/".$_FILES["avatar"]["name"];

		//goi model 
		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->insertDataToMySql($ten, $tuoi, $diachi, $avatar, $facebook, $sdt, $sodonhang);
		if($trangthai){
			//echo "thanh cong";
			$this->load->view('insert_nhansu_view');
		}else {
			echo "that bai";
		}

	}
	//sua nhan su
	public function sua_nhansu($idnhanvao)
	{
		$this->load->model('nhansu_model');
		//dua vao id lay du lieu
		$ketqua = $this->nhansu_model->getDataById($idnhanvao);
		//chuyen thanh mang
		$ketqua = array('dulieusua' => $ketqua );
		//nhan duoc roi dua len view sua_nhanvien_view.php
		$this->load->view('sua_nhanvien_view',$ketqua, FALSE);
		echo "sua nhan su ".$idnhanvao;
	}
	public function update_nhansu()
	{
		//upload anh
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    //echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["avatar"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    //echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		        //echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
		# lay du lieu tu cai view update vao mysql
		$id = $this->input->post('id');
		$ten = $this->input->post('ten');
		$tuoi = $this->input->post('tuoi');
		$diachi = $this->input->post('diachi');
		$sdt = $this->input->post('sdt');
		$sodonhang = $this->input->post('sodonhang');
		$facebook = $this->input->post('facebook');
		$avatar = basename($_FILES["avatar"]["name"]);
		if($avatar){
			//in ra anh avatar
			$avatar = base_url()."uploads/".$_FILES["avatar"]["name"];
		}else{
			//neu khong thi lay cai moi
			$avatar = $this->input->post('avatarnew');
		}
		//du lieu nhan duoc roi thi goi luon model de update du lieu
		$this->load->model('nhansu_model');
		$trangthai= $this->nhansu_model->updateById($id, $ten, $tuoi, $diachi, $avatar, $facebook, $sdt, $sodonhang);
		if($trangthai){
			$this->load->view('insert_nhansu_view');
		}else{
			echo "that bai";
		}
	}
	public function xoa_nhansu($id)
	{
		$this->load->model('nhansu_model');
		$trangthai = $this->nhansu_model->removeDataById($id);
		if($trangthai){
			$this->load->view('xoa_nhanvien_view');
		}else{
			echo "xoa that bai";
		}
	}
}

/* End of file Nhansu.php */
/* Location: ./application/controllers/Nhansu.php */