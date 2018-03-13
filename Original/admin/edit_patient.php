<?php 
require_once('../dbconfig.php');
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $sql=mysqli_query($conn,"SELECT * FROM `patient_detail` WHERE p_ID = $id");
  $d = mysqli_fetch_array($sql);
 ?>
 <div id="testmodal" style="padding: 5px 20px;">
   <form id="antoform" class="form-horizontal calender" role="form" method="post" action="Action" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Patient Picture</label>
                  <div class="col-sm-9">
                    <input name="image" type="file" class="form-control inputFile" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="fName" value="<?php echo $d[2]?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Middle Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="mName" value="<?php echo $d[3]?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="lName" value="<?php echo $d[4]?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Birthday</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="title" name="bday" value="<?php echo $d[5]?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="address" value="<?php echo $d[11]?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Gender</label>
                  <div class="col-sm-9">
                    <select class="select2_single form-control" name="gender">
                      <?php 
                      $gen =mysqli_query($conn,"SELECT * FROM `ref_gender`");
                        while ($data = mysqli_fetch_array($gen))
                        {
                          echo "<option value=".$data[0].">".$data[1]."</option>";
                        }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Citizenship</label>
                  <div class="col-sm-9">
                    <select class="select2_single form-control" name="citizenship">
                      <?php 
                      $gen =mysqli_query($conn,"SELECT * FROM `ref_citizenship`");
                        while ($data = mysqli_fetch_array($gen))
                        {
                          echo "<option value=".$data[0].">".$data[1]."</option>";
                        }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Marital Status</label>
                  <div class="col-sm-9">
                    <select class="select2_single form-control" name="marital_status">
                      <?php 
                      $gen =mysqli_query($conn,"SELECT * FROM `ref_marital_status`");
                        while ($data = mysqli_fetch_array($gen))
                        {
                          echo "<option value=".$data[0].">".$data[1]."</option>";
                        }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Contact</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="contact" value="<?php echo $d[10]?>">
                  </div>
                </div>
                <div class="form-group text-center">
                  <label class=" control-label"></label>
                  <div class="btn-group ">
                    <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
                    <input type="Submit" class="btn btn-success" id="title" name="update_patient">
                  </div>
                </div>
              </form>
</div>

 <?php
}

?>
 