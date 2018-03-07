 edit page
 <div id="testmodal" style="padding: 5px 20px;">
   <form id="antoform" class="form-horizontal calender" role="form" method="post" action="inventory_action">
     <div class="form-group">
       <label class="col-sm-3 control-label">Name</label>
       <div class="col-sm-9">
         <input type="text" class="form-control" id="title" name="Name">
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-3 control-label">Description</label>
       <div class="col-sm-9">
         <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-3 control-label">Unit</label>
       <div class="col-sm-9">
         <select class="select2_single form-control" name="unit">
           <?php 
           $unit =mysqli_query($connection,"SELECT * FROM `ref_unit`");
             while ($data = mysqli_fetch_array($unit))
             {
               echo "<option value=".$data[0].">".$data[1]."</option>";
             }

           ?>
         </select>
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-3 control-label">Quantity</label>
       <div class="col-sm-9">
         <input type="text" class="form-control" id="title" name="Quantity">
         </select>
       </div>
     </div>
     <div class="form-group text-center">
       <label class=" control-label"></label>
       <div class="btn-group ">
         <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
         <input type="Submit" class="btn btn-success" id="title" name="Submit_drug">
       </div>
     </div>
   </form>
</div>