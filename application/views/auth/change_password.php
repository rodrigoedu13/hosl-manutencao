<section class="content-header">
    <h1>
        Alterar Senha
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Alterar Senha</li>
        

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
                <form method="POST" action="<?= base_url('auth/change_password')?>">
                    <?php echo form_input($user_id);?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Senha antiga:</label>
                                <input type="password" class="form-control" name="old" id="old">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?></label>
                                <input type="password" class="form-control" name="new" id="new">
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Confirma Senha:</label>
                                <input type="password" class="form-control" name="new_confirm" id="new_confirm">
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                </div>
                </form>
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
