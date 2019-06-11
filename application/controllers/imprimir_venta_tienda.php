<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imprimir_venta_tienda extends CI_Controller {

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
            $html .= '<div class="span12">';
                $html .= '<div class="col-md-12">';

                    $html .= '<div class="col-md-2" id="logo_header">';
                        $html .= '<img src="img/jlroquet.png" id="logo">';
                    $html .= '</div>';

                    $html .= '<div clss="col-md-10" id="vale_header">';
                        $html .= '<div class="title_header"><b>DETALLES DE VENTA EN TIENDA</b></div>';
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
                            $html .= '<td class="titlePrintVale" colspan="4"><center><b>CLIENTE</b></center></td>';
                            $html .= '<td class="titlePrintVale" colspan="3"><center><b>VENDEDOR</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>No. RECIBO</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>FACTURA</b></center></td>';
                            
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td class="contentPrintVale" colspan="4"><center>'.$cliente.'</center></td>';
                            $html .= '<td class="contentPrintVale" colspan="3"><center>'.$vendedor.'</center></td>';
                            $html .= '<td class="contentPrintVale"><center>'.$recibo.'</center></td>';
                            $html .= '<td class="contentPrintVale"><center>'.$factura.'</center></td>';
                        $html .= '</tr>';                        

                        $html .= '<tr>';
                            $html .= '<td class="titlePrintVale" colspan="3"><center><b>FECHA PEDIDO</b></center></td>';
                            $html .= '<td class="titlePrintVale" colspan="2"><center><b>FECHA ENTREGA</b></center></td>';
                            $html .= '<td class="titlePrintVale" colspan="2"><center><b>FECHA PAGO</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>ESTATUS</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>METODO PAGO</b></center></td>';
                        $html .= '</tr>';


                        $html .= '<tr>';
                            $html .= '<td class="contentPrintVale" colspan="3"><center>'.$fecha_pedido.'</center></td>';
                            $html .= '<td class="contentPrintVale" colspan="2"><center>'.$fecha_entrega.'</center></td>';  
                            $html .= '<td class="contentPrintVale" colspan="2"><center>'.$fecha_pago.'</center></td>';
                            $html .= '<td class="contentPrintVale"><center>'.$estatus.'</center></td>';  
                            $html .= '<td class="contentPrintVale"><center>'.$metodo_pago.'</center></td>';  
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td class="titlePrintVale" colspan="4"><center><b>PRODUCTO</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>CANTIDAD</b></center></td>';
                            $html .= '<td class="titlePrintVale"colspan="2"><center><b>PRECIO UNITARIO</b></center></td>';
                            $html .= '<td class="titlePrintVale"><center><b>IMPUESTO</b></center></td>';
                            $html .= '<td class="titlePrintVale" ><center><b>TOTAL</b></center></td>';
                        $html .= '</tr>';
                        $html .= '<tr>';
                            $query_products = $this->db->query("SELECT*FROM producto_venta_tienda WHERE id = '$folio' ");

                            $count = 0;
                            foreach ($query_products->result_array() as $row) 
                            {
                                $html .= '<tr>';
                                    $html .= '<td class="contentPrintVale" colspan="4"><center>'.$row['producto'].'</center></td>';
                                    $html .= '<td class="contentPrintVale"><center>'.$row['cantidad'].'</center></td>';  
                                    $html .= '<td class="contentPrintVale" colspan="2"><center>'.$row['precio'].'</center></td>';
                                    $html .= '<td class="contentPrintVale"><center>'.$row['impuesto'].' %</center></td>'; 

                                    $impuesto = $row['impuesto'];
                                    $precio   = $row['precio']*$row['cantidad'];
                                    $total    = ($impuesto/100)*$precio+$precio;

                                    $count += $total;
                                    $html .= '<td class="contentPrintVale"><center>'.$total.'</center></td>';
                                $html .= '</tr>';
                            }  
                        $html .= '</tr>';

                        $html .= '<tr>';
                            $html .= '<td colspan="7"><center></center></td>'; 
                            $html .= '<td><center>TOTAL: $</center></td>'; 
                            $html .= '<td class="contentPrintVale" ><center>'.$count.'</center></td>';  
                        $html .= '</tr>';
                        

                        
                        $html .= '<tr>';
                            $html .= '<td colspan="7"></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                            
                            $html .= '<td class="footPrintVale" colspan="5"><center><b>RECIBIÓ</b></center></td>';
                            $html .= '<td class="footPrintVale" colspan="4"><center><b>CHOFER</b></center></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                            
                            $html .= '<td class="contentPrintValeSello" colspan="5"><center></center></td>';
                            $html .= '<td class="contentPrintValeSello" colspan="4"><center></center></td>';
                        $html .= '</tr>';

                        $html .= '<tr>';
                            
                            $html .= '<td class="footPrintVale" colspan="5"><center><b>NOMBRE Y FIRMA</b></center></td>';
                            $html .= '<td class="footPrintVale" colspan="4"><center><b>NOMBRE Y FIRMA</b></center></td>';
                        $html .= '</tr>';
                    $html .= '</tbody>';
                $html .= '</table>';

                $html .= '<div class="tfoodbuttons">';
                    $html .= '<a id="printValeDetail" class="btn btn-success">Imprimir</a>';
                    $html .= '<button class="btn btn-primary" id="back_venta_tienda">Cancelar</button>';
                $html .= '</div>';
                
            $html .= '</div>';
        $html .= '</div>';

        $this->init('','principal_login',$html);

    }
}
