<?php 
require_once('session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Index</title>

    <?php
    include('admin_theme.php');
    ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-windows"></i> <span>Health Center</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <?php 
            include('admin_sidebar.php');
            ?>
            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav  navbar-fixed-top" >
          <div class="nav_menu">
            <nav>
              <!-- <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div> -->

              <ul class="nav navbar-nav navbar-right ">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a  href="Logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

            <!--     <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Plain Page</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Drugs Inventory</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                         
                          <button class="btn btn-success" data-toggle="modal" data-target="#addnewdrugs">Add</button>
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Action</th>
                              </tr>
                            </thead>


                            <tbody>
                              <?php 
                              $inv =mysqli_query($connection,"SELECT * FROM `inventory_drugs` idrug LEFT JOIN ref_unit ru ON idrug.unit_ID = ru.unit_ID");
                              while ($data = mysqli_fetch_array($inv))
                              {
                                ?>
                              <tr>
                                <td><?php echo $data['drug_Name']?></td>
                                <td><?php echo $data['drug_Description']?></td>
                                <td><?php echo $data['unit_Name']?></td>
                                <td><?php echo $data['drug_Qnty']?></td>
                                <td class="text-center">
                                <div class="btn-group  btn-group-sm">
                                  <button class="btn btn-info" type="button">View</button>
                                  <button class="btn btn-primary" data-toggle="modal" data-target="#modaledit" data-id="<?php echo $data['drug_ID']?>" id="edit_drug">Edit</button>
                                  <button class="btn btn-danger"   onclick="delete_drug(<?php echo $data['drug_ID']?>);">Delete</button>
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
    <div id="addnewdrugs" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addnewdrugs" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">New Drugs</h4>
          </div>
          <div class="modal-body">
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
            <h4 class="modal-title" id="myModalLabel">Are you sure you want to delete this drugs?</h4>
          </div>
          <div class="modal-body">
            <form method="post" action="inventory_action">
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

 <script type="text/javascript"> 

  $(document).ready(function(){
    $(document).on('click', '#edit_drug', function(e)
    {
    
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#edit-content').html(''); // leave it blank before ajax call
      $('#modal-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'edit.php',
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
    