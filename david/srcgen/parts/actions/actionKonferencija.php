<?php

     $curl = curl_init('http://localhost/david/services/konferencije');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $response = curl_exec($curl);
     $data = json_decode($response);
     $konferencije = array();

     for ($i=0; $i<=count($data)-1;$i++)
     {
         $filterkonferencija = new Konferencija();
         $filterkonferencija->jsonDeserialize($data[$i]);
         array_push($konferencije, $filterkonferencija);
     }

     foreach($konferencije as $k):
     ?>
       <option value="<?php echo $k->get_idKonferencija(); ?>"
         <?php if (!empty($_GET["search"]))  if ($k->get_idKonferencija() == $_GET["search"]) echo " selected"; ?>>
           <?php echo $k->get_naziv(); ?> </option>
        <?php
      endforeach;
     ?>