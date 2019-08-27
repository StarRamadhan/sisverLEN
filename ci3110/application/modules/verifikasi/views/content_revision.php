
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                      <div class="row clearfix">
                        <form method="post" id="form_advanced_validation" action="<?php echo base_url().$customSearchReject ?>">
                          <div class="col-md-4 text-left">
                            <div class="input-daterange input-group">
                                <div class="form-line">
                                    <input type="text" id="dateStart" class="form-control" name='dateStart' placeholder="Date start..." autocomplete="off">
                                </div>
                                <span class="input-group-addon">to</span>
                                <div class="form-line">
                                    <input type="text" id="dateEnd" class="form-control" name='dateEnd' placeholder="Date end..." autocomplete="off">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-line">
                              <select class="form-control show-tick" name="by" required>
                                  <option value="">-- Select One --</option>
                                  <option value="all"> All Document </option>
                                  <option value="me"> For Me </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3 text-left">
                            <button type="submit" class="btn bg-blue-grey waves-effect waves-float"><i class="material-icons">search</i></button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <?php if($this->session->flashdata('flashMessage')) {
                      $flashMessage=$this->session->flashdata('flashMessage');?>
                      <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Success Update Data !!
                      </div>
                      <?php
                      //echo "<script>alert('$flashMessage')</script>";
                     } ?>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id='tableRevisi'>
                              <thead>
                                <tr>
                                    <!-- <?php foreach ($datafield as $d): ?>
                                      <th><?php echo str_replace("_"," ",$d) ?></th>
                                    <?php endforeach; ?> -->
                                    <th>Tanggal</th>
                                    <th>No Verifikasi</th>
                                    <th>Keterangan</th>
                                    <th>User</th>
                                    <th>MU</th>
                                    <th>Jumlah</th>
                                    <th>Alasan</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($datauser as $d): ?>
                                  <tr>
                                    <td><?php echo $d->Tanggal_Masuk?></td>
                                    <td><?php echo $d->No_Verifikasi?></td>
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
