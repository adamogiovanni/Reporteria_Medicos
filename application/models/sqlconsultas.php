<?php

class Sqlconsultas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		 $this->BASE_DE_DATOS_LOCAL = $this->load->database('bdsql', TRUE);
	}

	//Modificada por Gio 01-02-2020 
	//Evita que entre a la primera condicion 
	public function prueba()
	{
		$UsRut = $this->session->userdata('UsRut');
		$UsIdPerfil = $this->session->userdata('UsIdPerfil');
		$r = substr($this->session->userdata('UsRut'), 0, 2);
		$c = strlen($this->session->userdata('UsRut'));
		if($UsIdPerfil==399 && $r>40 && $c=10)
		{
			$x='"';
			$a='"2-01-04-400"';

			$consulta = "SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'";
			$result = $this->db->query($consulta);
			$resultado="";
			foreach ($result->result() as $row)
			{
				$resultado = $resultado.",'".$row->UsRut."'";
			}
			$resultado = substr($resultado, 1); 
			//echo 'usurut'.$UsRut.'  resul'.$resultado ;
			$sql = "SELECT top 3000 t1.Empresa, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.DescripcionMovimiento AS Observacion,REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') AS Rut_Doctor,cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, 'Provisión' as NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante	FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '$a') AND (REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') in (".$resultado.")) ORDER BY  FechaComprobante DESC"; 
		}
        else if($UsIdPerfil==3 )
        {
			//echo 'el rut '.$UsRut ;
			$x='"';
			$a='"2-01-04-400"';
			$sql = "SELECT top 3000 t1.Empresa,cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.DescripcionMovimiento AS Observacion,REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') AS Rut_Doctor,	cargasoft_file_detalle.MontoHaberMonedaBase AS Valor,'Provisión' as NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '$a') AND (cargasoft_file_detalle.CodigoAuxiliar= '$UsRut') ORDER BY  FechaComprobante DESC"; 
        }
        else
        {
			$x='"';
			$a='"2-01-04-400"';
            $sql ="SELECT top 900 t1.Empresa, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.DescripcionMovimiento AS Observacion, REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') AS Rut_Doctor,cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, 'Provisión' as NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '$a') ORDER BY  FechaComprobante DESC";
        }
		
		$query = $this->BASE_DE_DATOS_LOCAL->query($sql);
		return $query->result_array();
	}

	public function prueba2($min,$max)
		{
			     $UsRut = $this->session->userdata('UsRut');
		      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
		      $r = substr($this->session->userdata('UsRut'), 0, 2);
		      $c = strlen($this->session->userdata('UsRut'));
		      if($UsIdPerfil==3 && $r>40 && $c=10){
				$x='"';
				$a='"2-01-04-400"';

				$consulta = "
				SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'
				";
				$result = $this->db->query($consulta);
				$resultado="";
				foreach ($result->result() as $row)
				{
						$resultado = $resultado.",'".$row->UsRut."'";
				}
				$resultado = substr($resultado, 1); 

	           $sql = "
			   SELECT top 3000 t1.Empresa,t1.IdProceso AS ID, cargasoft_file_detalle.NroDocumento AS Caso,
			   cargasoft_file_detalle.DescripcionMovimiento AS Observacion,
			   REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') AS Rut_Doctor,
				cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, 
				'Proceso de pago' as NombreEstado, 
				t2.NroComprobante,
				concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante 
				FROM cargasoft_file_resumen AS t1 
				INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
				INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado 
				LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso 
				WHERE (t1.NombreArchivo LIKE 'NCMH_1%') 
				and (cargasoft_file_detalle.CuentaContable = '$a') 
				AND (REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') in (".$resultado.")) AND concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) <'$max' ";
	        }
	        else if($UsIdPerfil==3 ){
				$x='"';
				$a='"2-01-04-400"';
	           $sql = "
			   SELECT top 3000 t1.Empresa,t1.IdProceso AS ID,
				cargasoft_file_detalle.NroDocumento AS Caso,
				cargasoft_file_detalle.DescripcionMovimiento AS Observacion,
				REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') AS Rut_Doctor,
				 cargasoft_file_detalle.MontoHaberMonedaBase AS Valor,
				 'Proceso de pago' as NombreEstado, t2.NroComprobante,
				  concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante 
				  FROM cargasoft_file_resumen AS t1 
				  INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
				  INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado 
				  LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso 
				  WHERE (t1.NombreArchivo LIKE 'NCMH_1%') 
				  and (cargasoft_file_detalle.CuentaContable = '$a') 
				  AND (REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') = '$UsRut') AND concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) <'$max' ";
	        }else{
				$a = '"2-01-04-400"';
				$x='"';
	           $sql = "
			   SELECT top 3000 t1.Empresa,t1.IdProceso AS ID, 
				cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.DescripcionMovimiento AS Observacion,
				REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') AS Rut_Doctor, 
				cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, 
				'Proceso de pago' as NombreEstado, t2.NroComprobante,
				concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante 
				FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
				INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado 
				LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso 
				WHERE (t1.NombreArchivo LIKE 'NCMH_1%') 
				and (cargasoft_file_detalle.CuentaContable = '$a')
				AND concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) <'$max' 
			";
	        }


	        
	        $query = $this->BASE_DE_DATOS_LOCAL->query($sql);
			return $query->result_array();
	}
	
	//Evita que entre a la primera condicion 
	public function devengo1()
	{
	    
		$UsRut = $this->session->userdata('UsRut');
		$UsIdPerfil = $this->session->userdata('UsIdPerfil');
		$r = substr($this->session->userdata('UsRut'), 0, 2);
		$c = strlen($this->session->userdata('UsRut'));
		//echo 'ENTRO EN DEVENGO 1';
		$consulta = "
		SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'
		";
		$result = $this->db->query($consulta);
		$resultado="";
		foreach ($result->result() as $row)
		{
				$resultado = $resultado.",'".$row->UsRut."'";
		}
		$resultado = substr($resultado, 1); 


		if($UsIdPerfil==399 && $r>40 && $c=10)
		{
			$a = '"2-01-06-300"';
			$sql = " SELECT cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion,   t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContableFROM            cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE  (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar in (".$resultado.")) AND cargasoft_file_detalle.CuentaContable = '".$a."') ";
		}
		else if($UsIdPerfil==3)
		{
			$a = '"2-01-06-300"';
			$sql = "SELECT  cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion,   t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable FROM cargasoft_file_resumen AS t1 INNER JOIN
			cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
			cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut') AND (cargasoft_file_detalle.CuentaContable = '".$a."') ";
		}
		else
		{
			$a = '"2-01-06-300"';
			$sql = "SELECT  cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion, t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable FROM cargasoft_file_resumen AS t1 INNER JOIN		cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN	cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN		cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_2%')  AND (cargasoft_file_detalle.CuentaContable = '".$a."') ";
		}  

		$query = $this->BASE_DE_DATOS_LOCAL->query($sql);
		return $query->result_array();
    }

	public function devengo2($min,$max){
				    
			$UsRut = $this->session->userdata('UsRut');
			$UsIdPerfil = $this->session->userdata('UsIdPerfil');
			$r = substr($this->session->userdata('UsRut'), 0, 2);
			$c = strlen($this->session->userdata('UsRut'));
			echo 'ENTRO EN DEVENGO 2';
			if($UsIdPerfil==3 && $r>40 && $c=10){

				$consulta = "
				SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'
				";
				$result = $this->db->query($consulta);
				$resultado="";
				foreach ($result->result() as $row)
				{
						$resultado = $resultado.",'".$row->UsRut."'";
				}
				$resultado = substr($resultado, 1); 
				$a='"2-01-06-300"';
							$sql = "
							SELECT  '15',       cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion, t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
						   cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
						   t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
				FROM            cargasoft_file_resumen AS t1 INNER JOIN
								   cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
								   cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
								   cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
				WHERE        (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar in (".$resultado.")) AND (cargasoft_file_detalle.CuentaContable = '$a') 
				AND concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2))<'$max'";
				  }
				  else if($UsIdPerfil==3){
					$a='"2-01-06-300"';
									$sql = "SELECT  '16',       cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion, t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
								   cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
								   t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
				FROM            cargasoft_file_resumen AS t1 INNER JOIN
								   cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
								   cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
								   cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
				WHERE        (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut') AND (cargasoft_file_detalle.CuentaContable = '$a') 
				AND concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) <'$max'";
				  }else{

					$a='"2-01-06-300"';
									 $sql = "
									 SELECT  '17',     cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion,   t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
								   cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
								   t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
				FROM            cargasoft_file_resumen AS t1 INNER JOIN
								   cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
								   cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
								   cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
				WHERE        (t1.NombreArchivo LIKE 'NCMH_2%')  AND (cargasoft_file_detalle.CuentaContable = '$a') 
				AND concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) <'$max'";
				  }
					  
					  

				  $query = $this->BASE_DE_DATOS_LOCAL->query($sql);
				  return $query->result_array();
	}


	public function pago1()
	{		
		$UsRut = $this->session->userdata('UsRut');
		$UsIdPerfil = $this->session->userdata('UsIdPerfil');
		$r = substr($this->session->userdata('UsRut'), 0, 2);
		$c = strlen($this->session->userdata('UsRut'));
		
		if($UsIdPerfil==399 && $r>40 && $c=10)
		{
			$consulta = "SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'";
			$result = $this->db->query($consulta);
			$resultado="";
			foreach ($result->result() as $row)
			{
					$resultado = $resultado.",'".$row->UsRut."'";
			}
			$resultado = substr($resultado, 1); 

			$sql = "SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago	FROM    cargasoft_file_resumen AS t1 INNER JOIN			cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso where t2.RutCliente in (".$resultado.")";	  
	  	}
	  	else if($UsIdPerfil==3)
		{
			$sql = "SELECT  t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 	t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago	FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso where t2.RutCliente='$UsRut'";		  
		}
		else
		{
			$sql = "SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago FROM  cargasoft_file_resumen AS t1 INNER JOIN		cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso";
		}  	  
        $query = $this->BASE_DE_DATOS_LOCAL->query($sql);
		return $query->result_array();
	}
    //#1780938  desconociomiento.

	public function pago2($min,$max){
		    

        
		$UsRut = $this->session->userdata('UsRut');
		$UsIdPerfil = $this->session->userdata('UsIdPerfil');
		$r = substr($this->session->userdata('UsRut'), 0, 2);
		$c = strlen($this->session->userdata('UsRut'));
		if($UsIdPerfil==3 && $r>40 && $c=10){
			$consulta = "
			SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'
			";
			$result = $this->db->query($consulta);
			$resultado="";
			foreach ($result->result() as $row)
			{
					$resultado = $resultado.",'".$row->UsRut."'";
			}
			$resultado = substr($resultado, 1); 

						$sql = "	 SELECT  '22', t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
						t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
					   FROM  cargasoft_file_resumen AS t1 INNER JOIN
					   cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso 
					   where concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' 
					   and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2))<'$max'  and t2.RutCliente in (".$resultado.")  ";
	  }
	  else if($UsIdPerfil==3 ){
						$sql = " SELECT  '23', t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
						t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
					   FROM  cargasoft_file_resumen AS t1 INNER JOIN
					   cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso 
					   where concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' 
					   and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2))<'$max'  and t2.RutCliente='$UsRut'  ";
	  }else{
						 $sql = "	
						 SELECT '24',  t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
		 t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
		FROM  cargasoft_file_resumen AS t1 INNER JOIN
		cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso 
		where concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) >'$min' 
		and concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2))<'$max'   
		  ";
  

  
	  }
		  


	  $query = $this->BASE_DE_DATOS_LOCAL->query($sql);
		return $query->result_array();
  }
   
  	//Modificado Gio 01-02-2020
	public function graficoLinea($Rut)
	{ 	    
		$UsRut2 = $this->session->userdata('UsRut');
		$UsIdPerfil = $this->session->userdata('UsIdPerfil');
		$r = substr($this->session->userdata('UsRut'), 0, 2);
		$c = strlen($this->session->userdata('UsRut'));
		// if($UsIdPerfil==3 && $r>40 && $c=10){
		if($UsIdPerfil==399 && $r>40  )
		{

			$consulta = " SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'";
			$result = $this->db->query($consulta);
			//#$resultado="";
			foreach ($result->result() as $row)
			{
				$resultado = $resultado.",'".$row->UsRut."'";
			}
			$resultado = substr($resultado, 1); 
		           
			$a='"2-01-04-400"';
			$sql = "SELECT * FROM (SELECT top 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha	FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '$a') and  (cargasoft_file_detalle.CodigoAuxiliar in (".$resultado.")) GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) ORDER BY Fecha  desc ) FEE order by Fecha asc";
		}     

    	elseif($UsIdPerfil==3 )
    	{
			$a='"2-01-04-400"';
			echo 'entro aqui 13 el ru :'.$Rut . 'el otro es: '.$UsRut2;
			$sql = "SELECT * FROM (SELECT top 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto, 
			concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '$a') and  (cargasoft_file_detalle.codigoAuxiliar = '$UsRut') GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) ORDER BY Fecha  desc ) FE order by Fecha asc";        
        }       
        elseif(!empty($Rut))
        {
			
			$a='"2-01-04-400"';
			$b="mon_mon_val_hab";
			$c='"';
			$sql = "SELECT * FROM (SELECT top 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and cargasoft_file_detalle.CuentaContable = '$a') AND cargasoft_file_detalle.MontoHaberMonedaBase NOT IN ('$b') and  (REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$c','') = '$Rut') GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) ORDER BY Fecha  desc ) FE order by Fecha asc";
        }        
		else
		{
			
			$a='"2-01-04-400"';
			echo 'entro aqui admin 14 el ru :'.$Rut;
			$b='mon_mon_val_hab';
    		$sql = "SELECT * FROM (SELECT TOP 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto 
			,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso	WHERE (t1.NombreArchivo LIKE 'NCMH_1%') AND (cargasoft_file_detalle.CuentaContable = '$a') AND MontoHaberMonedaBase NOT IN ('$b') GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) ORDER BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) DESC ) FE order by Fecha asc";
        }

		$query = $this->BASE_DE_DATOS_LOCAL->query($sql);
		return $query->result_array();
	}
	//Modificado Gio 01-02-2020
	public function graficoBarra($Rut=0)
	{
		$UsRut = $this->session->userdata('UsRut');
		$UsIdPerfil = $this->session->userdata('UsIdPerfil');
		$r = substr($this->session->userdata('UsRut'), 0, 2);
		$c = strlen($this->session->userdata('UsRut'));
		
		if($UsIdPerfil==399 && $r>40 && $c=10)
		{
			$a='"2-01-06-300"';
			$consulta = "
			SELECT   UsRut FROM   gen_usuarios where UsRutEmpresa='$UsRut'";
			$result = $this->db->query($consulta);
			$resultado="";
			foreach ($result->result() as $row)
			{
				$resultado = $resultado.",'".$row->UsRut."'";
			}
			$resultado = substr($resultado, 1); 

			$sql = "SELECT * FROM (select TOP 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '$a') and (cargasoft_file_detalle.CodigoAuxiliar in (".$resultado.")) GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF ORDER BY Fecha ASC";    
		} 
        elseif($UsIdPerfil==3)
        {
			$a='"2-01-06-300"';
			$sql = "SELECT * FROM (select TOP 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '$a') and (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut') GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF	ORDER BY Fecha ASC";    
            
        }
        elseif(!empty($Rut))
        {
			$a='"2-01-06-300"';
			$x='"';
			$sql = "SELECT * FROM (select TOP 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '$a') and (REPLACE(cargasoft_file_detalle.CodigoAuxiliar,'$x','') = '$Rut')	GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF ORDER BY Fecha ASC";                
        }
        
        else
        {
			$a='"2-01-06-300"';
			
			$sql = "
			SELECT * FROM (select top 30 sum(CONVERT(INT,cargasoft_file_detalle.MontoHaberMonedaBase)) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '$a') GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF	ORDER BY Fecha ASC";
        }
	
		$query = $this->BASE_DE_DATOS_LOCAL->query($sql);
		return $query->result_array();
	}
}
?>




