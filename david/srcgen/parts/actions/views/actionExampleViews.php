<tr>
  <td>Example:</td>
  <td>
   <select name="Example">
      <?php

          $curl = curl_init('http://localhost/appname/services/names');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $names = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $example = new Example();
              $example->jsonDeserialize($data[$i]);
              array_push($names, $example);
          }

          foreach($names as $k):
          ?>
            <option value="<?php echo $k->get_idExample(); ?>"> <?php echo $k->get_name(); ?> </option>
            <?php
          endforeach;
          ?>
     </select>
  </td>
</tr>