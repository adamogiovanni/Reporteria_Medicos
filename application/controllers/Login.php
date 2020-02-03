<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
  }
	public function index()
	{
        $user = $this->input->post('usuario');
        $pass = $this->input->post('pass');
    
        $isUser = $this->consultas->isUser($user, $pass);
        if($isUser=="1")
        {
      $idUser= $this->consultas->findIdUser($user, $pass);
          if($idUser->UsIdPerfil==1){
            $empresas = $this->consultas_adm->consultaGral("gen_empresas","EmpEstado",1,1);
            $dataSidebar['empresas']=$empresas;
            $dataSidebar['UsId']=$idUser->UsId;
            $dataSidebar['perfil']=$idUser->UsIdPerfil;
            $dataSidebar['tipoPerfil']=$idUser->TPId;
            $dataSidebar['correo']=$idUser->UsCorreo;
            $this->load->view('selectEmpresa',$dataSidebar);
          }else{
            $infoEmp = $this->consultas->getEmpresa($idUser->UsIdEmpresa);
            $data = array(
              'UsId' => $idUser->UsId,
              'UsIdPerfil' => $idUser->UsIdPerfil,
              'UsIdEmpresa' => $idUser->UsIdEmpresa,
              'UsCorreo' => $idUser->UsCorreo,
              'UsRut' => $idUser->UsRut,
              'NomEmpresa' => $infoEmp['EmpNombre'],
              'tipoPerfil'=>$idUser->TPId
            );
            $this->session->set_userdata($data);
            redirect(base_url());
          }
          
          

        }
        else{
            $data['error'] =$isUser;
          $this->load->view('login',$data);
    
        }
  }
  
  public function selectEmpresa()
  {
    $empresa = $this->input->post('empresa');
    $infoEmp = $this->consultas->getEmpresa($empresa);
    
    $IdUs = $this->input->post('idu');
    $IdTP = $this->input->post('idTP');
    $IdPer = $this->input->post('idPer');
    $UsCorreo = $this->input->post('UsCorreo');
    $data = array(
      'UsId' => $IdUs,
      'UsIdPerfil' => $IdPer,
      'UsIdEmpresa' => $empresa,
      'NomEmpresa' => $infoEmp['EmpNombre'],
      'tipoPerfil'=>$IdTP,
      'UsCorreo' => $UsCorreo,

    );
    $this->session->set_userdata($data);
    redirect(base_url());
  }

}

