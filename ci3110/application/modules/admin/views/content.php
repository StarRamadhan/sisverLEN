
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                      <div class="row clearfix">
                            <div class="col-md-6 text-left">
                              <h2> Manage Operator Data </h2>
                            </div>
                            <div class="col-md-6 text-right">
                              <a href="<?php echo base_url('admin/create');?>" type="button" class="btn bg-blue waves-effect">Add New Data</a>
                            </div>
                        </div>
                    </div>
                    <?php if($this->session->flashdata('flashMessage')) {
                      $flashMessage=$this->session->flashdata('flashMessage');?>
                      <div class="alert alert-info alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          Success Update Data !!!
                      </div>
                      <?php } ?>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($datauser as $d): ?>
                                  <tr>
                                    <td><?php echo $d->Operator_Id ?></td>
                                    <td><?php echo $d->Username ?>
                                      <?php
                                      if ($d->Status=='active') {
                                        echo '<br><button type="button" class="btn bg-amber btn-xs waves-effect">'.$d->Status.'</button></td>';
                                      }elseif ($d->Status=='nonactive') {
                                        echo '<br><button type="button" class="btn bg-grey btn-xs waves-effect">'.$d->Status.'</button></td>';
                                      }
                                       ?>
                                    <td><?php echo $d->Password ?></td>
                                    <td><?php echo $d->Position ?></td>
                                    <td><?php echo $d->Phone_Number ?></td>
                                    <td>
                                      <a class='btn bg-cyan waves-effect' type='button' href="<?php echo base_url()?>admin/edit/<?php echo $d->Operator_Id ?>">Edit</a>
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