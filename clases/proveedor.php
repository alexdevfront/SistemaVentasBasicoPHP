<?php

class Proveedor {
        
		private $idproveedor ;
		private $nombreproveedor;
		private $rucproveedor;
		private $dirproveedor;
		private $telproveedor;
		private $emailproveedor;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaproveedor(){
			$sql = "SELECT * FROM proveedores";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM proveedores where idproveedor=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_proveedor($nom,$ruc,$dir,$tel,$email){
			$sql = "insert into proveedores(nombreproveedor,rucproveedor,dirproveedor,telproveedor,emailproveedor) values ('$nom','$ruc','$dir','$tel','$email')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_proveedor($id,$nom,$ruc,$dir,$tel,$email){
			$sql = "update proveedores set
			nombreproveedor='$nom',
			rucproveedor='$ruc',
			dirproveedor='$dir', 
			telproveedor='$tel',
			emailproveedor='$email' 
			where idproveedor='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM proveedores WHERE idproveedor=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		



	
	}
	
	

?>	