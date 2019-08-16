<section class="card">
      <div class="card-header">
        <h4 class="card-title">Tambah Data</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
          <form method="post" action="<?php echo base_url().$action ?>"><div class="form-group row">
                <label class="col-sm-2 col-form-label">nama_user</label>
                <div class="col-sm-10">
                  <input type="text" name="nama_user" class="form-control">
                </div>
              </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">password_user</label>
                <div class="col-sm-10">
                  <input type="text" name="password_user" class="form-control">
                </div>
              </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">password2_user</label>
                <div class="col-sm-10">
                  <input type="text" name="password2_user" class="form-control">
                </div>
              </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">jabatan_user</label>
                <div class="col-sm-10">
                  <input type="text" name="jabatan_user" class="form-control">
                </div>
              </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">no_telp</label>
                <div class="col-sm-10">
                  <input type="text" name="no_telp" class="form-control">
                </div>
              </div><div class="form-group row">
                <label class="col-sm-2 col-form-label">foto</label>
                <div class="col-sm-10">
                  <input type="text" name="foto" class="form-control">
                </div>
              </div></div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect
           waves-light float-right">Simpan</button>
        </div>
      </form>
      </div>
    </section>