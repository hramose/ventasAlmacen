<?php 

	class clientes{

		public function agregaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$idusuario=$_SESSION['iduser'];

			$sql="INSERT into clientes (id_usuario,
										nombre,
										apellido,
										direccion,
										email,
										telefono,
										rfc)
							values ('$idusuario',
									'$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]')";
			return mysqli_query($conexion,$sql);	
		}

		public function obtenDatosCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_cliente, 
							nombre,
							apellido,
							direccion,
							email,
							telefono,
							rfc 
				from clientes";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
					'id_cliente' => $ver[0], 
					'nombre' => $ver[1],
					'apellido' => $ver[2],
					'direccion' => $ver[3],
					'email' => $ver[4],
					'telefono' => $ver[5],
					'rfc' => $ver[6]
						);
			return $datos;
		}
	}

 ?>