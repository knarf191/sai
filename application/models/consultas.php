<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Consultas extends CI_Model {

	function __construct()
  	{         
		parent::__construct();     
 	}
	

	/********************************************************
						LOGIN
	*********************************************************/		

	function login($user, $password)
	{
		$query = $this->db->query("SELECT * FROM usuarios WHERE user ='$user' and password = '$password'");

		if ($query->num_rows() > 0)
		{		     
		 	return TRUE;
		}   
		else
		{		    
			return FALSE;
		}		
	} 

	function getDatabyUser($user)
	{
		$query = $this->db->query("SELECT * FROM usuarios WHERE user = '$user' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}  
	}

	/********************************************************
						Modulo Carga Chofer
	*********************************************************/


	function getFolioCargaChofer() 
	{
		$query = $this->db->query('SELECT MAX(folio)+1 AS folio FROM datos_carga_chofer');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getCargasChofer() 
	{
		$query = $this->db->get('datos_carga_chofer');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getDatosCargaChoferByFolio($folio) 
	{
		$query = $this->db->query("SELECT * FROM datos_carga_chofer WHERE folio = '$folio' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		} 
	}

	/********************************************************
						Modulo Produccion 
	*********************************************************/

	function getProduccion() 
	{
		$query = $this->db->get('Produccion');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getStock() 
	{
		$query = $this->db->get('stock');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getStockByProduct($producto) 
	{
		$query = $this->db->query("SELECT * FROM stock WHERE producto ='".$producto."'");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		} 
	}

	/********************************************************
					Modulo Clientes
	*********************************************************/

	function getClientes() 
	{
		$query = $this->db->get('clientes');

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	function getFolioClientes() 
	{
		$query = $this->db->query('SELECT MAX(id)+1 AS id FROM clientes');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getDatosClienteByFolio($folio) 
	{
		$query = $this->db->query("SELECT * FROM clientes WHERE id = '$folio' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		} 
	}

	/********************************************************
						Modulo Venta Tienda
	*********************************************************/
	function getVentasTienda() 
	{
		$query = $this->db->get('venta_tienda');

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	function getProductosVenta() 
	{
		$query = $this->db->get('venta_producto');

		if ($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}

	function getFolioVentaTienda() 
	{
		$query = $this->db->query('SELECT MAX(id)+1 AS id FROM venta_tienda');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getDatosVentaByFolio($folio) 
	{
		$query = $this->db->query("SELECT * FROM venta_tienda WHERE id = '$folio' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		} 
	}

/********************************************************
				Modulo Usuarios
*********************************************************/

	function getUsuarios() 
	{
		$query = $this->db->get('usuarios');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getIdUser() 
	{
		$query = $this->db->query('SELECT MAX(id)+1 AS id FROM usuarios');

		if ($query->num_rows() > 0)
		{
			return $query->result();

		}
		else
		{
			return FALSE;
		}
	}

	function getPermisosById($user) 
	{
		$query = $this->db->query("SELECT * FROM usuarios WHERE user = '$user' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}  
	}

	function getUserById($id) 
	{
		$query = $this->db->query("SELECT * FROM usuarios WHERE id = '$id' ");
		
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}  
	}
}	