<section class="content-header">
    <h1>
        Usuários
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Usuários</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <?= anchor(site_url('auth/create_user'), '<i class="fa fa-plus"></i> Adicionar', 'class="btn btn-success"'); ?>
                </div>
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
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?php echo lang('index_username_th'); ?></th>
                                <th><?php echo lang('index_fname_th'); ?></th>
                                <th><?php echo lang('index_lname_th'); ?></th>
                                <th><?php echo lang('index_groups_th'); ?></th>
                                <th><?php echo lang('index_status_th'); ?></th>
                                <th><?php echo lang('index_action_th'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td>
                                        <?php foreach ($user->groups as $group): ?>
                                            <?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8')); ?><br />
                                        <?php endforeach ?>
                                    </td>
                                    <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
                                    <td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit'); ?></td>
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
