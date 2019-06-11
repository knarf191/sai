<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editar_carga_chofer extends CI_Controller {

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
            if($this->input->post())
            {
                $folio             = $this->input->post('folio');
                $producto          = $this->input->post('producto');
                $cantidad_venta    = $this->input->post('cantidad_venta');
                $regreso           = $this->input->post('regreso');
                $merma             = $this->input->post('merma');
                $sin_comprobar     = $this->input->post('sin_comprobar');

                $validation = $this->agregar->updateProductosChofer($folio,$producto,$cantidad_venta,$regreso,$merma,$sin_comprobar);

                if($validation) 
                {
                    echo '<script language="javascript">alert("No se han podido actualizar los datos, intente de nuevo");</script>';
                    redirect(base_url().'nueva_carga_chofer','refresh');
                }
                else
                {
                    echo '<script language="javascript">alert("Los datos se han actualizado correctamente");</script>';
                    redirect(base_url().'imprimir_carga_chofer?folio='.$folio,'refresh'); 
                }   
            } 
        }
    }

    private function load()
    {
        $folio  = $_GET['folio'];
        $data   = $this->consultas->getDatosCargaChoferByFolio($folio);
        $chofer = $data['chofer'];
        $ruta   = $data['ruta'];
        $fecha  = $data['fecha'];
        /*$data = $this->consultas->getFolioLubricantes();*/

        $html = '';

        $html .= '<div class="page-header" ><h1>Editar Carga Abordo</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'editar_carga_chofer/editar" method="post">';
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
                            $html .= '<label>Chofer: &nbsp;</label><input type="text" class="form-control" value="'.$chofer.'" name="chofer" required id="chofer">';
                        $html .= '</div>';

                            
                        $html .= '<div class="col-md-4">';
                            $html .= '<label>Folio: &nbsp; &nbsp;</label><input type="text" value="'.$folio.'" name="folio" class="form-control"><br>';
                        $html .= '</div>';
                    $html .= '</div>';  

                     $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Ruta: &nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" value="'.$ruta.'" name="ruta" required id="ruta">';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<br><label>Fecha: &nbsp</label><input type="date"  name="fecha" class="form-control" id="fecha_nuevo_vale" value="'.$fecha.'">';
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
                                        $html .= '<th>Cantidad Venta</th>';    
                                        $html .= '<th>Regreso a bodega</th>';
                                        $html .= '<th>Merma</th>';  
                                        $html .= '<th>Sin Comprobar</th>';    
                                    $html .= '</tr>';
                                $html .= '</thead>';
                                $html .= '<tbody>';
                                $query_products = $this->db->query("SELECT*FROM productos_carga_chofer WHERE folio = '$folio' ");

                                foreach ($query_products->result_array() as $row) 
                                {                                
                                    $html .= '<tr>';
                                        $html .= '<td><input type="text" class="form-control" name="cantidad_producto[]" id="cantidad_producto" value="'.$row['cantidad'].'"></td>';
                                        $html .= '<td><input type="text" class="form-control"  name="producto[]" id="producto" value="'.$row['producto'].'"></td>';
                                         $html .= '<td><input type="text" class="form-control" name="cantidad_venta[]" id="cantidad_venta" ></td>';
                                          $html .= '<td><input type="text" class="form-control" name="regreso[]" id="regreso" ></td>';
                                           $html .= '<td><input type="text" class="form-control" name="merma[]" id="merma" ></td>';
                                            $html .= '<td><input type="text" class="form-control" name="sin_comprobar[]" id="sin_comprobar"></td>';
                                    $html .= '</tr>';
                                }
                                $html .= '</tbody>';
                            $html .= '</table>'; 
                        $html .= '</div>';
                    $html .= '</div>';

                    $html .= '<div class="tfoodbuttons">';
                        $html .= '<input type="submit" class="btn btn-success" value="Aceptar">';

                        $html .= '<button class="btn btn-primary" id="back_chofer">Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
