<?php

class Consultas extends CI_Model
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
	

	
	function select($rut)
    {
		$sql = "SELECT * FROM gen_empresas where EmpRut='$rut' and EmpEstado=1";
		$query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	function selectPerfil($per,$idEmpresa,$idP)
    {
		$sql = "SELECT * FROM gen_perfil where 	PerNombre='$per' and PerId not in ($idP) and PerIdEMpresa =$idEmpresa";
		$query = $this->db->query($sql);
	    return $query->num_rows();

	}
	function selectSucursal($suc,$idEmpresa,$idS)
    {
		$sql = "SELECT * FROM proy_sucursal where 	SucNombreSucursal='$suc' and SucId not in ($idS) and SucIdEmpresa =$idEmpresa";
		$query = $this->db->query($sql);
	    return $query->num_rows();

	}

	function selectUsuarioUSR($usr,$idEmpresa,$idu)
    {
		$sql = "SELECT * FROM gen_usuarios where UsUsername='$usr' and UsId not in ($idu) and UsIdEmpresa =$idEmpresa";
		$query = $this->db->query($sql);
	    return $query->num_rows();

	}
	
	function selectUsuario($rut,$idEmpresa,$idu)
    {
		$sql = "SELECT * FROM gen_usuarios where UsRut='$rut' and  UsId not in ($idu) and UsIdEmpresa =$idEmpresa";
		$query = $this->db->query($sql);
	    return $query->num_rows();
    }

	function isUser($user, $pass)
	{
		$sql = "SELECT * FROM gen_usuarios WHERE UsUsername ='$user'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$sql = "SELECT * FROM gen_usuarios WHERE UsUsername ='$user' and UsPass = '$pass'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0) {
				return '1';
			} else {
				return 'Contraseña incorrecta';
			}
		} else {
			return 'Usuario no encontrado';
		}
	}

	function findIdUser($user, $pass)
	{
		$sql = "SELECT us.*,tp.TPId FROM gen_usuarios as us INNER JOIN gen_perfil as per on us.UsIdPerfil=per.PerId INNER JOIN gen_tipoperfil as tp on tp.TPId=per.PerIdTP WHERE us.UsUsername ='$user' AND us.UsPass='$pass'";
		$query = $this->db->query($sql);
		return $query->row();
	}
 
	
    public function getUsers($id=0)
	{
		if($id!=0)
		{
			$sql = "SELECT * FROM gen_usuarios AS us WHERE us.UsId='$id'";
			$query = $this->db->query($sql);
			return $query->row_array();
		}
		$sql = "SELECT *
			FROM gen_usuarios ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
    public function getEmpresa($empresa)
	{
		
		$sql = "SELECT * FROM gen_empresas WHERE EmpId='$empresa'";
		$query = $this->db->query($sql);
		return $query->row_array();
    
	}

	public function getCantidadImgMasiva($img)
	{
	
	$this->db->from('proy_imagenes');
	$this->db->where('ImgDireccion',$img);
	return $this->db->count_all_results(); 
	}


	public function ConsultasWidget($idUser)
	{
		$Emp = $this->session->userdata('UsIdEmpresa');
		

        $sqlsuc = "SELECT COUNT(SucId) as sucursales FROM proy_sucursal WHERE SucIdEmpresa='$Emp'";
		$querysuc = $this->db->query($sqlsuc);
		$suc=$querysuc->row();
		$suc=$suc->sucursales;       
           
		$sqlimg = "SELECT COUNT(suc.SucId) as imagenes FROM proy_sucursal suc INNER JOIN proy_imagenes img on suc.SucId=img.ImgIdSucursal WHERE suc.SucIdEmpresa='$Emp'";
		$queryimg = $this->db->query($sqlimg);
		$img=$queryimg->row();
		$img=$img->imagenes; 

		$sqlus = "SELECT COUNT(UsId) as usuarios FROM gen_usuarios WHERE UsIdEmpresa='$Emp'";
		$queryus = $this->db->query($sqlus);
		$us=$queryus->row();
		$us=$us->usuarios; 

		
        		
        
		$valores=array(
			'sucursales'=>$suc,
			'imagenes'=>$img,
			'usuarios'=>$us
		);
		return $valores;
           
      
	}
	
		public function graficoLinea($Rut=0)
	{
	    
	    
	      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	      if($UsIdPerfil==3 && $r>40 && $c=10){
            	$sql = "           SELECT * FROM (SELECT sum(cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, 
concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha 
FROM cargasoft_file_resumen AS t1 
INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado 
LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '2-01-04-400') and  (cargasoft_file_detalle.CodigoAuxiliar in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut'))
GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) 
ORDER BY `Fecha`  desc LIMIT 30) FE order by Fecha asc";
            
            
        }
        else if($UsIdPerfil==3 ){
            	$sql = "           SELECT * FROM (SELECT sum(cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, 
concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha 
FROM cargasoft_file_resumen AS t1 
INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado 
LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '2-01-04-400') and  (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut')
GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) 
ORDER BY `Fecha`  desc LIMIT 30) FE order by Fecha asc";
            
            
        }       else if(!empty($Rut)){
            	$sql = "           SELECT * FROM (SELECT sum(cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, 
concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha 
FROM cargasoft_file_resumen AS t1 
INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado 
LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '2-01-04-400') and  (cargasoft_file_detalle.CodigoAuxiliar = '$Rut')
GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) 
ORDER BY `Fecha`  desc LIMIT 30) FE order by Fecha asc";
            
 
        }
        
        else{
            		$sql = "SELECT * FROM (SELECT sum(cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, 
concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha 
FROM cargasoft_file_resumen AS t1 
INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado 
LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '2-01-04-400')
GROUP BY concat(SUBSTRING(t2.FechaComprobante, 1, 4),'/',SUBSTRING(t2.FechaComprobante, 5, 2),'/',SUBSTRING(t2.FechaComprobante, 7, 2)) 
ORDER BY `Fecha`  desc LIMIT 30) FE order by Fecha asc";
        }

		$query = $this->db->query($sql);
		return $query->result_array();
	}

		public function graficoBarra($Rut=0)
	{
	
	
		      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	     if($UsIdPerfil==3 && $r>40 && $c=10){

                    		$sql = "SELECT * FROM (select sum( cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 
            		INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
            		INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado 
            		LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso 
            		WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') and (cargasoft_file_detalle.CodigoAuxiliar in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut'))
            		GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF 
            		ORDER BY Fecha ASC";    
            
        } 
        else if($UsIdPerfil==3){

                    		$sql = "SELECT * FROM (select sum( cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 
            		INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
            		INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado 
            		LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso 
            		WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') and (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut')
            		GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF 
            		ORDER BY Fecha ASC";    
            
        }else if(!empty($Rut)){
    
                  		$sql = "SELECT * FROM (select sum( cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 
            		INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
            		INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado 
            		LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso 
            		WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') and (cargasoft_file_detalle.CodigoAuxiliar = '$Rut')
            		GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF 
            		ORDER BY Fecha ASC";      
            
        }
        
        
        else{
            		$sql = "SELECT * FROM (select sum( cargasoft_file_detalle.MontoHaberMonedaBase) AS monto, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as Fecha FROM cargasoft_file_resumen AS t1 
            		INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso 
            		INNER JOIN cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado 
            		LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso 
            		WHERE (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') 
            		GROUP by concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) order by Fecha Desc) FF 
            		ORDER BY Fecha ASc";
        }
	
	
	
	
		$query = $this->db->query($sql);
		return $query->result_array();
	}

			public function grafico()
	{
		$sql = "select   CONCAT (MONTH(FechaProceso),'-',YEAR(FechaProceso))  AS Fecha ,SUM(cast(MontoDocumento as int)) as monto from CargaSoft_File_ComprobantePagoDevengo GROUP BY YEAR(FechaProceso), MONTH(FechaProceso)";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

    public function consultaRutDoctor(){
   
	$sql = " SELECT RutCliente FROM cargasoft_file_comprobantepagodevengo GROUP by RutCliente";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

 
     	public function prueba()
	{
	      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	      if($UsIdPerfil==3 && $r>40 && $c=10){
           $sql = "SELECT t1.Empresa,t1.IdProceso AS ID, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.DescripcionMovimiento AS Observacion,cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, cargasoft_file_estados.NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '2-01-04-400') AND (cargasoft_file_detalle.CodigoAuxiliar in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut'))"; 
        }
        else if($UsIdPerfil==3 ){
           $sql = "SELECT t1.Empresa,t1.IdProceso AS ID, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.DescripcionMovimiento AS Observacion,cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, cargasoft_file_estados.NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '2-01-04-400') AND (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut')"; 
        }else{
            $sql = "SELECT t1.Empresa,t1.IdProceso AS ID, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.DescripcionMovimiento AS Observacion,cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, cargasoft_file_estados.NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') and (cargasoft_file_detalle.CuentaContable = '2-01-04-400')";
        }
		
        $query = $this->db->query($sql);
		return $query->result_array();
	}
   



   	public function prueba2($min,$max)
	{
	    


	      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	      if($UsIdPerfil==3 && $r>40 && $c=10){
          $sql = "SELECT t1.Empresa,t1.IdProceso AS ID, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, cargasoft_file_estados.NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante 
        FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') 
        and (cargasoft_file_detalle.CuentaContable = '2-01-04-400') AND (cargasoft_file_detalle.CodigoAuxiliar in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut')) AND CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max' ";
        }
        else if($UsIdPerfil==3 ){
          $sql = "SELECT t1.Empresa,t1.IdProceso AS ID, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, cargasoft_file_estados.NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante 
        FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') 
        and (cargasoft_file_detalle.CuentaContable = '2-01-04-400') AND (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut') AND CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max' ";
        }else{
           $sql = "SELECT t1.Empresa,t1.IdProceso AS ID, cargasoft_file_detalle.NroDocumento AS Caso,cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor, cargasoft_file_estados.NombreEstado, t2.NroComprobante,concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante 
        FROM cargasoft_file_resumen AS t1 INNER JOIN cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN cargasoft_file_estados ON t1.CodigoEstado = cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso WHERE (t1.NombreArchivo LIKE 'NCMH_1%') 
        and (cargasoft_file_detalle.CuentaContable = '2-01-04-400')  AND CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max' ";
        }


        
        $query = $this->db->query($sql);
		return $query->result_array();
	}

	public function pago1(){
	    
	    

	      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	      if($UsIdPerfil==3 && $r>40 && $c=10){
          				$sql = "            SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
                         t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso where t2.RutCliente in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut')";

            
        }
        else if($UsIdPerfil==3){
          				$sql = "            SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
                         t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso where t2.RutCliente='$UsRut'";

            
        }else{
           	$sql = "SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
                         t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso ";
        }
	    
	    


        $query = $this->db->query($sql);
		return $query->result_array();
	}


		public function pago2($min,$max){
		    

        
	      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	      if($UsIdPerfil==3 && $r>40 && $c=10){
          				$sql = "	SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
    t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
FROM            cargasoft_file_resumen AS t1 INNER JOIN
   cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso where CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' 
	and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max' and t2.RutCliente in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut')  ";
        }
        else if($UsIdPerfil==3 ){
          				$sql = "	SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
    t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
FROM            cargasoft_file_resumen AS t1 INNER JOIN
   cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso where CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' 
	and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max' and t2.RutCliente='$UsRut'  ";
        }else{
           				$sql = "	SELECT   t1.IdProceso AS Id, t1.Empresa, t1.NombreArchivo AS Archivo, t1.FechaProceso AS Fecha_Proceso, t2.Correlativo, t2.RutCliente AS Rut, t2.NroDocumento AS Nro_Doc_Cancelado, 
    t2.MontoDocumento AS Monto_Pagado, t2.NroComprobante AS Nro_Comprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, t2.FechaProceso AS Fecha_de_Proceso_Pago
FROM            cargasoft_file_resumen AS t1 INNER JOIN
   cargasoft_file_comprobantepagodevengo AS t2 ON t1.IdProceso = t2.IdProceso where CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' 
	and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max'   ";
	
 
	
	
	
	
        }
		    


        $query = $this->db->query($sql);
		return $query->result_array();
	}
   
   
	public function devengo1(){
	    
	      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	      if($UsIdPerfil==3 && $r>40 && $c=10){
          				$sql = "SELECT     cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion,   t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
                         cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
                         t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
                         cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
                         cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE        (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut')) AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') ";
        }
        else if($UsIdPerfil==3){
          				$sql = "SELECT     cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion,   t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
                         cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
                         t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
                         cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
                         cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE        (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut') AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') ";
        }else{
           				$sql = "SELECT       cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion, t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
                         cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
                         t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
                         cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
                         cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE        (t1.NombreArchivo LIKE 'NCMH_2%')  AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') ";
        }
	    



        $query = $this->db->query($sql);
		return $query->result_array();
	}


		public function devengo2($min,$max){
		    
	      $UsRut = $this->session->userdata('UsRut');
	      $UsIdPerfil = $this->session->userdata('UsIdPerfil');
	      $r = substr($this->session->userdata('UsRut'), 0, 2);
	      $c = strlen($this->session->userdata('UsRut'));
	      if($UsIdPerfil==3 && $r>40 && $c=10){
          				$sql = "SELECT         cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion, t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
                         cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
                         t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
                         cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
                         cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE        (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar in (SELECT UsRut FROM gen_usuarios where UsRutEmpresa='$UsRut')) AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') 
AND CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max'";
        }
        else if($UsIdPerfil==3){
          				$sql = "SELECT         cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion, t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
                         cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
                         t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
                         cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
                         cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE        (t1.NombreArchivo LIKE 'NCMH_2%') AND (cargasoft_file_detalle.CodigoAuxiliar = '$UsRut') AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') 
AND CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max'";
        }else{
           				$sql = "SELECT       cargasoft_file_detalle.Monto2DetalleLibro AS ValorRetencion,   t1.IdProceso AS ID, cargasoft_file_detalle.TipoDocumento, cargasoft_file_detalle.NroDocumento AS Boleta, cargasoft_file_detalle.MontoHaberMonedaBase AS Valor_Neto, 
                         cargasoft_file_detalle.DescripcionMovimiento AS Observacion, cargasoft_file_detalle.CodigoAuxiliar AS Rut_Doctor, t1.CodigoEstado, cargasoft_file_estados.NombreEstado, t1.Empresa, t1.NombreArchivo, 
                         t1.FechaProceso, t2.NroComprobante, concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) as FechaComprobante, cargasoft_file_detalle.CuentaContable
FROM            cargasoft_file_resumen AS t1 INNER JOIN
                         cargasoft_file_comprobantecarga AS t2 ON t1.IdProceso = t2.IdProceso INNER JOIN
                         cargasoft_file_estados ON t1.CodigoEstado =cargasoft_file_estados.CodigoEstado LEFT OUTER JOIN
                         cargasoft_file_detalle ON t1.IdProceso = cargasoft_file_detalle.IdProceso
WHERE        (t1.NombreArchivo LIKE 'NCMH_2%')  AND (cargasoft_file_detalle.CuentaContable = '2-01-06-300') 
AND CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)>'$min' and CAST(concat(SUBSTRING(t2.FechaComprobante, 1, 4),'-',SUBSTRING(t2.FechaComprobante, 5, 2),'-',SUBSTRING(t2.FechaComprobante, 7, 2)) AS DATE)<'$max'";
        }
		    
		    

        $query = $this->db->query($sql);
		return $query->result_array();
	}

    
}
?>