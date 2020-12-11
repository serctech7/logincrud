  <!doctype html>
  <html lang="en">
    <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

      <title>Inicio</title>
        </head>
    <body>

      <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo session('usuario'); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('/salir') ?>"> Salir <span class="sr-only">(current)</span></a>
        </li>

      </ul>
      
    </div>
  </nav>
      <h1>Estas dentro del Inicio</h1>
        <div class="container">
    <h1>CRUD con CodeIgnaiter 4</h1>
    <div class="row">
      <div class="col-sm-12">
        <form method="POST" action="<?php echo base_url().'/crear' ?>">
          <label for="concpeto_g">Concepto de Gastos</label>
          <input type="text" name="concpeto_g" id="concpeto_g" class="form-control">
          <label for="monto_g">Monto de Gastos</label>
          <input type="text" name="monto_g" id="monto_g" class="form-control">
          <label for="fecha">Fecha</label>
          <input type="text" name="fecha" id="fecha" class="form-control">
          <br>
          <button class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
    <hr>
        <h2>Listado de datos</h2>
    <!-- <?php //print_r($datos); ?> -->
        <div class=row>
            <div class=col-sm-12>
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Concepto de Gastos</th>
                            <th>Monto de Gastos</th>
                            <th>Fecha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
            <?php foreach($datos as $key): ?>
              <tr>
                <td><?php echo $key->concepto_g ?></td>
                <td><?php echo $key->monto_g ?></td>
                <td><?php echo $key->fecha ?></td>
                <td>
                  <a href="<?php echo base_url().'/obtenerNombre/'.$key->id_nombre ?>" class="btn btn-warning btn-sm">Editar</a>
                </td>
                <td>
                  <a href="<?php echo base_url().'/eliminar/'.$key->id_nombre ?>" class="btn btn-danger btn-sm">Eliminar</a>
                </td>
              </tr>
            <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
  </div>


      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript">
    let mensaje = '<?php echo $mensaje ?>';

    if (mensaje == '1') {
      swal(':D','Agregado con exito!','success');
    }else if(mensaje == '0'){
      swal(':(','Fallo al agregar!','error');
    }else if(mensaje == '2'){
      swal(':D','Actualizado con exito!','success');
    }else if(mensaje == '3'){
      swal(':(','Fallo al Actualizar!','error');
    }else if(mensaje == '4'){
      swal(':D','Eliminado con exito!','success');
    }else if(mensaje == '5'){
      swal(':(','Fallo al Eliminar!','error');
    }
  </script>
    </body>
  </html>