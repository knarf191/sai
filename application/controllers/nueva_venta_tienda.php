<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nueva_venta_tienda extends CI_Controller {

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

    public function agregar()
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

            $validation = $this->agregar->setVentaTienda($data_post);

            $cantidad = $this->input->post('cantidad');
            $producto = $this->input->post('producto');
            $precio   = $this->input->post('precio');
            $impuesto = $this->input->post('impuesto');

            $validation_products = $this->agregar->setProductosVentaTienda($id,$cantidad,$producto,$precio,$impuesto);

            $cliente      = $this->input->post('cliente');
            $fecha_pedido = $this->input->post('fecha_pedido');

            $validation_venta    = $this->agregar->setProductosVenta($producto,$cantidad,$cliente,$fecha_pedido);

            if ($validation && $validation_products && $validation_venta) 
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>';
                redirect(base_url().'nueva_venta_tienda','refresh');
            }

            else
            {
                $venta_tienda = $this->input->post('venta_tienda');

                if (isset($_REQUEST['venta_tienda'])) 
                {
                    for ($i=0; $i < count($producto); $i++) 
                    { 
                       $query = $this->db->query("SELECT *FROM stock WHERE producto = '".$producto[$i]."'");
                       $data = $query->row_array();
                       $update = $data['cantidad']-$cantidad[$i];

                       $update  = $this->agregar->updateStockChofer($producto[$i],$update);
                    }

                    echo '<script language="javascript">alert("Los datos se han cargado correctamente");</script>';
                    redirect(base_url().'ventas_tienda','refresh');
                }
                else
                {
                    echo '<script language="javascript">alert("Los datos se han cargado correctamente");</script>';
                    redirect(base_url().'ventas_tienda','refresh'); 
                } 
            }      
        }
    }

    private function load()
    {
        $data = $this->consultas->getFolioVentaTienda();

        $html = '';

        $html .= '<div class="page-header" ><h1>Nueva Venta en Tienda</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'nueva_venta_tienda/agregar" method="post">';
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
                            $html .= '<label>Cliente: &nbsp;</label>
                           <select class="form-control"  name="cliente" id="cliente_ventas" required>
                                <option value="" selected disabled>Clientes</option>';
                                $cliente = $this->consultas->getClientes();
                                foreach ($cliente as $key => $row) 
                                                    {
                                                        $client = $row->cliente;

                                                        $html .= '<option value="'.$client.'">'.$client.'</option>';
                                                    }

                                        $html .='</select>';

                            $html .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="venta_tienda" id="venta_tienda">&nbsp;&nbsp;<label>Venta en tienda</label>';
                        $html .= '</div>';

                            
                        $html .= '<div class="col-md-4">';

                            foreach ($data as $key => $row) 
                            {
                                $folio = $row->id;

                                if ($folio==0) 
                                {
                                    $folio=1;
                                }
                                $html .= '<label>Folio: &nbsp; &nbsp;</label><input type="text"  name="id" class="form-control"  value="'.$folio.'"><br>';
                            }
                           
                        $html .= '</div>';
                    $html .= '</div>'; 

                    $html .= '<div class="col-md-12" id="titles">'; 

                        $html .= '<div class="col-md-8" id="titles">';
                                $html .= '<BR><label>Factura: &nbsp;</label><input type="text" class="form-control" name="factura" id="factura_venta">';
                                $html .= '<label>&nbsp;No. Recibo: &nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="recibo" id="recibo_venta">';
                                $html .= '<label>&nbsp;Estatus: &nbsp;</label>
                                         <select class="form-control" name="estatus" required id="estatus_venta">
                                            <option value="" selected disabled>Estatus de Pago</option>
                                            <option value="Pagado">Pagado</option>
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Cancelado">Cancelado</option>
                                        </select>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $date = date("Y-m-d");
                            $html .= '<br><label>Fecha Pedido: &nbsp</label><input type="date"  name="fecha_pedido" class="form-control" id="fecha_pedido" value="'.$date.'">';
                        $html .= '</div>';
                    $html .= '</div>';

                    $html .= '<div class="col-md-12" id="general_data">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<BR><label>Vendedor: &nbsp;</label><input type="text" class="form-control" name="vendedor" required id="vendedor">';
                        $html .= '</div>';

                            
                        $html .= '<div class="col-md-4">';
                            $date = date("Y-m-d");
                            $html .= '<br><label>Fecha Entrega: &nbsp</label><input type="date"  name="fecha_entrega" class="form-control" id="fecha_entrega" value="'.$date.'">';
                        $html .= '</div>';
                    $html .= '</div>';  

                    $html .= '<div class="col-md-12" id="general_data">';
                        $html .= '<div class="col-md-8" id="titles">';
                            $html .= '<BR><label>&nbsp;Método de pago: &nbsp;</label>
                                     <select class="form-control" name="metodo_pago" id="metodo_pago" required>
                                        <option value="" selected disabled>Método de pago</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Efectivo">Efectivo</option>
                                    </select>';

                                    $html .= '<label>&nbsp;Forma de Pago: &nbsp;</label>
                                     <select class="form-control" name="forma_pago" required id="forma_pago">
                                        <option value="" selected disabled>Forma de pago</option>
                                        <option value="Credito">Crédito</option>
                                        <option value="Contado">Contado</option>
                                    </select>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $date = date("Y-m-d");
                            $html .= '<br><label>Fecha Pago: &nbsp</label><input type="date"  name="fecha_pago" class="form-control" id="fecha_pago" value="'.$date.'">';
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

                            $html .= '<table class="display data_table2" id="table_prodcutos_venta">';
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
                                    $html .= '<tr>';
                                        $html .= '<td><input type="text" class="form-control" name="cantidad[]" id="cantidad_producto" ></td>';
                                        $product = $this->consultas->getStock();
                                        $html .='<td>
                                                    <select class="form-control"  name="producto[]" id="producto" required>
                                                    <option value="" selected disabled>Producto</option>';

                                                    foreach ($product as $key => $row) 
                                                    {
                                                        $produ = $row->producto;

                                                        $html .= '<option value="'.$produ.'">'.$produ.'</option>';
                                                    }

                                        $html .='</select>
                                                </td>';

                                        $html .= '<td><input type="text" class="form-control"  name="precio[]" id="precio_unitario"></td>';
                                        $html .= '<td><input type="text" class="form-control"  name="impuesto[]" id="impuesto"></td>';
                                        $html .= '<td class="btnProducto"><i class="fa fa-plus-circle fa-lg" id="plusProductoVenta"></i></td>'; 
                                    $html .= '</tr>';
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
