<section class="content-header">
    <h1>
        Cadastro de Usuário
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('auth') ?>">Usuários</a></li>
        <li class="active">Cadastro de Usuário</li>

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
                <form method="POST" action="<?= base_url('auth/create_user')?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Usuário:</label>
                                <input type="text" class="form-control" name="identity">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" class="form-control" name="first_name">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Sobrenome:</label>
                                <input type="text" class="form-control" name="last_name">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Empresa:</label>
                                <input type="text" class="form-control" name="company">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Telefone:</label>
                                <input type="text" class="form-control" id="fone" name="phone">
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Confirma Senha:</label>
                                <input type="password" class="form-control" name="password_confirm">
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
