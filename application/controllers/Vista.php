<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vista extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

  }

	public function index($id)
	{
        $vista = $this->consultas_adm->consultaGral("proy_imagenes","ImgIdSucursal",$id,1);
        $dataSidebar['vista']=$vista;
        $this->load->view('vista',$dataSidebar); 
	}



} 

?>