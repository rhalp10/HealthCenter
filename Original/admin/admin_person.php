<?php
  require_once("../session.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    include('admin_meta.php');
    include('admin_theme.php');
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <?php 
            include('admin_nav_title.php');
            include('admin_profile.php');

            ?>
            

            <br />
            <?php 
            include('admin_sidebar.php');
            ?>
            
          </div>
        </div>
      <?php 
      include('admin_topnav.php');
      ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Patient Record</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                         
                          <button class="btn btn-success" data-toggle="modal" data-target="#addnewpatient">Add Patient</button>
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Action</th>
                              </tr>
                            </thead>


                            <tbody>
              <?php 
              $sql = mysqli_query($conn,"SELECT * FROM `patient_detail` pd
LEFT JOIN ref_marital_status rms ON pd.marital_ID = rms.marital_ID
LEFT JOIN ref_citizenship rc ON pd.citizenship_ID = rc.citizenship_ID
LEFT JOIN ref_gender rg ON pd.gender_ID = rg.gender_ID");
                while ($person = mysqli_fetch_array($sql)) {
                                ?>
                              <tr>
                                <td>
                                  <ul class="list-inline">
                                  <li>
                                    <?php 
                if (isset($person[1]) || $person[1] != null) {
                  echo '<img src="data:image/jpeg;base64,'.base64_encode( $person[1] ).'" class="avatar" alt="Avatar"/>';
                }
                else{
                  ?>
                  <img src="images/user.png" class="avatar" alt="Avatar">
                  <?php
                }
                
                ?>
                                    
                                  </li>
                                  <li><?php echo $person[2]." ".$person[3]." ".$person[4]?></li>
                                </ul></td>
                                <td><?php echo $person[17]?></td>
                                <td class="text-center">
                                <div class="btn-group  btn-group-sm">
                                  <button class="btn btn-info" type="button"  data-toggle="modal" data-target="#modalview" data-id="<?php echo $person[0]?>" id="view_drug">View</button>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $person[0]?>" id="edit_drug">Edit</button>
                                  <button class="btn btn-danger"   onclick="delete_drug(<?php echo $person[0]?>);">Delete</button>
                                </div>
                                </td>
                              </tr>
                                <?php
                              }

                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

       <?php 
        include('admin_footer.php');
        ?>
      </div>
    </div>

    <?php 
    include('admin_script.php');
    ?>
  </body>
</html>


    <!-- calendar modal -->
    <div id="addnewpatient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addnewpatient" aria-hidden="true" >
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Patient</h4>
          </div>
          <div class="modal-body">
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
                    <input type="text" class="form-control" id="title" name="fName">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Middle Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="mName">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="lName">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Birthday</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" id="title" name="bday">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Address</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="address">
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
                    <input type="text" class="form-control" id="title" name="contact">
                  </div>
                </div>
                <div class="form-group text-center">
                  <label class=" control-label"></label>
                  <div class="btn-group ">
                    <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
                    <input type="Submit" class="btn btn-success" id="title" name="submit_patient">
                  </div>
                </div>
              </form>

            </div>


          </div>
          <div class="modal-footer">
                  
          </div>
        </div>
      </div>
    </div>
<div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this patient record?</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="Action">
            <input type="input" name="drugID" id="drug_del"  hidden/>
             <div class="form-group text-center">
                  <label class="control-label"></label>
                  <div class="btn-group ">
                    <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="Delete_Patient">
                    </select>
                  </div>
                </div>
              
            </form>
          </div>
          <div class="modal-footer">
                  
          </div>
        </div>
      </div>
    </div>

<div id="modaledit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Detail</h4>
          </div>
          <div class="modal-body">
            <div id="modal-loader" style="display: none; text-align: center;">
                 <img src="images/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="edit-content"></div>
          </div>
          <div class="modal-footer">
                  
          </div>
        </div>
      </div>
    </div>

<div id="modalview" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">View Detail</h4>
          </div>
          <div class="modal-body">
            <div id="modal-loader" style="display: none; text-align: center;">
                 <img src="images/ajax-loader.gif">
                </div>
                 
                <!-- content will be load here -->                          
                <div id="view-content"></div>
          </div>
          <div class="modal-footer">
                  
          </div>
        </div>
      </div>
    </div>
 <script type="text/javascript"> 

  $(document).ready(function(){
    $(document).on('click', '#edit_drug', function(e)
    {
    
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#edit-content').html(''); // leave it blank before ajax call
      $('#modal-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'edit_patient.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#edit-content').html('');    
        $('#edit-content').html(data); // load response 
        $('#modal-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#edit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#modal-loader').hide();
      });
    
    });
  });


    $(document).ready(function(){
    $(document).on('click', '#view_drug', function(e)
    {
    
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#view-content').html(''); // leave it blank before ajax call
      $('#modal-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'view_patient.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#view-content').html('');    
        $('#view-content').html(data); // load response 
        $('#modal-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#view-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#modal-loader').hide();
      });
    
    });
  });
  function delete_drug(id){
   //show modal of delete
   $('#delete').modal('show'); 
   //get the id of specific row in datatable then
   //change the modal hiddent input form 
   //then submit the value of action form
    $('#drug_del').val(id);
  }
   function edit_drug(id){
   //show modal of delete
   $('#edit').modal('show'); 
   //get the id of specific row in datatable then
   //change the modal hiddent input form 
   //then submit the value of action form
    $('#drug_edit').val(id);
  }
</script>
    

