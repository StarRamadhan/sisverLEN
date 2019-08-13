    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="body">
                    <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="user_id" value="<?php echo $dataedit->user_id?>"readonly required>
                                <label class="form-label">User Id</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" value="<?php echo $dataedit->username?>"required>
                                <label class="form-label">Username</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="password" value="<?php echo $dataedit->password?>"required>
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                          <select class="form-control show-tick" name="position" required>
                              <option value="">-- Select Role --</option>
                              <?php
                                if ($dataedit->position == 'admin') {
                                    echo "<option value='admin' selected>Admin</option>";
                                }else{
                                  echo "<option value='admin'>Admin</option>";
                                }
                                if ($dataedit->position == 'manager') {
                                    echo "<option value='manager' selected>Manager</option>";
                                }else{
                                  echo "<option value='manager'>Manager</option>";
                                }
                                if ($dataedit->position == 'jurnal') {
                                    echo "<option value='jurnal' selected>Journal</option>";
                                }else{
                                  echo "<option value='journal'>Journal</option>";
                                }
                                if ($dataedit->position == 'verifikasi1') {
                                    echo "<option value='verifikasi1' selected>Verification 1</option>";
                                }else{
                                  echo "<option value='verifikasi1'>Verification 1</option>";
                                }
                                if ($dataedit->position == 'verifikasi2') {
                                    echo "<option value='verifikasi2' selected>Verification 2</option>";
                                }else{
                                  echo "<option value='verifikasi2'>Verification 2</option>";
                                }
                                if ($dataedit->position == 'verifikasi3') {
                                    echo "<option value='verifikasi3' selected>Verification 3</option>";
                                }else{
                                  echo "<option value='verifikasi3'>Verification 3</option>";
                                }
                              ?>
                          </select>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="phone_number" value="<?php echo $dataedit->phone_number?>" required>
                                <label class="form-label">Phone Number</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                          <select class="form-control show-tick" name="status" required>
                              <option value="">-- Status --</option>
                              <?php
                                if ($dataedit->status == 'active') {
                                    echo "<option value='active' selected>Active</option>";
                                }else{
                                  echo "<option value='active'>Active</option>";
                                }

                                if ($dataedit->status == 'nonactive') {
                                    echo "<option value='nonactive' selected>Nonactive</option>";
                                }else{
                                  echo "<option value='nonactive'>Nonactive</option>";
                                }
                              ?>
                          </select>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
