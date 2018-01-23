<tr>
  <td>Sponzor:</td>
  <td>
   <select name="Sponzor">
      <?php

          $curl = curl_init('http://localhost/david/services/sponzori');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $sponzori = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $sponzor = new Sponzor();
              $sponzor->jsonDeserialize($data[$i]);
              array_push($sponzori, $sponzor);
          }

          foreach($sponzori as $k):
          ?>
          <option value="<?php echo $k->get_idSponzor(); ?>"> <?php echo $k->get_naziv(); ?> </option>
          <?php
          endforeach;
          ?>
     </select>
  </td>
</tr>