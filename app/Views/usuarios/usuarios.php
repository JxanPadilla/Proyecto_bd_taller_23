<head>
</head>

<body style="margin-top: 270px;">
  <h1 style="position: relative; top: 10px; font-family: Georgia, serif; font-style: normal; font-size: 55px; text-align: center; color:#00278C; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><?php echo "Administrar Usuarios"; ?></h1>
  <img id="bpai" src="<?php echo base_url('/img/agregarP.png'); ?>">
  <img id="epai" src="<?php echo base_url('/img/eliminadosP.png'); ?>">

  <div style="margin-top: 20px; ">
    <button style="margin-left: 80px;" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#AgregarUsuario" onclick="seleccionaUsuario(<?php echo 1 . ',' . 1 ?>);">Agregar</button>
    <a  style="margin-left: 80px;" href="<?php echo base_url('eliminados_usuarios'); ?>"  class="btn btn-secondary regresar_Btn">Eliminados</a>

    <a  style="margin-left: 10px;" href="<?php echo base_url('/principal'); ?>" class="btn btn-primary regresar_btn">Regresar</a>

  </div>
  <div class="table-responsive" style="margin-top: 20px;">
    <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr style="color: #000632; background: #6095BC; font-family: 'Amaranth';font-style: normal;font-size: 20px;text-align: center;">
          <th>Id</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Coreo</th>
          <th>Estado</th>
          <th colspan="2">Acciones</th>
        </tr>
      </thead>
      <tbody style="background: #9de8ff; font-family: 'Amaranth';font-style: normal;font-size: 20px;text-align: center;" >
        <?php foreach ($usuarios as $dato) { ?>
          <tr>
            <td><?php echo $dato['id']; ?></td>
            <td><?php echo $dato['nombres']; ?></td>
            <td><?php echo $dato['apellidos']; ?></td>
            <td><?php echo $dato['correo']; ?></td>
            <td><?php echo $dato['estado']; ?></td>
            <td><button style="font-family:Arial;font-size:17px; background:transparent; border:none;" type="button"  data-bs-toggle="modal" data-bs-target="#AgregarUsuario" onclick="seleccionaUsuario(<?php echo $dato['id'] . ',' . 2 ?>);"><img id="edi" src="<?php echo base_url('/img/editar.png'); ?>"></button>
            <button  style="font-family:Arial;font-size:17px; background:transparent; border:none;" type="button" class="btn btn-secondary"  href="#" data-href="<?php echo base_url('/usuarios/eliminar') . '/' .$dato['id']. '/' .'E'; ?>"  data-bs-toggle="modal" data-bs-target="#modal-confirma"><img id="edi" src="<?php echo base_url('/img/eliminar.png'); ?>"></button></td> 
           
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- Modal -->
  <form method="POST" action="<?php echo base_url('usuarios/insertar'); ?> " autocomplete="off">

    <div class="modal fade" id="AgregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="tituloo" >Agregar Usuario</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Nombres:</label>
                <input type="text" name="nombres" class="form-control" id="nombres">
              </div>
              <div class="mb-3">
                <label for="recipient-name" class="col-form-label">Apellidos:</label>
                <input type="text" maxlength="3" name="apellidos" class="form-control" id="apellidos">
                <input hidden  id="tp" name="tp"></>
                <input hidden id="id" name="id"></>
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Correo:</label>
                <input type="text" name="correo" class="form-control" id="correo">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Contraseña:</label>
                <input type="password" name="contra1" class="form-control" id="contra1">
              </div>
              <div class="mb-3">
                <label for="message-text" class="col-form-label">Confirmar contraseña:</label>
                <input type="password" name="contra2" class="form-control" id="contra2">
                <small id="msgConfir" class="normal"></small>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" id="btn_Guardar" >Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <script>

function verifiContra(tipo) {
        contra1 = $('#contra1').val()
        contr2 = $('#contra2').val()
        if (tipo == 2) {
            if (contra1 == '' && contr2 == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            } else if (contra1 == contr2) {
                $('#msgConfir').text('¡Contraseñas valida!').removeClass().addClass('valido')
            } else if (contra1 == '') {
                $('#msgConfir').text('¡Ingrese una contraseña!').removeClass().addClass('normal')
            } else if (contr2 == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            } else if(contra1 != contr2) {
                $('#msgConfir').text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        } else {
            if (contra1 == '' && contr2 == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            } else if (contra1 == '' && contr2) {
                $('#msgConfir').text('¡Ingrese una contraseña!').removeClass().addClass('normal')
            }  else if (contr2 == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            }else if (contr2 && contra1 == contr2) {
                $('#msgConfir').text('¡Contraseñas valida!').removeClass().addClass('valido')
            } 
            else if( contr2 && contra1 != contr2) { 
                $('#msgConfir').text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        }
    }
    
    $('#contra1').on('input', function(e){
      verifiContra(2)
    })

    $('#contra2').on('input', function(e){
      verifiContra(1)
    })

    function seleccionaUsuario(id, tp) {
      if (tp == 2) {
        dataURL = "<?php echo base_url('/usuarios/buscar_Usuarios'); ?>" + "/" + id;
        $.ajax({
          type: "POST",
          url: dataURL,
          dataType: "json",
          success: function(rs) {      
            $("#tp").val(2);  
            $("#id").val(id);  
            $("#nombres").val(rs[0]['nombres']);
            $("#apellidos").val(rs[0]['apellidos']);
            $("#contra1").val(rs[0]['contraseña']);
            $("#contra2").val(rs[0]['contraseña']);
            $("#correo").val(rs[0]['correo']);
            $("#btn_Guardar").text('Actualizar');
            $("#tituloo").text('Editar Usuario');
            $("#AgregarUsuario").modal("show");
          }
        })
      }else {
        $("#tp").val(1);
        $("#nombres").val('');
        $("#apellidos").val('');
        $("#contra1").val('');
        $("#contra2").val('');
        $("#correo").val('');
        $("#id").val(''); 
        $("#nombre").val('');
        $("#btn_Guardar").text('Guardar');
        $("#tituloo").text('Agregar Usuario');
        
      }
      
    };
  
</script>

<!-- Modal Confirma Eliminar -->

<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div  class="modal-content">
                <div style="align-items: center;" class="modal-header">
                    <h5 style="color:#C40000;font-size:25px; font-family: Georgia, serif; text-align: center;" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>
                </div>
                <div style="text-align:center; font-weight:bold; font-size:20px; font-family: Georgia, serif" class="modal-body">
                    <p>¿Seguro Desea eliminar éste Registro?</p>
                    <input hidden  id="estado" name="estado"></>
                    <input hidden id="id" name="id"></>
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