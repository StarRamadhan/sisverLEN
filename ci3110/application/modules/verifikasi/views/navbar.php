<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <?php
              $roleTitle = $this->session->userdata('akses');
            if ($roleTitle=='verifikasi1') {
              $text = 'VERIFIKASI 1';
            }elseif ($roleTitle=='verifikasi2') {
              $text = 'VERIFIKASI 2';
            }elseif ($roleTitle=='verifikasi3') {
              $text = 'VERIFIKASI 3';
            }?>
            <img style="margin-left:30px;" src="<?php echo base_url('images/Logo-Len.png');?>" width="40" height="50">
            <a href="<?php echo base_url('verifikasi');?>" class="navbar-brand" style="float:right;">&nbsp PT Len Industri (Persero) - <?php echo $text?></a>
        </div>
    </div>
</nav>
