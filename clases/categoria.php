<?php

class Categoria {
        
		private $idcategoria;
		private $nomcategoria;
		private $con;
		
		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listacat(){
			$sql = "SELECT * FROM categorias";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM categorias where idcategoria=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_categoria($nomcategoria){
			$sql = "insert into categorias(nomcategoria) values ('$nomcategoria')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_categoria($id,$nom){
			$sql = "update categorias set
			nomcategoria='$nom'
			where idcategoria='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM categorias WHERE idcategoria=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		

	
	}
	
	

?>	