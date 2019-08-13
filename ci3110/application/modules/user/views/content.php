
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            BASIC EXAMPLE
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                              <thead>
                                <tr>
                                    <?php foreach ($datafield as $d): ?>
                                      <th><?php echo str_replace("_"," ",$d) ?></th>
                                    <?php endforeach; ?>
                                    <th>aksi</th>
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
                                      <a class='btn btn-info waves-effect' type='button' href="<?php echo base_url().$module?>/user/edit/<?php echo $d->id_user ?>">Edit</a>
                                      <a class="modalDelete" data-toggle="modal" data-target="#responsive-modal" value="<?php echo $d->user_id ?>" href="#"><i class="feather icon-trash"></i></a>
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
