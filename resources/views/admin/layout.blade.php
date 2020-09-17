<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!--Datatable-->
  <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    @include('admin.header')


    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Header -->
    <!-- Content Wrapper. Contains page content -->

    @Yield('content')


    <!-- /.content-wrapper -->







    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
      </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- footer -->

    @include('admin.footer')

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>



    <!--Datatable-->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>




    <script>
      $(function() {

        $('#img_cu').on('hidden.bs.modal', function() {
          //console.log('es invisible');
          $('#imgnuevonoticia').hide();
          $('#imgactualnoticia').show();
          $('#file').val('');
        })

        $('#toggle-event').change(function() {

          if ($(this).is(':checked')) {
            // $('#mapa-1').html('Toggle: ' + $(this).prop('checked'));
            $('#estadoMapa').val("activo");
          } else {
            $('#estadoMapa').val("inactivo");
          }

        });

        $('#estadoPro').change(function() {
          /* function check() {
    document.getElementById("myCheck").checked = true;
}*/
          if ($(this).is(':checked')) {

            $('#estadoProp').val("activo");
          } else {
            $('#estadoProp').val("inactivo");
          }

        });

        $(document).ready(function() {
          $('#example').DataTable({
            language: {
              "sProcessing": "Procesando...",
              "sLengthMenu": "Mostrar _MENU_ registros",
              "sZeroRecords": "No se encontraron resultados",
              "sEmptyTable": "Ningún dato disponible en esta tabla",
              "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix": "",
              "sSearch": "Buscar:",
              "sUrl": "",
              "sInfoThousands": ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
              },
              "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
            },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                className: 'green',
                text: '<i class="fa fa-file-excel-o"></i>',
                exportOptions: {
                  columns: [0, 1, 2, 3]
                },

              },
              {
                extend: 'pdfHtml5',
                className: 'red',
                text: '<i class="fa fa-file-pdf-o"></i>',
                exportOptions: {
                  columns: [0, 1, 2, 3]
                }
              }

            ]
          });
        });

      })
    </script>


</body>

</html>