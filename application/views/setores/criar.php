<section class="content-header">
    <h1>
        Cadastro de Setor
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('setores') ?>">Setores</a></li>
        <li class="active">Cadastro de Setor</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form method="POST" action="<?= base_url('setores/add')?>">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nome do setor:</label>
                                <input type="text" class="form-control" name="nomeSetor">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Unidade  :</label>
                                <?php 
                                $options = array ('0' => 'Selecione uma unidade') + $unidades;
                                echo form_dropdown($name = 'nomeUnidade', $options,'' , 'class="form-control"'); ?>
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
