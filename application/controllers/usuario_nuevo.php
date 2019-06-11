<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuario_nuevo extends CI_Controller {

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
            $data_user = array(
                'id'         => $this->input->post('id'),
                'nombre'     => $this->input->post('nombre'),
                'user'       => $this->input->post('user'),
                'password'   => $this->input->post('password'),  
                'chofer'     => $this->input->post('chofer'),
                'produccion' => $this->input->post('produccion'),
                'clientes'   => $this->input->post('clientes'),
                'ventas'     => $this->input->post('ventas'),
                'usuarios'   => $this->input->post('usuarios'),                     
            ); 

            $val_user = $this->agregar->setUsuarios($data_user);

            if ($val_user) 
            {
                echo "true";
            }

            else
            {
                echo "false";
            }       
        }
    }

    private function load()
    {
        $data = $this->consultas->getIdUser();
        $html = '';

        $html .= '<div class="page-header" ><h1>Nuevo Usuario</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'usuario_nuevo/agregar" method="post" id="setUser">';

                    /************************************************************************
                                            Datos del Usuario
                    ************************************************************************/

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<center><h4><b>Datos del Usuario</b></h4></center>';
                    $html .= '</div>';

                    $html .= '<div class="col-md-12">';
                        $html .= '<br>';
                        $html .= '<br>';

                        foreach ($data as $key => $row) 
                        {
                            $id = $row->id;

                            if ($id==0) 
                            {
                                $id=1;
                            } 

                            $html .= '<div class="col-md-3" id="id_user">';
                                $html .= '<label>ID: &nbsp</label><input type="text" class="form-control" name="idUser" id="idUser" value="'.$id.'">';   
                            $html .= '</div>';
                        }


                        $html .= '<div class="col-md-3" id="nombre_user">';
                            $html .= '<label>Nombre: &nbsp</label><input type="text" class="form-control" name="nombre" required id="nombreUser">';   
                        $html .= '</div>';

                        $html .= '<div class="col-md-3">';
                            $html .= '<label>Usuario: &nbsp; &nbsp;&nbsp; &nbsp;</label><input type="text" class="form-control" name="user" required id="user">';
                        $html .= '</div>';

                        $html .= '<div class="col-md-3">';
                            $html .= '<label>Contraseña: &nbsp</label><input type="pass" class="form-control" name="password" required id="passUser">';
                        $html .= '</div>';
                    $html .= '</div>';   

                   /************************************************************************
                                           Permisos de Usuario
                    ************************************************************************/

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<center><h4><b>Permisos Otorgados al Usuario</b></h4></center>';
                    $html .= '</div>';

                    $html .= '<div class="row" id="permisos_usuarios">';
                        $html .= '<div class="col-md-8">';

                            $html .= '<table id="tPermisos" class="display data_table2">';
                                $html .= '<thead>';
                                    $html .= '<tr>';
                                        $html .= '<th>Chofer</th>';
                                        $html .= '<th>Produccion</th>';
                                        $html .= '<th>Clientes</th>';
                                        $html .= '<th>Ventas</th>';
                                        $html .= '<th>Usuarios</th>';
                                    $html .= '</tr>';
                                $html .= '</thead>';
                                $html .= '<tbody>';
                                    $html .= '<tr>';
                                        $html .= '<td><input type="checkbox" name="chofer" id="chofer_" ></td>';
                                        $html .= '<td><input type="checkbox" name="produccion" id="produccion"></td>';
                                        $html .= '<td><input type="checkbox" name="clientes" id="clientes"></td>';
                                        $html .= '<td><input type="checkbox" name="ventas" id="ventas"></td>';
                                        $html .= '<td><input type="checkbox" name="usuarios" id="usuarios"></td>';
                                    $html .= '</tr>';
                                $html .= '</tbody>';
                            $html .= '</table>';   
                        $html .= '</div>';
                    $html .= '</div>';

                    $html .= '<div>';
                        $html .= '<a href="" type="submit" class="btn btn-success" id="btnSetUser">Aceptar</a>';

                        $html .= '<button class="btn btn-primary"  id="btnCancelUser">Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
