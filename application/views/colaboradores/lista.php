<section class="content-header">
    <h1>
        Colaboradores
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Colaboradores</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <?= anchor(site_url('colaboradores/criar'), '<i class="fa fa-plus"></i> Adicionar', 'class="btn btn-success"'); ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome do colaborador</th>
                                <th>Data de cadastro</th>
                                <th>Ativo</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($results as $r): ?>
                                <tr>
                                    <td><?= $r->cd_colaborador; ?></td>
                                    <td><?= $r->ds_colaborador; ?></td>
                                    <td><?= $r->dt_cadastro; ?></td>
                                    <td><?php
                                        if ($r->tp_ativo == 1) {
                                            echo 'SIM';
                                        } else {
                                            echo 'NÃO';
                                        }
                                        ;
                                        ?></td>
                                    <td>
                                        <a href="<?php echo base_url('/colaboradores/editar/') . $r->cd_colaborador; ?>" style="margin-right: 1%" class="btn btn-sm btn-warning" title="Editar Colaborador"><i class="fa fa-pencil"></i></a>
                                        <a href="#modal-excluir" role="button" data-toggle="modal" colaborador="<?= $r->cd_colaborador; ?>" style="margin-right: 1%" class="btn btn-sm btn-danger" title="Excluir Colaborador"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
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
<!-- Modal -->
<div class="modal modal-danger fade" id="modal-excluir">
    <form action="<?php echo base_url() ?>colaboradores/excluir" method="post" >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Colaborador</h4>
              </div>
              <div class="modal-body">
                <input type="hidden" id="idColaborador" name="id" value="" />
                <h5 style="text-align: center">Deseja realmente excluir este colaborador?</h5>
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
            var colaborador = $(this).attr('colaborador');
            $('#idColaborador').val(colaborador);
        });
    });

</script>
