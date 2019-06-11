<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eliminar extends CI_Model {

	function __construct()
  	{         
		parent::__construct();     
 	}
	

	/********************************************************
						Usuarios y Clientes
	*********************************************************/		

	function deleteCliente($id,$cliente)
	{
		return $this->db->query("DELETE FROM clientes WHERE id='".$id."' AND cliente = '".$cliente."'");
	}

	function deleteUser($user)
	{
		$this->db->where('user', $user);

		return $this->db->delete('usuarios');
	}	
}