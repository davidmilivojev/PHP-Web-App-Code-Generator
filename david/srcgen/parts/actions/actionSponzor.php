<?php

     $curl = curl_init('http://localhost/david/services/sponzori');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $response = curl_exec($curl);
     $data = json_decode($response);
     $sponzori = array();

     for ($i=0; $i<=count($data)-1;$i++)
     {
         $filtersponzor = new Sponzor();
         $filtersponzor->jsonDeserialize($data[$i]);
         array_push($sponzori, $filtersponzor);
     }

     foreach($sponzori as $k):
     ?>
       <option value="<?php echo $k->get_idSponzor(); ?>"
         <?php if (!empty($_GET["search"]))  if ($k->get_idSponzor() == $_GET["search"]) echo " selected"; ?>>
           <?php echo $k->get_naziv(); ?> </option>
        <?php
      endforeach;
     ?>