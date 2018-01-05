<?php
require_once '../lib/class/Rang.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/CommonDatabaseMethods.php';

class RangDAL extends DAL implements CommonDatabaseMethods
{
  function __construct() {

      parent::__construct();
  }



  function RangPretaraga($search){
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $rangResults = array();

    foreach ($results as $k)
    {
        $rangResult = new Rang();
        $rangResult->set_idRang($k->idRang);
        $rangResult->set_nazivRang($k->Nazivrang);

        $rangResults[] = $rangResult;
    }

    return $rangResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Rang(Nazivrang) VALUES(:nazivRang)";
    $params = array(":nazivRang"=>$object->get_nazivRang());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function DeleteOne($object){

    $object->ValidateFields();
    $sqlQuery="DELETE FROM Rang WHERE idRang = :idRang";
    $params = array(":idRang"=>$object->get_idRang());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function EditOne($object){
    $object->ValidateFields();

    $sqlQuery="UPDATE Rang SET Nazivrang = :nazivRang WHERE idRang = :idRang";
    $params = array(":idRang"=>$object->get_idRang(),":nazivRang"=>$object->get_nazivRang());
    return $this->IzvrsiUpit($sqlQuery, $params);
  }

  public function GetAll(){

    $sqlQuery="SELECT * FROM Rang";
    $params = array();
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $rangResults = array();

    foreach ($results as $k)
    {
        $rangResult = new Rang();
        $rangResult->set_idRang($k->idRang);
        $rangResult->set_nazivRang($k->Nazivrang);

        $rangResults[] = $rangResult;
    }

    return $rangResults;

  }

  public function GetOne($object){

    $rangResult = new Rang();
    $rangResult->set_idRang($object);

    $sqlQuery="SELECT * FROM Rang WHERE idRang = :idRang";
    $params = array(":idRang" =>$rangResult->get_idRang());

    $results = $this->IzvrsiUpit($sqlQuery,$params);
    if (count($results)>0)
    {
        $k = $results[0];

        $rangResult = new Rang();
        $rangResult->set_idRang($k->idRang);
        $rangResult->set_nazivRang($k->Nazivrang);

    }

    return $rangResult;

  }

}

?>