<section class="content-header">
    <h1>
        <?php echo lang('deactivate_heading'); ?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('auth') ?>">Usuários</a></li>
        <li class="active"><?php echo lang('deactivate_heading'); ?></li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    
                </div>
                <?php echo form_open("auth/deactivate/".$user->id);?>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <h4><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></h4>
                            </div>
                        </div>
                        <div class="row">
                            <?php echo form_hidden($csrf); ?>
                            <?php echo form_hidden(['id' => $user->id]); ?>
                            <div class="col-lg-1">
                                <div class="form-group">
                                  
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="confirm" value="yes" checked="checked" />
                                        SIM
                                        </label>
                                    </div>
                                </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    
                                    <div class="radio">
                                        <label>
                                        <input type="radio" name="confirm" value="no" />
                                        NÃO
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                    </div>
                <?php echo form_close();?>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
