<script>
    $(function () {
        $('#unidade').change(function () {
            $('#setor').attr('disabled', 'disabled');
            $('#setor').html("<option>Carregando...</option>");
            var id_unidade = $('#unidade').val();
            $.post("<?php echo base_url(); ?>chamados/buscaSetorbyUnidade", {
                id_unidade: id_unidade
            }, function (data) {
                //console.log(data);
                $('#setor').html(data);
                $('#setor').removeAttr('disabled')
            });
        });
    });

</script>
<section class="content-header">
    <h1>
        Editar Chamado
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('mine') ?>">Meus Chamados</a></li>
        <li class="active">Editar chamado</li>

    </ol>
</section>
<?php
$datasolicitacao = date(('d/m/Y'), strtotime($results->dt_solicitacao));

if ($results->dt_resolucao == 0) {
    $dataresolucao = '';
} else {
    $dataresolucao = date(('d/m/Y'), strtotime($results->dt_resolucao));
}
?>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form method="POST" action="<?= base_url('mine/editarChamado') ?>" autocomplete="off">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome do Solicitante:</label>
                                    <input type="text" class="form-control" name="nomeSolicitante" required="" value="<?= $usuario->first_name . ' ' . $usuario->last_name; ?>" style="text-transform:uppercase" readonly="">
                                    <input type="hidden" value="<?= $results->cd_chamado;?>" name="id">
                                    <input type="hidden" value="<?= $usuario->id;?>" name="idUsuario"> 
                                </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Data Solicitação:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="dataSolicitacao" class="form-control pull-right" id="datepicker" required="" value="<?= $datasolicitacao; ?>">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Hora:</label>
                                   <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timepicker" name="horaSolicitacao" required="" value="<?= $results->tp_hora;?>" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Unidade  :</label>
                                    <?php
                                    $js = array(
                                        'id' => 'unidade',
                                        'class' => 'form-control',
                                        'required' => ''
                                    );
                                    $options = array($results->cd_unidade => $results->ds_unidade) + $unidades;
                                    echo form_dropdown($name = 'unidade', $options, 0, $js);
                                    ?>
                                </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Setor:</label>
                                    <select name="setor" id="setor" class="form-control" required="">
                                        <option value="<?= $results->cd_setor ?>"><?= $results->ds_setor ?></option>
                                    </select>
                                </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Status:</label>
                                    
                                    <input type="text" name="status" class="form-control" required="" readonly="" value="<?= $results->ds_status; ?>">
                                    
                                </div>
                                <!-- /input-group -->
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Prioridade:</label>
                                    <select class="form-control" name="prioridade" required="">
                                        <option value="1" <?=($results->tp_prioridade == '1')?'selected':''?>>Baixa</option>
                                        <option value="2" <?=($results->tp_prioridade == '2')?'selected':''?>>Média</option>
                                        <option value="3" <?=($results->tp_prioridade == '3')?'selected':''?>>Alta</option>
                                    </select>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col-lg-6 -->
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descrição do chamado:</label>
                                    <textarea class="form-control" name="descChamado" rows="5" placeholder="Descreva o chamado ..." required=""><?= $results->ds_descricao_chamado?></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Observação:</label>
                                    <textarea class="form-control" name="descObs" rows="5" placeholder="Observação do chamado..." ><?= $results->ds_observacao?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- /.col-lg-6 -->
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                    </div>
                </form>
            </div>

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
        //Initialize Select2 Elements
        $('.select2').select2()
      

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
        })

        //Date picker2
        $('#datepicker2').datepicker({
            autoclose: true
        })
        
        $('.timepicker').timepicker({
        showInputs: false,
        showMeridian: false,
        template: false
         })


    })
</script>