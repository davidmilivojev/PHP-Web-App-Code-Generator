<?php
require_once '../lib/class/Exampletwo.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/CommonDatabaseMethods.php';

class ExampletwoDAL extends DAL implements CommonDatabaseMethods
{
  function __construct() {

      parent::__construct();
  }


  function searchtextwo($search){


    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $exampletwoResults = array();

    foreach ($results as $k)
    {
        $exampletwoResult = new Exampletwo();
        $exampletwoResult->set_idExampletwo($k->idExampletwo);
        $exampletwoResult->set_nametwo($k->Nametwo);
        $exampletwoResult->set_datetwo($k->Datetwo);
        $exampletwoResult->set_descriptiontwo($k->Descriptiontwo);

        $exampletwoResults[] = $exampletwoResult;
    }

    return $exampletwoResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Exampletwo(Nametwo, Datetwo, Descriptiontwo) VALUES(:nametwo, :datetwo, :descriptiontwo)";
    $params = array(":nametwo"=>$object->get_nametwo(), ":datetwo"=>$object->get_datetwo(), ":descriptiontwo"=>$object->get_descriptiontwo());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function DeleteOne($object){

    $object->ValidateFields();
    $sqlQuery="DELETE FROM Exampletwo WHERE idExampletwo = :idExampletwo";
    $params = array(":idExampletwo"=>$object->get_idExampletwo());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function EditOne($object){
    $object->ValidateFields();

    $sqlQuery="UPDATE Exampletwo SET Nametwo = :nametwo, Datetwo = :datetwo, Descriptiontwo = :descriptiontwo WHERE idExampletwo = :idExampletwo";
    $params = array(":idExampletwo"=>$object->get_idExampletwo(),":nametwo"=>$object->get_nametwo(),":datetwo"=>$object->get_datetwo(),":descriptiontwo"=>$object->get_descriptiontwo());
    return $this->IzvrsiUpit($sqlQuery, $params);
  }

  public function GetAll(){

    $sqlQuery="SELECT * FROM Exampletwo";
    $params = array();
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $exampletwoResults = array();

    foreach ($results as $k)
    {
        $exampletwoResult = new Exampletwo();
        $exampletwoResult->set_idExampletwo($k->idExampletwo);
        $exampletwoResult->set_nametwo($k->Nametwo);
        $exampletwoResult->set_datetwo($k->Datetwo);
        $exampletwoResult->set_descriptiontwo($k->Descriptiontwo);

        $exampletwoResults[] = $exampletwoResult;
    }

    return $exampletwoResults;

  }

  public function GetOne($object){

    $exampletwoResult = new Exampletwo();
    $exampletwoResult->set_idExampletwo($object);


    $sqlQuery="SELECT * FROM Exampletwo WHERE idExampletwo = :idExampletwo";
    $params = array(":idExampletwo" =>$exampletwoResult->get_idExampletwo());

    $results = $this->IzvrsiUpit($sqlQuery,$params);
    if (count($results)>0)
    {
        $k = $results[0];

        $exampletwoResult = new Exampletwo();
        $exampletwoResult->set_idExampletwo($k->idExampletwo);
        $exampletwoResult->set_nametwo($k->Nametwo);
        $exampletwoResult->set_datetwo($k->Datetwo);
        $exampletwoResult->set_descriptiontwo($k->Descriptiontwo);

    }

    return $exampletwoResult;

  }

}

?>