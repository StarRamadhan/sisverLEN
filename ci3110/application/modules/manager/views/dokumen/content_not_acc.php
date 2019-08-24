
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
                            <div class="col-md-6 text-right">
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
                      //echo "<script>alert('$flashMessage')</script>";
                     } ?>
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
                                    <th style="text-align:center;">Lokasi</th>
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
                                    <td style="text-align:center;">
                                      <?php
                                          $lok_dokumen = $d->Lok_Dokumen;
                                          if ($lok_dokumen=="manager") {
                                            $lokasi = "Manager";
                                            echo '<button type="button" data-color="red" class="btn bg-indigo waves-effect m-r-20" btn-xs data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }elseif ($lok_dokumen=="finish") {
                                            $lokasi = "Finish";
                                            echo '<button type="button" data-color="red" class="btn bg-indigo waves-effect m-r-20" btn-xs data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }
                                      ?>

                                      <!-- <a class='btn btn-info waves-effect' type='button' href="<?php echo base_url()?>verifikasi/edit/<?php echo $d->No_Verifikasi;?>">Edit</a> -->
                                    </td>
                                    <td style="text-align:center;">
                                            <button type="button" class="btn btn-default waves-effect" data-toggle="modal" data-target="#mdModal">MODAL - SMALL SIZE</button>
                                    </td>
                                    <td style="text-align:center;">
                                            <button class='btn bg-green waves-effect' onclick=location.href='<?php echo base_url()?>manager/edit/'>Acc</button>
                                    </td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>

                            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                                  </div>
                                  <div class="modal-body">
                                    <input type="text" class="form-control" name="keterangan" value="<?php echo $dataedit->Keterangan?>" required>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-link waves-effect" onclick=location.href='<?php echo base_url()?>revisi/edit/'>SAVE CHANGES</button>
                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
