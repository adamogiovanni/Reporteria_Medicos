<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	public function __construct()
  {
    parent::__construct();

  }

	public function index()
	{
        
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
          
          $perfil = $this->consultas_adm->getPerfil();
          
          $modulos = $this->consultas_adm->getmenu_modulos();
          $modulos_uno = $this->consultas_adm->getmenu_modulos_uno();
          $usuarios = $this->consultas_adm->getUsers();
          $dataSidebar['modulos']=$modulos;
          $dataSidebar['modulos_uno']=$modulos_uno;
          $dataSidebar['usuarios']=$usuarios;
            $dataSidebar['usuario']=$user;
            $dataSidebar['perfil']=$perfil;
            
            $this->load->view('header',$dataSidebar);
            $this->load->view('mantencion/perfil');
            $dataFooter=array(
              'scripts'=> "<script src='".base_url()."js/peril.js'></script>"
            );
            $this->load->view('footer',$dataFooter);
        
        }
    
        
	}

  public function addHtml($idPer=0)
  {

    $formName="formEditPer";
    $btnName="Modificar";  
    $miPerfil = $this->consultas_adm->consultaGral("gen_perfil","PerId",$idPer,2);
      if(!$miPerfil){
          $miPerfil=array(
          'PerId'=>0,
          'PerNombre'=>''
        );
          $formName="formNewPerfil";
          $btnName="Agregar"; 
      }
      
      
    $perfil = $this->consultas_adm->getPerfil();
    $getTipoPerfil = $this->consultas_adm->getTipoPerfil();
    
    $datos=array('perfil'=>$miPerfil,
                 'formName'=>$formName,
                 'btnName'=>$btnName,
                 'idPer'=>$idPer,
                 'getTipoPerfil'=>$getTipoPerfil);                   

    $this->load->view('mantencion/_formPerfil',$datos);



  }


  public function addPerfil()
  {
    $per=$this->input->post('perfil');
    $idEmpresa = $this->session->userdata('UsIdEmpresa');
    $p = $this->consultas->selectPerfil($per,$idEmpresa,0);
    if($p>0){
      $data = array(
        'roll' => 'error',
        'mensaje' => 'Ya existe perfil con ese nombre'
      );  
    }else{



    $idUsuario = $this->session->userdata('UsId');
   
   $datosPerfil = array(
    'PerIdTP'=>$this->input->post('tipoperfil'),
    'PerIdEMpresa'=>$idEmpresa,
    'PerNombre'=>$this->input->post('perfil'),
    'PerIdUserCreacion'=>$idUsuario,
    'PerIdUserMod'=>$idUsuario,
    'PerEstado'=>1
    );
    
    $this->insertar_adm->insertar("gen_perfil",$datosPerfil);
    $data = array(
      'roll' => 'exito',
      'mensaje' => 'Perfil Creado!'
    );
  }

  echo json_encode($data);
    
  }

  public function ModPerfil()
  {
    $idP=$this->input->post('idP');
    $per=$this->input->post('perfil');
    $idEmpresa = $this->session->userdata('UsIdEmpresa');
    $p = $this->consultas->selectPerfil($per,$idEmpresa,$idP);
    if($p>0){
      $data = array(
        'roll' => 'error',
        'mensaje' => 'Ya existe Perfil con ese nombre'
      );  
    }else{

    $idUsuario = $this->session->userdata('UsId');
    $datosPer = array(
      'PerIdTP'=>$this->input->post('tipoperfil'),
      'PerNombre'=>$this->input->post('perfil'),
      'PerIdUserMod'=>$idUsuario,
    );
    $wherePer = array(
    'PerId'=> $this->input->post('idP'));
    $this->insertar_adm->actualizar("gen_perfil",$datosPer,$wherePer);

    $data = array(
      'roll' => 'exito',
      'mensaje' => 'Perfil Modificado!'
    );
  }

  echo json_encode($data);

  }

  public function desactivaPer($idPer)
  {
    
    $usuarios = $this->consultas_adm->consultaGral("gen_usuarios","UsIdPerfil",$idPer,1);
    
    if(!empty($usuarios) ){
      $data = array(
        'roll' => 'error',
        'mensaje' => 'Existen Usuarios para este perfil'
      );  
  
  }else{
    $idUsuario = $this->session->userdata('UsId');
    $datosPer = array(
      'PerEstado'=>2,
      'PerIdUserMod'=>$idUsuario,
    );
    $wherePer = array(
    'PerId'=>$idPer);
    $this->insertar_adm->actualizar("gen_perfil",$datosPer,$wherePer);
    $data = array(
      'roll' => 'exito',
      'mensaje' => 'Perfil Eliminado!'
    );  

  }

  echo json_encode($data);

  }  

  public function accPerfil($idPer=0)
  {

    $opc = $this->consultas_adm->getAccesos($idPer);
    $mast = $this->consultas_adm->getMasterDir();
    $formName="formEditOpciones";
    $btnName="Acceso";  
    $datos=array('formName'=>$formName,
                 'btnName'=>$btnName,
                'opciones'=>$opc,
                'master'=>$mast,
                'idPer'=>$idPer);                   

    $this->load->view('mantencion/_formPerfil',$datos);
  }

  public function ModOpciones()
  {
    $emp=$this->session->userdata('UsIdEmpresa');
    $per=$this->input->post('idper');
    $data=$this->input->post();
    unset($data['submit']);
    $this->insertar_adm->opcionesPerfil($data,$per);
    
    foreach($_POST['engineer_on_page'] as $engineer_id) {
     if(!in_array($engineer_id, $_POST['engineer'])){
     $ok=array(
                'AccIdPerfil'=>$per,
                'AccIdEmpresa'=>$emp,
                'AccIdDireccion'=>$engineer_id
             );
            
          $this->eliminar_adm->eliminar('gen_accesos',$ok);   
     }
   
}


  }  

}