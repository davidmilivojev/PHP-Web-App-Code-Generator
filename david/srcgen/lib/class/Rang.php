<?php
require_once 'Sponzor.php';

require_once 'InterfaceFieldValidator.php';
require_once 'inputFormaterCustom.php';


class Rang implements JsonSerializable, FieldValidator {

  protected  $_idRang=0;
  protected  $_nazivrang="";
  protected  $_sponzor;

  function __construct() {
  }

  function get_idRang(){
    return $this->_idRang;
  }
  function set_idRang($_idRang){
    $this->_idRang = $_idRang;
  }

  function get_nazivrang(){
    return $this->_nazivrang;
  }
  function set_nazivrang($_nazivrang){
    $this->_nazivrang = $_nazivrang;
  }

  function get_sponzor(){
    return $this->_sponzor;
  }
  function set_sponzor($_sponzor){
    $this->_sponzor = $_sponzor;
  }


  public function jsonSerialize() {
    return (object) get_object_vars($this);
  }

  public function jsonDeserialize($data) {
    $this->_idRang = $data->{'_idRang'};
    $this->_nazivrang = $data->{'_nazivrang'};
    $sponzor= new Sponzor();
    $sponzor->jsonDeserialize($data->{'_sponzor'});
    $this->_sponzor = $sponzor;
  }

  public function ValidateFields()
  {
      $this->_idRang = formatInput($this->_idRang);
      $this->_nazivrang = formatInput($this->_nazivrang);
      if ($this->_sponzor!=NULL) $this->_sponzor->ValidateFields();

  }

}

?>