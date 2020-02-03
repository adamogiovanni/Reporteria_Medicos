<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

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
          $empresas = $this->consultas_adm->consultaGral("gen_empresas","EmpEstado",1,1);
          
          $usuarios = $this->consultas_adm->getUsers();
          $modulos = $this->consultas_adm->getmenu_modulos();
          $modulos_uno = $this->consultas_adm->getmenu_modulos_uno();
          $dataSidebar['modulos']=$modulos;
          $dataSidebar['modulos_uno']=$modulos_uno;
          $dataSidebar['usuario']=$user;
          
          $dataSidebar['usuarios']=$usuarios;
          $dataSidebar['empresas']=$empresas;
            $this->load->view('header',$dataSidebar);
            $this->load->view('mantencion/empresa');
            $this->load->view('footer');

        
        }
    
        
  }
  
  public function addHtml($idEmp=0)
  {

    $formName="formEditEmp";
    $btnName="Modificar";  
    $miEmpresa = $this->consultas_adm->consultaGral("gen_empresas","EmpId",$idEmp,2);
    $IdCom=$miEmpresa['EmpComuna'];
    $comuna = $this->consultas_adm->consultaGral("gen_comunas","ComId",$IdCom,2);
      if(!$miEmpresa){
          $miEmpresa=array(
          'EmpId'=>0,
          'EmpNombre'=>'',
          'EmpRut'=>'',
          'EmpGiro'=>'',
          'EmpDireccion'=>'',
          'EmpComuna'=>0,
          'EmpContacto'=>'',
          'EmpTelefono'=>'',
        );
          $formName="formNewEmp";
          $btnName="Agregar"; 
      }
      $region = $this->consultas_adm->getGeneral('gen_regiones');
    $datos=array('empresa'=>$miEmpresa,
                  'comuna'=>$comuna,
                 'formName'=>$formName,
                 'btnName'=>$btnName,
                'region'=>$region);                   

    $this->load->view('mantencion/_formEmpresa',$datos);



  }

  public function selectComuna(){
    $tipo=$this->input->post('idRegion');
    if($tipo){

    $modelo = $this->consultas_adm->consultaGral("gen_comunas","ComRegionId",$tipo,1);
    echo "<option value=''>Comuna</opction>";
    foreach($modelo as $mod){
    
    echo "<option value='".$mod['ComId']."'>".$mod['ComNombre']."</opction>";
    
    }
    
    }
    
    }

    public function addEmpresa()
    {
      $rut=$this->input->post('txtRut');
      $empresa = $this->consultas->select($rut);
      if($empresa){
        $data = array(
          'roll' => 'error',
          'mensaje' => 'Ya existe empresa con ese Rut'
        );  
      }else{

        $idUsuario = $this->session->userdata('UsId');
        $datosEmpresa= array(
         'EmpNombre'=>$this->input->post('txtNombre'),
         'EmpRut'=>$this->input->post('txtRut'),
         'EmpGiro'=>$this->input->post('txtGiro'),
         'EmpDireccion'=>$this->input->post('txtDireccion'),
         'EmpComuna'=>$this->input->post('txtComuna'),
         'EmpContacto'=>$this->input->post('txtContacto'),
         'EmpTelefono'=>$this->input->post('txtTelefono'),
         'EmpIdUsuarioCrea'=>$idUsuario,
         'IdUserMod'=>$idUsuario
         );
         
         $this->insertar_adm->insertar("gen_empresas",$datosEmpresa);

         $data = array(
          'roll' => 'exito',
          'mensaje' => 'Empresa Creada!'
        );  
      }

        echo json_encode($data);
      
    }
    public function ModEmpresa()
    {
      $idUsuario = $this->session->userdata('UsId');
      $datosEmp = array(
        'EmpNombre'=>$this->input->post('txtNombre'),
        'EmpRut'=>$this->input->post('txtRut'),
        'EmpGiro'=>$this->input->post('txtGiro'),
        'EmpDireccion'=>$this->input->post('txtDireccion'),
        'EmpComuna'=>$this->input->post('txtComuna'),
        'EmpContacto'=>$this->input->post('txtContacto'),
        'EmpTelefono'=>$this->input->post('txtTelefono'),
        'IdUserMod'=>$idUsuario
      );
      $whereEmp = array(
      'EmpId'=> $this->input->post('idE'));
      $this->insertar_adm->actualizar("gen_empresas",$datosEmp,$whereEmp);
      
    }


    public function desactivaEmp($idEmp)
    {
      
      $usuarios = $this->consultas_adm->consultaGral("gen_usuarios","UsIdEmpresa",$idEmp,1);
      $sucursales = $this->consultas_adm->consultaGral("proy_sucursal","SucIdEmpresa",$idEmp,1);

      if(!empty($usuarios) or !empty($sucursales)){
        $data = array(
          'roll' => 'error',
          'mensaje' => 'Existen Usuarios o Sucursales para esta empresa'
        );  

      }else{

        $idUsuario = $this->session->userdata('UsId');
        $datosEmp = array(
          'EmpEstado'=>0,
          'IdUserMod'=>$idUsuario,
        );
        $whereEmp = array(
        'EmpId'=> $idEmp);
        $this->insertar_adm->actualizar("gen_empresas",$datosEmp,$whereEmp);
        $data = array(
          'roll' => 'exito'
        );  
      }

    
    
      echo json_encode($data);
  
    }  

  public function valida_rut($rut)
{
    $rut = preg_replace('/[^k0-9]/i', '', $rut);
    $dv  = substr($rut, -1);
    $numero = substr($rut, 0, strlen($rut)-1);
    $i = 2;
    $suma = 0;
    foreach(array_reverse(str_split($numero)) as $v)
    {
        if($i==8)
            $i = 2;
        $suma += $v * $i;
        ++$i;
    }
    $dvr = 11 - ($suma % 11);
    
    if($dvr == 11)
        $dvr = 0;
    if($dvr == 10)
        $dvr = 'K';
    if($dvr == strtoupper($dv))
        return true;
    else
        return false;
}

}