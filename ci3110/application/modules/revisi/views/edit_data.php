    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="body">
                    <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                      <div class="form-group form-float">
                          <div class="form-line">
                              <input type="text" class="form-control" name="no" value="<?php echo $dataedit->No?>" required readonly>
                              <label class="form-label">No Revisi</label>
                          </div>
                      </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="no_verifikasi" value="<?php echo $dataedit->No_Verifikasi?>" required readonly>
                                <label class="form-label">No Dokumen</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                          <select class="form-control show-tick" name="kode_ver" required>
                              <?php
                                if ($dataedit->kode_ver == 'LB') {
                                    echo "<option value='LB' selected>LB</option>";
                                }else{
                                  echo "<option value='LB'>LB</option>";
                                }
                                if ($dataedit->kode_ver == 'LK') {
                                    echo "<option value='LK' selected>LK</option>";
                                }else{
                                  echo "<option value='LK'>LK</option>";
                                }
                                if ($dataedit->kode_ver == 'LM') {
                                    echo "<option value='LM' selected>LM</option>";
                                }else{
                                  echo "<option value='LM'>LM</option>";
                                }
                                if ($dataedit->kode_ver == 'LN') {
                                    echo "<option value='LN' selected>LN</option>";
                                }else{
                                  echo "<option value='LN'>LN</option>";
                                }
                                if ($dataedit->kode_ver == 'PB') {
                                    echo "<option value='PB' selected>PB 2</option>";
                                }else{
                                  echo "<option value='PB'>PB</option>";
                                }
                                if ($dataedit->kode_ver == 'PP') {
                                    echo "<option value='PP' selected>PP</option>";
                                }else{
                                  echo "<option value='PP'>PP</option>";
                                }
                                if ($dataedit->kode_ver == 'UM') {
                                    echo "<option value='UM' selected>UM</option>";
                                }else{
                                  echo "<option value='UM'>UM</option>";
                                }
                              ?>
                          </select>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="keterangan" value="<?php echo $dataedit->Keterangan?>" required>
                                <label class="form-label">Keterangan</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="user" value="<?php echo $dataedit->User?>" required>
                                <label class="form-label">User</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="mata_uang" value="<?php echo $dataedit->Mata_Uang?>" required>
                                <label class="form-label">Mata Uang</label>
                            </div>
                        </div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="jumlah" value="<?php echo $dataedit->Jumlah?>" required>
                                <label class="form-label">Jumlah</label>
                            </div>
                        </div>

                        <div class="row clearfix">
                          <div class="col-md-6 text-left">
                            <a class='btn btn-default waves-effect waves-blue' type='button' href="<?php echo base_url()?>revisi/">BACK</a>
                          </div>
                          <div class="col-md-6 text-right">
                            <button class="btn btn-primary waves-effect" type="submit">UPDATE</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
