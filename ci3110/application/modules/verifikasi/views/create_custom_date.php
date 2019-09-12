<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>Create New Document</h2></div>
            <div class="body">
                <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                    <div class="form-group form-float hidden">
                        <div class="form-line">
                            <input type="text" class="form-control" name="operator_id" value="<?php echo $this->session->userdata('ses_id');?>" required>
                            <label class="form-label">Operator Id</label>
                        </div>
                    </div>

                    <div class="form-group form-float">
                        <div class="form-line" id="bs_datepicker_container">
                            <input type="text" placeholder="Select Date" class="form-control" id='customDate' name="customDate">
                            <!-- <label class="form-label">Select Date</label> -->
                        </div>
                    </div>
                    <div class="form-group form-float">
                      <select class="form-control show-tick" name="kode_ver" required>
                          <option value="">-- Kode Verifikasi --</option>
                          <?php
                            if ($this->session->userdata('akses')=='verifikasi1') {
                              echo "<option value='UM'>UM</option>";
                              echo "<option value='PB'>PB</option>";
                              echo "<option value='LN'>LN</option>";
                              echo "<option value='LK'>LK</option>";
                              echo "<option value='LB'>LB</option>";
                            }elseif ($this->session->userdata('akses')=='verifikasi2') {
                              echo "<option value='LM'>LM</option>";
                              echo "<option value='UM'>UM</option>";
                              echo "<option value='PB'>PB</option>";
                              echo "<option value='LN'>LN</option>";
                              echo "<option value='LK'>LK</option>";
                              echo "<option value='LB'>LB</option>";
                            }elseif ($this->session->userdata('akses')=='verifikasi3') {
                              echo "<option value='PP'>PP</option>";
                            }
                          ?>
                      </select>
                    </div>
                    <div class="form-group form-float">
                      <select class="form-control show-tick" name="mata_uang" required>
                          <option value="">-- Mata Uang --</option>
                              <option value='RP'>RP</option>
                              <option value='USD'>USD</option>
                              <option value='SGD'>SGD</option>
                              <option value='EURO'>EURO</option>
                              <option value='CHF'>CHF</option>
                              <option value='GBP'>GBP</option>
                              <option value='JPY'>JPY</option>
                      </select>
                    </div>
                    <div class="form-group form-float">
                      <div class="form-line">
                          <input type="text" class="form-control" name="user" autocomplete="off" required>
                          <label class="form-label">User</label>
                      </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="keterangan" autocomplete="off"></textarea>
                            <label class="form-label">Keterangan</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="jumlah" autocomplete="off" required>
                            <label class="form-label">Jumlah</label>
                        </div>
                    </div>
                <!-- <div class="col-md-8"> -->
                    <div class="row clearfix">
                        <div class="col-md-6 text-left">
                          <button class="btn btn-primary waves-effect waves-white" type="submit">SAVE</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <a class='btn btn-primary waves-effect waves-white' type='button' href="<?php echo base_url()?>verifikasi/">BACK</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
