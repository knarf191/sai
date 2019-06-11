<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir_carga_chofer extends CI_Controller {

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
        $folio         = $_GET['folio'];
        $data        = $this->consultas->getDatosCargaChoferByFolio($folio);
        $chofer      = $data['chofer'];
        $ruta        = $data['ruta'];
        $fecha         = $data['fecha'];

        $html = '';
            $html .= '<div class="span12">';
                $html .= '<div class="col-md-12">';

                    $html .= '<div class="col-md-2" id="logo_header">';
                        $html .= '<img src="img/jlroquet.png" id="logo">';
                    $html .= '</div>';

                    $html .= '<div clss="col-md-10" id="vale_header">';
                        $html .= '<div class="title_header"><b>DETALLES DE CARGA DE PRODUCTOS</b></div>';
                        $html .= '<BR>';
                    $html .= '</div>';
                $html .= '</div>';
            $html .= '</div>';

            $html .= '<div >';
                $html .= '<table id="printSolicitud">';
                    $html .= '<thead></thead>';
                    $html .= '<tbody>';
                         $html .= '<tr>';
                            $html .= '<td></td>';
                            $html .= '<td></td>';
                            $html .= '<td></td>';
                            $html .= '<td></td>';
                            $html .= '<td></td>';
                            $html .= '<td class="spaceVale"></td>';
                            $html .= '<td class="spaceVale"></td>';
                            $html .= '<td ><center><b>FOLIO:</b></center></td>';
                            if ($folio<10) 
                            {
                                $html .= '<td class="contentTitlePrintVale"><center id="folioPrintVale"><b>0000'.$folio.'</b></center></td>';
                            }
                            if (($folio>=10)&&($folio<100)) 
                            {
                                $html .= '<td class="contentTitlePrintVale"><center id="folioPrintVale"><b>000'.$folio.'</b></center></td>';
                            }
                            if (($folio>=100)&&($folio<1000)) 
                            {
                                $html .= '<td class="contentTitlePrintVale"><center id="folioPrintVale"><b>00'.$folio.'</b></center></td>';
                            }
                            if (($folio>=1000)&&($folio<10000)) 
                            {
                                $html .= '<td class="contentTitlePrintVale"><center id="folioPrintVale"><b>0'.$folio.'</b></center></td>';
                            }
                            if (($folio>=10000)&&($folio<100000)) 
                            {
                                $html .= '<td class="contentTitlePrintVale"><center id="folioPrintVale"><b>'.$folio.'</b></center></td>';
                            }   
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td class="titlePrintVale" colspan="5"><center><b>NOMBRE DEL CHOFER</b></center></td>';
                            $html .= '<td class="titlePrintVale" colspan="3"><center><b>RUTA</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>FECHA</b></center></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                           
                            $html .= '<td class="contentPrintVale" colspan="5"><center>'.$chofer.'</center></td>';
                            $html .= '<td class="contentPrintVale" colspan="3"><center>'.$ruta.'</center></td>';
                            $html .= '<td class="contentPrintVale"><center>'.$fecha.'</center></td>';
                        $html .= '</tr>';                        

                        $html .= '<tr>';
                            $html .= '<td class="titlePrintVale" colspan="4"><center><b>PRODUCTO</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>ABORDO</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>VENTA</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>REGRESO</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>MERMA</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>SIN COMPROBAR</b></center></td>';
                        $html .= '</tr>';

                        $query_products = $this->db->query("SELECT*FROM productos_carga_chofer WHERE folio = '$folio' ");

                        foreach ($query_products->result_array() as $row) 
                        {
                            $html .= '<tr>';
                                $html .= '<td class="contentPrintVale" colspan="4"><center>'.$row['producto'].'</center></td>';
                                $html .= '<td class="contentPrintVale"><center>'.$row['cantidad'].'</center></td>';  
                                $html .= '<td class="contentPrintVale"><center>'.$row['venta'].'</center></td>';
                                $html .= '<td class="contentPrintVale"><center>'.$row['regreso'].'</center></td>';  
                                $html .= '<td class="contentPrintVale"><center>'.$row['merma'].'</center></td>';
                                $html .= '<td class="contentPrintVale"><center>'.$row['sin_comprobar'].'</center></td>';   
                            $html .= '</tr>';
                        }

                        
                        $html .= '<tr>';
                            $html .= '<td colspan="7"></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td class="footPrintVale" colspan="4"><center><b>ENTREGÓ</b></center></td>';
                            $html .= '<td class="footPrintVale" colspan="3"><center><b>RECIBIÓ</b></center></td>';
                            $html .= '<td class="footPrintVale" colspan="2"><center><b>CHOFER</b></center></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td class="contentPrintValeSello" colspan="4"><center></center></td>';
                            $html .= '<td class="contentPrintValeSello" colspan="3"><center></center></td>';
                            $html .= '<td class="contentPrintValeSello" colspan="2"><center></center></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td class="footPrintVale" colspan="4"><center><b>NOMBRE Y FIRMA</b></center></td>';
                            $html .= '<td class="footPrintVale" colspan="3"><center><b>NOMBRE Y FIRMA</b></center></td>';
                            $html .= '<td class="footPrintVale" colspan="2"><center><b>NOMBRE Y FIRMA</b></center></td>';
                        $html .= '</tr>';
                    $html .= '</tbody>';
                $html .= '</table>';
                $html .= '<div class="tfoodbuttons">';
                    $html .= '<a id="printValeDetail" class="btn btn-success">Imprimir</a>';
                    $html .= '<button class="btn btn-primary" id="back_chofer">Cancelar</button>';
                $html .= '</div>';
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
