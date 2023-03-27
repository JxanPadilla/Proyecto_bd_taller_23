<head>
  <link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">

</head>

<body>
    <h1 class="titulo"><?php echo "Administrar Municipios"; ?></h1>

    <div>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarMunicipios">Agregar</button>
      <button type="button" class="btn btn-secondary">Eliminados</button>
      <a href="<?php echo base_url('/principal');?>"class="btn btn-primary regresar_btn">Regresar</a>
  
    </div>
    <div class="table-responsive">
                <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color:#342C6E;font-weight:300;text-align:center;font-family:Arial;font-size:14px;">
                            <th>Id</th>
                            <th>Municipios</th>
                            <th>Departamento</th>
                            <th>Estados</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody style="font-family:Arial;font-size:12px;">
                        <?php foreach ($municipios as $dato) { ?>
                          <tr>
                              <td><?php echo $dato ['id'];?></td>
                              <td><?php echo $dato ['nombre_dpto'];?></td>
                              <td><?php echo $dato ['nombre'];?></td>
                              <td><?php echo $dato ['estado'];?></td>
                              </tr>
                              <?php }?>
                    </tbody>
                </table>
            </div>

              <!-- Modal -->
    <form method="POST" action="<?php echo base_url('municipios/insertar'); ?> " autocomplete="off">

<div class="modal fade" id="AgregarMunicipios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Municipios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Departamento:</label>
            <select name="dpto" class="form-select">
              <option selected>Seleccionar Departamento</option>
              <?php foreach ($departamentos as $dato) { ?>
                <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombre']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control" id="message-text">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>


</body>