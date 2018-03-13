<?php 
require_once('../dbconfig.php');
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $sql=mysqli_query($conn,"SELECT * FROM `inventory_drugs` WHERE drug_ID = $id");
  $d = mysqli_fetch_array($sql);
 ?>
 <div id="testmodal" style="padding: 5px 20px;">
   <form id="antoform" class="form-horizontal calender" role="form" method="post" action="Action?id=<?php echo $id ?>">
     <div class="form-group">
       <label class="col-sm-3 control-label">Name</label>
       <div class="col-sm-9">
         <input type="text" class="form-control" id="title" name="Name" value="<?php echo $d['1']?>">
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-3 control-label">Description</label>
       <div class="col-sm-9">
         <textarea class="form-control" style="height:55px;" id="descr" name="descr" value="<?php echo $d['2']?>"></textarea>
       </div>
     </div>
     <div class="form-group">
       <label class="col-sm-3 control-label">Unit</label>
       <div class="col-sm-9">
         <select class="select2_single form-control" name="unit"">
           <?php 
           
           $unit =mysqli_query($conn,"SELECT * FROM `ref_unit`");
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
         <input type="text" class="form-control" id="title" name="Quantity" value="<?php echo $d['3']?>">
         </select>
       </div>
     </div>
     <div class="form-group text-center">
       <label class=" control-label"></label>
       <div class="btn-group ">
         <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
         <input type="Submit" class="btn btn-success" id="title" name="edit_drug">
       </div>
     </div>
   </form>
</div>

 <?php
}

?>
 