<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rdocumento extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

  }

	public function index()
	{
	    $x="";
        $x=$this->input->post('xxx');
    $idUser = $this->session->userdata('UsId');
    $user=$this->consultas->getUsers($idUser);
    if(!$idUser)
    {
      $data['error'] ="";
      $this->load->view('login',$data);
      
      return false;
    }
    else // Administrador
    {
      $idEmpresa = $this->session->userdata('UsIdEmpresa');
      $sucursal = $this->consultas_adm->consultaGral("proy_sucursal","SucIdEmpresa",$idEmpresa,1);

      $modulos = $this->consultas_adm->getmenu_modulos();
      $modulos_uno = $this->consultas_adm->getmenu_modulos_uno();

      
 $consultaRutDoctor = $this->consultas->consultaRutDoctor();
$dataSidebar['consultaRutDoctor']=$consultaRutDoctor;
$grafico = $this->sqlconsultas->graficoLinea($x);
      $dataSidebar['graficoLinea']=$grafico;
      
      $graficoBarra = $this->sqlconsultas->graficoBarra($x);
      $dataSidebar['graficoBarra']=$graficoBarra;
      $prueba = $this->sqlconsultas->prueba();
      $dataSidebar['sucursal']=$sucursal;
      $dataSidebar['modulos']=$modulos;
      $dataSidebar['modulos_uno']=$modulos_uno;
      $dataSidebar['usuario']=$user;
      $dataSidebar['prueba']=$prueba;
       $this->load->view('header',$dataSidebar);
       $this->load->view('reporteria/rdocumento');
      $dataFooter=array(
       'scripts'=> "<script src='".base_url()."js/sucursales.js'></script>"
      );
      $this->load->view('footer',$dataFooter);

    
    }
    
        
	}

  public function GraficoRut()
  
  
  {

      
          $idUser = $this->session->userdata('UsId');
    $user=$this->consultas->getUsers($idUser);
   $idEmpresa = $this->session->userdata('UsIdEmpresa');
      $sucursal = $this->consultas_adm->consultaGral("proy_sucursal","SucIdEmpresa",$idEmpresa,1);

      $modulos = $this->consultas_adm->getmenu_modulos();
      $modulos_uno = $this->consultas_adm->getmenu_modulos_uno();

      $grafico = $this->sqlconsultas->graficoLinea('11210960-9');
      $dataSidebar['graficoLinea']=$grafico;
      $graficoBarra = $this->sqlconsultas->graficoBarra('11210960-9');
      $dataSidebar['graficoBarra']=$graficoBarra;
      $prueba = $this->sqlconsultas->prueba();
      $dataSidebar['sucursal']=$sucursal;
      $dataSidebar['modulos']=$modulos;
      $dataSidebar['modulos_uno']=$modulos_uno;
      $dataSidebar['usuario']=$user;
      $dataSidebar['prueba']=$prueba;
       $this->load->view('header',$dataSidebar);
       $this->load->view('reporteria/rdocumento');
      $dataFooter=array(
       'scripts'=> "<script src='".base_url()."js/sucursales.js'></script>"
      );
      $this->load->view('footer',$dataFooter);
  }

  public function verHtml()
  {
    $this->load->view('proyectos/_formSucursales');
  }
  public function addHtml($idSucursal=0)
  {
    
    $ControlName="ModSuc";
    $btnName="Modificar";  
    $miSucursal = $this->consultas_adm->consultaGral("proy_sucursal","SucId",$idSucursal,2);
      if(!$miSucursal){
          $miSucursal=array(
          'SucId'=>0,
          'SucNombreSucursal'=>''
        );
          $ControlName="addImagen";
          $btnName="Agregar"; 
      }
      
      
      $idEmpresa = $this->session->userdata('UsIdEmpresa');
    
    $datos=array('miSucursal'=>$miSucursal,
                 'ControlName'=>$ControlName,
                 'btnName'=>$btnName,
                 'idEmpresa'=>$idEmpresa);                   

    $this->load->view('proyectos/_formSucursal',$datos);
  }







  public function probando(){

$prueba = $this->consultas->prueba();
$grafico = $this->consultas->grafico();
$datos['prueba']=$prueba;
$datos['grafico']=$grafico;

$this->load->view("probando",$datos);

  }

  public function descargar(){

// instantiate and use the dompdf class


 $file_name = 'google_chart.pdf';
 $html = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html .= $_POST["hidden_html"];

$pdf = new \Dompdf\Dompdf();
$pdf->set_paper('letter', 'landscape');
 $pdf->load_html(utf8_decode($html));
 $pdf->render();
 $pdf->stream($file_name, array("Attachment" => false));


  }


  public function consultarango(){


    $min = $_POST['min'];
   $max = $_POST['max'];
 $data = [];
if($min==0){
 $prueba = $this->sqlconsultas->prueba();
foreach($prueba as $pru){
           $data[] = array(
                $pru['Empresa'],
                $pru['Caso'],
                '$'.number_format($pru['Valor'], 0, ",", "."),
                $pru['NombreEstado'],
                $pru['NroComprobante'],
                $pru['FechaComprobante'],
                $pru['Rut_Doctor'],
                $pru['Observacion']
           );
}

}else{

      

 $prueba = $this->sqlconsultas->prueba2($min,$max);
foreach($prueba as $pru){
           $data[] = array(
                $pru['Empresa'],
                $pru['Caso'],
                $pru['Valor'],
                $pru['NombreEstado'],
                $pru['NroComprobante'],
                $pru['FechaComprobante'],
                $pru['Rut_Doctor'],
                $pru['Observacion']      
           );
}

}




 $result = array(
                 "data" => $data
            );
    //$return = $this->ion_auth->rangeDate($start_date,$end_date);
   
    echo json_encode($result);



  }

    public function consultadevengo(){


    $min = $_POST['min'];
   $max = $_POST['max'];
 $data = [];
if($min==0){
 $prueba = $this->sqlconsultas->devengo1();
foreach($prueba as $pru){
           $data[] = array(
                $pru['Empresa'],
                $pru['ID'],
                $pru['TipoDocumento'],
                $pru['Valor_Neto'],
                $pru['ValorRetencion'],                
                $pru['NombreEstado'],
                $pru['NroComprobante'],
                $pru['FechaComprobante'],
                $pru['Observacion'],                  
                $pru['Rut_Doctor']
           );
}

}else{

      

 $prueba = $this->sqlconsultas->devengo2($min,$max);
foreach($prueba as $pru){
           $data[] = array(
                $pru['Empresa'],
                $pru['ID'],
                $pru['TipoDocumento'],
                $pru['Valor_Neto'],
                $pru['ValorRetencion'],                
                $pru['NombreEstado'],
                $pru['NroComprobante'],
                $pru['FechaComprobante'],
                $pru['Observacion'],                  
                $pru['Rut_Doctor']
           );
}

}




 $result = array(
                 "data" => $data
            );
    //$return = $this->ion_auth->rangeDate($start_date,$end_date);
   
    echo json_encode($result);



  }

    public function consultapago(){


    $min = $_POST['min'];
   $max = $_POST['max'];
 $data = [];
if($min==0){
 $prueba = $this->sqlconsultas->pago1();
foreach($prueba as $pru){
           $data[] = array(
                $pru['Id'],
                $pru['Empresa'],
                $pru['Correlativo'],
                $pru['Fecha_Proceso'],
                $pru['Nro_Doc_Cancelado'],
                $pru['Monto_Pagado'],
                $pru['Nro_Comprobante'],
                $pru['FechaComprobante'],
                $pru['Fecha_de_Proceso_Pago'],
                $pru['Rut']
                                                     
           );
}

}else{

      

 $prueba = $this->sqlconsultas->pago2($min,$max);
foreach($prueba as $pru){
           $data[] = array(
                $pru['Id'],
                $pru['Empresa'],
                $pru['Correlativo'],
                $pru['Fecha_Proceso'],
                $pru['Nro_Doc_Cancelado'],
                $pru['Monto_Pagado'],
                $pru['Nro_Comprobante'],
                $pru['FechaComprobante'],
                $pru['Fecha_de_Proceso_Pago'],
                $pru['Rut']
 
           );
}

}




 $result = array(
                 "data" => $data
            );
    //$return = $this->ion_auth->rangeDate($start_date,$end_date);
   
    echo json_encode($result);



  }


} ?>