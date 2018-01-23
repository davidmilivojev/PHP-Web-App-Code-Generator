<?php
require_once 'Konferencija.php';

require_once 'InterfaceFieldValidator.php';
require_once 'inputFormaterCustom.php';


class Predavanje implements JsonSerializable, FieldValidator {

  protected  $_idPredavanje=0;
  protected  $_naziv="";
  protected  $_predavaci="";
  protected  $_pocetak="";
  protected  $_kraj="";
  protected  $_konferencija;

  function __construct() {
  }

  function get_idPredavanje(){
    return $this->_idPredavanje;
  }
  function set_idPredavanje($_idPredavanje){
    $this->_idPredavanje = $_idPredavanje;
  }

  function get_naziv(){
    return $this->_naziv;
  }
  function set_naziv($_naziv){
    $this->_naziv = $_naziv;
  }

  function get_predavaci(){
    return $this->_predavaci;
  }
  function set_predavaci($_predavaci){
    $this->_predavaci = $_predavaci;
  }

  function get_pocetak(){
    return $this->_pocetak;
  }
  function set_pocetak($_pocetak){
    $this->_pocetak = $_pocetak;
  }

  function get_kraj(){
    return $this->_kraj;
  }
  function set_kraj($_kraj){
    $this->_kraj = $_kraj;
  }

  function get_konferencija(){
    return $this->_konferencija;
  }
  function set_konferencija($_konferencija){
    $this->_konferencija = $_konferencija;
  }


  public function jsonSerialize() {
    return (object) get_object_vars($this);
  }

  public function jsonDeserialize($data) {
    $this->_idPredavanje = $data->{'_idPredavanje'};
    $this->_naziv = $data->{'_naziv'};
    $this->_predavaci = $data->{'_predavaci'};
    $this->_pocetak = $data->{'_pocetak'};
    $this->_kraj = $data->{'_kraj'};
    $konferencija= new Konferencija();
    $konferencija->jsonDeserialize($data->{'_konferencija'});
    $this->_konferencija = $konferencija;
  }

  public function ValidateFields()
  {
      $this->_idPredavanje = formatInput($this->_idPredavanje);
      $this->_naziv = formatInput($this->_naziv);
      $this->_predavaci = formatInput($this->_predavaci);
      $this->_pocetak = formatInput($this->_pocetak);
      $this->_kraj = formatInput($this->_kraj);
      if ($this->_konferencija!=NULL) $this->_konferencija->ValidateFields();

  }

}

?>