<?php
require_once '../lib/class/Konferencija.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/RangDAL.php';

class KonferencijaDAL extends DAL implements CommonDatabaseMethods
{
  function __construct() {

      parent::__construct();
  }



  function PrikaziKonferencijePretraga($search){
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $konferencijaResults = array();

    foreach ($results as $k)
    {
        $konferencijaResult = new Konferencija();
        $konferencijaResult->set_idKonferencija($k->idKonferencija);
        $konferencijaResult->set_naziv($k->Naziv);
        $konferencijaResult->set_opis($k->Opis);

        $rangDAL = new RangDAL();
        $konferencijaResult->set_rang($rangDAL->GetOne($k->Rang));
        $konferencijaResults[] = $konferencijaResult;
    }

    return $konferencijaResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Konferencija(Naziv, Opis, Rang) VALUES(:naziv, :opis, :rang)";
    $params = array(":naziv"=>$object->get_naziv(), ":opis"=>$object->get_opis(), ":rang"=>$object->get_rang()->get_idRang());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function DeleteOne($object){

    $object->ValidateFields();
    $sqlQuery="DELETE FROM Konferencija WHERE idKonferencija = :idKonferencije";
    $params = array(":idKonferencije"=>$object->get_idKonferencija());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function EditOne($object){
    $object->ValidateFields();

    $sqlQuery="UPDATE Konferencija SET Naziv = :naziv, Opis = :opis, Rang = :rang WHERE idKonferencija = :idKonferencija";
    $params = array(":idKonferencija"=>$object->get_idKonferencija(),":naziv"=>$object->get_naziv(),":opis"=>$object->get_opis(),":rang"=>$object->get_rang()->get_idRang());
    return $this->IzvrsiUpit($sqlQuery, $params);
  }

  public function GetAll(){

    $sqlQuery="SELECT * FROM Konferencija";
    $params = array();
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $konferencijaResults = array();

    foreach ($results as $k)
    {
        $konferencijaResult = new Konferencija();
        $konferencijaResult->set_idKonferencija($k->idKonferencija);
        $konferencijaResult->set_naziv($k->Naziv);
        $konferencijaResult->set_opis($k->Opis);

        $rangDAL = new RangDAL();
        $konferencijaResult->set_rang($rangDAL->GetOne($k->Rang));
        $konferencijaResults[] = $konferencijaResult;
    }

    return $konferencijaResults;

  }

  public function GetOne($object){

    $konferencijaResult = new Konferencija();
    $konferencijaResult->set_idKonferencija($object);

    $sqlQuery="SELECT * FROM Konferencija WHERE idKonferencija = :idKonferencija";
    $params = array(":idKonferencija" =>$konferencijaResult->get_idKonferencija());

    $results = $this->IzvrsiUpit($sqlQuery,$params);
    if (count($results)>0)
    {
        $k = $results[0];

        $konferencijaResult = new Konferencija();
        $konferencijaResult->set_idKonferencija($k->idKonferencija);
        $konferencijaResult->set_naziv($k->Naziv);
        $konferencijaResult->set_opis($k->Opis);

        $rangDAL = new RangDAL();
        $konferencijaResult->set_rang($rangDAL->GetOne($k->Rang));
    }

    return $konferencijaResult;

  }

}

?>