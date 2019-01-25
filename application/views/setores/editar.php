<section class="content-header">
    <h1>
        Editar Setor
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('setores') ?>">Setores</a></li>
        <li class="active">Editar Setor</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form method="POST" action="<?= base_url('setores/editarSetor')?>">
                <div class="box-body">
                    <div class="row">
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nome do Setor:</label>
                                <input type="text" class="form-control" name="nomeSetor" value="<?php echo $results->ds_setor;?>">
                                <input type="hidden" value="<?php echo $results->cd_setor;?>" name="id">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Unidade  :</label>
                                <?php 
                                $options = array ($results->unidades_cd_unidade => $results->ds_unidade) + $unidades;
                                echo form_dropdown($name = 'nomeUnidade', $options,'' , 'class="form-control"'); ?>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label>Ativo:</label>
                                <select class="form-control" name="tpAtivo">
                                    <option value="1" <?=($results->tp_ativo == '1')?'selected':''?>>SIM</option>
                                    <option value="2" <?=($results->tp_ativo == '2')?'selected':''?>>NÃO</option>

                                </select>
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
