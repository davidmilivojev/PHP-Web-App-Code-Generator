<?php
require_once '../lib/class/Sponzor.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/CommonDatabaseMethods.php';

class SponzorDAL extends DAL implements CommonDatabaseMethods
{
  function __construct() {

      parent::__construct();
  }


  function SponzorPretaraga($search){


    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $sponzorResults = array();

    foreach ($results as $k)
    {
        $sponzorResult = new Sponzor();
        $sponzorResult->set_idSponzor($k->idSponzor);
        $sponzorResult->set_naziv($k->Naziv);
        $sponzorResult->set_kompanija($k->Kompanija);

        $sponzorResults[] = $sponzorResult;
    }

    return $sponzorResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Sponzor(Naziv, Kompanija) VALUES(:naziv, :kompanija)";
    $params = array(":naziv"=>$object->get_naziv(), ":kompanija"=>$object->get_kompanija());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function DeleteOne($object){

    $object->ValidateFields();
    $sqlQuery="DELETE FROM Sponzor WHERE idSponzor = :idSponzor";
    $params = array(":idSponzor"=>$object->get_idSponzor());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function EditOne($object){
    $object->ValidateFields();

    $sqlQuery="UPDATE Sponzor SET Naziv = :naziv, Kompanija = :kompanija WHERE idSponzor = :idSponzor";
    $params = array(":idSponzor"=>$object->get_idSponzor(),":naziv"=>$object->get_naziv(),":kompanija"=>$object->get_kompanija());
    return $this->IzvrsiUpit($sqlQuery, $params);
  }

  public function GetAll(){

    $sqlQuery="SELECT * FROM Sponzor";
    $params = array();
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $sponzorResults = array();

    foreach ($results as $k)
    {
        $sponzorResult = new Sponzor();
        $sponzorResult->set_idSponzor($k->idSponzor);
        $sponzorResult->set_naziv($k->Naziv);
        $sponzorResult->set_kompanija($k->Kompanija);

        $sponzorResults[] = $sponzorResult;
    }

    return $sponzorResults;

  }

  public function GetOne($object){

    $sponzorResult = new Sponzor();
    $sponzorResult->set_idSponzor($object);


    $sqlQuery="SELECT * FROM Sponzor WHERE idSponzor = :idSponzor";
    $params = array(":idSponzor" =>$sponzorResult->get_idSponzor());

    $results = $this->IzvrsiUpit($sqlQuery,$params);
    if (count($results)>0)
    {
        $k = $results[0];

        $sponzorResult = new Sponzor();
        $sponzorResult->set_idSponzor($k->idSponzor);
        $sponzorResult->set_naziv($k->Naziv);
        $sponzorResult->set_kompanija($k->Kompanija);

    }

    return $sponzorResult;

  }

}

?>