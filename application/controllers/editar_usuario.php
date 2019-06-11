<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editar_usuario extends CI_Controller {

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

    function editar()
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

            $id = $this->input->post('id');

            $val_user = $this->agregar->updateUsuarios($id,$data_user);

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
        $id       = $_GET['id'];
        $data = $this->consultas->getUserById($id);

        $nombre     = $data['nombre'];
        $user       = $data['user'];
        $password   = $data['password'];
        $chofer     = $data['chofer'];
        $produccion = $data['produccion'];
        $clientes   = $data['clientes'];
        $ventas     = $data['ventas'];
        $usuarios   = $data['usuarios'];

        $html = '';
        $html .= '<div class="page-header" ><h1>Editar Registro y Permisos de Usuario</h1></div>'; 
            $html .= '<div class="span12">';
                $html .= '<form class="form-inline" action="'.base_url().'editar_usuario/editar" method="post" id="updateUsuario">';

                    /************************************************************************
                                            Datos del Usuario
                    ************************************************************************/

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<center><h4><b>Datos del Usuario</b></h4></center>';
                    $html .= '</div>';

                    $html .= '<div class="col-md-12">';
                        $html .= '<br>';
                        $html .= '<br>';
                        
                        $html .= '<div class="col-md-3" id="id_user">';
                            $html .= '<label>ID: &nbsp</label><input type="text" class="form-control" name="id" id="idUser" value="'.$id.'">';   
                        $html .= '</div>';
    
                        $html .= '<div class="col-md-3" id="nombre_user">';
                            $html .= '<label>Nombre: &nbsp</label><input type="text" class="form-control" name="nombre" required id="nombreUser" value="'.$nombre.'">';   
                        $html .= '</div>';

                        $html .= '<div class="col-md-3">';
                            $html .= '<label>Usuario: &nbsp; &nbsp;&nbsp; &nbsp;</label><input type="text" class="form-control" name="user" required id="user" value="'.$user.'">';
                        $html .= '</div>';

                        $html .= '<div class="col-md-3">';
                            $html .= '<label>Contraseña: &nbsp</label><input type="pass" class="form-control" name="password" required id="passUser" value="'.$password.'">';
                        $html .= '</div>';
                    $html .= '</div>';   

                   /************************************************************************
                                           Permisos de Usuario
                    ************************************************************************/

                    $html .= '<div class="col-md-12" id="titles">';
                        $html .= '<center><h4><b>Permisos Otorgados al Usuario</b></h4></center>';
                    $html .= '</div>';

                    $html .= '<div class="col-md-10" id="titles">';
                        $html .= '<h4><b>Vales de Gasolina</b></h4>';
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

                                        if ($chofer==="true") 
                                        {
                                            $html .= '<td><input type="checkbox" name="chofer" id="chofer_" checked></td>';
                                        }
                                        else
                                        {
                                            $html .= '<td><input type="checkbox" name="chofer" id="chofer_" ></td>';
                                        }

                                        if ($produccion==="true") 
                                        {
                                            $html .= '<td><input type="checkbox" name="produccion" id="produccion" checked></td>';
                                        }
                                        else
                                        {
                                            $html .= '<td><input type="checkbox" name="produccion" id="produccion"></td>';
                                        }
                                        
                                        if ($clientes==="true") 
                                        {
                                            $html .= '<td><input type="checkbox" name="clientes" id="clientes" checked></td>';
                                        }
                                        else
                                        {
                                            $html .= '<td><input type="checkbox" name="clientes" id="clientes"></td>';
                                        }
                                        
                                        if ($ventas==="true") 
                                        {
                                            $html .= '<td><input type="checkbox" name="ventas" id="ventas" checked></td>';
                                        }
                                        else
                                        {
                                          $html .= '<td><input type="checkbox" name="ventas" id="ventas"></td>';  
                                        }
                                        
                                        if ($usuarios==="true") 
                                        {
                                            $html .= '<td><input type="checkbox" name="usuarios" id="usuarios" checked></td>';
                                        }
                                        else
                                        {
                                            $html .= '<td><input type="checkbox" name="usuarios" id="usuarios"></td>';  
                                        }
                                        
                                    $html .= '</tr>';
                                $html .= '</tbody>';
                            $html .= '</table>';   
                        $html .= '</div>';
                    $html .= '</div>';


                    $html .= '<div>';
                        $html .= '<a href="" type="submit" class="btn btn-success" id="btnUpdateUser">Aceptar</a>';

                        $html .= '<button class="btn btn-primary"  id="btnCancelUser">Cancelar</button>';
                    $html .= '</div>';     
                $html .= '</form>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
