<tr>
  <td>Rang:</td>
  <td>
   <select name="Rang">
      <?php

          $curl = curl_init('http://localhost/david/services/rangovi');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $rangovi = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $rang = new Rang();
              $rang->jsonDeserialize($data[$i]);
              array_push($rangovi, $rang);
          }
          foreach($rangovi as $k):
        ?>
        <option value="<?php echo $k->get_idRang(); ?>"
           <?php if ($k->get_idRang() == $varcbx->get_rang()->get_idRang()) echo " selected"; ?>
               > <?php echo $k->get_nazivrang(); ?>
        </option>
          <?php
          endforeach;
      ?>
   </select>
</td>
</tr>