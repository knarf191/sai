<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_tienda extends CI_Controller {

    public function index()
    {
        $this->load();
    }

    private function init($msj, $page, $html)
    {
        if($this->session->userdata('logueado'))
        {
            $data = array();
            $data['nombre'] = $this->session->userdata('nombre');
            $data['user'] = $this->session->userdata('user');
            $data['msj']  = $msj;
            $data['page'] = $page;
            $data['html'] = $html;
            $this->load->view('body_login',$data);
        }               
        else
        {      
            redirect(base_url().'login','refresh');
        }
    }

    private function load()
    {
          
        $data = $this->consultas->getVentasTienda();

        /*$user = $this->session->userdata('user');
        $data_vale = $this->consultas->getPermisosById($user, "vales");*/
                
        
        $html = '';
        $html .= '<div class="page-header"><h1>Control de ventas por tienda</h1></div>'; 
            $html .= '<div class="content-principal-section">';

                /*$agregar_vale = $data_vale['agregar'];
                if ($agregar_vale=="true") 
                {*/
                    $html .= '<a href="'.base_url().'nueva_venta_tienda" class="btn btn-success" id="newVale"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo</a>';
                /*}
                
                $html .= '<a href="'.base_url().'documentos" class="btn btn-default" id="btn-default"><i class="fa fa-file-text-o"></i>&nbsp;Documentos</a>';

                $saldo       = $this->consultas->getSaldo();
                foreach ($saldo as $key => $row) 
                {
                    $folio = $row->id;
                    $saldo = $this->consultas->getRecargaByFolio($folio);
                    $saldo_disponible = $saldo['saldo_actual'];
                    
                }

                
                $ver_saldo = $data_vale['eliminar'];
                if ($ver_saldo == "true") 
                {
                    $html .= '<label class="saldo">SALDO DISPONIBLE: $'.$saldo_disponible.'</label>';
                }*/
                           
                            
               
                $html .= '<div class="col-md-10" id="range_date">';
                    $html .= '<br><label>Between: &nbsp</label><input type="text"  name="min" class="datepicker hasDatepicker" id="min" >';
                    $html .= '<label>&nbsp and: &nbsp</label><input type="text"  name="max" class="datepicker hasDatepicker" id="max" >';
                $html .= '</div>';
                
                $html .= '<table id="table_tienda" class="display data_table2">';
                        $html .= '<thead>';
                            $html .= '<tr>';
                                $html .= '<th>ID</th>';
                                $html .= '<th>F. Pedido</th>';
                                $html .= '<th>Cliente</th>';
                                
                                $html .= '<th>F. Entrega</th>';
                                $html .= '<th>No. Recibo</th>';
                                $html .= '<th>Factura</th>';
                                $html .= '<th>F. Pago</th>';
                                $html .= '<th>Monto</th>';   
                                $html .= '<th>Estatus</th>';                            
                                $html .= '<th></th>';
                            $html .= '</tr>';
                        $html .= '</thead>';
                        $html .= '<tbody>';

                            if (!empty($data)) 
                            {
                                $gasto = 0;
                                foreach ($data as $clave => $row) 
                                {
                                    $id=$row->id;
                                    $estatus=$row->estatus;
                                    $html .= '<tr>';
                                        $html .= '<td>'.$row->id.'</td>';
                                        $html .= '<td>'.$row->fecha_pedido.'</td>';    
                                        $html .= '<td>'.$row->cliente.'</td>';
                                                                          
                                        $html .= '<td >'.$row->fecha_entrega.'</td>';
                                        $html .= '<td>'.$row->recibo.'</td>';
                                        $html .= '<td>'.$row->factura.'</td>';
                                        $html .= '<td>'.$row->forma_pago.'</td>';
                                        $query_products = $this->db->query("SELECT*FROM producto_venta_tienda WHERE id = '$id' ");

                                        $count = 0;
                                        foreach ($query_products->result_array() as $row) 
                                        { 

                                                $impuesto = $row['impuesto'];
                                                $precio   = $row['precio']*$row['cantidad'];
                                                $total    = ($impuesto/100)*$precio+$precio;

                                                $count += $total;
                                        }
                                        $html .= '<td>$'.$total.'</td>';                                        
                                        $html .= '<td>'.$estatus.'</td>';
                                        //$html .= '<td></td>'; 
                                        $html .= '<td>';
                                            $html .= '<button class="btn btn-info" title="Imprimir" id="imprimir_venta">';
                                                $html .= '<i class="fa fa-print"></i>';
                                            $html .= '</button>';

                                            /*$editar_vale = $data_vale['editar'];

                                            if ($editar_vale == 'true') 
                                            {*/
                                                $html .= ' <a href="" class="btn btn-warning" title="Editar" id="editar_venta">';
                                                    $html .= '<i class="fa fa-pencil"></i>';
                                                $html .= '</a>';
                                            //}

                                            

                                            
                                            $html .= ' <a href="" class="btn btn-default" title="Detalles" id="detalle_venta">';
                                                $html .= '<i class="fa fa-file-text-o"></i>';
                                            $html .= '</a>';
                                        $html .= '</td>';
                                    $html .= '</tr>';
                                    
                                }
                            }
                        $html .= '</tbody>';
                        $html .= '<tfoot>';
                            $html .= '<tr>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                            $html .= '</tr>';
                        $html .= '</tfoot>';

                    $html .= '</table>'; 

            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
