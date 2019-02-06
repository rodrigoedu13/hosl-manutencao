<section class="content-header">
    <h1>
        Visualizar Chamado
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= site_url('hosl') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?= site_url('mine') ?>">Meus Chamados</a></li>
        <li class="active">Visualizar chamado</li>

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
<!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
              <img src="<?= base_url('assets/img/favicon.png')?>" width="30px" height="30px"> Hospital de Olhos Santa Luzia.
            <small class="pull-right">Data: <?php echo date('d/m/Y'); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info" id="print">
        <div class="col-sm-12 invoice-col">
            <p class="lead">#Chamado: <?= $results->cd_chamado;?></p>
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:10%">Solicitante:</th>
                        <td><?= $usuario->first_name . ' ' . $usuario->last_name;?></td>
                        <th style="width:15%">Data/hora Solicitação:</th>
                        <td><?= $datasolicitacao . ' ' . $results->tp_hora; ?></td>
                    </tr>
                    <tr>
                        <th style="width:15%">Unidade:</th>
                        <td><?= $results->ds_unidade;?></td>
                        <th>Setor:</th>
                        <td><?= $results->ds_setor;?></td>
                        <th style="width:10%">Prioridade:</th>
                        <td><?php switch ($results->tp_prioridade){case 1: echo 'Baixa'; break; case 2: echo 'Média'; break; case 3: echo 'Alta'; break; default: 'erro';} ?></td>
                    </tr>
                    <tr>
                        <th style="width:10%">Responsável:</th>
                        <td><?= $results->ds_colaborador;?></td>
                        <th style="width:10%">Status:</th>
                        <td><?= $results->ds_status;?></td>
                    </tr>
                    <tr>
                        <th>Data de Previsão:</th>
                        <td></td>
                        <th>Data de Resolução:</th>
                        <td><?php $results->dt_resolucao;?></td>
                    </tr>
                </tbody>
            </table>
            <table class="table">
                <thead>
                    <tr>
                        <th>Descrição do chamado</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $results->ds_descricao_chamado;?></td>
                    </tr>
                    <tr></tr
                </tbody>
            </table>
      </div>


      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
            <a href="" target="_blank" id="imprimir" class="btn btn-default pull-right"><i class="fa fa-print"></i> Imprimir</a>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Gerar PDF
          </button>
        </div>
      </div>
    </section>
<script type="text/javascript">
    $(document).ready(function(){
        $("#imprimir").click(function(){         
            PrintElem('#print');
        })
        function PrintElem(elem)
        {
            Popup($(elem).html());
        }
        function Popup(data)
        {
            var mywindow = window.open('', 'HOSL - SISMANU', 'height=600,width=800');
            mywindow.document.write('<html><head><title>Hosl - SISMANU</title>');
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css' /><link rel='stylesheet' href='<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap-responsive.min.css' />");
            mywindow.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/dist/css/AdminLTE.min.css' /> <link rel='stylesheet' href='<?php echo base_url();?>assets/css/matrix-media.css' />");
            mywindow.document.write('</head><body >');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');
            mywindow.print();
            mywindow.close();
            return true;
        }
    });
</script>
