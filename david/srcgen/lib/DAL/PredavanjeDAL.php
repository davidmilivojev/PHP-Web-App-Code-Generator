<?php
require_once '../lib/class/Predavanje.php';
require_once '../lib/DAL/DAL.php';
require_once '../lib/DAL/KonferencijaDAL.php';
require_once '../lib/DAL/CommonDatabaseMethods.php';

class PredavanjeDAL extends DAL implements CommonDatabaseMethods
{
  function __construct() {

      parent::__construct();
  }


  function PredavanjePretaraga($search){


    $sqlQuery="SELECT * FROM Predavanje WHERE Konferencija = :Konferencija ORDER BY Pocetak asc";
    $params = array(":Konferencija"=>$search);

    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $predavanjeResults = array();

    foreach ($results as $k)
    {
        $predavanjeResult = new Predavanje();
        $predavanjeResult->set_idPredavanje($k->idPredavanje);
        $predavanjeResult->set_naziv($k->Naziv);
        $predavanjeResult->set_predavaci($k->Predavaci);
        $predavanjeResult->set_pocetak($k->Pocetak);
        $predavanjeResult->set_kraj($k->Kraj);

        $konferencijaDAL = new KonferencijaDAL();
        $predavanjeResult->set_konferencija($konferencijaDAL->GetOne($k->Konferencija));
        $predavanjeResults[] = $predavanjeResult;
    }

    return $predavanjeResults;

  }



  public function AddOne($object) {

    $object->ValidateFields();

    $sqlQuery="INSERT INTO Predavanje(Naziv, Predavaci, Pocetak, Kraj, Konferencija) VALUES(:naziv, :predavaci, :pocetak, :kraj, :konferencija)";
    $params = array(":naziv"=>$object->get_naziv(), ":predavaci"=>$object->get_predavaci(), ":pocetak"=>$object->get_pocetak(), ":kraj"=>$object->get_kraj(), ":konferencija"=>$object->get_konferencija()->get_idKonferencija());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function DeleteOne($object){

    $object->ValidateFields();
    $sqlQuery="DELETE FROM Predavanje WHERE idPredavanje = :idPredavanje";
    $params = array(":idPredavanje"=>$object->get_idPredavanje());
    return $this->IzvrsiUpit($sqlQuery, $params);

  }

  public function EditOne($object){
    $object->ValidateFields();

    $sqlQuery="UPDATE Predavanje SET Naziv = :naziv, Predavaci = :predavaci, Pocetak = :pocetak, Kraj = :kraj, Konferencija = :konferencija WHERE idPredavanje = :idPredavanje";
    $params = array(":idPredavanje"=>$object->get_idPredavanje(),":naziv"=>$object->get_naziv(),":predavaci"=>$object->get_predavaci(),":pocetak"=>$object->get_pocetak(),":kraj"=>$object->get_kraj(),":konferencija"=>$object->get_konferencija()->get_idKonferencija());
    return $this->IzvrsiUpit($sqlQuery, $params);
  }

  public function GetAll(){

    $sqlQuery="SELECT * FROM Predavanje";
    $params = array();
    $results = $this->IzvrsiUpit($sqlQuery,$params);

    $predavanjeResults = array();

    foreach ($results as $k)
    {
        $predavanjeResult = new Predavanje();
        $predavanjeResult->set_idPredavanje($k->idPredavanje);
        $predavanjeResult->set_naziv($k->Naziv);
        $predavanjeResult->set_predavaci($k->Predavaci);
        $predavanjeResult->set_pocetak($k->Pocetak);
        $predavanjeResult->set_kraj($k->Kraj);

        $konferencijaDAL = new KonferencijaDAL();
        $predavanjeResult->set_konferencija($konferencijaDAL->GetOne($k->Konferencija));
        $predavanjeResults[] = $predavanjeResult;
    }

    return $predavanjeResults;

  }

  public function GetOne($object){

    $predavanjeResult = new Predavanje();
    $predavanjeResult->set_idPredavanje($object);


    $sqlQuery="SELECT * FROM Predavanje WHERE idPredavanje = :idPredavanje";
    $params = array(":idPredavanje" =>$predavanjeResult->get_idPredavanje());

    $results = $this->IzvrsiUpit($sqlQuery,$params);
    if (count($results)>0)
    {
        $k = $results[0];

        $predavanjeResult = new Predavanje();
        $predavanjeResult->set_idPredavanje($k->idPredavanje);
        $predavanjeResult->set_naziv($k->Naziv);
        $predavanjeResult->set_predavaci($k->Predavaci);
        $predavanjeResult->set_pocetak($k->Pocetak);
        $predavanjeResult->set_kraj($k->Kraj);

        $konferencijaDAL = new KonferencijaDAL();
        $predavanjeResult->set_konferencija($konferencijaDAL->GetOne($k->Konferencija));
    }

    return $predavanjeResult;

  }

}

?>