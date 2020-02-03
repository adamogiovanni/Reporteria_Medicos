<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Principal extends CI_Controller {

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
      $consultasWitget=$this->consultas->ConsultasWidget($idUser);
      $data=array_merge($consultasWitget);

      $modulos = $this->consultas_adm->getmenu_modulos();
      $modulos_uno = $this->consultas_adm->getmenu_modulos_uno();
      $dataSidebar['modulos']=$modulos;
      $dataSidebar['modulos_uno']=$modulos_uno;
      $dataSidebar['usuario']=$user;
       $this->load->view('header',$dataSidebar);
       $this->load->view('principal',$data);
       $this->load->view('footer');
    }
    
	}

public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url(), 'refresh');
  }

  public function contacto()
  {
    $formName="formContacto";
    $btnName="Enviar";  
    $datos=array('formName'=>$formName,
                 'btnName'=>$btnName);        
    $this->load->view('_formContacto',$datos);
  }

  public function enviaMail()
  {

    $data = array(); 
  $UsuarioCorreo = $this->session->userdata('UsCorreo');

  $this->form_validation->set_rules('asunto', 'asunto', 'trim|required|max_length[10]');

 
    $config = Array(
      'protocol' => 'smtp', 
      'smtp_host' => 'mail.sutv.cl', 
      'smtp_port' => 26, 
      'smtp_user' => 'contacto@sutv.cl', 
      'smtp_pass' => 'Santi14..', 
      'mailtype' => 'html', 
      'charset' => 'iso-8859-1' 
     ); 

   
  

    if ($this->form_validation->run() == FALSE)
{
  $data = array(
    'roll' => 'error'
  );  
}
else
{
  $this->load->library('email'); 

  $this->email->initialize($config); 

  $this->email->from('contacto@sutv.cl', 'SUTV'); 
  $this->email->cc($UsuarioCorreo);
  $this->email->to('djaramontenegro@gmail.com'); 

  $this->email->subject($this->input->post('asunto')); 
  $this->email->message($this->input->post('mensaje')); 

  $this->email->send(); 

  $data = array(
    'roll' => 'exito'
  );  
}

  echo json_encode($data);

  }




} 

?>