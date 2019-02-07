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
                    <?= anchor(site_url('auth/create_user'), '<i class="fa fa-plus"></i> Novo Usuário', 'class="btn btn-success"'); ?>
                    <?= anchor(site_url('auth/create_group'), '<i class="fa fa-plus"></i> Criar Grupo', 'class="btn btn-primary"'); ?>
                </div>
                <div class="col-lg-12">
                    <?php if ($message) { ?>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                           <?php echo $message;?>
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
                                <th></th>
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
                                    
                                    <td width="15%">
                                        <?php if ($user->active == 1){?>
                                        <a href="<?php echo base_url('/auth/deactivate/') . $user->id; ?>" style="margin-right: 1%" class="btn btn-sm btn-danger" title="Inativar Usuário"><i class="fa fa-ban"></i> Inativar</a>
                                        <?php }?>
                                        <?php if ($user->active == 0){?>
                                        <a href="<?php echo base_url('/auth/activate/') . $user->id; ?>" style="margin-right: 1%" class="btn btn-sm btn-success" title="Ativar Usuário"><i class="fa fa-check"></i> Ativar</a>
                                        <?php }?>
                                        <a href="<?php echo base_url('/auth/edit_user/') . $user->id; ?>" style="margin-right: 1%" class="btn btn-sm btn-warning" title="Editar Usuário"><i class="fa fa-pencil"></i></a>
                                        <a href="<?php echo base_url('/auth/reset_password/') . $user->id; ?>" style="margin-right: 1%" class="btn btn-sm btn-primary" title="Editar Usuário"><i class="fa fa-pencil"></i> Resetar</a>
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
