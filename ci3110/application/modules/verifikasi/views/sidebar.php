<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url()?>images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper($this->session->userdata('ses_nama'));?></div>
                <div class="email"><?php echo $this->session->userdata('akses')?></div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">DASHBOARD</li>
                <li class="li-trigger">
                    <a href="<?php echo base_url('verifikasi');?>">
                        <i class="material-icons">assignment</i>
                        <!-- <span class="badge badge-pill bg-orange" style="color:white;">7</span> -->
                        <span>Document</span>
                    </a>
                </li>
                <?php if (($this->session->userdata('akses')=='verifikasi2') || ($this->session->userdata('akses')=='verifikasi3')) {?>
                  <li class="li-trigger">
                      <a href="<?php echo base_url('verifikasi/document_need_response');?>">
                          <i class="material-icons">description</i>
                          <span class="badge badge-pill bg-orange" style="color:white;"><?php echo $countResponse ?></span>
                          <span>Need Response</span>
                      </a>
                  </li>
                <?php } ?>

                <li class="li-trigger">
                    <a href="<?php echo base_url('verifikasi/revisi');?>">
                        <i class="material-icons">assignment_late</i>
                        <span class="badge badge-pill bg-orange" style="color:white;"><?php echo $count_rejected?></span>
                        <span>Rejected</span>
                    </a>
                </li>
                <li class="header">SETTING</li>
                <li class="li-trigger">
                    <a href="<?php echo base_url('verifikasi/edit_profil/').$this->session->userdata('ses_id');?>">
                        <i class="material-icons">face</i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="li-trigger">
                    <a href="<?php echo base_url('login/logout');?>">
                        <i class="material-icons">power_settings_new</i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <a href="javascript:void(0);">AdminBSB - Material Design </a>2019
            </div>
            <div class="version">
                <b>Version: </b> 1.0.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
</section>
