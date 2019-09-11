
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                  <div class="header">
                    <h2 class="card-inside-title">Filter</h2>
                    <form method="post" id="form_advanced_validation" action="<?php echo base_url().$customSearch ?>">
                      <div class="row clearfix">
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
                              <!-- <option value="">-- Select One --</option> -->
                                <?php
                                      if ($this->session->userdata('ses_by')=='me') {
                                        echo '<option value="me" selected> By Me </option>';
                                      }else {
                                        echo '<option value="me"> By Me </option>';
                                      }
                                      if ($this->session->flashdata('ses_by')=='all') {
                                        echo '<option value="all" selected> All Document </option>';
                                      }else {
                                        echo '<option value="all"> All Document </option>';
                                      }
                                ?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3 text-left">
                          <button type="submit" class="btn bg-blue-grey waves-effect waves-float">Search</button>
                          <a type="button" href="<?php echo base_url('jurnalis/dokumen_all')?>" class="btn bg-blue-grey waves-effect waves-float">Reset</a>
                        </div>
                    </div>
                    <a id="buttonFilter" href="#"><small href="" class="card-inside-title">more filter?</small></a>
                    <div id="formFilter" class="row clearfix" style="display:none;">
                      <div class="col-md-2">
                        <div class="form-line">
                          <select id="category" class="form-control show-tick" name="category" required>
                                  <option value="" selected> -- Category -- </option>
                                  <option value="No_Verifikasi"> No Verifikasi </option>
                                  <option value="Kode_Ver"> Kode Verifikasi </option>
                                  <option value="Keterangan"> Keterangan </option>
                                  <option value="User"> User </option>
                                  <option value="Mata_Uang"> Mata Uang </option>
                                  <option value="Lok_Dokumen"> Lokasi Dokumen </option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 text-left">
                        <div class="input-group">
                            <div class="form-line">
                                <input type="text" id="categoryValue" class="form-control" name="categoryValue" placeholder="Value..." autocomplete="off" required>
                            </div>
                        </div>
                      </div>
                    </div>
                   </form>
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
                            <table class="table table-bordered table-striped table-hover js-exportable dataTable">
                              <thead>
                                <tr>
                                    <th>Tgl Masuk Verifikasi</th>
                                    <th>Tgl Masuk Jurnalis</th>
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
                                    <td><?php echo date('Y-m-d', strtotime($d->Tanggal_Masuk));?></td>
                                    <td><?php echo date('Y-m-d', strtotime($d->Tgl_Out_Verif));?></td>
                                    <td><?php echo $d->No_Verifikasi?></td>
                                    <td><?php echo $d->Kode_Ver?></td>
                                    <td><?php echo $d->Keterangan?></td>
                                    <td><?php echo $d->User?></td>
                                    <td><?php echo $d->Mata_Uang?></td>
                                    <td><?php echo number_format($d->Jumlah,2,",",".");?></td>
                                    <td>
                                      <?php
                                          $lok_dokumen = $d->Lok_Dokumen;
                                          if ($lok_dokumen=="Jurnalis 1") {
                                            echo '<button type="button" class="btn bg-orange waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lok_dokumen.'</button>';
                                          }elseif ($lok_dokumen=="Jurnalis 2") {
                                            echo '<button type="button" class="btn bg-orange waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lok_dokumen.'</button>';
                                          }elseif ($lok_dokumen=="Jurnalis 3") {
                                            echo '<button type="button" class="btn bg-orange waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lok_dokumen.'</button>';
                                          }elseif ($lok_dokumen=="Manager") {
                                            echo '<button type="button" class="btn bg-brown waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lok_dokumen.'</button>';
                                          }elseif ($lok_dokumen=="Finish") {
                                            echo '<button type="button" class="btn bg-light-green waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lok_dokumen.'</button>';
                                          }elseif ($lok_dokumen=="Reject") {
                                            echo '<button type="button" class="btn bg-red waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal">'.$lok_dokumen.'</button>';
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
