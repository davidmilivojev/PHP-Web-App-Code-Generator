<?php
require_once '../lib/class/Examplethree.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/ExampletwoDAL.php';
require_once '../lib/DAL/CommonDatabaseMethods.php';

class ExamplethreeDAL extends DAL implements CommonDatabaseMethods
{
  function __construct() {

      parent::__construct();
  }


  function searchtextr($search){


    $sqlQuery="SELECT * FROM Examplethree WHERE Exampletwo = :Exampletwo ORDER BY Dateendthree asc";
    $params = array(":Exampletwo"=>$search);

    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $examplethreeResults = array();

    foreach ($results as $k)
    {
        $examplethreeResult = new Examplethree();
        $examplethreeResult->set_idtr($k->idtr);
        $examplethreeResult->set_namethree($k->Namethree);
        $examplethreeResult->set_datethree($k->Datethree);
        $examplethreeResult->set_dateendthree($k->Dateendthree);

        $exampletwoDAL = new ExampletwoDAL();
        $examplethreeResult->set_exampletwo($exampletwoDAL->GetOne($k->Exampletwo));
        $examplethreeResults[] = $examplethreeResult;
    }

    return $examplethreeResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Examplethree(Namethree, Datethree, Dateendthree, Exampletwo) VALUES(:namethree, :datethree, :dateendthree, :exampletwo)";
    $params = array(":namethree"=>$object->get_namethree(), ":datethree"=>$object->get_datethree(), ":dateendthree"=>$object->get_dateendthree(), ":exampletwo"=>$object->get_exampletwo()->get_idExampletwo());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function DeleteOne($object){

    $object->ValidateFields();
    $sqlQuery="DELETE FROM Examplethree WHERE idtr = :idtr";
    $params = array(":idtr"=>$object->get_idtr());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function EditOne($object){
    $object->ValidateFields();

    $sqlQuery="UPDATE Examplethree SET Namethree = :namethree, Datethree = :datethree, Dateendthree = :dateendthree, Exampletwo = :exampletwo WHERE idtr = :idtr";
    $params = array(":idtr"=>$object->get_idtr(),":namethree"=>$object->get_namethree(),":datethree"=>$object->get_datethree(),":dateendthree"=>$object->get_dateendthree(),":exampletwo"=>$object->get_exampletwo()->get_idExampletwo());
    return $this->IzvrsiUpit($sqlQuery, $params);
  }

  public function GetAll(){

    $sqlQuery="SELECT * FROM Examplethree";
    $params = array();
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $examplethreeResults = array();

    foreach ($results as $k)
    {
        $examplethreeResult = new Examplethree();
        $examplethreeResult->set_idtr($k->idtr);
        $examplethreeResult->set_namethree($k->Namethree);
        $examplethreeResult->set_datethree($k->Datethree);
        $examplethreeResult->set_dateendthree($k->Dateendthree);

        $exampletwoDAL = new ExampletwoDAL();
        $examplethreeResult->set_exampletwo($exampletwoDAL->GetOne($k->Exampletwo));
        $examplethreeResults[] = $examplethreeResult;
    }

    return $examplethreeResults;

  }

  public function GetOne($object){

    $examplethreeResult = new Examplethree();
    $examplethreeResult->set_idtr($object);


    $sqlQuery="SELECT * FROM Examplethree WHERE idtr = :idtr";
    $params = array(":idtr" =>$examplethreeResult->get_idtr());

    $results = $this->IzvrsiUpit($sqlQuery,$params);
    if (count($results)>0)
    {
        $k = $results[0];

        $examplethreeResult = new Examplethree();
        $examplethreeResult->set_idtr($k->idtr);
        $examplethreeResult->set_namethree($k->Namethree);
        $examplethreeResult->set_datethree($k->Datethree);
        $examplethreeResult->set_dateendthree($k->Dateendthree);

        $exampletwoDAL = new ExampletwoDAL();
        $examplethreeResult->set_exampletwo($exampletwoDAL->GetOne($k->Exampletwo));
    }

    return $examplethreeResult;

  }

}

?>