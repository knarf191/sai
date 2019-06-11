<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editar_venta_tienda extends CI_Controller {

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

    public function editar()
    {
        if($this->input->post())
        {
            $id = $this->input->post('id');
            $data_post = array(
                'id'            => $this->input->post('id') ,
                'cliente'       => $this->input->post('cliente'),
                'recibo'        => $this->input->post('recibo') , 
                'factura'       => $this->input->post('factura'),
                'estatus'       => $this->input->post('estatus') ,
                'vendedor'      => $this->input->post('vendedor'),
                'metodo_pago'   => $this->input->post('metodo_pago') , 
                'forma_pago'    => $this->input->post('forma_pago'),
                'fecha_pedido'  => $this->input->post('fecha_pedido'),
                'fecha_entrega' => $this->input->post('fecha_entrega') , 
                'fecha_pago '   => $this->input->post('fecha_pago')
            );

            $validation = $this->agregar->updateVentaTiendaDatos($id, $data_post);

            $cantidad = $this->input->post('cantidad');
            $producto = $this->input->post('producto');
            $precio   = $this->input->post('precio');
            $impuesto = $this->input->post('impuesto');

            $validation_products = $this->agregar->updateProductosVentaTienda($id,$cantidad,$producto,$precio,$impuesto);

            $cliente      = $this->input->post('cliente');
            $fecha_pedido = $this->input->post('fecha_pedido');

            $validation_venta    = $this->agregar->updateProductosVenta($producto,$cantidad,$cliente,$fecha_pedido);

            if ($validation && $validation_products && $validation_venta) 
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>';
                redirect(base_url().'ventas_tienda','refresh');
            }

            else
            {
                echo '<script language="javascript">alert("Los datos se han cargado correctamente");</script>';
                redirect(base_url().'ventas_tienda','refresh'); 
            }  
        }
    }

    private function load()
    {
        $folio         = $_GET['folio'];
        $data          = $this->consultas->getDatosVentaByFolio($folio);
        $cliente       = $data['cliente'];
        $recibo        = $data['recibo'];
        $factura       = $data['factura'];
        $estatus       = $data['estatus'];
        $vendedor      = $data['vendedor'];
        $metodo_pago   = $data['metodo_pago'];
        $forma_pago    = $data['forma_pago'];
        $fecha_pedido  = $data['fecha_pedido'];
        $fecha_entrega = $data['fecha_entrega'];
        $fecha_pago    = $data['fecha_pago'];

        $html = '';

        $html .= '<div class="page-header" ><h1>Editar Venta en Tienda</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'editar_venta_tienda/editar" method="post">';
                    /************************************************************************
                                            Datos Generales, Fecha y Folio
                    ************************************************************************/
                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<center><h4><b>Datos Generales</b></h4></center>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<center><h4><b>Fecha y Folio</b></h4><center>';
                        $html .= '</div>';
                    $html .= '</div>';


                    $html .= '<div class="col-md-12" id="general_data">';
                        $html .= '<br>';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Cliente: &nbsp;</label><input type="text" class="form-control" name="cliente" required id="cliente_ventas" value="'.$cliente.'">';
                        $html .= '</div>';

                            
                        $html .= '<div class="col-md-4">';

                           /* foreach ($data as $key => $row) 
                            {
                                $folio = $row->folio;

                                if ($folio==0) 
                                {
                                    $folio=1;
                                } */
                                $html .= '<label>Folio: &nbsp; &nbsp;</label><input type="text"  name="id" class="form-control" value="'.$folio.'"><br>';
                            //}
                           
                        $html .= '</div>';
                    $html .= '</div>'; 

                    $html .= '<div class="col-md-12" id="titles">'; 

                        $html .= '<div class="col-md-8" id="titles">';
                                $html .= '<BR><label>Factura: &nbsp;</label><input type="text" class="form-control" name="factura" id="factura_venta" value="'.$factura.'">';
                                $html .= '<label>&nbsp;No. Recibo: &nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="recibo" id="recibo_venta" value="'.$recibo.'">';

                                if ($estatus=="Pagado") 
                                {
                                    $html .= '<label>&nbsp;Estatus: &nbsp;</label>
                                         <select class="form-control" name="estatus" required>
                                            <option value="Pagado">Pagado</option>
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Cancelado">Cancelado</option>
                                        </select>';
                                }
                                elseif ($estatus=="Pendiente") 
                                {
                                    $html .= '<label>&nbsp;Estatus: &nbsp;</label>
                                         <select class="form-control" name="estatus" required>
                                                                                        
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Pagado">Pagado</option>
                                            <option value="Cancelado">Cancelado</option>
                                        </select>';
                                }
                                elseif ($estatus=="Cancelado") 
                                {
                                   $html .= '<label>&nbsp;Estatus: &nbsp;</label>
                                         <select class="form-control" name="estatus" required>
                                            
                                            <option value="Cancelado">Cancelado</option>
                                            <option value="Pagado">Pagado</option>
                                            <option value="Pendiente">Pendiente</option>
                                            
                                        </select>'; 
                                }
                                
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<br><label>Fecha Pedido: &nbsp</label><input type="date"  name="fecha_pedido" class="form-control" id="fecha_pedido" value="'.$fecha_pedido.'">';
                        $html .= '</div>';
                    $html .= '</div>';

                    $html .= '<div class="col-md-12" id="general_data">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<BR><label>Vendedor: &nbsp;</label><input type="text" class="form-control" name="vendedor" required id="vendedor" value="'.$vendedor.'">';
                        $html .= '</div>';

                            
                        $html .= '<div class="col-md-4">';
                            $html .= '<br><label>Fecha Entrega: &nbsp</label><input type="date"  name="fecha_entrega" class="form-control" id="fecha_entrega" value="'.$fecha_entrega.'">';
                        $html .= '</div>';
                    $html .= '</div>';  

                    $html .= '<div class="col-md-12" id="general_data">';
                        $html .= '<div class="col-md-8" id="titles">';
                            if ($metodo_pago=="Cheque") 
                            {
                                $html .= '<BR><label>&nbsp;Método de pago: &nbsp;</label>
                                     <select class="form-control" name="metodo_pago" required>
                                        
                                        <option value="Cheque">Cheque</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Efectivo">Efectivo</option>
                                    </select>';
                            }
                            elseif ($metodo_pago=="Transferencia") 
                            {
                                $html .= '<BR><label>&nbsp;Método de pago: &nbsp;</label>
                                     <select class="form-control" name="metodo_pago" required>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Cheque">Cheque</option>
                                        
                                        <option value="Efectivo">Efectivo</option>
                                    </select>';
                            }
                            elseif ($metodo_pago=="Efectivo") 
                            {
                                $html .= '<BR><label>&nbsp;Método de pago: &nbsp;</label>
                                     <select class="form-control" name="metodo_pago" required>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Transferencia">Transferencia</option>
                                        
                                    </select>';
                            }

                            if ($forma_pago="Credito") 
                            {
                                $html .= '<label>&nbsp;Forma de Pago: &nbsp;</label>
                                     <select class="form-control" name="forma_pago" required>
                                        
                                        <option value="Credito">Crédito</option>
                                        <option value="Contado">Contado</option>
                                    </select>';
                            }
                            elseif ($forma_pago=="Contado") 
                            {
                                $html .= '<label>&nbsp;Forma de Pago: &nbsp;</label>
                                     <select class="form-control" name="forma_pago" required>
                                        <option value="Contado">Contado</option>
                                        <option value="Credito">Crédito</option>
                                        
                                    </select>';
                            }

                            

                                    
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<br><label>Fecha Pago: &nbsp</label><input type="date"  name="fecha_pago" class="form-control" id="fecha_pago" value="'.$fecha_pago.'">';
                        $html .= '</div>';
                    $html .= '</div>';  


                    /************************************************************************
                                            Producto a cargar
                    ************************************************************************/
                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<center><h4><b>Descripción de productos abordo</b></h4></center>';
                    $html .= '</div>';

                    $html .= '<div class="row" id="productos_abordo">';
                        $html .= '<div class="col-md-12">';

                            $html .= '<table class="display data_table2" id="table_prodcutos_abordo">';
                                $html .= '<thead>';
                                    $html .= '<tr>';
                                        $html .= '<th>Cantidad</th>';
                                        $html .= '<th>Producto</th>';  
                                        $html .= '<th>Precio Unitario</th>';  
                                        $html .= '<th>Impuesto</th>';           
                                        $html .= '<th></th>';                              
                                        $html .= '<th class="btnRefacciones"></th>';
                                    $html .= '</tr>';
                                $html .= '</thead>';
                                $html .= '<tbody>';

                                    $query_products = $this->db->query("SELECT*FROM producto_venta_tienda WHERE id = '$folio' ");

                                    foreach ($query_products->result_array() as $row) 
                                    {
                                        $html .= '<tr>';
                                            $html .= '<td><input type="text" class="form-control" name="cantidad[]" id="cantidad_producto" value="'.$row['cantidad'].'"></td>';
                                            $html .= '<td><input type="text" class="form-control"  name="producto[]" id="producto" value="'.$row['producto'].'"></td>';

                                            $html .= '<td><input type="text" class="form-control"  name="precio[]" id="precio_unitario" value="'.$row['precio'].'"></td>';
                                            $html .= '<td><input type="text" class="form-control"  name="impuesto[]" id="impuesto" value="'.$row['impuesto'].'"></td>';
                                            $html .= '<td class="btnProducto"><i class="fa fa-plus-circle fa-lg" id="plusProductoVenta"></i></td>'; 

                                            $html.= '<td><i class="fa fa-minus-circle fa-lg" id="minus"></i></td></tr>';
                                        $html .= '</tr>';
                                    }
                                $html .= '</tbody>';
                            $html .= '</table>'; 
                        $html .= '</div>';
                    $html .= '</div>';

                    $html .= '<div class="tfoodbuttons">';
                        $html .= '<input type="submit" class="btn btn-success" value="Aceptar">';

                        $html .= '<button class="btn btn-primary" id="cancelar_venta_tienda">&nbsp;Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
