
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header">
                    <h2 class="card-inside-title">Filter</h2>
                    <div class="row clearfix">
                      <form method="post" id="form_advanced_validation" action="<?php //echo base_url().$customSearch ?>">

                          <div class="col-md-5 text-left">
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
                          <!-- <div class="col-md-2">
                            <div class="form-line">
                              <select class="form-control show-tick" name="by">
                                  <option value="">-- Select One --</option>
                                  <option value="all"> All Document </option>
                                  <option value="me"> By Me </option>
                              </select>
                            </div>
                          </div> -->
                          <div class="col-md-3 text-left">
                            <button type="submit" class="btn bg-blue-grey waves-effect waves-float">Search</button>&nbsp
                            <a type="button" href="<?php echo base_url('jurnalis/dokumen_all')?>" class="btn bg-blue-grey waves-effect waves-float">Reset</a>
                          </div>
                      </form>
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
                                    <th>Tanggal</th>
                                    <th>No Verifikasi</th>
                                    <th>Kode Ver</th>
                                    <th>Keterangan</th>
                                    <th>User</th>
                                    <th>MU</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi</th>
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
                                    <td>
                                      <?php
                                          $lok_dokumen = $d->Lok_Dokumen;
                                          if ($lok_dokumen=="jurnal") {
                                            $lokasi = "Jurnal";
                                            echo '<button type="button" class="btn bg-orange waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }elseif ($lok_dokumen=="manager") {
                                            $lokasi = "Manager";
                                            echo '<button type="button" class="btn bg-brown waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }elseif ($lok_dokumen=="finish") {
                                            $lokasi = "Finish";
                                            echo '<button type="button" class="btn bg-light-green waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }elseif ($lok_dokumen=='rejected') {
                                            echo '<button type="button" class="btn bg-cyan waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">Rejected</button>';
                                          }
                                      ?>

                                      <!-- <a class='btn btn-info waves-effect' type='button' href="<?php echo base_url()?>verifikasi/edit/<?php echo $d->No_Verifikasi;?>">Edit</a> -->
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
                                            <!-- <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                        </div> -->

                                        <?php
                                     //endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
