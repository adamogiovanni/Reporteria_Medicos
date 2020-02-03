<?php

class Consultas_adm extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function consultaGral($tabla,$columna,$valor,$tipo){
    $query = $this->db->query("SELECT * FROM $tabla WHERE $columna='$valor'");
        if($query->num_rows()>0){
            switch ($tipo){
                case '1':
                    return $query->result_array();
                    break;
                case '2':
                    return $query->row_array();
                    break;
                case '3':
                    return $query->row();
                    break;
            }
        }
        else {
            return FALSE;
        }
    }
    
    
     public function getGeneral($tabla)
	{
            $sql = "SELECT *
			FROM $tabla";
			$query = $this->db->query($sql);
		    return $query->result_array();
	}
    
    function getmenu_modulos()
	{
			$tper=$this->session->userdata('tipoPerfil');
			$per=$this->session->userdata('UsIdPerfil');
			if($tper==3){
			$sql = "SELECT mdir.MastDirecId,mdir.MastDirecDescripcion FROM gen_masterdirecciones as mdir
			INNER JOIN gen_direcciones as dir on dir.DirIDMasterdirecciones=mdir.MastDirecId
			INNER JOIN gen_accesos as acc on acc.AccIdDireccion=dir.DirId 
			where mdir.MastDirecEstado=1 and acc.AccIdPerfil='$per'
			group by mdir.MastDirecId,mdir.MastDirecDescripcion";
			}else{
				$sql = "SELECT * FROM gen_masterdirecciones";
			}
			$query = $this->db->query($sql);
			return $query->result_array();
	}
	function getmenu_modulos_uno()
	{		$tper=$this->session->userdata('tipoPerfil');
			$per=$this->session->userdata('UsIdPerfil');
			if($tper==3){
				$sql = "SELECT dir.* FROM gen_direcciones as dir 
				INNER JOIN gen_accesos as acc on acc.AccIdDireccion=dir.DirId where AccIdPerfil='$per'";
			}else{
				$sql = "SELECT * FROM gen_direcciones";
			}
			
			$query = $this->db->query($sql);
			return $query->result_array();
	}
    public function getUsers($id=0)
	{  
		if($id!=0)
		{
			$sql = "SELECT us.*,per.PerId AS PerId,per.PerNombre as PerNombre FROM gen_usuarios AS us INNER JOIN gen_perfil AS per ON us.UsIdPerfil=per.PerId  WHERE us.UsId='$id'";
			$query = $this->db->query($sql);
			return $query->row_array();
        }
        else {
			$idEmp=$this->session->userdata('UsIdEmpresa');
            $sql = "SELECT us.*,per.PerNombre as PerNombre FROM gen_usuarios AS us INNER JOIN gen_perfil AS per ON us.UsIdPerfil=per.PerId where UsIdEmpresa='$idEmp'";
		$query = $this->db->query($sql);
        return $query->result_array();
        }
		
    }
    public function getPerfil($perfil=0)
	{
		
		$idEmp=$this->session->userdata('UsIdEmpresa');
		$tipoPerfil=$this->session->userdata('tipoPerfil');

		if($tipoPerfil==1)
		{
			$sql = "SELECT * FROM gen_perfil where PerIdEMpresa='$idEmp' and PerEstado=1";
		}elseif($tipoPerfil==2){
			$sql = "SELECT * FROM gen_perfil where PerIdEMpresa='$idEmp' and PerEstado=1 and PerIdTP!=1";
		}elseif($tipoPerfil==3){
			$sql = "SELECT * FROM gen_perfil where PerIdEMpresa='$idEmp' and PerEstado=1 and PerIdTP=3";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getTipoPerfil($Tperfil=0)
	{
		$tipoPerfil=$this->session->userdata('tipoPerfil');

		if($tipoPerfil==1)
		{
			$sql = "SELECT * FROM gen_tipoperfil where TPEstado=1";
		}elseif($tipoPerfil==2){
			$sql = "SELECT * FROM gen_tipoperfil where TPEstado=1 and TPId!=1";
		}elseif($tipoPerfil==3){
			$sql = "SELECT * FROM gen_tipoperfil where TPEstado=1 and TPId=3";
		}
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getAccesos($idPer=0)
	{
		$sql = "SELECT dir.DirIDMasterdirecciones,dir.DirId,dir.DirDescripcion,IF( EXISTS( SELECT * FROM gen_accesos as acc WHERE acc.AccIdDireccion=dir.DirId and acc.AccIdPerfil='$idPer' ), 1, 0) as opcion FROM gen_direcciones as dir";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getMasterDir()
	{
		$sql = "SELECT * FROM gen_masterdirecciones";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
}
?>