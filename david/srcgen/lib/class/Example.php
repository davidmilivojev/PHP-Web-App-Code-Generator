<?php
require_once 'Exampletwo.php';

require_once 'InterfaceFieldValidator.php';
require_once 'inputFormaterCustom.php';


class Example implements JsonSerializable, FieldValidator {

  protected  $_idExample=0;
  protected  $_name="";
  protected  $_description="";
  protected  $_exampletwo;

  function __construct() {
  }

  function get_idExample(){
    return $this->_idExample;
  }
  function set_idExample($_idExample){
    $this->_idExample = $_idExample;
  }

  function get_name(){
    return $this->_name;
  }
  function set_name($_name){
    $this->_name = $_name;
  }

  function get_description(){
    return $this->_description;
  }
  function set_description($_description){
    $this->_description = $_description;
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
    $this->_idExample = $data->{'_idExample'};
    $this->_name = $data->{'_name'};
    $this->_description = $data->{'_description'};
    $exampletwo= new Exampletwo();
    $exampletwo->jsonDeserialize($data->{'_exampletwo'});
    $this->_exampletwo = $exampletwo;
  }

  public function ValidateFields()
  {
      $this->_idExample = formatInput($this->_idExample);
      $this->_name = formatInput($this->_name);
      $this->_description = formatInput($this->_description);
      if ($this->_exampletwo!=NULL) $this->_exampletwo->ValidateFields();

  }

}

?>