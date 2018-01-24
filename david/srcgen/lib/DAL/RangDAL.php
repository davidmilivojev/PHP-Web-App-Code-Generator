<?php
require_once '../lib/class/Rang.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/SponzorDAL.php';
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
        $rangResult->set_nazivrang($k->Nazivrang);

        $sponzorDAL = new SponzorDAL();
        $rangResult->set_sponzor($sponzorDAL->GetOne($k->Sponzor));
        $rangResults[] = $rangResult;
    }

    return $rangResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Rang(Nazivrang, Sponzor) VALUES(:nazivrang, :sponzor)";
    $params = array(":nazivrang"=>$object->get_nazivrang(), ":sponzor"=>$object->get_sponzor()->get_idSponzor());
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

    $sqlQuery="UPDATE Rang SET Nazivrang = :nazivrang, Sponzor = :sponzor WHERE idRang = :idRang";
    $params = array(":idRang"=>$object->get_idRang(),":nazivrang"=>$object->get_nazivrang(),":sponzor"=>$object->get_sponzor()->get_idSponzor());
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
        $rangResult->set_nazivrang($k->Nazivrang);

        $sponzorDAL = new SponzorDAL();
        $rangResult->set_sponzor($sponzorDAL->GetOne($k->Sponzor));
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
        $rangResult->set_nazivrang($k->Nazivrang);

        $sponzorDAL = new SponzorDAL();
        $rangResult->set_sponzor($sponzorDAL->GetOne($k->Sponzor));
    }

    return $rangResult;

  }

}

?>