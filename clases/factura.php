<?php

class  Factura {
        
		private $idfactura;
		private $fecha;
		private $idcliente;
		private $idusuario;
		private $fechareg;
        private $idcondicion;
		private $valorventa;
        private $igv;
		private $con;
		
		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listacli(){
			$sql = "SELECT * FROM clientes";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function ventas_dia($fecha){
			$sql = "SELECT * FROM facturas as fac
			inner  join  clientes as cli
			on fac.idcliente=cli.idcliente
			inner join condicionventa as condi
			on condi.idcondicion=fac.idcondicion
			where fecha='$fecha'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function ventas_fecha($fechainicio,$fechafin){
			$sql = "SELECT * FROM facturas as fac
			inner  join  clientes as cli
			on fac.idcliente=cli.idcliente
			inner join condicionventa as condi
			on condi.idcondicion=fac.idcondicion
			where fecha BETWEEN '$fechainicio' and '$fechafin'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function ventas_cliente($idcliente){
			$sql = "SELECT * FROM facturas as fac
			inner  join  usuarios as usu
			on fac.idusuario=usu.idusuario
			inner join condicionventa as condi
			on condi.idcondicion=fac.idcondicion
            where idcliente=$idcliente";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function ventas_producto($idproducto){
			$sql = "select * from facturas as fac
			inner JOIN detallefactura as detal
			on fac.idfactura=detal.idfactura
			inner JOIN clientes as cli 
			on cli.idcliente=fac.idcliente
			where idproducto=$idproducto";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function ranking_ventas(){
			$sql = "select  * from facturas as fac
			inner JOIN clientes as cli 
			on cli.idcliente=fac.idcliente
			inner JOIN usuarios as usu 
			on usu.idusuario=fac.idusuario
			order by valorventa desc";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function stock_productos(){
			$sql = "select idproducto,
			nomproducto,
			stock as cant_compras,
			(select SUM(cant) from detallefactura as det
			 WHERE det.idproducto=p.idproducto
			GROUP by idproducto
			) as cant_vendidas,
			stock - (select SUM(cant) from detallefactura as det
			 WHERE det.idproducto=p.idproducto
			GROUP by idproducto
			) as stock,
			unimed
			
			from productos as p;";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
        public function consulta($id){
			$sql = "SELECT * FROM clientes where idCliente=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_factura($fecha,$idcliente,$idusuario,$fechareg,$idcondicion,$valorventa,$igv){

			$sql = "INSERT INTO facturas(fecha, idcliente, idusuario, fechareg, idcondicion, valorventa, igv) values ('$fecha',$idcliente,$idusuario,'$fechareg',$idcondicion,$valorventa,$igv)";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				$id_factura = mysqli_insert_id($this->con);
				$_SESSION['id_factura']=$id_factura;
				return true;
			}else{
				return false;
			}

		}	
		public function agrega_detalle($idfactura,$idproducto,$cant,$cosuni){

			$sql = "INSERT INTO detallefactura (idfactura,idproducto,cant,cosuni) VALUES ($idfactura,$idproducto,$cant,$cosuni)";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_cliente($id,$nom,$ruc,$dir,$tel,$email){
			$sql = "update clientes set
			nombrecliente='$nom',
			ruccliente='$ruc',
			dircliente=$dir, 
			telcliente=$tel ,
			emailcliente='$email'
			where idcliente='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM clientes WHERE idCliente=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		

	
	}
	
	

?>	