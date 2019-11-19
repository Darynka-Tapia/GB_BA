    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Listo para salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione cerrar sesión si esa liso ara finalizar su sesion actual</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="SQL/cerrar.php">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>


        <div class="modal fade" id="LogoGro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar logo Guerrero</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Agregar logo de Guerrero</div>
          <div class="container-fluid">
            <form class="form" method="post" enctype="multipart/form-data" action="php/registros/logoGuerrero.php">
              <div class="row"> <!--Para hacer la fila-->
                <div class="col-12 col-md-12">
                    <label for="validationCustom01"></label>
                    <input type="file" class="form-control" id="validationCustom01" required name="imagen">
                    <input type="hidden" value="logoGuerrero" name="Guerrero">
                  </div>
                </div> 
              </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Realizar</button>
              </div>
            </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="LogoBachi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar logo Bachilleres</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Agregar logo de Bachilleres</div>
          <div class="container-fluid">
            <form class="form" method="post" enctype="multipart/form-data" action="php/registros/logoBachilleres.php">
              <div class="row"> <!--Para hacer la fila-->
                <div class="col-12 col-md-12">
                    <label for="validationCustom01"></label>
                    <input type="file" class="form-control" id="validationCustom01" required name="imagen">
                    <input type="hidden" value="logoBachilleres" name="Bachilleres">
                  </div>
                </div> 
              </div>

              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
               <button type="submit" class="btn btn-primary">Realizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    