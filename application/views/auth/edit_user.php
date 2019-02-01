<section class="content-header">
    <h1>
        Editar Usuário
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('auth') ?>">Usuários</a></li>
        <li class="active">Editar Usuário</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="col-lg-12">
                    <?php if ($message) { ?>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Erro!</h4>
                            <?php echo $message; ?>
                        </div>
                    <?php } ?>
                </div>
                </div>
                <?php echo form_open(uri_string()); ?>
                <div class="box-body">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Usuário:</label>
                                <input type="text" class="form-control" name="username" id="username" disabled="" value="<?php echo $user->username; ?>">
                                <?php echo form_hidden('id', $user->id); ?>
                                <?php echo form_hidden($csrf); ?>

                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Nome:</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Sobrenome:</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Empresa:</label>
                                <input type="text" class="form-control" name="company" id="company" value="<?php echo $user->company; ?>">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $user->email; ?>">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Telefone:</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user->phone; ?>">
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?php echo lang('edit_user_password_label', 'password');?>
                                <input type="password" class="form-control" name="password" id="password" >
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?>
                                <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                            </div>
                            <!-- /input-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Permissões:</label>
                                <div class="checkbox">

                                    <?php if ($this->ion_auth->is_admin()): ?>


                                        <?php foreach ($groups as $group): ?>
                                            <label class="checkbox">
                                                <?php
                                                $gID = $group['id'];
                                                $checked = null;
                                                $item = null;
                                                foreach ($currentGroups as $grp) {
                                                    if ($gID == $grp->id) {
                                                        $checked = ' checked="checked"';
                                                        break;
                                                    }
                                                }
                                                ?>
                                                <input type="checkbox" name="groups[]" value="<?php echo $group['id']; ?>"<?php echo $checked; ?>>
                                                <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                            </label>
                                        <?php endforeach ?>

                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
                    </div>

                    <?php echo form_close(); ?>
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
        //Datemask dd/mm/yyyy
        $('#phone').inputmask('(99)99999-9999')

    })
</script>
