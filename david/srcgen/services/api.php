<?php

 	require_once "Rest.php";
        require_once '../lib/DAL/ExampleDAL.php';
        require_once '../lib/DAL/ExampletwoDAL.php';
        require_once '../lib/DAL/ExamplethreeDAL.php';
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



            private function examples() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $exampleDAL = new ExampleDAL();
                $examples = $exampleDAL->GetAll();
                $this->response($this->json($examples), 200);
            }

            private function exampletwos() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $exampletwoDAL = new ExampletwoDAL();
                $exampletwos = $exampletwoDAL->GetAll();
                $this->response($this->json($exampletwos), 200);
            }

            private function examplethrees() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $examplethreeDAL = new ExamplethreeDAL();
                $examplethrees = $examplethreeDAL->GetAll();
                $this->response($this->json($examplethrees), 200);
            }


            private function delexample() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $example = new Example();
                $example->set_idExample((int) $this->_request['id']);
                $exampleDAL = new ExampleDAL();
                $succ = $exampleDAL->DeleteOne($example);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }

            private function delexampletwo() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $exampletwo = new Exampletwo();
                $exampletwo->set_idExampletwo((int) $this->_request['id']);
                $exampletwoDAL = new ExampletwoDAL();
                $succ = $exampletwoDAL->DeleteOne($exampletwo);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }

            private function delexamplethree() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $examplethree = new Examplethree();
                $examplethree->set_idtr((int) $this->_request['id']);
                $examplethreeDAL = new ExamplethreeDAL();
                $succ = $examplethreeDAL->DeleteOne($examplethree);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function addexample() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $example = new Example();
                $example->set_name((string) $this->_request['Name']);
                $example->set_description((string) $this->_request['Description']);
                $exampletwoDAL = new ExampletwoDAL();
                $example->set_exampletwo($exampletwoDAL->GetOne((int) $this->_request['Exampletwo']));

                $exampleDAL = new ExampleDAL();
                $succ = $exampleDAL->AddOne($example);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function addexampletwo() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $exampletwo = new Exampletwo();
                $exampletwo->set_nametwo((string) $this->_request['Nametwo']);
                $exampletwo->set_datetwo((string) $this->_request['Datetwo']);
                $exampletwo->set_descriptiontwo((string) $this->_request['Descriptiontwo']);

                $exampletwoDAL = new ExampletwoDAL();
                $succ = $exampletwoDAL->AddOne($exampletwo);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function addexamplethree() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $examplethree = new Examplethree();
                $examplethree->set_namethree((string) $this->_request['Namethree']);
                $examplethree->set_datethree((string) $this->_request['Datethree']);
                $examplethree->set_dateendthree((string) $this->_request['Dateendthree']);
                $exampletwoDAL = new ExampletwoDAL();
                $examplethree->set_exampletwo($exampletwoDAL->GetOne((int) $this->_request['Exampletwo']));

                $examplethreeDAL = new ExamplethreeDAL();
                $succ = $examplethreeDAL->AddOne($examplethree);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function editexample() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $example = new Example();
                $example->set_idExample((int) $this->_request['id']);
                $example->set_name((string) $this->_request['Name']);
                $example->set_description((string) $this->_request['Description']);
                $exampletwoDAL = new ExampletwoDAL();
                $example->set_exampletwo($exampletwoDAL->GetOne((int) $this->_request['Exampletwo']));

                $exampleDAL = new ExampleDAL();
                $succ = $exampleDAL->EditOne($example);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function editexampletwo() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $exampletwo = new Exampletwo();
                $exampletwo->set_idExampletwo((int) $this->_request['id']);
                $exampletwo->set_nametwo((string) $this->_request['Nametwo']);
                $exampletwo->set_datetwo((string) $this->_request['Datetwo']);
                $exampletwo->set_descriptiontwo((string) $this->_request['Descriptiontwo']);

                $exampletwoDAL = new ExampletwoDAL();
                $succ = $exampletwoDAL->EditOne($exampletwo);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }
            private function editexamplethree() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $examplethree = new Examplethree();
                $examplethree->set_idtr((int) $this->_request['id']);
                $examplethree->set_namethree((string) $this->_request['Namethree']);
                $examplethree->set_datethree((string) $this->_request['Datethree']);
                $examplethree->set_dateendthree((string) $this->_request['Dateendthree']);
                $exampletwoDAL = new ExampletwoDAL();
                $examplethree->set_exampletwo($exampletwoDAL->GetOne((int) $this->_request['Exampletwo']));

                $examplethreeDAL = new ExamplethreeDAL();
                $succ = $examplethreeDAL->EditOne($examplethree);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function searchexample() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $exampleDAL = new ExampleDAL();
                $searchexample = $exampleDAL->searchex($search);
                $this->response($this->json($searchexample), 200);
            }

            private function searchexampletwo() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $exampletwoDAL = new ExampletwoDAL();
                $searchexampletwo = $exampletwoDAL->searchtextwo($search);
                $this->response($this->json($searchexampletwo), 200);
            }

            private function searchexthree() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $examplethreeDAL = new ExamplethreeDAL();
                $searchexthree = $examplethreeDAL->searchtextr($search);
                $this->response($this->json($searchexthree), 200);
            }

            private function exampleone() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idExample = (int) $this->_request['idExample'];
                if ($idExample > 0) {
                    $exampleDAL = new ExampleDAL();
                    $example = $exampleDAL->GetOne($idExample);
                    $result = array();
                    array_push($result, $example);
                    $this->response($this->json($result), 200);
                }
                $this->response('false', 204);
            }
            private function exampletwoone() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idExampletwo = (int) $this->_request['idExampletwo'];
                if ($idExampletwo > 0) {
                    $exampletwoDAL = new ExampletwoDAL();
                    $exampletwo = $exampletwoDAL->GetOne($idExampletwo);
                    $result = array();
                    array_push($result, $exampletwo);
                    $this->response($this->json($result), 200);
                }
                $this->response('false', 204);
            }
            private function examplethreeone() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idtr = (int) $this->_request['idtr'];
                if ($idtr > 0) {
                    $examplethreeDAL = new ExamplethreeDAL();
                    $examplethree = $examplethreeDAL->GetOne($idtr);
                    $result = array();
                    array_push($result, $examplethree);
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