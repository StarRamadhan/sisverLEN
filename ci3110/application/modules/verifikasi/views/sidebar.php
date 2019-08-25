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
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo base_url('login/logout');?>"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
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
                        <span class="badge badge-pill bg-orange" style="color:white;">7</span>
                        <span>Your Document</span>
                    </a>
                </li>
                <li class="li-trigger">
                    <a href="<?php echo base_url('verifikasi/index_all');?>">
                        <i class="material-icons">assignment</i>
                        <span class="badge badge-pill bg-orange" style="color:white;">7</span>
                        <span>All Document</span>
                    </a>
                </li>
                <li class="li-trigger">
                    <a href="<?php echo base_url('revisi');?>">
                        <i class="material-icons">assignment_late</i>
                        <span class="badge badge-pill bg-orange" style="color:white;">7</span>
                        <span>Your Rejected</span>
                    </a>
                </li>
                <li class="li-trigger">
                    <a href="<?php echo base_url('revisi/index_all');?>">
                        <i class="material-icons">assignment_late</i>
                        <span class="badge badge-pill bg-orange" style="color:white;">7</span>
                        <span>Rejected</span>
                    </a>
                </li>

                <?php if ($this->session->userdata('akses')=='verifikasi2') {  ?>
                  <li class="li-trigger">
                    <a href="<?php echo base_url('revisi/index_all');?>">
                        <i class="material-icons">assignment_late</i>
                        <span class="badge badge-pill bg-orange" style="color:white;">7</span>
                        <span>Need Attention</span>
                    </a>
                  </li>
                <?php } ?>


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
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
