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
                    <h2>Dashboard</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                         
                         asdasd
                         
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
    <div id="addnewacc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addnewacc" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Account</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form" method="post" action="Action">
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
                  <label class="col-sm-3 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="username">
                  </div>
                </div>
                <div class="form-group">
                 <label class="col-sm-3 control-label"> Password</label>
                 <div class="col-sm-9">
                   <input type="password" class="form-control" id="title" name="Password" >
                 </div>
               </div>
                
               <div class="form-group">
                 <label class="col-sm-3 control-label">Retype Password</label>
                 <div class="col-sm-9">
                   <input type="text" class="form-control" id="title" name="rePassword" value="">
                 </div>
               </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required type="date">
                </div>
              </div>
               <div class="form-group">
                 <label class="col-sm-3 control-label">User Type</label>
                 <div class="col-sm-9">
                   <select class="select2_single form-control" name="unit"">
                     <?php 
                     
                     $unit =mysqli_query($conn,"SELECT * FROM `user_level`");
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
                   <input type="Submit" class="btn btn-success" id="title" name="edit_drug">
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
            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this account?</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="Action">
            <input type="input" name="drugID" id="drug_del"  hidden/>
             <div class="form-group text-center">
                  <label class="control-label"></label>
                  <div class="btn-group ">
                    <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="Delete_drug">
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
      <div class="modal-dialog">
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
                <div id="edit-content"></div>
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
        url: 'edit_acc.php',
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
    