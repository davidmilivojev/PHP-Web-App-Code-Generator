<?php

     $curl = curl_init('http://localhost/appname/services/exampletwos');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $response = curl_exec($curl);
     $data = json_decode($response);
     $exampletwos = array();

     for ($i=0; $i<=count($data)-1;$i++)
     {
         $filterexampletwo = new Exampletwo();
         $filterexampletwo->jsonDeserialize($data[$i]);
         array_push($exampletwos, $filterexampletwo);
     }

     foreach($exampletwos as $k):
     ?>
       <option value="<?php echo $k->get_idExampletwo(); ?>"
         <?php if (!empty($_GET["search"]))  if ($k->get_idExampletwo() == $_GET["search"]) echo " selected"; ?>>
           <?php echo $k->get_nametwo(); ?> </option>
        <?php
      endforeach;
     ?>