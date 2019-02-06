<section class="content-header">
    <h1>
        Cadastro de Status
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('status') ?>">Status</a></li>
        <li class="active">Cadastro de Status</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form method="POST" action="<?= base_url('status/add')?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Código do Status:</label>
                                <input type="text" class="form-control" name="codStatus" style="text-transform:uppercase">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Descrição do Status:</label>
                                <input type="text" class="form-control" name="descStatus" style="text-transform:uppercase">
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
