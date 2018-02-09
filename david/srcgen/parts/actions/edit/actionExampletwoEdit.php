<tr>
  <td>Exampletwo:</td>
  <td>
   <select name="Exampletwo">
      <?php

          $curl = curl_init('http://localhost/appname/services/exampletwos');
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($curl);
          $data = json_decode($response);
          $exampletwos = array();

          for ($i=0; $i<=count($data)-1;$i++)
          {
              $exampletwo = new Exampletwo();
              $exampletwo->jsonDeserialize($data[$i]);
              array_push($exampletwos, $exampletwo);
          }
          foreach($exampletwos as $k):
        ?>
        <option value="<?php echo $k->get_idExampletwo(); ?>"
           <?php if ($k->get_idExampletwo() == $varcbx->get_exampletwo()->get_idExampletwo()) echo " selected"; ?>
               > <?php echo $k->get_nametwo(); ?>
        </option>
          <?php
          endforeach;
      ?>
   </select>
</td>
</tr>