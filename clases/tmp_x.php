<?php

class Tmp {
        
		private $nro;
		private $codigo;
		private $descripcion;
		private $unidad;
		private $cantidad;
		private $punit;
		private $importe;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function lista(){
			$sql = "SELECT * FROM tmp_x";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

	
		public function agrega_tmp($codigo,$descripcion,$unidad,$cantidad,$punit,$importe){
			$sql = "insert into tmp_x(codigo,descripcion,unidad,cantidad,punit,importe) values ($codigo,'$descripcion','$unidad',$cantidad,$punit,$importe)";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar(){
			$sql = "DELETE FROM tmp_x";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function subtotal(){
			$sql = "select sum(importe) as subtotal from tmp_x";
			$res2 = mysqli_query($this->con, $sql);
			$row = mysqli_fetch_assoc($res2);
			$sum = $row['subtotal'];
			$res="20.50";
			return $sum;
		}



	
	}
	
	

?>	