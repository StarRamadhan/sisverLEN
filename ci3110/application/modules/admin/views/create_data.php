<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">

            <div class="body">
                <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" required>
                            <label class="form-label">Username</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="password" required>
                            <label class="form-label">Password</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                      <select class="form-control show-tick" name="position" required>
                          <option value="">-- Select Role --</option>
                              <option value='verifikasi1'>Verification 1</option>;
                              <option value='verifikasi2'>Verification 2</option>;
                              <option value='verifikasi3'>Verification 3</option>;
                              <option value='manager'>Manager</option>;
                              <option value='jurnal'>Journal</option>;
                              <option value='admin'>Admin</option>;

                      </select>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" class="form-control" name="phone_number" required>
                            <label class="form-label">Phone Number</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                      <select class="form-control show-tick" name="status" required>
                          <option value="">-- Status --</option>
                              <option value='active' selected>Active</option>;
                              <option value='nonactive'>Nonactive</option>;
                      </select>
                    </div>
                        <a class='btn btn-info waves-effect' type='button' href="<?php echo base_url()?>admin/">BACK</a>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
