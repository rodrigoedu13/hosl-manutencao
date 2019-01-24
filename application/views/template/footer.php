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
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>