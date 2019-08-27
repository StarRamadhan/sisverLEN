<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"><h2>Edit Data For Operator Id : <?php echo $dataedit->operator_id; ?></h2></div>
            <div class="body">
                <form method="post" id="form_advanced_validation" action="<?php echo base_url().$action ?>">
                    <div class="form-group form-float hidden">
                        <div class="form-line">
                            <input type="text" class="form-control" name="operator_id" value="<?php echo $dataedit->operator_id?>"readonly required>
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
                        <div class="form-line">
                            <input type="number" class="form-control" name="phone_number" value="<?php echo $dataedit->phone_number?>" required>
                            <label class="form-label">Phone Number</label>
                        </div>
                    </div>
                    <div class="row clearfix">
                      <div class="col-md-6 text-left">
                        <button class="btn btn-primary waves-effect waves-white" type="submit">SAVE</button>
                      </div>
                      <div class="col-md-6 text-right">
                        <a class='btn btn-primary waves-effect waves-white' type='button' href="<?php echo base_url()?>jurnalis/">CANCEL</a>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
