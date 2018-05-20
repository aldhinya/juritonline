<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_artikel extends CI_Model {

	private $table = "jurit_artikel";
	private $id = "id_artikel";

	function getAll($where='', $like='', $limit='', $offset='') {
		$this->db->order_by("tgl_input","DESC");

		if($where)
			$this->db->where($where);

		if($like)
			$this->db->where($like);

		if(!$limit && !$offset)
			$query = $this->db->get($this->table);
		else
			$query = $this->db->get($this->table, $limit, $offset);

		return $query;
		$query->free_result();
	}

	function getCount($where='', $like='') {

		if($where)
			$this->db->where($where);

		if($like)
			$this->db->where($like);

		$query = $this->db->get($this->table);

		return $query->num_rows();
		$query->free_result();
	}

	function getInsert($data){
		return $this->db->set($data)->insert($this->table);
	}

	function getUpdate($data,$id){
		return $this->db->set($data)->where($this->id,$id)->update($this->table);
	}

	function getDelete($where){
		return $this->db->where($where)->delete($this->table);
	}

	//get artikel terkait
	function getArtikelTerkait($where){
		$this->db->where($where);
		$this->db->where(array("statusartikel_id" => 1, "statuspublish_id" => 1));
		$this->db->order_by("id_artikel","rand");
		$this->db->limit(3);
		return $this->db->get($this->table);
	}

	//get id kategori berdasarkan id artikel
	function getIdKatByIdArtikel($where){
		$this->db->where($where);
		return $this->db->get('jurit_kategoriartikeldetail');
	}

	//get five latest
	function getFiveLatest(){
		$this->db->where(array("statusartikel_id" => 1, "statuspublish_id" => 1));
		$this->db->order_by("tgl_input","DESC")->limit(5);

		$query = $this->db->get($this->table);

		return $query;
		$query->free_result();
	}

	//get kateori id
	function getIdKategori(){

		$this->db->select("id_kategoriartikel");
		$this->db->group_by("id_kategoriartikel");

		$query = $this->db->get("jurit_kategoriartikeldetail");

		return $query;
		$query->free_result();
	}

	function getIdArtikelByIdKategori($where){
		return $this->db->where($where)->get("jurit_kategoriartikeldetail");
	}

	//kategori artikel detail
	function getInsertKategoriDetail($data){
		return $this->db->set($data)->insert("jurit_kategoriartikeldetail");
	}

	//kategori delete
	function getDeleteKatDetail($where){
		return $this->db->where($where)->delete("jurit_kategoriartikeldetail");
	}
}
