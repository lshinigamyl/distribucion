<?php
///CLASE PARA CONECTAR CON MYSQL.....////
//error_reporting(0);
class ConexionMySQL{

  private $conexion;
  private $total_consultas;

  public function __construct() {
     
      $this->conexion=mysqli_connect("localhost","root","","db_puntoventa")or die("No se pudo establecer una conexion con el servidor, consulte a Soporte...!");
      //mysqli_select_db("db_puntoventa",$this->conexion) or die("Ocurrio un problema al seleccionar la base de datos, consulte a Soporte...!");
   
  }


  public function consulta($consulta){
    error_reporting(0);
    $this->total_consultas++;
    $resultado = mysqli_query($this->conexion,$consulta);
    return $resultado;
  }

  public function buscar_array($consulta){
    error_reporting(0);
   return mysqli_fetch_array($consulta);
  }

  public function numero_de_registros($consulta){
    //error_reporting(0);
    $numero=mysqli_num_rows($consulta);
 
   return $numero;
  }

  public function getTotalConsultas(){
   return $this->total_consultas;
  }

  public function DesconectaServer(){
    error_reporting(0);
    mysqli_close($this->conexion);
  }

  }
?>