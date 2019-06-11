<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produccion extends CI_Controller {

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
        $data = $this->consultas->getProduccion();
       /* $data = $this->consultas->getVales();
        $user = $this->session->userdata('user');
        $data_vale = $this->consultas->getPermisosById($user, "vales");*/
                
        
        $html = '';
        $html .= '<div class="page-header"><h1>Control de Produccion</h1></div>'; 
            $html .= '<div class="content-principal-section">';

                /*$agregar_vale = $data_vale['agregar'];
                if ($agregar_vale=="true") 
                {*/
                    $html .= '<a href="'.base_url().'nuevo_registro_produccion" class="btn btn-success" id="newVale"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo</a>';
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
                
                $html .= '<table id="table_produccion" class="display data_table2">';
                        $html .= '<thead>';
                            $html .= '<tr>';
                                $html .= '<th>ID</th>';
                                $html .= '<th>Fecha de producción</th>';
                                $html .= '<th>Descripción del producto</th>';
                                $html .= '<th>Cantidad</th>';
                                $html .= '<th>Registró</th>';
                                //$html .= '<th></th>';
                            $html .= '</tr>';
                        $html .= '</thead>';
                        $html .= '<tbody>';

                            if (!empty($data)) 
                            {
                                foreach ($data as $clave => $row) 
                                {
                                    $html .= '<tr>';
                                        $html .= '<td>'.$row->id.'</td>';

                                        $html .= '<td class="fecha_vales">'.$row->fecha.'</td>';
                                        $html .= '<td>'.$row->producto.'</td>';
                                      
                                        $html .= '<td >'.$row->cantidad.'</td>';
                                        $html .= '<td>'.$row->registra.'</td>';
                                                                                                                       
                                        /*$html .= '<td>';
                                            
                                            $editar_vale = $data_vale['editar'];

                                            if ($editar_vale == 'true') 
                                            {
                                                $html .= ' <a href="" class="btn btn-warning" title="Editar" id="editar_vale">';
                                                    $html .= '<i class="fa fa-pencil"></i>';
                                                $html .= '</a>';
                                            }

                                        $html .= '</td>';*/
                                    $html .= '</tr>';
                                    
                                }
                            }
                        $html .= '</tbody>';
                        $html .= '<tfoot>';
                            $html .= '<tr>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td></td>';
                                $html .= '<td>Gasto Total:</td>';
                                $html .= '<td></td>';
                            $html .= '</tr>';
                        $html .= '</tfoot>';

                    $html .= '</table>'; 

            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
