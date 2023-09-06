<?php

class Producto {
        
		private $idproducto;
		private $idproveedor;
		private $nomproducto;
		private $unimed;
		private $stock;
		private $preuni;
		private $cosuni;
		private $idcategoria;
		private $estado;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;

		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaprodu(){
			$sql = "SELECT * FROM productos as pro
			inner join proveedores as p
			on p.idproveedor=pro.idproveedor
			inner JOIN categorias as c
			on c.idcategoria=pro.idcategoria";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM productos	as pro
			inner join proveedores as p
			on p.idproveedor=pro.idproveedor
			inner JOIN categorias as c
			on c.idcategoria=pro.idcategoria
			 where idproducto=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_producto($idprov,$nom,$und,$can,$pre,$cos,$idcat,$estado){
			$sql = "insert into productos(idproveedor,nomproducto,unimed,stock, preuni,cosuni,idcategoria,estado) values ($idprov,'$nom','$und',$can,$pre,$cos,$idcat,'$estado')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_producto($id,$idprov,$nom,$und,$can,$pre,$cos,$idcat,$estado){
			$sql = "update productos set
			idproveedor=$idprov,
			nomproducto='$nom',
			unimed='$und',
			stock=$can, 
			preuni=$pre,
			cosuni=$cos,
			idcategoria=$idcat,
			estado='$estado'
			where idproducto='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM productos WHERE idProducto=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function set_idproducto($id){
			$this->idproducto = $id;
		}
		public function set_nomproducto($nom){
			$this->nomproducto = $nom;
		}
		public function set_unimed($und){
			$this->unimed = $und;
		}
		public function set_stock($cant){
			$this->stock = $cant;
		}
		public function set_preuni($pre){
			$this->preuni = $pre;
		}
		public function set_cosuni($cos){
			$this->cosuni = $cos;
		}

		public function get_idproducto(){
			return $this->idproducto;
		}
		public function get_nomproducto(){
			return $this->nomproducto;
		}
		public function get_unimed(){
			return $this->unimed;
		}
		public function get_stock(){
			return $this->stock;
		}
		public function get_preuni(){
			return $this->preuni;
		}
		public function get_cosuni(){
			return $this->cosuni;
		}


	
	}
	
	

?>	