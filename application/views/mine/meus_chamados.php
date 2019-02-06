<section class="content-header">
    <h1>
        Meus Chamados
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Meus Chamados</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <form action="<?= base_url('mine/gerenciar') ?>" method="get">
                    <div class="box-header">
                        <div class="col-md-2">
                            <?= anchor(site_url('mine/criar'), '<i class="fa fa-plus"></i> Novo Chamado', 'class="btn btn-success"'); ?>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" name="status" required="">
                                    <option>Selecione o status</option>
                                    <option value="1">Aberto</option>
                                    <option value="2">Em atendimento</option>
                                    <option value="3">Pendente</option>
                                    <option value="4">Cancelado</option>
                                    <option value="5">Finalizado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="dataInicio" class="form-control pull-right" placeholder="Data Inicio" id="datepicker" required="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="dataFim" class="form-control pull-right" placeholder="Data Fim" id="datepicker2" required="">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div class="col-lg-12">

                    <?php if ($this->session->flashdata('success') == TRUE) { ?>
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('error') == TRUE) { ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if (!$results) { ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Unidade</th>
                                    <th>Setor</th>
                                    <th>Solicitante</th>
                                    <th>Data de Solicitação</th>
                                    <th>Hora</th>
                                    <th>Responsável</th>
                                    <th>Prioridade</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="9">Nenhum chamado cadastrado</td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Unidade</th>
                                    <th>Setor</th>
                                    <th>Solicitante</th>
                                    <th>Data de Solicitação</th>
                                    <th>Hora</th>
                                    <th>Responsável</th>
                                    <th>Prioridade</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($results as $r):

                                    if ($r->dt_solicitacao == 0) {
                                        $datasolicitacao = '';
                                    } else {
                                        $datasolicitacao = date(('d/m/Y'), strtotime($r->dt_solicitacao));
                                    }
                                    ?>

                                    <tr>
                                        <td><?= $r->cd_chamado; ?></td>
                                        <td><?= $r->ds_unidade; ?></td>
                                        <td><?= $r->ds_setor; ?></td>
                                        <td><?= $r->first_name.' '.$r->last_name; ?></td>
                                        <td><?= $datasolicitacao; ?></td>
                                        <td><?= $r->tp_hora; ?></td>
                                        <td><?= $r->ds_colaborador; ?></td>
                                        <td>
                                            <?php if ($r->tp_prioridade == 1) { ?>
                                                <small class="label bg-blue">Baixa</small>
                                            <?php } ?>
                                            <?php if ($r->tp_prioridade == 2) { ?>
                                                <small class="label bg-yellow">Média</small>
                                            <?php } ?>
                                            <?php if ($r->tp_prioridade == 3) { ?>
                                                <small class="label bg-red">Alta</small>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($r->status_cd_status == 1) { ?>
                                                <small class="label bg-green">Aberto</small>
                                            <?php } ?>
                                            <?php if ($r->status_cd_status == 2) { ?>
                                                <small class="label bg-gray">Em Atendimento</small>
                                            <?php } ?>
                                            <?php if ($r->status_cd_status == 3) { ?>
                                                <small class="label bg-black-gradient">Pendente</small>
                                            <?php } ?>
                                            <?php if ($r->status_cd_status == 4) { ?>
                                                <small class="label bg-orange">Cancelado</small>
                                            <?php } ?>
                                            <?php if ($r->status_cd_status == 5) { ?>
                                                <small class="label bg-light-blue">Finalizado</small>
                                            <?php } ?>
                                        </td>
                                        <td width="13%">
                                            <a href="<?php echo base_url('/mine/visualizar/') . $r->cd_chamado; ?>" style="margin-right: 1%" class="btn btn-sm btn-default visualizar" title="Visualizar Chamado"><i class="fa fa-eye"></i></a>
                                            <a href="<?php echo base_url('/mine/editar/') . $r->cd_chamado; ?>" style="margin-right: 1%" class="btn btn-sm btn-warning" title="Editar Chamado"><i class="fa fa-pencil"></i></a>
                                            <a href="#modal-excluir" role="button" data-toggle="modal" chamado="<?= $r->cd_chamado; ?>"  style="margin-right: 1%" class="btn btn-sm btn-danger" title="Excluir Chamado"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<div class="col-lg-12" style="background-color: #ecf0f5;">
    <div class="pull-right">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<!-- /.content -->
</div>
<!-- Modal -->
<div class="modal modal-default fade" id="modal-visualizar">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Visualizar Chamado</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered ">
                    <thead>
                    <th>Descrição do Chamado</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea type="text" class="form-control" name="descChamado" rows="5" id="listDescChamado" disabled=""></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-bordered ">
                    <thead>
                    <th>Observação do Chamado</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <textarea type="text" class="form-control" name="descObs" rows="5" id="listDescObs" disabled=""></textarea>  
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>

    <!-- /.modal-dialog -->
</div>
<div class="modal modal-danger fade" id="modal-excluir">
    <form action="<?php echo base_url() ?>chamados/excluir" method="post" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Excluir Chamado</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="idChamado" name="id" value="" />
                    <h5 style="text-align: center">Deseja realmente excluir este chamado?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline">Excluir</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    </form>
    <!-- /.modal-dialog -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', 'a', function (event) {
            var chamado = $(this).attr('chamado');
            $('#idChamado').val(chamado);
        });
    });

    $(document).on('click', '.visualizar', function (event) {
        $("#listDescChamado").val($(this).attr('descChamado'));
        $("#listDescObs").val($(this).attr('descObs'));


    });

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true,
    })

    //Date picker2
    $('#datepicker2').datepicker({
        autoclose: true
    })

</script>
