      <?php foreach ($list->result() as $value) { ?>
      <tr style="text-align:center;">
        <td contenteditable="true"><?= $value->id; ?></td>
        <td contenteditable="true"><?= $value->name; ?></td>
        <td contenteditable="true"><?= $value->description; ?></td>
        <td contenteditable="true"><?= $value->registration_date; ?></td>
        <td id=<?= $value->id ?>  class="update_save" style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;">Փոփոխել</td>
        <td id=<?= $value->id ?> style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;">Հեռացնել</td>
      </tr>
     <?php } ?>
    