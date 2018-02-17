<?php

     $curl = curl_init('http://localhost/appname/services/examplethrees');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $response = curl_exec($curl);
     $data = json_decode($response);
     $examplethrees = array();

     for ($i=0; $i<=count($data)-1;$i++)
     {
         $filterexamplethreeone = new Examplethree();
         $filterexamplethreeone->jsonDeserialize($data[$i]);
         array_push($examplethrees, $filterexamplethreeone);
     }

     foreach($examplethrees as $k):
     ?>
       <option value="<?php echo $k->get_idtr(); ?>"
         <?php if (!empty($_GET["search"]))  if ($k->get_idtr() == $_GET["search"]) echo " selected"; ?>>
           <?php echo $k->get_namethree(); ?> </option>
        <?php
      endforeach;
     ?>