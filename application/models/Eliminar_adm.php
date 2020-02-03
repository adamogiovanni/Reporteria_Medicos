<?php

class Eliminar_adm extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
   
    function eliminar($tabla,$where)
    {
        return $this->db->delete($tabla,$where);
    }
}
?>