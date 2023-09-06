<?php 

class Usuario {
        
		private $idusuario ;
		private $nomusuario;
		private $password;
		private $apellidos;
		private $nombres;
		private $email;
        private $estado;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function lista(){
			$sql = "SELECT * FROM usuarios";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM usuarios where idusuario=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_usuario($nom,$pass,$apell,$nombr,$email,$estado){
			// para generar hash de password
            $usu_pass_hash = password_hash($pass, PASSWORD_DEFAULT);

			$sql = "insert into usuarios(nomusuario,password,apellidos,nombres,email,estado)
                    values ('$nom','$usu_pass_hash','$apell','$nombr','$email','$estado')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	

		public function cambiar_password($id,$pass){
           // genera hash de password
            $usu_pass_hash = password_hash($pass, PASSWORD_DEFAULT);
			$sql = "update usuarios set
			password ='$usu_pass_hash'	
			where idusuario=$id";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	

		public function modifica_usuario($id,$nom,$apell,$nombr,$email,$estado){
            // genera hash de password
            // $usu_pass_hash = password_hash($pass, PASSWORD_DEFAULT);

			$sql = "update usuarios set
			nomusuario='$nom',
			apellidos='$apell',
            nombres='$nombr',
            email='$email',
            estado='$estado'
			where idusuario='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM usuarios WHERE idusuario=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

        public function lee_datos($usu){
			$sql = "SELECT * FROM usuarios where nomusuario='$usu'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}

			
	}
	
	

?>	