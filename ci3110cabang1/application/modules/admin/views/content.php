
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            BASIC EXAMPLE
                        </h2>
                    </div>
                    <?php if($this->session->flashdata('flashMessage')) {
                      $flashMessage=$this->session->flashdata('flashMessage');?>
                      <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Success Update Data !!
                      </div>
                      <?php
                      //echo "<script>alert('$flashMessage')</script>";
                     } ?>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <?php foreach ($datafield as $d): ?>
                                      <th><?php echo str_replace("_"," ",$d) ?></th>
                                    <?php endforeach; ?>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tfoot>
                                <tr>
                                    <?php foreach ($datafield as $d): ?>
                                      <th><?php echo str_replace("_"," ",$d) ?></th>
                                    <?php endforeach; ?>
                                    <th>aksi</th>
                                </tr>
                              </tfoot>
                              <tbody>
                                <?php foreach ($datauser as $d): ?>
                                  <tr>
                                    <?php foreach ($datafield as $df): ?>
                                      <td><?php echo $d->$df ?></td>
                                    <?php endforeach; ?>
                                    <td>
                                      <a class='btn btn-info waves-effect' type='button' href="<?php echo base_url()?>admin/edit/<?php echo $d->user_id ?>">Edit</a>
                                    </td>

                                  </tr>
                                <?php endforeach; ?>

                              </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->
        <!-- Exportable Table -->
