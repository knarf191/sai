<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agregar extends CI_Model {

	function __construct()
  	{         
		parent::__construct();     
 	}
	

	/********************************************************
							CARGA CHOFER
	*********************************************************/		

	function setCargaChofer($data_post)
	{
		return $this->db->insert('datos_carga_chofer',$data_post);
	}

	function setProductosChofer($folio,$cantidad_producto,$producto)
	{
		for ($i=0; $i <count($producto); $i++) 
		{ 
			$query = $this->db->query("INSERT INTO productos_carga_chofer VALUES('".$folio."' , '".$cantidad_producto[$i]."' ,'".$producto[$i]."', '', '', '', '')");
		}
	}

	function updateProductosChofer($folio,$producto,$cantidad_venta,$regreso,$merma,$sin_comprobar)
	{
		for ($i=0; $i <count($producto); $i++) 
		{ 
			$query = $this->db->query("UPDATE productos_carga_chofer SET venta='".$cantidad_venta[$i]."', regreso='".$regreso[$i]."', merma='".$merma[$i]."', sin_comprobar='".$sin_comprobar[$i]."' WHERE folio = '".$folio."' AND producto = '".$producto[$i]."'");
		}
	}

	/********************************************************
						Produccion
	*********************************************************/	
	
	function setProduccion($data_post)
	{
		return $this->db->insert('produccion',$data_post);
	}

	function setStock($producto, $cantidad)
	{
		return $this->db->query("INSERT INTO stock VALUES('null' , '".$producto."' ,'".$cantidad."')");
	}

	function updateStock($cantidad,$producto)
	{
 
		return $this->db->query("UPDATE stock SET cantidad='".$cantidad."' WHERE producto = '".$producto."'");
	}

	/********************************************************
						Clientes
	*********************************************************/	
	
	function setCliente($data_post)
	{
		return $this->db->insert('clientes',$data_post);
	}

	function updateCliente($folio,$data_post)
	{
		$this->db->where('id', $folio);

		return $this->db->update('clientes',$data_post);
	}

	/********************************************************
					       VENTA EN TIENDA
	*********************************************************/		

	function setVentaTienda($data_post)
	{
		return $this->db->insert('venta_tienda',$data_post);
	}

	function setProductosVentaTienda($id,$cantidad,$producto,$precio,$impuesto)
	{
		for ($i=0; $i <count($producto); $i++) 
		{ 
			$query = $this->db->query("INSERT INTO producto_venta_tienda VALUES('".$id."' , '".$cantidad[$i]."' ,'".$producto[$i]."','".$precio[$i]."','".$impuesto[$i]."')");
		}
	}

	function setProductosVenta($producto,$cantidad,$cliente,$fecha_pedido)
	{
		for ($i=0; $i <count($producto); $i++) 
		{ 
			$query = $this->db->query("INSERT INTO venta_producto VALUES('NULL' , '".$producto[$i]."', '".$cantidad[$i]."' ,'".$cliente."','".$fecha_pedido."')");
		}
	}

	function updateVentaTiendaDatos($id,$data_post)
	{
		$this->db->where('id', $id);
		return $this->db->update('venta_tienda',$data_post);
	}

	function updateProductosVentaTienda($id,$cantidad,$producto,$precio,$impuesto)
	{
		for ($i=0; $i <count($producto); $i++) 
		{ 
			$query = $this->db->query("UPDATE producto_venta_tienda SET id='".$id."', cantidad='".$cantidad[$i]."', producto='".$producto[$i]."', precio='".$precio[$i]."', impuesto='".$impuesto[$i]."' WHERE id = '".$id."' AND producto = '".$producto[$i]."'");
		}
	}

	function updateProductosVenta($producto,$cantidad,$cliente,$fecha_pedido)
	{
		for ($i=0; $i <count($producto); $i++) 
		{ 
			$query = $this->db->query("UPDATE venta_producto SET  producto='".$producto[$i]."', cantidad='".$cantidad[$i]."' WHERE producto ='".$producto[$i]."' AND cliente = '".$cliente."' AND fecha_pedido = '".$fecha_pedido."'");
		}
	}

	/********************************************************
						Stock
	*********************************************************/	
	
	function updateStockChofer($producto,$cantidad)
	{
		return $query = $this->db->query("UPDATE stock SET cantidad = '".$cantidad."' WHERE producto = '".$producto."'");	
	}

	/********************************************************
						Usuarios
	*********************************************************/	
	function setUsuarios($data_user)
	{
		return $this->db->insert('usuarios',$data_user);
	}

	function updateUsuarios($id, $data)
	{
		$this->db->where('id', $id);

		return $this->db->update('usuarios',$data);
	}

	/*function setPermisos($data_permisos)
	{
		return $this->db->insert('permisos',$data_permisos);
	}


	

	function updatePermisos($id, $modulo, $data)
	{
		$this->db->where('id', $id);
		$this->db->where('modulo', $modulo);

		return $this->db->update('permisos',$data);
	}*/
}