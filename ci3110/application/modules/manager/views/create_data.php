<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">

                <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="form-group form-float hidden">
                              <div class="form-line">
                                  <input type="text" class="form-control" name="operator_id" value="<?php echo $this->session->userdata('ses_id');?>" required>
                                  <label class="form-label">Operator Id</label>
                              </div>
                            </div>
                              <div class="form-group form-float">
                                <select class="form-control show-tick" name="kode_ver" required>
                                    <option value="">-- Kode Verifikasi --</option>
                                        <option value='LB'>LB</option>
                                        <option value='LK'>LK</option>
                                        <option value='LM'>LM</option>
                                        <option value='LN'>LN</option>
                                        <option value='PB'>PB</option>
                                        <option value='PP'>PP</option>
                                        <option value='UM'>UM</option>
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
                                </select>
                              </div>
                              <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="user" required>
                                    <label class="form-label">User</label>
                                </div>
                              </div>
                              <div class="form-group form-float">
                                  <div class="form-line">
                                      <input type="text" class="form-control" name="keterangan"></textarea>
                                      <label class="form-label">Keterangan</label>
                                  </div>
                              </div>
                              <div class="form-group form-float">
                                  <div class="form-line">
                                      <input type="number" class="form-control" name="jumlah" required>
                                      <label class="form-label">Jumlah</label>
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