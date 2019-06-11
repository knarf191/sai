<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consulta_stock_productos extends CI_Controller {

    public function index()
    {
        $this->load();

    }

  

    private function load()
    {

    	$product = $this->consultas->getStock();

    	foreach ($product as $key => $row)
        {
        	$produ = $row->producto;

            echo'<option value="'.$produ.'">'.$produ.'</option>';
        }
    }
}
?>