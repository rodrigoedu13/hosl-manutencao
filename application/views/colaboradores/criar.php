<section class="content-header">
    <h1>
        Cadastro de Colaborador
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('colaboradores') ?>">Colaboradores</a></li>
        <li class="active">Cadastro de Colaborador</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form method="POST" action="<?= base_url('colaboradores/add')?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nome do Colaborador:</label>
                                <input type="text" class="form-control" name="nomeColaborador">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Ativo:</label>
                                <select class="form-control" name="tpAtivo">
                                    <option value="1">SIM</option>
                                    <option value="2">NÃO</option>
                                </select>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
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
