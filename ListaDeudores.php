<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  
  <div class="content-wrapper">
      
    <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Deudores</div>
        <div class="card-body">
           
           <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
              <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length">
                <label>Show 
              <select name="dataTable_length" aria-controls="dataTable" class="form-control form-control-sm">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
              </select> entries</label>
            </div>
          </div>
          <div class="col-sm-12 col-md-6"><div id="dataTable_filter" class="dataTables_filter">
            <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">

              <table class="table table-bordered dataTable no-footer" id="" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
              <thead>
                <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="matricula: activate to sort column descending" style="width: 71px;">matricula</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="nombre: activate to sort column ascending" style="width: 59px;">nombre</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="libro: activate to sort column ascending" style="width: 41px;">libro</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="fecha inicio: activate to sort column ascending" style="width: 42px;">fecha inicio</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="fecha fin: activate to sort column ascending" style="width: 42px;">fecha fin</th>
                  <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="status de entrega: activate to sort column ascending" style="width: 161px;">status de entrega</th>
                </tr>
              </thead>

              <tbody>
                  <tr role="row" class="odd">
                                  <td class="sorting_1">15302548</td>
                                  <td>Andres</td>
                                  <td>Libro1</td>
                                  <td>2018-06-22</td>
                                  <td>2018-05-24</td>

                                <td><span class="badge badge-pill badge-danger">Retardo de 32 dias </span><br></td></tr><tr role="row" class="even">
                                  <td class="sorting_1">15302549</td>
                                  <td>Jesus Miguel</td>
                                  <td>Libro2</td>
                                  <td>2018-07-03</td>
                                  <td>2018-07-05</td>

                                <td><span class="badge badge-pill badge-danger">Retardo de 2 dias </span><br></td></tr><tr role="row" class="odd">
                                  <td class="sorting_1">15302550</td>
                                  <td>Kevin</td>
                                  <td>Libro3</td>
                                  <td>2018-06-29</td>
                                  <td>2018-07-03</td>

                                <td><span class="badge badge-pill badge-danger">Retardo de 4 dias </span><br></td></tr><tr role="row" class="even">
                                  <td class="sorting_1">15302551</td>
                                  <td>Francisco Javier</td>
                                  <td>Libro4</td>
                                  <td>2018-07-02</td>
                                  <td>2018-07-04</td>

                                <td><span class="badge badge-pill badge-danger">Retardo de 3 dias </span><br></td></tr><tr role="row" class="odd">
                                  <td class="sorting_1">15302552</td>
                                  <td>Darynka</td>
                                  <td>Libro5</td>
                                  <td>2018-07-06</td>
                                  <td>2018-07-10</td>

                                <td><span class="badge badge-pill badge-success">No tiene retardo<br></span></td></tr><tr role="row" class="even">
                                  <td class="sorting_1">15302553</td>
                                  <td>Miguel Olea</td>
                                  <td>Libro6</td>
                                  <td>2018-07-05</td>
                                  <td>2018-07-09</td>

                                <td><span class="badge badge-pill badge-warning">Hoy debe de regresar el libro</span> <br></td></tr><tr role="row" class="odd">
                                  <td class="sorting_1">15302554</td>
                                  <td>Nareli</td>
                                  <td>Libro7</td>
                                  <td>2018-07-05</td>
                                  <td>2018-07-09</td>

                                <td><span class="badge badge-pill badge-warning">Hoy debe de regresar el libro</span> <br></td></tr><tr role="row" class="even">
                                  <td class="sorting_1">15307040</td>
                                  <td>Jes�s Garc�a</td>
                                  <td>ciencia 1</td>
                                  <td>2018-07-13</td>
                                  <td>2018-07-17</td>

                                <td><span class="badge badge-pill badge-success">No tiene retardo<br></span></td></tr><tr role="row" class="odd">
                                  <td class="sorting_1">15307042</td>
                                  <td>Kevin Betancourt</td>
                                  <td>Sexologia</td>
                                  <td>2018-07-18</td>
                                  <td>2018-07-23</td>

                                <td><span class="badge badge-pill badge-success">No tiene retardo<br></span></td></tr><tr role="row" class="even">
                                  <td class="sorting_1">1530DH18</td>
                                  <td>Sasuke Uchiha</td>
                                  <td>Ojos oculares</td>
                                  <td>2018-07-23</td>
                                  <td>2018-07-24</td>

                                <td><span class="badge badge-pill badge-success">No tiene retardo<br></span></td></tr></tbody>
        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 13 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
      </div>

        </div>
      </div>

  </div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
