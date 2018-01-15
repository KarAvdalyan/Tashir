
 <!-- header -->
 <?php  //$this->load->view('inc/index/header.php'); ?>
 <!-- header -->


<div class="container">
	       <!-- user information -->
  <h3 style="text-align:center;">Օգտատիրոջ տվյալներ</h3>
       
  <table class="table table-bordered">
    <thead>
      <tr>
      	<td>ID</td>
        <th>Անուն</th>
        <th>Ազգանուն</th>
        <th>Էլ․ փոստ</th>
        <th>Փոփոխել</th>
        <th>Հեռացնել</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td>25</td>
        <td>Վարդան</td>
        <td>Վարդանյան</td>
        <td>vardan@mail.ru</td>
        <td style="cursor:pointer;">Փոփոխել</td>
        <td style="cursor:pointer;" >Հեռացնել</td>
      </tr>
    </tbody>
  </table>

              <!-- user information -->
  <h3 style="text-align:center;">Օգտատիրոջ մուտքի սահմանափակաումներ</h3>
  <h4 style="text-align:center;cursor:pointer;" data-toggle="modal" data-target="#add_project_user">Ավելացնել</h4>
       
  <table class="table table-bordered">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Անուն (պրոյեկտի)</th>
        <th>Դիտել</th>
        <th>Դիտել/փոփոխել</th>
        <th>Փոփոխել</th>
        <th>Հեռացնել</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      	<td>35</td>
        <td>Կարաս ՍՊԸ</td>
        <td><label class="radio-inline"><input name="limit" type="radio" value="">Դիտել</label></td>
        <td><label class="radio-inline"><input name="limit" type="radio" value="">Դիտել/փոփոխել</label></td>
        <td style="cursor:pointer;">Փոփոխել</td>
        <td style="cursor:pointer;" >Հեռացնել</td>
      </tr>
    </tbody>
  </table>


</div>


  <!-- Add project user -->
  <div class="modal fade" id="add_project_user" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Պրոյեկտի ավելացում</h4>
        </div>
    <div class="modal-body">

       <div class="col-xs-6">
         <input id="get_project_name" class="form-control" type="text" placeholder="Անուն"><br>
         <textarea id="get_project_discripshen" class="form-control" rows="3" placeholder="Նկարագրություն"></textarea><br>
         <input id="get_project_date" class="form-control" type="date"><br>
         <input id="insert_project" class="btn btn-primary btn-md" type="submit" value="Ավելացնել"><br>
       </div>
         <label class="radio-inline"><input name="limit" type="radio" value="">Դիտել/փոփոխել</label>
         <label class="radio-inline"><input name="limit" type="radio" value="">Դիտել</label>
    </div>

        <div class="modal-footer">
         
        </div>
      </div>
      
    </div>
  </div>

</body>
