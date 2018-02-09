<?php
require_once 'Exampletwo.php';

require_once 'InterfaceFieldValidator.php';
require_once 'inputFormaterCustom.php';


class Examplethree implements JsonSerializable, FieldValidator {

  protected  $_idtr=0;
  protected  $_namethree="";
  protected  $_datethree="";
  protected  $_dateendthree="";
  protected  $_exampletwo;

  function __construct() {
  }

  function get_idtr(){
    return $this->_idtr;
  }
  function set_idtr($_idtr){
    $this->_idtr = $_idtr;
  }

  function get_namethree(){
    return $this->_namethree;
  }
  function set_namethree($_namethree){
    $this->_namethree = $_namethree;
  }

  function get_datethree(){
    return $this->_datethree;
  }
  function set_datethree($_datethree){
    $this->_datethree = $_datethree;
  }

  function get_dateendthree(){
    return $this->_dateendthree;
  }
  function set_dateendthree($_dateendthree){
    $this->_dateendthree = $_dateendthree;
  }

  function get_exampletwo(){
    return $this->_exampletwo;
  }
  function set_exampletwo($_exampletwo){
    $this->_exampletwo = $_exampletwo;
  }


  public function jsonSerialize() {
    return (object) get_object_vars($this);
  }

  public function jsonDeserialize($data) {
    $this->_idtr = $data->{'_idtr'};
    $this->_namethree = $data->{'_namethree'};
    $this->_datethree = $data->{'_datethree'};
    $this->_dateendthree = $data->{'_dateendthree'};
    $exampletwo= new Exampletwo();
    $exampletwo->jsonDeserialize($data->{'_exampletwo'});
    $this->_exampletwo = $exampletwo;
  }

  public function ValidateFields()
  {
      $this->_idtr = formatInput($this->_idtr);
      $this->_namethree = formatInput($this->_namethree);
      $this->_datethree = formatInput($this->_datethree);
      $this->_dateendthree = formatInput($this->_dateendthree);
      if ($this->_exampletwo!=NULL) $this->_exampletwo->ValidateFields();

  }

}

?>