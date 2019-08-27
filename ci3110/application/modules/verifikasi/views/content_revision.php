
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                      <div class="row clearfix">
                            <div class="col-md-6 text-left">
                              <h2> Data Revisi </h2>
                            </div>
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
                                    <th>Tanggal Masuk</th>
                                    <th>No</th>
                                    <th>No Verifikasi</th>
                                    <th>Keterangan</th>
                                    <th>User</th>
                                    <th>MU</th>
                                    <th>Jumlah</th>
                                    <th>Alasan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <!-- <tfoot>
                                <tr>
                                    <?php foreach ($datafield as $d): ?>
                                      <th><?php echo str_replace("_"," ",$d) ?></th>
                                    <?php endforeach; ?>
                                    <th>aksi</th>
                                </tr>
                              </tfoot> -->
                              <tbody>
                                <?php foreach ($datauser as $d): ?>
                                  <tr>
                                    <td><?php echo $d->Tanggal_Masuk?></td>
                                    <td><?php echo $d->No?></td>
                                    <td><?php echo $d->No_Verifikasi?></td>
                                    <td><?php echo $d->Keterangan?></td>
                                    <td><?php echo $d->User?></td>
                                    <td><?php echo $d->Mata_Uang?></td>
                                    <td><?php echo number_format($d->Jumlah,2,",",".");?></td>
                                    <td><?php echo $d->Alasan_Revisi?></td>
                                    <td><?php echo $d->Status_Revisi?></td>
                                    <td>
                                    <?php
                                        $status = $d->Status_Revisi;
                                        if ($status=="Selesai") {?>
                                          <button class='btn bg-teal waves-effect'  onclick=location.href='<?php echo base_url()?>verifikasi/revisi/edit/<?php echo $d->No ?>'>Edit</button>
                                    <?php
                                        }elseif ($status=="") {?>
                                          <button class='btn bg-red waves-effect'  onclick=location.href='<?php echo base_url()?>verifikasi/revisi/edit/<?php echo $d->No ?>'>Edit</button>
                                    <?php
                                        }
                                    ?>



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
