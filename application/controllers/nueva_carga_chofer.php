<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nueva_carga_chofer extends CI_Controller {

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
            $folio = $this->input->post('folio');
            $data_post = array(
                'folio'  => $this->input->post('folio') ,
                'fecha'  => $this->input->post('fecha'),
                'chofer' => $this->input->post('chofer') , 
                'ruta'   => $this->input->post('ruta')   
            );

            $validation = $this->agregar->setCargaChofer($data_post);

            $cantidad_producto = $this->input->post('cantidad_producto');
            $producto          = $this->input->post('producto');

            $validation_products = $this->agregar->setProductosChofer($folio,$cantidad_producto,$producto);

            if ($validation && $validation_products) 
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>';
                redirect(base_url().'nueva_carga_chofer','refresh');
            }

            else
            {
                for ($i=0; $i < count($producto); $i++) 
                { 
                   $query = $this->db->query("SELECT *FROM stock WHERE producto = '".$producto[$i]."'");
                   $data = $query->row_array();
                   $update = $data['cantidad']-$cantidad_producto[$i];

                   $update  = $this->agregar->updateStockChofer($producto[$i],$update);
                }

                echo '<script language="javascript">alert("Los datos se han cargado correctamente");</script>';
                redirect(base_url().'imprimir_carga_chofer?folio='.$folio,'refresh'); 
            }   
        }
    }

    private function load()
    {
        $data = $this->consultas->getFolioCargaChofer();

        $html = '';

        $html .= '<div class="page-header" ><h1>Nueva Carga Abordo</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'nueva_carga_chofer/agregar" method="post">';
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
                            $html .= '<label>Chofer: &nbsp;</label><input type="text" class="form-control" name="chofer" required id="chofer">';
                        $html .= '</div>';

                            
                        $html .= '<div class="col-md-4">';

                            foreach ($data as $key => $row) 
                            {
                                $folio = $row->folio;

                                if ($folio==0) 
                                {
                                    $folio=1;
                                }
                                $html .= '<label>Folio: &nbsp; &nbsp;</label><input type="text"  name="folio" value="'.$folio.'" class="form-control"><br>';
                            }
                           
                        $html .= '</div>';
                    $html .= '</div>';  

                     $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Ruta: &nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="ruta" required id="ruta">';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $date = date("Y-m-d");
                            $html .= '<br><label>Fecha: &nbsp</label><input type="date"  name="fecha" class="form-control" id="fecha_nuevo_vale" value="'.$date.'">';
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
                                        $html .= '<th>Cantidad Abordo</th>';
                                        $html .= '<th>Producto</th>';           
                                        $html .= '<th></th>';                              
                                        $html .= '<th class="btnRefacciones"></th>';
                                    $html .= '</tr>';
                                $html .= '</thead>';
                                $html .= '<tbody>';
                                    $html .= '<tr>';
                                        $html .= '<td><input type="text" class="form-control" name="cantidad_producto[]" id="cantidad_producto" ></td>';
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
                                        //$html .= '<td><input type="text" class="form-control"  name="producto[]" id="producto"></td>';
                                        $html .= '<td class="btnProducto"><i class="fa fa-plus-circle fa-lg" id="plusProducto"></i></td>'; 
                                    $html .= '</tr>';
                                $html .= '</tbody>';
                            $html .= '</table>'; 
                        $html .= '</div>';
                    $html .= '</div>';

                    $html .= '<div class="tfoodbuttons">';
                        $html .= '<input type="submit" class="btn btn-success" value="Aceptar">';

                        $html .= '<button class="btn btn-primary" id="back_chofer">&nbsp;Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
