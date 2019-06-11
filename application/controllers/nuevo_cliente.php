<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nuevo_cliente extends CI_Controller {

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
                'id'        => 'null',
                'cliente'   => $this->input->post('cliente'),
                'direccion' => $this->input->post('direccion') , 
                'encargado' => $this->input->post('encargado') ,
                'telefono'  => $this->input->post('telefono'),     
                'email'     => $this->input->post('email'),                    
            );          

            $validation = $this->agregar->setCliente($data_post);

            if ($validation) 
            {
                echo '<script language="javascript">alert("Los datos se han agregado correctamente");</script>';
                redirect(base_url().'clientes','refresh'); 
            }

            else
            {
                echo '<script language="javascript">alert("No se han podido cargar los datos, intente de nuevo");</script>';
                redirect(base_url().'nuevo_cliente','refresh');
            }
             
        }
    }

    private function load()
    {
        $data = $this->consultas->getFolioClientes();

        $html = '';

        $html .= '<div class="page-header" ><h1>Nuevo Registro de Cliente</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'nuevo_cliente/agregar" method="post">';
                    /************************************************************************
                                            Datos Generales, Fecha y Folio
                    ************************************************************************/
                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<center><h4><b>Datos Generales</b></h4></center>';
                        $html .= '</div>';

                        $html .= '<div class="col-md-4">';
                            $html .= '<center><h4><b>Folio</b></h4><center>';
                        $html .= '</div>';
                    $html .= '</div>';


                    $html .= '<div class="col-md-12" id="general_data">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Cliente: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="cliente" required id="cliente">';
                        $html .= '</div>';
                        $html .= '<div class="col-md-4">';
                            foreach ($data as $key => $row) 
                            {
                                $folio = $row->id;

                                if ($folio==0) 
                                {
                                    $folio=1;
                                }
                                $html .= '<label>Folio: &nbsp; &nbsp;</label><input type="text"  name="folio" value="'.$folio.'" class="form-control" disabled><br>';
                            }
                        $html .= '</div>';
                    $html .= '</div>';  

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Dirección: &nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control" name="direccion" required id="direccion_cliente">';
                        $html .= '</div>'; 
                    $html .= '</div>';

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Encargado: &nbsp;</label><input type="text" class="form-control" name="encargado"  id="encargado">';
                        $html .= '</div>';     
                    $html .= '</div>';

                     $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<div class="col-md-8">';
                            $html .= '<label>Teléfono: &nbsp;</label><input type="text" class="form-control" name="telefono" required id="telefono_cliente">';
                             $html .= '<label> &nbsp; &nbsp;E-mail: &nbsp;</label><input type="text" class="form-control" name="email" required id="correo_cliente">';
                        $html .= '</div>';
  
                    $html .= '</div>';

                    $html .= '<div>';
                        $html .= '<input type="submit" class="btn btn-success" value="Aceptar">';

                        $html .= '<button class="btn btn-primary" id="cancelar_registro_cliente">Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
