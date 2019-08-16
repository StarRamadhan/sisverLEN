
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                      <div class="row clearfix">
                            <div class="col-md-6 text-left">
                              <h2> Data User </h2>
                            </div>
                            <div class="col-md-6 text-right">
                              <a href="<?php echo base_url('verifikasi/create');?>" type="button" class="btn bg-blue waves-effect">Add New Data</a>
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
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                    <th>Tgl Out Verif</th>
                                    <th>Tgl Out Jurnal</th>
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
                                    <td><?php echo $d->Tgl_Out_Verif?></td>
                                    <td><?php echo $d->Tgl_Out_Jurnal?></td>
                                    <td>
                                      <a class='btn bg-teal waves-effect' type='button' href="<?php echo base_url()?>revisi/edit/<?php echo $d->No ?>">Edit</a>
                                    </td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                        </div>
                        <!-- Default Size MODAL -->
                        <!-- <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <?php //foreach ($datauser as $d):
                                      $id_dok = $datauser->No_Verifikasi;
                                      $dok_jurnal = $datauser->Status_Dok_Jurnal;
                                      $dok_manager = $datauser->Status_Dok_Manager;
                                      if ($dok_jurnal=="pending") {
                                        $lokasi = "Dokumen Berada di Bagian Jurnal";
                                      }elseif ($dok_manager=="pending") {
                                        $lokasi = "Dokumen Berada di Bagian Manager";
                                      }
                                        ?>
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="defaultModalLabel"><?php echo $id_dok?></h4>
                                        </div>
                                        <div class="modal-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button> -->
                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                        </div>

                                        <?php
                                     //endforeach; ?>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
