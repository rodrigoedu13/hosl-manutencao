<section class="content-header">
    <h1>
        Novo Chamado
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('chamados') ?>">Chamados</a></li>
        <li class="active">Novo chamado</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form method="POST" action="<?= base_url('chamados/add') ?>">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nome do Solicitante:</label>
                                    <input type="text" class="form-control" name="nomeSolicitante">
                                </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Responsável do chamado:</label>
                                    <input type="text" class="form-control" name="responsavel">
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Unidade  :</label>
                                    <?php
                                    $options = array('0' => 'Selecione uma unidade') + $unidades;
                                    echo form_dropdown($name = 'unidade', $options, '', 'class="form-control"');
                                    ?>
                                </div>
                                <!-- /input-group -->
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label>Setor:</label>
                                    <input type="text" class="form-control" name="setor">
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
                                        <input type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label>Data Resolução:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker2">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Status:</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Aberto</option>
                                        <option value="2">Em atendimento</option>
                                        <option value="3">Pendente</option>
                                        <option value="4">Cancelado</option>
                                        <option value="5">Finalizado</option>
                                    </select>
                                </div>
                                <!-- /input-group -->
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Prioridade:</label>
                                    <select class="form-control" name="prioridade">
                                        <option value="1">Baixa</option>
                                        <option value="2">Média</option>
                                        <option value="3">Alta</option>
                                    </select>
                                </div>
                                <!-- /input-group -->
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Descrição do chamado:</label>
                                    <textarea class="form-control" rows="5" placeholder="Descreva o chamado ..."></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Observação:</label>
                                    <textarea class="form-control" rows="5" placeholder="Observação do chamado..."></textarea>
                                </div>
                            </div>
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})

        $.fn.datepicker.defaults.format = "dd/mm/yyyy";

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
        })

        //Date picker2
        $('#datepicker2').datepicker({
            autoclose: true
        })


    })
</script>