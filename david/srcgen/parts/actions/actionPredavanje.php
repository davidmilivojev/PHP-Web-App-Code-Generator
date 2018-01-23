<?php

     $curl = curl_init('http://localhost/david/services/predavanja');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $response = curl_exec($curl);
     $data = json_decode($response);
     $predavanja = array();

     for ($i=0; $i<=count($data)-1;$i++)
     {
         $filterpredavanje = new Predavanje();
         $filterpredavanje->jsonDeserialize($data[$i]);
         array_push($predavanja, $filterpredavanje);
     }

     foreach($predavanja as $k):
     ?>
       <option value="<?php echo $k->get_idPredavanje(); ?>"
         <?php if (!empty($_GET["search"]))  if ($k->get_idPredavanje() == $_GET["search"]) echo " selected"; ?>>
           <?php echo $k->get_naziv(); ?> </option>
        <?php
      endforeach;
     ?>