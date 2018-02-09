<?php
require_once '../lib/class/Example.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/ExampletwoDAL.php';
require_once '../lib/DAL/CommonDatabaseMethods.php';

class ExampleDAL extends DAL implements CommonDatabaseMethods
{
  function __construct() {

      parent::__construct();
  }


  function searchex($search){

    $tempExample = new Example();
    $tempExample->set_name($search);
    $tempExample->ValidateFields();

    $sqlQuery="SELECT * FROM Example WHERE Name LIKE :searchByExample";
    $params = array(":searchByExample"=>"%".$tempExample->get_name()."%");

    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $exampleResults = array();

    foreach ($results as $k)
    {
        $exampleResult = new Example();
        $exampleResult->set_idExample($k->idExample);
        $exampleResult->set_name($k->Name);
        $exampleResult->set_description($k->Description);

        $exampletwoDAL = new ExampletwoDAL();
        $exampleResult->set_exampletwo($exampletwoDAL->GetOne($k->Exampletwo));
        $exampleResults[] = $exampleResult;
    }

    return $exampleResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Example(Name, Description, Exampletwo) VALUES(:name, :description, :exampletwo)";
    $params = array(":name"=>$object->get_name(), ":description"=>$object->get_description(), ":exampletwo"=>$object->get_exampletwo()->get_idExampletwo());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function DeleteOne($object){

    $object->ValidateFields();
    $sqlQuery="DELETE FROM Example WHERE idExample = :idExample";
    $params = array(":idExample"=>$object->get_idExample());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function EditOne($object){
    $object->ValidateFields();

    $sqlQuery="UPDATE Example SET Name = :name, Description = :description, Exampletwo = :exampletwo WHERE idExample = :idExample";
    $params = array(":idExample"=>$object->get_idExample(),":name"=>$object->get_name(),":description"=>$object->get_description(),":exampletwo"=>$object->get_exampletwo()->get_idExampletwo());
    return $this->IzvrsiUpit($sqlQuery, $params);
  }

  public function GetAll(){

    $sqlQuery="SELECT * FROM Example";
    $params = array();
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $exampleResults = array();

    foreach ($results as $k)
    {
        $exampleResult = new Example();
        $exampleResult->set_idExample($k->idExample);
        $exampleResult->set_name($k->Name);
        $exampleResult->set_description($k->Description);

        $exampletwoDAL = new ExampletwoDAL();
        $exampleResult->set_exampletwo($exampletwoDAL->GetOne($k->Exampletwo));
        $exampleResults[] = $exampleResult;
    }

    return $exampleResults;

  }

  public function GetOne($object){

    $exampleResult = new Example();
    $exampleResult->set_idExample($object);


    $sqlQuery="SELECT * FROM Example WHERE idExample = :idExample";
    $params = array(":idExample" =>$exampleResult->get_idExample());

    $results = $this->IzvrsiUpit($sqlQuery,$params);
    if (count($results)>0)
    {
        $k = $results[0];

        $exampleResult = new Example();
        $exampleResult->set_idExample($k->idExample);
        $exampleResult->set_name($k->Name);
        $exampleResult->set_description($k->Description);

        $exampletwoDAL = new ExampletwoDAL();
        $exampleResult->set_exampletwo($exampletwoDAL->GetOne($k->Exampletwo));
    }

    return $exampleResult;

  }

}

?>