<?php

 	require_once "Rest.php";
        require_once '../lib/DAL/KonferencijaDAL.php';
        require_once '../lib/DAL/RangDAL.php';
        //need to add require_once '../lib/DAL/KorisnikDAL.php';


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

            private function konferencija() {

                if ($this->get_request_method() != "GET") {
                    $this->response('false', 406);
                }

                $idKonferencije = (int) $this->_request['idKonferencije'];
                if ($idKonferencije > 0) {
                    $konferencijaDAL = new KonferencijaDAL();
                    $konferencija = $konferencijaDAL->GetOne($idKonferencije);
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


          }



	$api = new API;
	$api->processApi();
?>