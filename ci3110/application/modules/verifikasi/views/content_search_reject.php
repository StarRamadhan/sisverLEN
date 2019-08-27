
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header">
                    <h2 class="card-inside-title">Filter</h2>
                    <div class="row clearfix">
                      <form method="post" id="form_advanced_validation" action="<?php //echo base_url().$customSearch ?>">
                        <div class="col-md-4 text-left">
                          <div class="input-daterange input-group">
                              <div class="form-line">
                                <?php if($this->session->flashdata('ses_startdate')) {
                                  $flashStart=$this->session->flashdata('ses_startdate');
                                  echo '<input type="text" id="dateStart" class="form-control" name="dateStart" value="'.$flashStart.'" placeholder="Date start..." autocomplete="off">';
                                }else{
                                  echo '<input type="text" id="dateStart" class="form-control" name="dateStart" placeholder="Date start..." autocomplete="off">';
                                } ?>
                              </div>
                              <span class="input-group-addon">to</span>
                              <div class="form-line">
                                <?php if($this->session->flashdata('ses_enddate')) {
                                  $flashEnd=$this->session->flashdata('ses_enddate');
                                  echo '<input type="text" id="dateEnd" class="form-control" name="dateEnd" value="'.$flashEnd.'" placeholder="Date end..." autocomplete="off">';
                                }else{
                                  echo '<input type="text" id="dateEnd" class="form-control" name="dateEnd" placeholder="Date end..." autocomplete="off">';
                                } ?>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-line">
                            <select class="form-control show-tick" name="by" required>
                              <option value="">-- Select One --</option>
                                <?php if ($this->session->flashdata('ses_by')=='all') {
                                        echo '<option value="all" selected> All Document </option>';
                                      }else {
                                        echo '<option value="all"> All Document </option>';
                                      }
                                      if ($this->session->userdata('ses_by')=='me') {
                                        echo '<option value="me" selected> For Me </option>';
                                      }else {
                                        echo '<option value="me"> For Me </option>';
                                }?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3 text-left">
                          <button type="submit" class="btn bg-blue-grey waves-effect waves-float">Search</button>&nbsp
                          <a type="button" href="<?php echo base_url('verifikasi/revisi')?>" class="btn bg-blue-grey waves-effect waves-float">Reset</a>
                        </div>
                      </form>
                      <div class="col-md-3 text-right">
                        <a href="<?php echo base_url('verifikasi/create');?>" type="button" class="btn bg-blue waves-effect">Add New Data</a>
                      </div>
                    </div>

                  </div>
                    <?php if($this->session->flashdata('message')) {
                      $flashMessage=$this->session->flashdata('message');?>
                      <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Success Add New Data !!
                      </div>
                      <?php
                     } ?>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Verifikasi</th>
                                    <th>Kode Ver</th>
                                    <th>Keterangan</th>
                                    <th>User</th>
                                    <th>MU</th>
                                    <th>Jumlah</th>
                                    <th>Alasan</th>
                                    <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($datauser as $d): ?>
                                  <tr>
                                    <td>
                                      <?php
                                          $tgl_msk= $d->Tanggal_Masuk;
                                          echo date("m-d-Y", strtotime($tgl_msk));
                                        ?>
                                    </td>
                                    <td><?php echo $d->No_Verifikasi?></td>
                                    <td><?php echo $d->Kode_Ver?></td>
                                    <td><?php echo $d->Keterangan?></td>
                                    <td><?php echo $d->User?></td>
                                    <td><?php echo $d->Mata_Uang?></td>
                                    <td><?php echo number_format($d->Jumlah,2,",",".");?></td>
                                    <td><?php echo $d->Alasan_Revisi?></td>
                                    <td><?php
                                        $status = $d->Status_Revisi;
                                        if ($status=="Done") {?>
                                          <button class='btn bg-cyan waves-effect'>Done</button>
                                    <?php
                                        }elseif ($status=="") {?>
                                          <button class='btn bg-red waves-effect'  onclick=location.href='<?php echo base_url()?>verifikasi/revisi/edit/<?php echo $d->No ?>'>Edit</button>
                                    <?php
                                        }
                                    ?></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
