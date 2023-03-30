<head>
  <meta charset="utf-8" />
</head>

<body style="margin-top: 245px;">

    <div>
      <h1 class="titulo" style="position: relative; top: 10px; font-family: Georgia, serif; font-style: normal; font-size: 55px; text-align: center; color: #C40000; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Usuarios Eliminados</h1>
    </div>
    <div class="card-body" >

      <div class="row col-sm-12" >
      <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-5"></div>
      <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-2">        
        <a style="margin-left: -813px;" href="<?php echo base_url('/usuarios'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
      </div>
      </div>

      <br>
      <div class="table-responsive">
        <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="color: #98040a; background: #6095BC; font-family: 'Amaranth';font-style: normal;font-size: 20px;text-align: center;">
              <th>Id</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Coreo</th>
              <th>Estado</th>
              <th></th>
            </tr>
          </thead>
          <tbody style="background: #9de8ff; font-family: 'Amaranth';font-style: normal;font-size: 20px;text-align: center;" >
            <?php foreach ($datos as $dato) { ?>
              <tr >
                <td><?php echo $dato['id']; ?></td>
                <td><?php echo $dato['nombres']; ?></td>
                <td><?php echo $dato['apellidos']; ?></td>
                <td><?php echo $dato['correo']; ?></td>
                <td><?php echo $dato['estado']; ?></td>

                 <td><button style="font-family:Arial;font-size:17px;" type="button" class="btn btn-secondary"  href="#" data-href="<?php echo base_url('/usuarios/eliminar') . '/' .$dato['id']. '/' .'A'; ?>"  data-bs-toggle="modal" data-bs-target="#modal-confirma">Activar</button></td>

              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      
      <!-- Modal Confirma Eliminar -->
      <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: linear-gradient(90deg, #838da0, #b4c1d9);" class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Activación de Registro</h5>
                    
                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Activar éste Registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>
       <!-- Modal Elimina -->
    

</body>
<script>
    $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  
  // function eliminarPaises(id) {     
  //     $("#id").val(id);
  //     dataURL = "<?php echo base_url('elimina_Paises'); ?>" + "/" + id + "/" + 'A';
  //     $.ajax({
  //       type: "POST",
  //       url: dataURL,
  //       dataType: "json",
  //       success: function(rs) {
  //       },
  //       error: function() {
  //               alert("No se ha Podido Activar El Registro");
  //           }
  //     })

  // };
 
  $('.close').click(function() {$("#modal-confirma").modal("hide");});
</script>