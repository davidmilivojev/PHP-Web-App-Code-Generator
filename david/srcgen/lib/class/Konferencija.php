<?php
require_once 'Rang.php';
require_once 'Sponzor.php';

require_once 'InterfaceFieldValidator.php';
require_once 'inputFormaterCustom.php';


class Konferencija implements JsonSerializable, FieldValidator {

  protected  $_idKonferencija=0;
  protected  $_naziv="";
  protected  $_opis="";
  protected  $_rang;
  protected  $_sponzor;

  function __construct() {
  }

  function get_idKonferencija(){
    return $this->_idKonferencija;
  }
  function set_idKonferencija($_idKonferencija){
    $this->_idKonferencija = $_idKonferencija;
  }

  function get_naziv(){
    return $this->_naziv;
  }
  function set_naziv($_naziv){
    $this->_naziv = $_naziv;
  }

  function get_opis(){
    return $this->_opis;
  }
  function set_opis($_opis){
    $this->_opis = $_opis;
  }

  function get_rang(){
    return $this->_rang;
  }
  function set_rang($_rang){
    $this->_rang = $_rang;
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
    $this->_idKonferencija = $data->{'_idKonferencija'};
    $this->_naziv = $data->{'_naziv'};
    $this->_opis = $data->{'_opis'};
    $rang= new Rang();
    $rang->jsonDeserialize($data->{'_rang'});
    $this->_rang = $rang;
    $sponzor= new Sponzor();
    $sponzor->jsonDeserialize($data->{'_sponzor'});
    $this->_sponzor = $sponzor;
  }

  public function ValidateFields()
  {
      $this->_idKonferencija = formatInput($this->_idKonferencija);
      $this->_naziv = formatInput($this->_naziv);
      $this->_opis = formatInput($this->_opis);
      if ($this->_rang!=NULL) $this->_rang->ValidateFields();
      if ($this->_sponzor!=NULL) $this->_sponzor->ValidateFields();

  }

}

?>