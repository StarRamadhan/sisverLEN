<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>From Document <?php echo $dataedit->No_Verifikasi?>, <br><br>Must Be Fixed : <?php echo $dataedit->Alasan_Revisi; ?></h2></div>
            <div class="body">
                <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                  <div class="form-group form-float">
                      <div class="form-line hidden">
                          <input type="text" class="form-control" name="no" value="<?php echo $dataedit->No?>" required readonly>
                          <label class="form-label">No Revisi</label>
                      </div>
                  </div>
                    <div class="form-group form-float">
                        <div class="form-line hidden">
                            <input type="text" class="form-control" name="no_verifikasi" value="<?php echo $dataedit->No_Verifikasi?>" required readonly>
                            <label class="form-label">No Dokumen</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                      <select class="form-control show-tick" name="kode_ver" required>
                          <?php
                            if ($this->session->userdata('akses')=='verifikasi1') {
                                if ($dataedit->Kode_Ver == 'UM') {
                                    echo "<option value='UM' selected>UM</option>";
                                }else{
                                  echo "<option value='UM'>UM</option>";
                                }
                                if ($dataedit->Kode_Ver == 'PB') {
                                    echo "<option value='PB' selected>PB</option>";
                                }else{
                                  echo "<option value='PB'>PB</option>";
                                }
                                if ($dataedit->Kode_Ver == 'LN') {
                                    echo "<option value='LN' selected>LN</option>";
                                }else{
                                  echo "<option value='LN'>LN</option>";
                                }
                                if ($dataedit->Kode_Ver == 'LK') {
                                    echo "<option value='LK' selected>LK</option>";
                                }else{
                                  echo "<option value='LK'>LK</option>";
                                }
                                if ($dataedit->Kode_Ver == 'LB') {
                                    echo "<option value='LB' selected>LB</option>";
                                }else{
                                  echo "<option value='LB'>LB</option>";
                                }
                            }elseif ($this->session->userdata('akses')=='verifikasi2') {
                                if ($dataedit->Kode_Ver == 'LM') {
                                    echo "<option value='LM' selected>LM</option>";
                                }else{
                                  echo "<option value='LM'>LM</option>";
                                }
                                if ($dataedit->Kode_Ver == 'UM') {
                                    echo "<option value='UM' selected>UM</option>";
                                }else{
                                  echo "<option value='UM'>UM</option>";
                                }
                                if ($dataedit->Kode_Ver == 'PB') {
                                    echo "<option value='PB' selected>PB</option>";
                                }else{
                                  echo "<option value='PB'>PB</option>";
                                }
                                if ($dataedit->Kode_Ver == 'LN') {
                                    echo "<option value='LN' selected>LN</option>";
                                }else{
                                  echo "<option value='LN'>LN</option>";
                                }
                                if ($dataedit->Kode_Ver == 'LK') {
                                    echo "<option value='LK' selected>LK</option>";
                                }else{
                                  echo "<option value='LK'>LK</option>";
                                }
                                if ($dataedit->Kode_Ver == 'LB') {
                                    echo "<option value='LB' selected>LB</option>";
                                }else{
                                  echo "<option value='LB'>LB</option>";
                                }
                            }elseif ($this->session->userdata('akses')=='verifikasi3') {
                              if ($dataedit->Kode_Ver == 'PP') {
                                  echo "<option value='PP' selected>PP</option>";
                              }else{
                                echo "<option value='PP'>PP</option>";
                              }
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
                      <select class="form-control show-tick" name="mata_uang" required>
                          <option value="">-- Mata Uang --</option>
                          <?php if ($dataedit->Mata_Uang == 'RP') {
                                  echo "<option value='RP' selected>RP</option>";
                                }else {
                                  echo "<option value='RP'>RP</option>";
                                }
                                if ($dataedit->Mata_Uang == 'USD') {
                                  echo "<option value='USD' selected>USD</option>";
                                }else {
                                  echo "<option value='USD'>USD</option>";
                                }
                                if ($dataedit->Mata_Uang == 'SGD') {
                                  echo "<option value='SGD' selected>SGD</option>";
                                }else {
                                  echo "<option value='SGD'>SGD</option>";
                                }
                                if ($dataedit->Mata_Uang == 'EURO') {
                                  echo "<option value='EURO' selected>EURO</option>";
                                }else {
                                  echo "<option value='EURO'>EURO</option>";
                                }
                                if ($dataedit->Mata_Uang == 'CHF') {
                                  echo "<option value='CHF' selected>CHF</option>";
                                }else {
                                  echo "<option value='CHF'>CHF</option>";
                                }
                                if ($dataedit->Mata_Uang == 'GBP') {
                                  echo "<option value='GBP' selected>GBP</option>";
                                }else {
                                  echo "<option value='GBP'>GBP</option>";
                                }
                                if ($dataedit->Mata_Uang == 'JPY') {
                                  echo "<option value='JPY' selected>JPY</option>";
                                }else {
                                  echo "<option value='JPY'>JPY</option>";
                                }
                          ?>
                      </select>
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
