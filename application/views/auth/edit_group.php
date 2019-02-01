<section class="content-header">
    <h1>
        <?php echo lang('edit_group_heading');?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('auth') ?>">Usuários</a></li>
        <li class="active"><?php echo lang('edit_group_heading');?></li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="col-lg-12">
                    <?php if ($message) { ?>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                            <?php echo $message; ?>
                        </div>
                    <?php } ?>
                </div>
                </div>
                <?php echo form_open(current_url());?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo lang('edit_group_name_label', 'group_name');?>
                                <?php echo form_input($group_name,'','class="form-control"');?>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?php echo lang('edit_group_desc_label', 'description');?>
                                <?php echo form_input($group_description,'','class="form-control"');?>
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
<script>
    $(function () {
        //Datemask dd/mm/yyyy
        $('#fone').inputmask('(99)99999-9999')

    })
</script>
