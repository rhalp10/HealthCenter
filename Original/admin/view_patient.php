<?php 
require_once('../dbconfig.php');
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
  $rec = mysqli_query($conn,"SELECT * FROM `patient_detail` WHERE p_ID = $id ");
  $rec = mysqli_fetch_array($rec);



  ?>
<div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                         

                          <?php 
                             if (isset($rec[1]) || $rec[1] != null) {
			                  echo '<img src="data:image/jpeg;base64,'.base64_encode( $rec[1] ).'" class="img-responsive avatar-view" alt="Avatar" title="Change the avatar"/>';

			                }
			                else{
			                  ?>
			                   <img class="img-responsive avatar-view" src="images/img.jpg" alt="Avatar" title="Change the avatar">
			                  <?php
			                }
			                
                          ?>
                        </div>
                      </div>
                      <h3><?php  echo $rec[2]." ".$rec[3].". ".$rec[4]?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php  echo $rec[11]?>
                        </li>
<!-- 
                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                        </li> -->
                      </ul>

                      <!-- <a class="btn btn-success" data-target="#modaledit" data-id="<?php echo $id?>" id="edit_drug"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br> -->

                      <!-- start skills -->
                      <h4>Status</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Alive</p>
                          
                        </li>
                        <!-- <li>
                          <p>Website Design</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 70%;"></div>
                          </div>
                        </li>
                        <li>
                          <p>Automation &amp; Testing</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30" aria-valuenow="29" style="width: 30%;"></div>
                          </div>
                        </li>
                        <li>
                          <p>UI / UX</p>
                          <div class="progress progress_sm">
                            <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 50%;"></div>
                          </div>
                        </li> -->
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity</h2>
                        </div>
                        <div class="col-md-6">
                          <div id="reportrange" class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span><?php echo date("M jS, Y", strtotime("$rec[5]"))?></span> 
                          </div>
                        </div>
                      </div>
                      
                         

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Profile</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Health Record</a>
                          </li>
                          

                        </ul>
                        <div id="myTabContent" class="tab-content">
                           <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="profile-tab">

                            <p>asdasd</p>

                          </div>
                          <div role="tabpanel" class="tab-pane fade " id="tab_content2" aria-labelledby="home-tab">

<div class="x_content">

  <div class="col-xs-3">
    <!-- required for floating -->
    <!-- Nav tabs -->
    <ul class="nav nav-tabs tabs-left  ">
      <li class=""><a href="#home" data-toggle="tab" aria-expanded="false">Sickness</a>
      </li>
      <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Findings/Diagnose</a>
      </li>
      <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Allergies</a>
      </li>
      <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Vaccines</a>
      </li>
      <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Immunization</a>
      </li>
      <li class=""><a href="#messages" data-toggle="tab" aria-expanded="false">Prescription</a>
      </li>
      <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Blood Pressure</a>
      </li>
    </ul>
  </div>

  <div class="col-xs-9">
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane" id="home">
        <p class="lead">Given Medicine</p>
        
        <!-- start user projects -->
                            <table id="datatable" class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Medicine Name</th>
                                  <th>Quantity</th>
                                  <th>Date Given</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
	                          $med = mysqli_query($conn,"SELECT * FROM `inventory_drugs_release`  idr INNER JOIN inventory_drugs id ON idr.drug_ID = id.drug_ID WHERE p_ID =  $id ");
	                          while($med1 = mysqli_fetch_array($med))
	                          {
                                ?>
                                <tr>
                                  <td><?php echo $med1[7]?></td>
                                  <td><?php echo $med1[3]?></td>
                                  <td><?php echo $med1[4]?></td>
                                </tr>
                                <?php
                                }
                                ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </tfoot>
                              
                            </table>
                            <!-- end user projects -->
      </div>
      <div class="tab-pane" id="profile">Profile Tab.</div>
      <div class="tab-pane" id="messages">Messages Tab.</div>
      <div class="tab-pane active" id="settings">Settings Tab.</div>
    </div>
  </div>

  <div class="clearfix"></div>

</div>

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
  <?php
}
?>

<script type="text/javascript">
	$('#datatable').dataTable();
</script>