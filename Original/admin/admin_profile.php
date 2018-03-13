<!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <?php 
                if (isset($img_session) || $img_session != null) {
                  echo '<img src="data:image/jpeg;base64,'.base64_encode( $img_session ).'" class="img-circle profile_img"/>';
                }
                else{
                  ?>
                  <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                  <?php
                }
                
                ?>

              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2> <?php echo $login_session; 
                ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->