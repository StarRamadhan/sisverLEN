
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                      <h2 class="card-inside-title">Filter</h2>
                      <div class="row clearfix">
                        <form method="post" id="form_advanced_validation" action="<?php echo base_url().$customSearch ?>">
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
                                  <option value="me"> By Me </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3 text-left">
                            <button type="submit" class="btn bg-blue-grey waves-effect waves-float"><i class="material-icons">search</i></button>
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
                      //echo "<script>alert('$flashMessage')</script>";
                     } ?>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tableVerif">
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
                                    <th>Lokasi</th>
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
                                    <td><?php echo $d->No_Verifikasi?></td>
                                    <td><?php echo $d->Kode_Ver?></td>
                                    <td><?php echo $d->Keterangan?></td>
                                    <td><?php echo $d->User?></td>
                                    <td><?php echo $d->Mata_Uang?></td>
                                    <td><?php echo number_format($d->Jumlah,2,",",".");?></td>
                                    <td>
                                      <?php
                                          $lok_dokumen = $d->Lok_Dokumen;
                                          if ($lok_dokumen=="jurnalis") {
                                            $lokasi = "Jurnalis";
                                            echo '<button type="button" class="btn bg-orange waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }elseif ($lok_dokumen=="manager") {
                                            $lokasi = "Manager";
                                            echo '<button type="button" class="btn bg-brown waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }elseif ($lok_dokumen=="finish") {
                                            $lokasi = "Finish";
                                            echo '<button type="button" class="btn bg-light-green waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
                                          }elseif ($lok_dokumen=="reject") {
                                            $lokasi = "Reject";
                                            echo '<button type="button" class="btn bg-red waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lokasi.'</button>';
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
        </div>
    </div>
</div>
