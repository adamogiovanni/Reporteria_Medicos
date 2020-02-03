<?php

class Eliminar_proy extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
   
    function eliminar($tabla,$where)
    {
        $this->db->delete($tabla,$where);
    }

    function EliminarImagenes($data,$idSuc)
	{
        
        $i=0;
            foreach ($data['engineer'] as $data) {
                 $info=array(
                    'numero'=>$data['engineer']
                 );
                    $this->db->insert('prueba',$info);
                 $i++;
               
            }
	}



}
?>