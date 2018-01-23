<?php

 	require_once "Rest.php";
        require_once '../lib/DAL/KonferencijaDAL.php';
        require_once '../lib/DAL/RangDAL.php';
        require_once '../lib/DAL/SponzorDAL.php';
        require_once '../lib/DAL/PredavanjeDAL.php';
        require_once '../lib/DAL/KorisnikDAL.php';


	class API extends REST
        {

            public function __construct() {
                parent::__construct();
            }

            public function processApi() {
                $func = strtolower(trim(str_replace("/", "", $_REQUEST['x'])));
                if ((int) method_exists($this, $func) > 0)
                    $this->$func();
                else
                    $this->response('false', 404);
            }

            public function json($data) {
                if (is_array($data)) {
                    return json_encode($data);
                }
            }



            private function konferencije() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $konferencijaDAL = new KonferencijaDAL();
                $konferencije = $konferencijaDAL->GetAll();
                $this->response($this->json($konferencije), 200);
            }

            private function rangovi() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $rangDAL = new RangDAL();
                $rangovi = $rangDAL->GetAll();
                $this->response($this->json($rangovi), 200);
            }

            private function sponzori() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $sponzorDAL = new SponzorDAL();
                $sponzori = $sponzorDAL->GetAll();
                $this->response($this->json($sponzori), 200);
            }

            private function predavanja() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $predavanjeDAL = new PredavanjeDAL();
                $predavanja = $predavanjeDAL->GetAll();
                $this->response($this->json($predavanja), 200);
            }


            private function izbrisikonferenciju() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $konferencija = new Konferencija();
                $konferencija->set_idKonferencija((int) $this->_request['id']);
                $konferencijaDAL = new KonferencijaDAL();
                $succ = $konferencijaDAL->DeleteOne($konferencija);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }

            private function izbrisirang() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $rang = new Rang();
                $rang->set_idRang((int) $this->_request['id']);
                $rangDAL = new RangDAL();
                $succ = $rangDAL->DeleteOne($rang);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }

            private function izbrisisponzor() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $sponzor = new Sponzor();
                $sponzor->set_idSponzor((int) $this->_request['id']);
                $sponzorDAL = new SponzorDAL();
                $succ = $sponzorDAL->DeleteOne($sponzor);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }

            private function izbrisipredavanje() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $predavanje = new Predavanje();
                $predavanje->set_idPredavanje((int) $this->_request['id']);
                $predavanjeDAL = new PredavanjeDAL();
                $succ = $predavanjeDAL->DeleteOne($predavanje);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function dodajkonferenciju() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $konferencija = new Konferencija();
                $konferencija->set_naziv((string) $this->_request['Naziv']);
                $konferencija->set_opis((string) $this->_request['Opis']);
                $rangDAL = new RangDAL();
                $konferencija->set_rang($rangDAL->GetOne((int) $this->_request['Rang']));
                $sponzorDAL = new SponzorDAL();
                $konferencija->set_sponzor($sponzorDAL->GetOne((int) $this->_request['Sponzor']));

                $konferencijaDAL = new KonferencijaDAL();
                $succ = $konferencijaDAL->AddOne($konferencija);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function dodajRang() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $rang = new Rang();
                $rang->set_nazivrang((string) $this->_request['Nazivrang']);
                $sponzorDAL = new SponzorDAL();
                $rang->set_sponzor($sponzorDAL->GetOne((int) $this->_request['Sponzor']));

                $rangDAL = new RangDAL();
                $succ = $rangDAL->AddOne($rang);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function dodajsponzor() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $sponzor = new Sponzor();
                $sponzor->set_naziv((string) $this->_request['Naziv']);
                $sponzor->set_kompanija((string) $this->_request['Kompanija']);

                $sponzorDAL = new SponzorDAL();
                $succ = $sponzorDAL->AddOne($sponzor);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function dodajpredavanje() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $predavanje = new Predavanje();
                $predavanje->set_naziv((string) $this->_request['Naziv']);
                $predavanje->set_predavaci((string) $this->_request['Predavaci']);
                $predavanje->set_pocetak((string) $this->_request['Pocetak']);
                $predavanje->set_kraj((string) $this->_request['Kraj']);
                $konferencijaDAL = new KonferencijaDAL();
                $predavanje->set_konferencija($konferencijaDAL->GetOne((int) $this->_request['Konferencija']));

                $predavanjeDAL = new PredavanjeDAL();
                $succ = $predavanjeDAL->AddOne($predavanje);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function izmenikonferenciju() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $konferencija = new Konferencija();
                $konferencija->set_idKonferencija((int) $this->_request['id']);
                $konferencija->set_naziv((string) $this->_request['Naziv']);
                $konferencija->set_opis((string) $this->_request['Opis']);
                $rangDAL = new RangDAL();
                $konferencija->set_rang($rangDAL->GetOne((int) $this->_request['Rang']));
                $sponzorDAL = new SponzorDAL();
                $konferencija->set_sponzor($sponzorDAL->GetOne((int) $this->_request['Sponzor']));

                $konferencijaDAL = new KonferencijaDAL();
                $succ = $konferencijaDAL->EditOne($konferencija);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function izmenirang() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $rang = new Rang();
                $rang->set_idRang((int) $this->_request['id']);
                $rang->set_nazivrang((string) $this->_request['Nazivrang']);
                $sponzorDAL = new SponzorDAL();
                $rang->set_sponzor($sponzorDAL->GetOne((int) $this->_request['Sponzor']));

                $rangDAL = new RangDAL();
                $succ = $rangDAL->EditOne($rang);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function izmenisponzor() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $sponzor = new Sponzor();
                $sponzor->set_idSponzor((int) $this->_request['id']);
                $sponzor->set_naziv((string) $this->_request['Naziv']);
                $sponzor->set_kompanija((string) $this->_request['Kompanija']);

                $sponzorDAL = new SponzorDAL();
                $succ = $sponzorDAL->EditOne($sponzor);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function izmenipredavanje() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $predavanje = new Predavanje();
                $predavanje->set_idPredavanje((int) $this->_request['id']);
                $predavanje->set_naziv((string) $this->_request['Naziv']);
                $predavanje->set_predavaci((string) $this->_request['Predavaci']);
                $predavanje->set_pocetak((string) $this->_request['Pocetak']);
                $predavanje->set_kraj((string) $this->_request['Kraj']);
                $konferencijaDAL = new KonferencijaDAL();
                $predavanje->set_konferencija($konferencijaDAL->GetOne((int) $this->_request['Konferencija']));

                $predavanjeDAL = new PredavanjeDAL();
                $succ = $predavanjeDAL->EditOne($predavanje);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function konferencijepretraga() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $konferencijaDAL = new KonferencijaDAL();
                $konferencijepretraga = $konferencijaDAL->PrikaziKonferencijePretraga($search);
                $this->response($this->json($konferencijepretraga), 200);
            }

            private function rangpretraga() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $rangDAL = new RangDAL();
                $rangpretraga = $rangDAL->RangPretaraga($search);
                $this->response($this->json($rangpretraga), 200);
            }

            private function sponzorpretraga() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $sponzorDAL = new SponzorDAL();
                $sponzorpretraga = $sponzorDAL->SponzorPretaraga($search);
                $this->response($this->json($sponzorpretraga), 200);
            }

            private function predavanjepretraga() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $predavanjeDAL = new PredavanjeDAL();
                $predavanjepretraga = $predavanjeDAL->PredavanjePretaraga($search);
                $this->response($this->json($predavanjepretraga), 200);
            }

            private function konferencija() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idKonferencija = (int) $this->_request['idKonferencija'];
                if ($idKonferencija > 0) {
                    $konferencijaDAL = new KonferencijaDAL();
                    $konferencija = $konferencijaDAL->GetOne($idKonferencija);
                    $result = array();
                    array_push($result, $konferencija);
                    $this->response($this->json($result), 200);
                }
                $this->response('false', 204);
            }
            private function rang() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idRang = (int) $this->_request['idRang'];
                if ($idRang > 0) {
                    $rangDAL = new RangDAL();
                    $rang = $rangDAL->GetOne($idRang);
                    $result = array();
                    array_push($result, $rang);
                    $this->response($this->json($result), 200);
                }
                $this->response('false', 204);
            }
            private function sponzor() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idSponzor = (int) $this->_request['idSponzor'];
                if ($idSponzor > 0) {
                    $sponzorDAL = new SponzorDAL();
                    $sponzor = $sponzorDAL->GetOne($idSponzor);
                    $result = array();
                    array_push($result, $sponzor);
                    $this->response($this->json($result), 200);
                }
                $this->response('false', 204);
            }
            private function predavanje() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idPredavanje = (int) $this->_request['idPredavanje'];
                if ($idPredavanje > 0) {
                    $predavanjeDAL = new PredavanjeDAL();
                    $predavanje = $predavanjeDAL->GetOne($idPredavanje);
                    $result = array();
                    array_push($result, $predavanje);
                    $this->response($this->json($result), 200);
                }
                $this->response('false', 204);
            }

            // DefaultUser(display/login/logout)

            private function kreirajnalog()
            {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $korisnik = new Korisnik();
                $korisnik->set_username((string) $this->_request['username']);
                $korisnik->set_password((string) $this->_request['password']);
                $korisnik->set_email((string) $this->_request['email']);

                $korisnikDAL = new KorisnikDAL();

                $succ = $korisnikDAL->AddOne($korisnik);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }

            private function login()
            {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $username = (string) $this->_request['username'];
                $password = (string) $this->_request['password'];

                $korisnikDAL = new KorisnikDAL();
                $korisnik = $korisnikDAL->PronadjiKorisnika($username, $password);

                $result = array();
                if ($korisnik->get_idKorisnik()>0)
                {
                    array_push($result, $korisnik->get_username());
                    array_push($result, true);
                }
                else array_push($result, false);
                $this->response($this->json($result), 200);

            }

            private function getuserdata()
            {

              if ($this->get_request_method() != "GET") {
                  $this->response('false', 406);
              }


              $username = (string) $this->_request['usr'];

              $korisnikDAL = new KorisnikDAL();

              $userdata = $korisnikDAL->GetOne($username);
              $result = array();
              array_push($result, $userdata);
              $this->response($this->json($result), 200);
            }



          }



	$api = new API;
	$api->processApi();
?>