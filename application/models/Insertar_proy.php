<?php
class Insertar_proy extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}


	function subir($tabla,$data)
    {  
        $this->db->set('SucFechaCrea', 'NOW()', FALSE);
        $this->db->set('SucFechaMod', 'NOW()', FALSE);
		return $this->db->insert($tabla,$data);
        return $this->db->insert_id();
    }
    function subirImagenes($tabla,$data)
    {  
		return $this->db->insert($tabla,$data);
        return $this->db->insert_id();
    }
    function actualizarProy($SucId,$cantidad)
	{   
        $this->db->set('SucCantidadIMG', 'SucCantidadIMG+'.$cantidad, FALSE);
		$this->db->set('sucFechaMod', 'NOW()', FALSE);
        $this->db->where('SucId', $SucId);
        $this->db->update('proy_sucursal');
    }

    function actualizarProyDel($SucId,$cantidad)
	{   
        $this->db->set('SucCantidadIMG', 'SucCantidadIMG-'.$cantidad, FALSE);
		$this->db->set('sucFechaMod', 'NOW()', FALSE);
        $this->db->where('SucId', $SucId);
        $this->db->update('proy_sucursal');
    }
    
    function actualizar($tabla,$data,$where)
	{
		$this->db->set('SucFechaMod', 'NOW()', FALSE);
		return $this->db->update($tabla,$data,$where);
    }
    
    function insertar($tabla,$data)
	{
		return $this->db->insert($tabla,$data);
        return $this->db->insert_id();
	}

}
?>