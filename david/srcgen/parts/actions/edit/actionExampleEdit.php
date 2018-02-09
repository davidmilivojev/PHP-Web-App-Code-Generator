<tr>
  <td>Example:</td>
  <td>
   <select name="Example">
      <?php

          $curl = curl_init('http://localhost/appname/services/examples');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $examples = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $example = new Example();
              $example->jsonDeserialize($data[$i]);
              array_push($examples, $example);
          }
          foreach($examples as $k):
        ?>
        <option value="<?php echo $k->get_idExample(); ?>"
           <?php if ($k->get_idExample() == $varcbx->get_example()->get_idExample()) echo " selected"; ?>
               > <?php echo $k->get_name(); ?>
        </option>
          <?php
          endforeach;
      ?>
   </select>
</td>
</tr>