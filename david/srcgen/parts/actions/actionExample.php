<?php

     $curl = curl_init('http://localhost/appname/services/names');
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     $response = curl_exec($curl);
     $data = json_decode($response);
     $names = array();

     for ($i=0; $i<=count($data)-1;$i++)
     {
         $filtername = new Name();
         $filtername->jsonDeserialize($data[$i]);
         array_push($names, $filtername);
     }

     foreach($names as $k):
     ?>
       <option value="<?php echo $k->get_idExample(); ?>"
         <?php if (!empty($_GET["search"]))  if ($k->get_idExample() == $_GET["search"]) echo " selected"; ?>>
           <?php echo $k->get_name(); ?> </option>
        <?php
      endforeach;
     ?>