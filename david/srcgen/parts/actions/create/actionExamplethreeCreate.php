<tr>
  <td>Examplethree:</td>
  <td>
   <select name="Examplethree">
      <?php

          $curl = curl_init('http://localhost/appname/services/examplethrees');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $examplethrees = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $examplethree = new Examplethree();
              $examplethree->jsonDeserialize($data[$i]);
              array_push($examplethrees, $examplethree);
          }

          foreach($examplethrees as $k):
          ?>
          <option value="<?php echo $k->get_idtr(); ?>"> <?php echo $k->get_namethree(); ?> </option>
          <?php
          endforeach;
          ?>
     </select>
  </td>
</tr>