</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Versão</b> 1.0
    </div>
    <strong>Hospital de Olhos Santa Luzia. Desenvolvido pelo setor de tecnologia da informação.</strong> Copyright © 2019 
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false,
            "oLanguage": {
                "sUrl": "<?= base_url('assets/bower_components/datatables.net/js/Portuguese-Brasil.json'); ?>"
            }
        })
    })

    $(document).ready(function () {

        window.setTimeout(function () {
            $(".alert").fadeTo(1000, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 8000);

    });
</script>

</body>
</html>