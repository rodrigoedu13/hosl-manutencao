<section class="content-header">
    <h1>
        Editar Unidade
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('unidades') ?>">Unidades</a></li>
        <li class="active">Editar Unidade</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form method="POST" action="<?= base_url('unidades/editarUnidade')?>">
                <div class="box-body">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nome do Colaborador:</label>
                                <input type="text" class="form-control" name="nomeUnidade" value="<?php echo $results->ds_unidade;?>" style="text-transform:uppercase">
                                <input type="hidden" value="<?php echo $results->cd_unidade;?>" name="id">
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
