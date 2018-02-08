<?php
class methods
{
  public $cedula;
  public $PuntosA;
  public $PuntosB;

  public function save($cedula)
  {
      if( is_dir(DATA_PATH."/{$cedula}") === false ) {
          mkdir(DATA_PATH."/{$cedula}");
      }

      //get the array version of this todo item
      $methods_array = $this->toArray();

      //save the serialized array version into a file
      $success = file_put_contents(DATA_PATH."/{$cedula}/{$this->cedula}.txt", serialize($methods_array));

      //if saving was not successful, throw an exception
      if( $success === false ) {
          throw new Exception('Failed to save');
      }

      //return the array version
      return $methods_array;
  }

  public function toArray()
  {
      //return an array version of the method
      return array(
          'cedula' => $this->cedula,
          'PUNTOSOBT' => $this->PuntosA,
          'PUNTOSTRA' =>$this->PuntosB
      );
  }
}
