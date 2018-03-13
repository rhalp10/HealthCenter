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
                    <h2>Daily Logs</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                         
                          <button class="btn btn-success" data-toggle="modal" data-target="#addnewlog">Add Log</button>
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Stage</th>
                                <th>Action</th>
                              </tr>
                            </thead>


                            <tbody>
              <?php 
              $sql = mysqli_query($conn,"SELECT * FROM `daily_log` dl
INNER JOIN ref_age_stage  ras ON dl.stage_ID = ras.stage_ID");
                while ($inv = mysqli_fetch_array($sql)) {
                                ?>
                              <tr>
                                <td><?php echo $inv[1]?></td>
                                <td><?php echo $inv[5]?></td>
                                <td class="text-center">
                                <div class="btn-group  btn-group-sm">
                                  <!-- <button class="btn btn-info" type="button"  data-toggle="modal" data-target="#modalview" data-id="<?php echo $data['drug_ID']?>" id="edit_drug">View</button> -->
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $inv[0]?>" id="edit_drug">Edit</button>
                                  <button class="btn btn-danger"   onclick="delete_drug(<?php echo $inv[0]?>);">Delete</button>
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
    <div id="addnewlog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addnewlog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Record Accommodate Person</h4>
          </div>
          <div class="modal-body">
            <div id="testmodal" style="padding: 5px 20px;">
              <form id="antoform" class="form-horizontal calender" role="form" method="post" action="Action">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="title" name="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Stages</label>
                  <div class="col-sm-9">
                    <select class="select2_single form-control" name="stage">
                      <?php 
                      $stage =mysqli_query($conn,"SELECT * FROM `ref_age_stage`");
                        while ($data = mysqli_fetch_array($stage))
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
                    <input type="Submit" class="btn btn-success" id="title" name="submit_dailylog">
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
            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this Log?</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="Action">
            <input type="input" name="id" id="drug_del"  hidden/>
             <div class="form-group text-center">
                  <label class="control-label"></label>
                  <div class="btn-group ">
                    <button type="button" class="btn btn-danger antoclose" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="Delete_log">
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
        url: 'edit_dailylog.php',
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
    