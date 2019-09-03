
        <!-- Basic Examples -->
        <div class="row clearfix">
          <div class="block-header">
              <h2>DASHBOARD HISTORY YOUR DOCUMENT VERIFICATION</h2>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box-2 bg-blue hover-zoom-effect">
                  <div class="icon">
                      <i class="material-icons">assignment</i>
                  </div>
                  <div class="content">
                    <div class="text">TODAY DOC</div>
                    <div class="number"><?php echo $dataToday?></div>
                  </div>
              </div>

          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box-2 bg-orange hover-zoom-effect">
                  <div class="icon">
                      <i class="material-icons">assignment</i>
                  </div>
                  <div class="content">
                      <div class="text">THIS MONTH DOC</div>
                      <div class="number"><?php echo $dataThisMonth?></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box-2 bg-light-green hover-zoom-effect">
                  <div class="icon">
                      <i class="material-icons">assignment</i>
                  </div>
                  <div class="content">
                      <div class="text">LAST MONTH DOC</div>
                      <div class="number"><?php echo $dataLastMonth?></div>
                  </div>
              </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="info-box-2 bg-pink hover-zoom-effect">
                  <div class="icon">
                      <i class="material-icons">assignment</i>
                  </div>
                  <div class="content">
                      <div class="text">REJECTED</div>
                      <div class="number"><?php echo $dataRejected?></div>
                  </div>
              </div>
          </div>
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
                                <option value="me" selected> By Me </option>
                                  <option value="all"> All Document </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3 text-left">
                            <button type="submit" class="btn bg-blue-grey waves-effect waves-float"><i class="material-icons">search</i></button>
                          </div>
                        <div class="col-md-3 text-left">
                          <?php
                            if ($this->session->userdata('akses')=='verifikasi1') {?>
                              <div class="btn-group">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Add New Document <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu">
                                      <li><a href="<?php echo base_url('verifikasi/create');?>">Current Date</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="<?php echo base_url('verifikasi/custom_create');?>">Custom Date</a></li>
                                  </ul>
                              </div>
                              <?php
                            }else{?>
                                  <a href="<?php echo base_url('verifikasi/create');?>" type="button" class="btn bg-blue waves-effect">Add New Data</a>
                              <?php
                            }
                          ?>

                        </div>
                      </div>
                      <a id="buttonFilter" href="#"><h2 href="" class="card-inside-title" style="display:none;">more filter?</h2></a>
                      <div id="formFilter" class="row clearfix" style="display:none;">
                        <div class="col-md-2">
                          <div class="form-line">
                            <select class="form-control show-tick" name="category" required>
                              <option selected> -- Category -- </option>
                              <option value="No_Verifikasi"> No Verifikasi </option>
                              <option value="Kode_Ver"> Kode Verifikasi </option>
                              <option value="Keterangan"> Keterangan </option>
                              <option value="User"> User </option>
                              <option value="Mata Uang"> Mata Uang </option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4 text-left">
                          <div class="input-group">
                              <div class="form-line">
                                  <input type="text" id="dateStart" class="form-control" name='categoryValue' placeholder="Value..." autocomplete="off">
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
                                    <th>Tanggal Masuk</th>
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
                              <tfoot>
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
                              </tfoot>
                            </table>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>    
