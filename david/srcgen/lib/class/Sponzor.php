<?php

require_once 'InterfaceFieldValidator.php';
require_once 'inputFormaterCustom.php';


class Sponzor implements JsonSerializable, FieldValidator {

  protected  $_idSponzor=0;
  protected  $_naziv="";
  protected  $_kompanija="";

  function __construct() {
  }

  function get_idSponzor(){
    return $this->_idSponzor;
  }
  function set_idSponzor($_idSponzor){
    $this->_idSponzor = $_idSponzor;
  }

  function get_naziv(){
    return $this->_naziv;
  }
  function set_naziv($_naziv){
    $this->_naziv = $_naziv;
  }

  function get_kompanija(){
    return $this->_kompanija;
  }
  function set_kompanija($_kompanija){
    $this->_kompanija = $_kompanija;
  }


  public function jsonSerialize() {
    return (object) get_object_vars($this);
  }

  public function jsonDeserialize($data) {
    $this->_idSponzor = $data->{'_idSponzor'};
    $this->_naziv = $data->{'_naziv'};
    $this->_kompanija = $data->{'_kompanija'};
  }

  public function ValidateFields()
  {
      $this->_idSponzor = formatInput($this->_idSponzor);
      $this->_naziv = formatInput($this->_naziv);
      $this->_kompanija = formatInput($this->_kompanija);

  }

}

?>