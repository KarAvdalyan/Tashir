   <?php foreach ($Payments->result() as $row) { ?>
    <tr style="text-align:center;">
        <td ><?= $row->registration_date; ?></td>
        <td ><?= $row->productName; ?></td>
        <td ><?= $row->id; ?></td>
        <td ><?= $row->description; ?></td>
        <td ><?= $row->projectName; ?></td>
        <td ><?= $row->supplierName; ?></td>
        <td ><?= number_format($row->price, 2, '.', ''); ?></td>
        <td ><?= $row->quantity; ?></td>
        <td style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;" id =<?= $row->id; ?> class="update_save" data-toggle="modal" data-target="#payment">Փոփոխել</td>
        <td style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;" id= <?= $row->id; ?> class="delete_payment" data-toggle="confirmation" >Հեռացնել</td>
        <button class="btn btn-default" data-toggle="confirmation">Confirmation</button>
    </tr>
     <?php } ?>
 
 

<!-- 
     <tr style="text-align:center;">
        <td >dfgdf</td>
        <td >dfd</td>
        <td >dfg</td>
        <td >sdgf</td>
        <td >sdgfdfgfd</td>
        <td >xdgdfg</td>
        <td >xdfgdfg</td>
        <td >xdgdgd</td>
        <td style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;" class="update_save" data-toggle="modal" data-target="#payment">Փոփոխել</td>
        <td style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;"  class="delete_payment" >Հեռացնել</td>
    </tr>
  -->