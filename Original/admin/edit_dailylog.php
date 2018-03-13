<?php 
require_once('../dbconfig.php');
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $sql=mysqli_query($conn,"SELECT * FROM `daily_log` WHERE log_ID = $id");
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
       <label class="col-sm-3 control-label">Unit</label>
       <div class="col-sm-9">
         <select class="select2_single form-control" name="stage"">
           <?php 
           
           $unit =mysqli_query($conn,"SELECT * FROM `ref_age_stage`");
             while ($data = mysqli_fetch_array($unit))
             {
               echo "<option value=".$data[0].">".$data[1]."</option>";
             }

           ?>
         </select>
       </div>
     </div>
     <div class="form-group text-center">
       <label class=" control-label"></label>
       <div class="btn-group ">
         <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
         <input type="Submit" class="btn btn-success" id="title" name="edit_dailylog">
       </div>
     </div>
   </form>
</div>

 <?php
}

?>
 