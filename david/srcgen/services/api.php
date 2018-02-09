<?php

 	require_once "Rest.php";
        require_once '../lib/DAL/ExampleDAL.php';
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



            private function names() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $exampleDAL = new ExampleDAL();
                $names = $exampleDAL->GetAll();
                $this->response($this->json($names), 200);
            }


            private function delname() {
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


            private function addname() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $example = new Example();
                $example->set_name((string) $this->_request['Name']);
                $example->set_description((string) $this->_request['Description']);

                $exampleDAL = new ExampleDAL();
                $succ = $exampleDAL->AddOne($example);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function editname() {
                if ($this->get_request_method() != "POST") {
                    $this->response('false', 406);
                }

                $example = new Example();
                $example->set_idExample((int) $this->_request['id']);
                $example->set_name((string) $this->_request['Name']);
                $example->set_description((string) $this->_request['Description']);

                $exampleDAL = new ExampleDAL();
                $succ = $exampleDAL->EditOne($example);
                if (!$succ) $this->response('false', 204);
                else $this->response('true', 200);
            }


            private function searchnames() {

                if ($this->get_request_method() != "GET")
                    $this->response('false', 406);

                $search = (string) $this->_request['search'];
                $exampleDAL = new ExampleDAL();
                $searchnames = $exampleDAL->search($search);
                $this->response($this->json($searchnames), 200);
            }

            private function name() {

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