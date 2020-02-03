<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

  }

	public function index($id)
	{
       // $idEmpresa = $this->session->userdata('UsIdEmpresa');
        $sucursal = $this->consultas_adm->consultaGral("proy_sucursal","SucIdEmpresa",$id,1);
        $dataSidebar['sucursal']=$sucursal;
        $dataSidebar['id']=$id;
        $this->load->view('home',$dataSidebar); 
	}



} 

?>