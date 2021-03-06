<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Menu extends CI_Model {
	function __construct(){
		
	}
	
	function all(){
		$query = $this->db->get('menu');
		return $query->result();
	}

	function allFiltered($field, $value){
		$this->db->like($field, $value);
		$query = $this->db->get('menu');
		return $query->result();
	}

	function allForMenu(){
		$this->db->order_by('orden', 'asc');
		$query = $this->db->get('menu');
		return $query->result();
	}

	function allForMenuPpal(){
		$this->db->order_by('orden', 'asc');
		$query = $this->db->where('id >=', 18)->get('menu');
		return $query->result();
	}

	function allSecondaryMenu($menu_ppal_id) {
		$this->db->order_by('msec_order', 'asc');
		$query = $this->db->where('mpri_id', $menu_ppal_id)->get('menu_secundario');
		return $query->result();	
	}

	function allTertiaryMenu($secondary_menu) {
		$this->db->order_by('msec_orden', 'asc');
		$query = $this->db->where('mpri_id', $menu_ppal_id)->get('menu_secundario');
		return $query->result();	
	}

	function find($id){
		$this->db->where('id', $id);
		return $this->db->get('menu')->row();
	}

	function insert($registro){
		$this->db->set($registro);
		$this->db->insert('menu');
	}

	function update($registro){
		$this->db->set($registro);
		$this->db->where('id', $registro['id']);
		$this->db->update('menu');
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('menu');
	}
}
	
?>