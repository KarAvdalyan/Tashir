 <!-- Update_payment -->
  <div class="modal fade" id="update_payment" role="dialog">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update payment </h4>
        </div>
        <div class="modal-body">
          

              <h3 style="text-align:center;" >Գործարք</h3>
 
  <form>
    <div class="form-group row">
 
 
      <div class="col-xs-6">
         <input type="hidden" id="get_project_id">
         <input type="hidden" id="get_supplier_id" >

         <input id="update_product_id" class="form-control" style="width:60%;" type="number" placeholder="Պրոդուկտ ID " >      
         <input id="update_product_name" class="form-control"  type="text" placeholder="0Պրոդուկտի անուն" style="margin-top:8px;"  >
         <textarea class="form-control" rows="3"  placeholder="Նկարագրություն" style="margin-top:8px;"></textarea>
         <input id="update_project_name" class="form-control"  type="text" placeholder="1Պրոյեկտի անուն" style="margin-top:8px;">
         <input id="update_supplier_name" class="form-control"  type="text" placeholder="Մատակարարի անուն" style="margin-top:8px;">
         <input class="form-control" style="width:30%; margin-top:8px;" type="number" placeholder="Գին"  >
         <input class="form-control" style="width:40%; margin-top:8px;" type="number" placeholder="Քանակ">
         <input class="form-control"  type="date" style="margin-top:8px;">
         <input class="form-control"  type="submit" value="Ավելացնել" style="margin-top:8px;">

      </div>
      
                                                                 <!-- #update_product -->
      <div class="col-xs-6" id="" style="margin-top:43px;">
         <input id="sub_add_productt" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_product"  type="submit" style="width:40%;" value="Մուտքագրել">
      </div>
                                                                 <!-- #update_product -->


                                                                 <!-- #update_project -->
      <div class="col-xs-6" id="" style="margin-top:90px;">
         <input id="sub_update_project" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_project"  type="submit" style="width:40%;" value="Մուտքագրել">
      </div>
                                                                 <!-- #update_project -->


                                                                 <!-- #update_supplier -->
      <div class="col-xs-6" id="" style="margin-top:9px;">
         <input id="sub_update_supplier" type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#add_supplier"  type="submit" style="width:40%;" value="Մուտքագրել">
      </div>
                                                                 <!-- #update_supplier -->

    </div>
  </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Փակել</button>
        </div>
      </div>
    </div>
  </div>

   <!-- Update_payment -->
