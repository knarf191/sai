<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuevo_registro_produccion extends CI_Controller {

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
            $data_post = array(
                'id'       => 'null',
                'fecha'    => $this->input->post('fecha'),
                'producto' => $this->input->post('producto'),
                'registra' => $this->input->post('registra') , 
                'cantidad' => $this->input->post('cantidad'),       
            );
                                    
            $validation = $this->agregar->setProduccion($data_post);
            
            if ($validation) 
            {
                $producto         = $this->input->post('producto');
                $cantida_registro = $this->input->post('cantidad');

                $datastock        = $this->consultas->getStockByProduct($producto);

                if (!empty($datastock)) 
                {
                    $cantidad_stock   = $datastock['cantidad'];
                    $stock = $cantidad_stock + $cantida_registro;

                    $datastock        = $this->agregar->updateStock($stock,$producto);
                    echo '<script language="javascript">alert("Los datos se han agregado correctamente");</script>';
                    redirect(base_url().'produccion','refresh');
                }
                else
                {
                    $validation_stock = $this->agregar->setStock($producto,$cantida_registro);
                    echo '<script language="javascript">alert("Los datos se han agregado correctamente");</script>';
                    redirect(base_url().'produccion','refresh');
                }

               


                /**/
            }
            else
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>';
                redirect(base_url().'nuevo_registro_produccion','refresh');   
            }
        }
    }

    private function load()
    {
        $html = '';

        $html .= '<div class="page-header" ><h1>Nuevo Registro de Producción</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'nuevo_registro_produccion/agregar" method="post">';
                    /************************************************************************
                                            Datos Generales, Fecha y Folio
                    ************************************************************************/
                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<center><h4><b>Datos Generales</b></h4></center>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<center><h4><b>Fecha</b></h4><center>';
                        $html .= '</div>';
                    $html .= '</div>';


                    $html .= '<div class="col-md-12" id="general_data">';
                        $html .= '<br>';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Registra: &nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="registra" required id="nombre_registra">';
                        $html .= '</div>';
                        $html .= '<div class="col-md-4">';
                            $date = date("Y-m-d");
                            $html .= '<label>Fecha: &nbsp</label><input type="date"  name="fecha" class="form-control" id="fecha_nuevo_vale" value="'.$date.'">';
                        $html .= '</div>';
                    $html .= '</div>';  

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Producto: &nbsp;</label><input type="text" class="form-control" name="producto" required id="producto_produccion">';
                        $html .= '</div>'; 
                    $html .= '</div>';

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Cantidad: &nbsp;</label><input type="text" class="form-control" name="cantidad" required id="cantidad_produccion">';
                        $html .= '</div>';     
                    $html .= '</div>';

                    $html .= '<div>';
                        $html .= '<input type="submit" class="btn btn-success" value="Aceptar">';

                        $html .= '<button class="btn btn-primary" id="cancelar_registro">Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
