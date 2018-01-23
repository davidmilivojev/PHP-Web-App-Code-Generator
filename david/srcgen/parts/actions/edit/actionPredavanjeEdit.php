<tr>
  <td>Predavanje:</td>
  <td>
   <select name="Predavanje">
      <?php

          $curl = curl_init('http://localhost/david/services/predavanja');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $predavanja = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $predavanje = new Predavanje();
              $predavanje->jsonDeserialize($data[$i]);
              array_push($predavanja, $predavanje);
          }
          foreach($predavanja as $k):
        ?>
        <option value="<?php echo $k->get_idPredavanje(); ?>"
           <?php if ($k->get_idPredavanje() == $varcbx->get_predavanje()->get_idPredavanje()) echo " selected"; ?>
               > <?php echo $k->get_naziv(); ?>
        </option>
          <?php
          endforeach;
      ?>
   </select>
</td>
</tr>