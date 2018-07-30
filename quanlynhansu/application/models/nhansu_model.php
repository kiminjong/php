<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nhansu_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function insertDataToMySql($ten, $tuoi, $diachi, $avatar, $facebook, $sdt, $sodonhang)
	{
		# xu ly thong tin nhan ve and upload vao msql
		$dulieu  = array(
			'ten' => $ten,
			'tuoi' => $tuoi,
			'diachi' => $diachi,
			'avatar' => $avatar,
			'facebook' => $facebook,
			'sdt' => $sdt,
			'sodonhang' => $sodonhang,
			 );
		$this->db->insert('nhan_vien', $dulieu);
		return $this->db->insert_id();
	}
	//lay du lieu
	public function getAllData()
	{
		$this->db->select('*');
		$dulieu = $this->db->get('nhan_vien');
		//bien no thanh mang
		$dulieu = $dulieu->result_array();
		return $dulieu;
	}
	//
	public function getDataById($key)
	{
		$this->db->select('*');
		$this->db->where('id', $key);
		$dulieu = $this->db->get('nhan_vien');
		//lay ve du lieu dang mang
		$dulieu = $dulieu->result_array();
		return $dulieu;

	}
	public function updateById($id,$ten, $tuoi, $diachi, $avatar, $facebook, $sdt, $sodonhang)
	{
		$data  = array(
			'id' => $id,
			'ten' => $ten,
			'tuoi' => $tuoi,
			'diachi' => $diachi,
			'avatar' => $avatar,
			'facebook' => $facebook,
			'sdt' => $sdt,
			'sodonhang' => $sodonhang
			 );
		$this->db->where('id', $id);
		return $this->db->update('nhan_vien', $data);
	}
	public function removeDataById($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('nhan_vien');
	}
}

/* End of file nhansu_model.php */
/* Location: ./application/models/nhansu_model.php */