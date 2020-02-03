<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

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
          $perfil = $this->consultas_adm->getGeneral('gen_perfil');
          $usuarios = $this->consultas_adm->getUsers();
          $modulos = $this->consultas_adm->getmenu_modulos();
          $modulos_uno = $this->consultas_adm->getmenu_modulos_uno();
          $dataSidebar['modulos']=$modulos;
          $dataSidebar['modulos_uno']=$modulos_uno;
          $dataSidebar['usuario']=$user;
          $dataSidebar['usuarios']=$usuarios;
          $dataSidebar['perfil']=$perfil;
            $this->load->view('header',$dataSidebar);
            $this->load->view('mantencion/usuario');
            $this->load->view('footer');

        
        }
    
        
  }
  
  public function addHtml($idUser=0)
  {
    // $formName="formNewUser";
    // $perfil = $this->consultas_adm->getPerfil();
    // $datos=array('perfil'=>$perfil,
    //              'formName'=>$formName);
    // $this->load->view('mantencion/_formUser',$datos);

    $formName="formEditUser";
    $btnName="Modificar";  
    $miUsuario = $this->consultas_adm->consultaGral("gen_usuarios","UsId",$idUser,2);
      if(!$miUsuario){
          $miUsuario=array(
          'UsId'=>0,
          'UsNombre'=>'',
          'UsApellidos'=>'',
          'UsIdPerfil'=>'',
          'UsUsername'=>'',
          'UsPass'=>'',
          'UsProfesion'=>'',
          'UsEmpresa'=>'',
          'UsRutEmpresa'=>'',
          'UsRut'=>'',
          'UsCorreo'=>'');
          $formName="formNewUser";
          $btnName="Agregar"; 
      }
      
    $op=$this->input->post('id');
    $perfil = $this->consultas_adm->getPerfil();
    $datos=array('perfil'=>$perfil,
                 'formName'=>$formName,
                 'btnName'=>$btnName,
                 'usuario'=>$miUsuario,
                'opcion'=>$op);                   

                
    $this->load->view('mantencion/_formUser',$datos);



  }

  public function addUser()
  {


    $idUsuario = $this->session->userdata('UsId');
    $idEmpresa = $this->session->userdata('UsIdEmpresa');

    $rut=$this->input->post('rut');
    $user=$this->input->post('username');
    $us = $this->consultas->selectUsuario($rut,$idEmpresa,0);
    $usr = $this->consultas->selectUsuarioUSR($user,$idEmpresa,0);

    if($us>0){
      $data = array(
        'roll' => 'error',
        'mensaje' => 'Ya existe usuario con ese Rut'
      );  
    }
    elseif($usr>0) {
      $data = array(
        'roll' => 'error',
        'mensaje' => 'Ya existe usuario con ese username'
      ); 

    }
    else{

      $datosUser = array(
        'UsIdPerfil'=>$this->input->post('perfil'),
        'UsIdEmpresa'=>$idEmpresa,
        'UsNombre'=>$this->input->post('nombre'),
        'UsApellidos'=>$this->input->post('apellidos'),
        'UsUsername'=>$this->input->post('username'),
        'UsPass'=>$this->input->post('pass'),
        'UsProfesion'=>$this->input->post('profesion'),
        'UsEmpresa'=>$this->input->post('empresa'),
        'UsRutEmpresa'=>$this->input->post('rutEmpresa'),
        'UsRut'=>$this->input->post('rut'),
        'UsCorreo'=>$this->input->post('correo'),
        'UsIdUserCreacion'=>$idUsuario,
        'IdUserMod'=>$idUsuario
        );
        
        $this->insertar_adm->insertar("gen_usuarios",$datosUser);
        $data = array(
          'roll' => 'exito',
          'mensaje' => 'Usuario creado!'
        );  
    }

    echo json_encode($data);


    
  }

  public function ModUser()
  {
    $idEmpresa = $this->session->userdata('UsIdEmpresa');
    $idu=$this->input->post('idu');
    
    $rut=$this->input->post('rut');
    $user=$this->input->post('username');
    $us = $this->consultas->selectUsuario($rut,$idEmpresa,$idu);
    $usr = $this->consultas->selectUsuarioUSR($user,$idEmpresa,$idu);

    if($us>0){
      $data = array(
        'roll' => 'error',
        'mensaje' => 'Ya existe usuario con ese Rut'
      );  
    }
    elseif($usr>0) {
      $data = array(
        'roll' => 'error',
        'mensaje' => 'Ya existe usuario con ese username'
      ); 

    }
    else{

    $datosUser = array(
      'UsIdPerfil'=>$this->input->post('perfil'),
      'UsNombre'=>$this->input->post('nombre'),
      'UsApellidos'=>$this->input->post('apellidos'),
      'UsUsername'=>$this->input->post('username'),
      'UsPass'=>$this->input->post('pass'),
      'UsProfesion'=>$this->input->post('profesion'),
      'UsEmpresa'=>$this->input->post('empresa'),
      'UsRut'=>$this->input->post('rut'),
      'UsRutEmpresa'=>$this->input->post('rutEmpresa'),
      'UsCorreo'=>$this->input->post('correo')
    );
    $whereUser = array(
    'UsId'=> $this->input->post('idu'));
    $this->insertar_adm->actualizar("gen_usuarios",$datosUser,$whereUser);

    $data = array(
      'roll' => 'exito',
      'mensaje' => 'Usuario Modificado!'
    );
  }
    echo json_encode($data);
  }

  public function delUser($id=0)
  {
    $whereUser = array(
      'UsId'=> $id);
    $this->eliminar_adm->eliminar("gen_usuarios",$whereUser);    

    $data = array(
      'roll' => 'exito',
      'mensaje' => 'Usuario Eliminado!'
    );
    echo json_encode($data);
  }    

  public function cuenta()
  {

    $idUser=$this->input->post('id');
    $formName="formEditUser";
    $btnName="Modificar";  
    $miUsuario = $this->consultas_adm->consultaGral("gen_usuarios","UsId",$idUser,2);
      if(!$miUsuario){
          $miUsuario=array(
          'UsId'=>0,
          'UsNombre'=>'',
          'UsApellidos'=>'',
          'UsIdPerfil'=>'',
          'UsUsername'=>'',
          'UsPass'=>'',
          'UsRut'=>'',
          'UsRutEmpresa'=>'',
          'UsCorreo'=>'');
          $formName="formNewUser";
          $btnName="Agregar"; 
      }
      
    $op=$this->input->post('opcion');
    $perfil = $this->consultas_adm->getPerfil();
    $datos=array('perfil'=>$perfil,
                 'formName'=>$formName,
                 'btnName'=>$btnName,
                 'usuario'=>$miUsuario,
                'opcion'=>$op);                   

    $this->load->view('mantencion/_formUser',$datos);



  }

}