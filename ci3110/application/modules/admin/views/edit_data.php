    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header"><h2>Edit Data For Operator Id : <?php echo $dataedit->Operator_Id; ?></h2></div>
                <div class="body">
                    <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                        <div class="form-group form-float hidden">
                            <div class="form-line">
                                <input type="text" class="form-control" name="operator_id" value="<?php echo $dataedit->Operator_Id?>"readonly required>
                                <label class="form-label">User Id</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" value="<?php echo $dataedit->Username?>"required>
                                <label class="form-label">Username</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" class="form-control" name="password" value="<?php echo $dataedit->Password?>"required>
                                <label class="form-label">Password</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                          <select class="form-control show-tick" name="position" required>
                              <option value="">-- Select Role --</option>
                              <?php
                                if ($dataedit->Position == 'admin') {
                                    echo "<option value='admin' selected>Admin</option>";
                                }else{
                                  echo "<option value='admin'>Admin</option>";
                                }
                                if ($dataedit->Position == 'manager') {
                                    echo "<option value='manager' selected>Manager</option>";
                                }else{
                                  echo "<option value='manager'>Manager</option>";
                                }
                                if ($dataedit->Position == 'jurnalis') {
                                    echo "<option value='jurnalis' selected>Jurnalis</option>";
                                }else{
                                  echo "<option value='jurnalis'>Jurnalis</option>";
                                }
                                if ($dataedit->Position == 'verifikasi1') {
                                    echo "<option value='verifikasi1' selected>Verification 1</option>";
                                }else{
                                  echo "<option value='verifikasi1'>Verification 1</option>";
                                }
                                if ($dataedit->Position == 'verifikasi2') {
                                    echo "<option value='verifikasi2' selected>Verification 2</option>";
                                }else{
                                  echo "<option value='verifikasi2'>Verification 2</option>";
                                }
                                if ($dataedit->Position == 'verifikasi3') {
                                    echo "<option value='verifikasi3' selected>Verification 3</option>";
                                }else{
                                  echo "<option value='verifikasi3'>Verification 3</option>";
                                }
                              ?>
                          </select>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" class="form-control" name="phone_number" value="<?php echo $dataedit->Phone_Number?>" required>
                                <label class="form-label">Phone Number</label>
                            </div>
                        </div>
                        <div class="form-group form-float">
                          <select class="form-control show-tick" name="status" required>
                              <option value="">-- Select Role --</option>
                              <?php
                                if ($dataedit->Status == 'active') {
                                    echo "<option value='active' selected>Active</option>";
                                }else{
                                  echo "<option value='active'>Active</option>";
                                }
                                if ($dataedit->Status == 'nonactive') {
                                    echo "<option value='nonactive' selected>Nonactive</option>";
                                }else{
                                  echo "<option value='nonactive'>Nonactive</option>";
                                }
                              ?>
                          </select>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-6 text-left">
                            <button class="btn btn-primary waves-effect waves-white" type="submit">SAVE</button>
                          </div>
                          <div class="col-md-6 text-right">
                            <a class='btn btn-primary waves-effect waves-white' type='button' href="<?php echo base_url()?>admin/">CANCEL</a>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
