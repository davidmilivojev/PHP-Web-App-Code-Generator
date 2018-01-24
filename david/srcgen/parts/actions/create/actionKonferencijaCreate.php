<tr>
  <td>Konferencija:</td>
  <td>
   <select name="Konferencija">
      <?php

          $curl = curl_init('http://localhost/david/services/konferencije');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $konferencije = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $konferencija = new Konferencija();
              $konferencija->jsonDeserialize($data[$i]);
              array_push($konferencije, $konferencija);
          }

          foreach($konferencije as $k):
          ?>
          <option value="<?php echo $k->get_idKonferencija(); ?>"> <?php echo $k->get_naziv(); ?> </option>
          <?php
          endforeach;
          ?>
     </select>
  </td>
</tr>