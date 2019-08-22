<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
              <!-- <p><?php echo 'Jml Baris :'.$numrows?></p> -->
              <p><?php echo $lastnumber->maks?></p>
              <!-- <p><?php echo $nownumber = ($lastnumber->No)+1?></p>
              <p><?php echo $pk1 = sprintf("%04s", $nownumber);?></p> -->
              <p><?php  $a='001';
                        $b='LM';
                        $c='09/2019';
                        $gabung = $a.'/'.$b.'/'.$c;
                        echo $gabung;?></p>
              <br>

              <p><?php  $lastmonth= date("m", strtotime($lastdate->Tanggal_Masuk));
                        $monthnow=date('m');
              //$lastmonth=date_format($lastdate->Tanggal_Masuk,'m');
              echo "Data Bulan Terakhir :".$lastmonth?></p>
              <p><?php echo"Data Bulan Sekarang :".$monthnow?></p>
              <!-- <p><?php
                if ($lastmonth!=$monthnow) {
                    $lastnumber=1;
                    echo $lastnumber;
                }elseif ($lastmonth==$monthnow) {
                    echo $lastnumber->No;
                    //echo "$lastnumber";
                }
                  ?></p> -->

              <?php
                //$sql=$this->db->query("SELECT * from dokumen order by Tanggal_Masuk DESC limit 1");
                date_default_timezone_set('Asia/Jakarta');
                $tgl = date('d-m-Y');
                $jam = date('H:i');?>
                <table border="1" cellpading='10'>
                  <tr>
                    <td>Tanggal &nbsp</td>
                    <td>: &nbsp</td>
                    <td><?php echo $tgl ?> &nbsp</td>
                  </tr>
                  <tr>
                    <td>Jam &nbsp</td>
                    <td>: &nbsp</td>
                    <td><?php echo $jam ?> &nbsp</td>
                  </tr>
                  <tr>
                    <td>Id</td>
                    <td>:</td>
                    <td><?php echo $this->session->userdata('ses_id');?></td>
                  </tr>
                </table>

                  </table>
                <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-md-4">
                              <div class="form-group form-float">
                                <select class="form-control show-tick" name="kode_ver" required>
                                    <option value="">-- Kode Verifikasi --</option>
                                        <option value='LB'>LB</option>;
                                        <option value='LK'>LK</option>;
                                        <option value='LM'>LM</option>;
                                        <option value='LN'>LN</option>;
                                        <option value='PB'>PB</option>;
                                        <option value='PP'>PP</option>;
                                        <option value='UM'>UM</option>;
                                </select>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <div class="form-group form-float">
                                <select class="form-control show-tick" name="mata_uang" required>
                                    <option value="">-- Mata Uang --</option>
                                        <option value='RP'>RP</option>;
                                        <option value='USD'>USD</option>;
                                        <option value='SGD'>SGD</option>;
                                        <option value='EURO'>EURO</option>;
                                        <option value='CHF'>CHF</option>;
                                </select>
                              </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="user" required>
                                    <label class="form-label">User</label>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-7">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="keterangan"></textarea>
                                    <label class="form-label">Keterangan</label>
                                </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="jumlah" required>
                                    <label class="form-label">Jumlah</label>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                      <!-- <div class="col-md-8"> -->

                        <a class='btn btn-info waves-effect' type='button' href="<?php echo base_url()?>verifikasi/">BACK</a>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
