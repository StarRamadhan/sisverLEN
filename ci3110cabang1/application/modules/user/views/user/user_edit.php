<section class="card">
      <div class="card-header">
        <h4 class="card-title">Edit user</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form method="post" action="<?php echo base_url().$action ?>">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">id_user</label>
              <div class="col-sm-10">
                <input type="text" name="id_user" class="form-control" placeholder="" value="<?php echo $dataedit->id_user?>" readonly>
              </div>
            </div><div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">nama_user</label>
                              <div class="col-sm-10">
                                <input type="text" name="nama_user" class="form-control" value="<?php echo $dataedit->nama_user?>">
                              </div>
                            </div><div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">password_user</label>
                              <div class="col-sm-10">
                                <input type="text" name="password_user" class="form-control" value="<?php echo $dataedit->password_user?>">
                              </div>
                            </div><div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">password2_user</label>
                              <div class="col-sm-10">
                                <input type="text" name="password2_user" class="form-control" value="<?php echo $dataedit->password2_user?>">
                              </div>
                            </div><div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">jabatan_user</label>
                              <div class="col-sm-10">
                                <input type="text" name="jabatan_user" class="form-control" value="<?php echo $dataedit->jabatan_user?>">
                              </div>
                            </div><div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">no_telp</label>
                              <div class="col-sm-10">
                                <input type="text" name="no_telp" class="form-control" value="<?php echo $dataedit->no_telp?>">
                              </div>
                            </div><div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">foto</label>
                              <div class="col-sm-10">
                                <input type="text" name="foto" class="form-control" value="<?php echo $dataedit->foto?>">
                              </div>
                            </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect
           waves-light float-right">Simpan</button>
        </div>
      </form>
      </div>
    </section>
