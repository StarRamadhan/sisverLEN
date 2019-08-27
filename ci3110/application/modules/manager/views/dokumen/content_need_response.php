
        <!-- Basic Examples -->
        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                      <div class="row clearfix">
                            <div class="col-md-6 text-left">
                              <h2> Data User </h2>
                              <!-- <p><?php
                                //$sql=$this->db->query("SELECT * from dokumen order by Tanggal_Masuk DESC limit 1");

                              ;?></p> -->
                            </div>
                        </div>
                    </div>
                    <?php if($this->session->flashdata('rejectMessage')) {
                      $flashMessage=$this->session->flashdata('rejectMessage');?>
                      <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Data Rejected !!
                      </div>
                      <?php
                      //echo "<script>alert('$flashMessage')</script>";
                    } elseif ($this->session->flashdata('approveMessage')) {
                      $flashMessage=$this->session->flashdata('rejectMessage');?>
                      <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Data Approved !!
                      </div>
                      <?php
                    }?>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <!-- <?php foreach ($datafield as $d): ?>
                                      <th><?php echo str_replace("_"," ",$d) ?></th>
                                    <?php endforeach; ?> -->
                                    <th>Tanggal</th>
                                    <th>No Verifikasi</th>
                                    <th>Kode Ver</th>
                                    <th>Keterangan</th>
                                    <th>User</th>
                                    <th>MU</th>
                                    <th>Jumlah</th>
                                    <th style="text-align:center;">Action</th>
                                    <th style="text-align:center;">Action</th>
                                </tr>
                              </thead>

                              <tbody>
                                <?php foreach ($datauser as $d): ?>
                                  <tr>
                                    <td><?php echo $d->Tanggal_Masuk?></td>
                                    <td><?php echo $d->No_Verifikasi?></td>
                                    <td><?php echo $d->Kode_Ver?></td>
                                    <td><?php echo $d->Keterangan?></td>
                                    <td><?php echo $d->User?></td>
                                    <td><?php echo $d->Mata_Uang?></td>
                                    <td><?php echo number_format($d->Jumlah,2,",",".");?></td>
                                    </td>
                                    <td style="text-align:center;">
                                      <?php $IdRmodal = str_replace("/","","R".$d->No_Verifikasi);?>
                                      <button class='btn bg-red waves-effect' data-toggle="modal" data-target="<?php echo "#".$IdRmodal;?>">Reject</button>
                                      <form method="post" id="form_advanced_validation" action="<?php echo base_url().$reject ?>">
                                      <div class="modal fade" id="<?php echo $IdRmodal;?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content modal-col-red">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="defaultModalLabel">Warning</h4>
                                            </div>
                                            <div class="modal-body">
                                              <input type="text" class="form-control " name="tanggal_masuk" value="<?php echo $d->Tanggal_Masuk?>"required>
                                              <input type="text" class="form-control " name="no_verifikasi" value="<?php echo $d->No_Verifikasi?>"required>
                                              <input type="text" class="form-control " name="kode_ver" value="<?php echo $d->Kode_Ver?>"required>
                                              <input type="text" class="form-control " name="keterangan" value="<?php echo $d->Keterangan?>"required>
                                              <input type="text" class="form-control " name="mata_uang" value="<?php echo $d->Mata_Uang?>"required>
                                              <input type="text" class="form-control " name="jumlah" value="<?php echo $d->Jumlah?>"required>
                                              <p>Are You Sure Want to Accept document : <?php echo $d->No_Verifikasi?></p>
                                              <br>
                                              <p>Reason :</p>
                                              <textarea type="text" class="form-control" name="alasan" required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                                              <button class="btn btn-link waves-effect" type="submit">Continue</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      </form>
                                    </td>
                                    <td style="text-align:center;">
                                      <?php $IdAmodal = str_replace("/","","A".$d->No_Verifikasi);?>
                                      <button class='btn bg-green waves-effect' data-toggle="modal" data-target="<?php echo "#".$IdAmodal;?>">Approve</button>
                                      <form method="post" id="form_advanced_validation" action="<?php echo base_url().$approve ?>">
                                      <div class="modal fade" id="<?php echo $IdAmodal;?>" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content modal-col-green">
                                            <div class="modal-header">
                                              <h4 class="modal-title" id="defaultModalLabel">Warning</h4>
                                            </div>
                                            <div class="modal-body">
                                              <input type="text" class="form-control " name="no_verifikasi" value="<?php echo $d->No_Verifikasi?>"required>
                                              <p>Are You Sure Want to Approve this Document : <?php echo $d->No_Verifikasi?></p>
                                              <br>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Cancel</button>
                                              <button type="submit" class="btn btn-link waves-effect" type="submit">Continue</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      </form>
                                    </td>
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
