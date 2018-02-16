<?php
include_once 'conexion/conexion.php';

class Request
{
    private $_params;
    private $conexion;

    public function __construct($params)
    {
        $this->_params = $params;
    }

    public function getPuntos()
    {
      //se crea la coneción con la base de datos
      $con = new Conexion();
      $conexion = $con->get_Conexion();

      //consulta sql
      $sql = "SELECT PUNTOSOBT, PUNTOSTRA FROM FREPUNTOSV WHERE CLIENTE IN(SELECT COD_CLIENTE FROM GEN_CLIENTE WHERE CEDULA=?)";

      //se prepara el statement con la sentencia previamente creada
      $stmt = $conexion->prepare($sql);

      if ($stmt) {
        //se realiza un execute y un fetch donde se obtienen los datos de la primera fila
        //que coincida con el usuario y la clave.
        //en el execute se agregan las variables por medio de un array.
        $stmt->execute(array($this->_params['cedula']));
        $result = $stmt->fetch();


        //se cierra la conexion
        $conexion = null;

        //se retorna el $result;
        echo "<script>console.log( 'Debug Objects: " . "result". "' );</script>";
        //return $result;
      }else{
        //si el statement da error, se retorna falso.
        echo "<script>console.log( 'Debug Objects: " . "falso". "' );</script>";
        return false;
      }

      //definición
      $request = new methods();
      $request->cedula = $this->_params['cedula'];
      $request->PuntosA = $result['PUNTOSOBT'];
      $request->PuntosB = $result['PUNTOSTRA'];

      //pass the user's username and password to authenticate the user
      $request->save($this->_params['cedula']);

      //return the request item in array format
      return $request->toArray();
    }

    public function setCompra()
    {
      //se crea la coneción con la base de datos
      $con = new Conexion();
      $conexion = $con->get_Conexion();

      //consulta sql
      $sql = "SELECT PUNTOSOBT, PUNTOSTRA FROM FREPUNTOSV WHERE CLIENTE IN(SELECT COD_CLIENTE FROM GEN_CLIENTE WHERE CEDULA=?)";

      //se prepara el statement con la sentencia previamente creada
      $stmt = $conexion->prepare($sql);

      if ($stmt) {
        //se realiza un execute y un fetch donde se obtienen los datos de la primera fila
        //que coincida con el usuario y la clave.
        //en el execute se agregan las variables por medio de un array.
        $stmt->execute(array($this->_params['cedula']));
        $result = $stmt->fetch();


        //se cierra la conexion
        $conexion = null;

        //se retorna el $result;
        echo "<script>console.log( 'Debug Objects: " . "result". "' );</script>";
        //return $result;
      }else{
        //si el statement da error, se retorna falso.
        echo "<script>console.log( 'Debug Objects: " . "falso". "' );</script>";
        return false;
      }

      //definición
      $request = new methods();
      $request->cedula = $this->_params['cedula'];
      $request->PuntosA = $result['PUNTOSOBT'];
      $request->PuntosB = $result['PUNTOSTRA'];

      //pass the user's username and password to authenticate the user
      $request->save($this->_params['cedula']);

      //return the request item in array format
      return $request->toArray();
    }

}
