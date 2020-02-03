<?php

class Insertar_adm extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
    function insertar($tabla,$data)
	{
        $this->db->set('FechaCreacion', 'NOW()', FALSE);
        $this->db->set('FechaMod', 'NOW()', FALSE);
		return $this->db->insert($tabla,$data);
        return $this->db->insert_id();
	}
    function actualizar($tabla,$data,$where)
	{
		$this->db->set('FechaMod', 'NOW()', FALSE);
		return $this->db->update($tabla,$data,$where);
	}

	function opcionesPerfil($data,$per)
	{
	    $i=0;
    $emp=$this->session->userdata('UsIdEmpresa');
	    foreach ($data['engineer'] as $data) {
	         $info=array(
				'AccIdPerfil'=>$per,
				'AccIdEmpresa'=>$emp,
                'AccIdDireccion'=>$data['engineer']
             );
           $p=$emp;     
           $op=$data['engineer'];  
            $sql = "SELECT AccId FROM gen_accesos WHERE AccIdDireccion='$op' and AccIdPerfil='$per' and AccIdEmpresa='$emp'";
            $query = $this->db->query($sql);
            if($query->row_array() == 0) {
                $this->db->insert('gen_accesos',$info);
             $i++;
            } else {
            }    
	    }
	}


}
?>