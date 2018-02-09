<?php

require_once 'InterfaceFieldValidator.php';
require_once 'inputFormaterCustom.php';


class Exampletwo implements JsonSerializable, FieldValidator {

  protected  $_idExampletwo=0;
  protected  $_nametwo="";
  protected  $_datetwo="";
  protected  $_descriptiontwo="";

  function __construct() {
  }

  function get_idExampletwo(){
    return $this->_idExampletwo;
  }
  function set_idExampletwo($_idExampletwo){
    $this->_idExampletwo = $_idExampletwo;
  }

  function get_nametwo(){
    return $this->_nametwo;
  }
  function set_nametwo($_nametwo){
    $this->_nametwo = $_nametwo;
  }

  function get_datetwo(){
    return $this->_datetwo;
  }
  function set_datetwo($_datetwo){
    $this->_datetwo = $_datetwo;
  }

  function get_descriptiontwo(){
    return $this->_descriptiontwo;
  }
  function set_descriptiontwo($_descriptiontwo){
    $this->_descriptiontwo = $_descriptiontwo;
  }


  public function jsonSerialize() {
    return (object) get_object_vars($this);
  }

  public function jsonDeserialize($data) {
    $this->_idExampletwo = $data->{'_idExampletwo'};
    $this->_nametwo = $data->{'_nametwo'};
    $this->_datetwo = $data->{'_datetwo'};
    $this->_descriptiontwo = $data->{'_descriptiontwo'};
  }

  public function ValidateFields()
  {
      $this->_idExampletwo = formatInput($this->_idExampletwo);
      $this->_nametwo = formatInput($this->_nametwo);
      $this->_datetwo = formatInput($this->_datetwo);
      $this->_descriptiontwo = formatInput($this->_descriptiontwo);

  }

}

?>