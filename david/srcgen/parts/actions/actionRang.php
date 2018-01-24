<?php

     $curl = curl_init('http://localhost/david/services/rangovi');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $response = curl_exec($curl);
     $data = json_decode($response);
     $rangovi = array();

     for ($i=0; $i<=count($data)-1;$i++)
     {
         $filterrang = new Rang();
         $filterrang->jsonDeserialize($data[$i]);
         array_push($rangovi, $filterrang);
     }

     foreach($rangovi as $k):
     ?>
       <option value="<?php echo $k->get_idRang(); ?>"
         <?php if (!empty($_GET["search"]))  if ($k->get_idRang() == $_GET["search"]) echo " selected"; ?>>
           <?php echo $k->get_nazivrang(); ?> </option>
        <?php
      endforeach;
     ?>