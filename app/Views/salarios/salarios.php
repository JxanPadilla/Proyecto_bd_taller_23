<head>
  <link rel="stylesheet" href="<?php echo base_url('/css/vistas.css'); ?>">

</head>

<body>
  <h1 class="titulo"><?php echo "Administrar Salarios"; ?></h1>

  <div>
  <label hidden><?php foreach ($salarios as $dato) { ?><tr><td><?php echo $dato['id']; ?></td></tr><?php } ?></label>
  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarSalarios" onclick="seleccionaSalarios(<?php echo $dato['id'] . ',' . 1 ?>);">Agregar</button>
  <a href="<?php echo base_url('eliminados_salarios'); ?>"  class="btn btn-secondary regresar_Btn">Eliminados</a>
    <a href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_btn">Regresar</a>

  </div>
  <div class="table-responsive">
    <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr style="color:#342C6E;font-weight:300;text-align:center;font-family:Arial;font-size:14px;">
          <th>Id</th>
          <th>Periodo</th>
          <th>Empleado</th>
          <th>Sueldo</th>
          <th>Estados</th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody style="font-family:Arial;font-size:12px;">
        <?php foreach ($salarios as $dato) { ?>
          <tr>
            <td><?php echo $dato['id']; ?></td>
            <td><?php echo $dato['periodo']; ?></td>
            <td><?php echo $dato['nombre_empleado']; ?></td>
            <td><?php echo $dato['sueldo']; ?></td>
            <td><?php echo $dato['estado']; ?></td>
            <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarSalarios" onclick="seleccionaSalarios(<?php echo $dato['id'] . ',' . 2 ?>);">editar</button>
            <button type="button" class="btn btn-secondary"  href="#" data-href="<?php echo base_url('/salarios/eliminar') . '/' .$dato['id']. '/' .'E'; ?>"  data-bs-toggle="modal" data-bs-target="#modal-confirma">Eliminar</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

    <!-- Modal -->
    <form method="POST" action="<?php echo base_url('salarios/insertar') . '/' .$dato['id']; ?> " autocomplete="off">

<div class="modal fade" id="AgregarSalarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo" >Agregar Salarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
        <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Periodo:</label>
                <select class="form-select" name="periodo" id="periodo">
                  <option selected>Seleccionar Año</option>
                  <?php $years = range(strftime("%Y", time()), 1940); ?>
                  <?php foreach ($years as $year) : ?>
                    <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Empleados:</label>
                <select name="empleados" id="empleados" class="form-select">
                  <option selected>Seleccionar Empleado</option>
                  <?php foreach ($empleados as $dato) { ?>
                    <option value="<?php echo $dato['id']; ?>"><?php echo $dato['nombres']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Salario:</label>
                <input type="number" name="salario" id="salario" class="form-control" id="message-text">
            <input hidden  id="tp" name="tp"></>
            <input hidden id="id" name="id"></>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="btn_Guardar">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>

<script>

  function seleccionaSalarios(id, tp) {
    dataURL = "<?php echo base_url('/salarios/buscar_Salarios'); ?>" + "/" + id;
    $.ajax({
      type: "POST",
      url: dataURL,
      dataType: "json",
      success: function(rs) {      
    if (tp == 2) {
          $("#tp").val(2);  
          $("#id").val(id);  
          $("#periodo").val(rs[0]['periodo']);
          $("#empleados").val(rs[0]['id_empleado']);
          $("#salario").val(rs[0]['sueldo']);
          $("#btn_Guardar").text('Actualizar');
          $("#titulo").text('Editar Salarios');
          $("#AgregarSalarios").modal("show");
        }else {
          $("#tp").val(1);
          $("#periodo").val('Seleccionar Año');
          // $("#empleados").val(rs[0]['id_empleado']);
          $("#empleados").val('');
          $("#salario").val('');
          $("#btn_Guardar").text('Guardar');
          $("#titulo").text('Agregar Salarios');
        }
      }
    })

  };
</script>

<!-- Modal Confirma Eliminar -->

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: linear-gradient(90deg, #838da0, #b4c1d9);" class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>
                   
                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Eliminar éste Registro?</p>
                    <!-- <input hidden  id="estado" name="estado"></>
                    <input hidden id="id" name="id"></> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close" data-bs-dismiss="modal"  >No</button>
                    <a class="btn btn-danger btn-ok" >Si</a>
                </div>
            </div>
        </div>
    </div>

       <!-- Modal Elimina -->

       <script>
           $('#modal-confirma').on('show.bs.modal', function(e) {
             $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
           });
        </script>

</body>