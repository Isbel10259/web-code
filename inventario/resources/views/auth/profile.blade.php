@extends('master')
@section('superior')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<style>
    table th {
        background-color: #D6EAF8;
    }
</style>
@endsection
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-pills nav-info" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                            <i class="fas fa-list"></i> Lista
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                            <i class="fas fa-user-plus"></i> Nuevo
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="basic-datatables" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <!--<th>ID</th>-->
                                            <th>DNI</th>
                                            <th>Nombres y Apellidos</th>
                                            <th>Correo</th>
                                            <th>Área</th>
                                            <th>Tipo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <!--<th>ID</th>-->
                                            <th>DNI</th>
                                            <th>Nombres y Apellidos</th>
                                            <th>Correo</th>
                                            <th>Área</th>
                                            <th>Tipo</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <form action="personal" id="insertar-personal">
                                @csrf
                                <div class="row" style="padding-left:140px";>
                                    <div class="col-md-6 col-lg-5">
                                        <div style="text-align:center;">
                                            <img src="{{ asset('assets/img/img_usu.png') }}" alt="" style="padding-top: 9px">
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="dni" name="dni" pattern="[0-9]{8}" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-id-card"></i>  DNI</font></font></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="nombre" name="nombre" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-user"></i>  Nombres</font></font></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="apellido" name="apellido" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-user"></i>  Apellidos</font></font></label>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-6 col-lg-5">
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="direccion" name="direccion" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-map-marked-alt"></i>  Dirección</font></font></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="correo" name="correo" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-envelope"></i>  Correo</font></font></label>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 col-lg-7">
                                                <div class="form-group form-floating-label">
                                                    <input type="text" class="form-control input-solid" id="celular" name="celular" required>
                                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-phone"></i>  Celular</font></font></label>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-md-6 col-lg-5">
                                                <div class="form-group form-floating-label">
                                                    <input type="text" class="form-control input-solid" id="piso" name="piso" required>
                                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-building"></i>  Piso</font></font></label>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="area" name="area" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-project-diagram"></i>  Área</font></font></label>
                                        </div>
                                        <br>
                                        <div class="form-group form-floating-label">
                                            <select class="form-control input-solid" id="seltipo" name="seltipo" required="">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Nombrado</option>
                                                <option value="2">Cas</option>
                                                <option value="3">Locación</option>
                                            </select>
                                            <label for="" class="placeholder"><i class="fas fa-list"></i>  Tipo de Contrato</label>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6"></div>
                                    <div class="col-md-6 col-lg-6">
                                        <button type="submit" class="btn btn-success" style="margin-left: 200px"><i class="fas fa-save"></i> Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar-->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <center><h2><b>¿Está seguro de eliminar el registro seleccionado?</b></h2></center>
                    <center><p>¡No podrás revertir esto!</p></center>
                </div>
                <div class="modal-footer" style="margin-left:auto; margin-right:auto">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                    <button type="button" class="btn btn-success" id="btneliminar" name="btneliminar"><i class="fas fa-trash-alt"></i> Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #D6EAF8;">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar registro</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editar_personal">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="id2" name="id2">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group form-floating-label">
                                    <input type="text" class="form-control input-solid" id="dni2" name="dni2" pattern="[0-9]{8}" required>
                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-id-card"></i>  DNI</font></font></label>
                                </div>
                                <br>
                                <div class="form-group form-floating-label">
                                    <input type="text" class="form-control input-solid" id="nombre2" name="nombre2" required>
                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-user"></i>  Nombres</font></font></label>
                                </div>
                                <br>
                                <div class="form-group form-floating-label">
                                    <input type="text" class="form-control input-solid" id="apellido2" name="apellido2" required>
                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-user"></i>  Apellidos</font></font></label>
                                </div>
                                <br>
                                <div class="form-group form-floating-label">
                                    <input type="text" class="form-control input-solid" id="direccion2" name="direccion2" required>
                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-map-marked-alt"></i>  Dirección</font></font></label>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group form-floating-label">
                                    <input type="text" class="form-control input-solid" id="correo2" name="correo2" required>
                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-envelope"></i>  Correo</font></font></label>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-7 col-lg-7">
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="celular2" name="celular2" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-phone"></i>  Celular</font></font></label>
                                        </div>
                                        <br>
                                    </div>
                                    <div class="col-md-5 col-lg-5">
                                        <div class="form-group form-floating-label">
                                            <input type="text" class="form-control input-solid" id="piso2" name="piso2" required>
                                            <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-building"></i>  Piso</font></font></label>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="form-group form-floating-label">
                                    <input type="text" class="form-control input-solid" id="area2" name="area2" required>
                                    <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-project-diagram"></i>  Área</font></font></label>
                                </div>
                                <br>
                                <div class="form-group form-floating-label">
                                    <select class="form-control input-solid" id="seltipo2" name="seltipo2" required="">
                                        <option value="">&nbsp;</option>
                                        <option value="1">Nombrado</option>
                                        <option value="2">Cas</option>
                                        <option value="3">Locación</option>
                                    </select>
                                    <label for="" class="placeholder"><i class="fas fa-list"></i>  Tipo de Contrato</label>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-redo-alt"></i> Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
<!--botones-->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<!--EXCEL-->
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

<script>
    //LISTAR PERSONAL
    $(document).ready(function(){
        $('#basic-datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax:{
                    url: "{{route('personal.index')}}",
            },
            columns:[
                //{data: 'per_id'},
                {data: 'per_dni'},
                {data: 'nombres'},
                {data: 'per_correo'},
                {data: 'per_area'},
                {data: 'tper_modalidad'},
                {data: 'action',orderable:false}
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel"></i> Excel',
                    className: 'btn btn-success',
                    excelStyles:{
                        template:'cyan_medium'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i> PDF',
                    className: 'btn btn-danger'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print"></i> Imprimir',
                    className: 'btn btn-primary'
                },
                //'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<script>
    // REGISTRAR NUEVO PERSONAL
    $('#insertar-personal').submit(function(e){
        e.preventDefault();
        var dni = $("#dni").val();
        var nombre = $('#nombre').val();
        var apellido = $('#apellido').val();
        var correo = $('#correo').val();
        var direccion = $('#direcion').val();
        var celular = $('#celular').val();
        var area = $('#area').val();
        var piso = $('#piso').val();
        var tipo = $("#seltipo").val();
        var _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('personal.registrar') }}",
            type: "POST",
            data:{
                per_dni: dni,
                per_nombre: nombre,
                per_apellido: apellido,
                per_correo: correo,
                per_direccion: direccion,
                per_celular: celular,
                per_area: area,
                per_piso: piso,
                tper_id: tipo,
                _token:_token

            },
            success:function(response){
                if(response){
                    $('#insertar-personal')[0].reset();
                    toastr.success('El registro se ingreso correctamente.', 'Nuevo Registro', {timeOut:3000});
                    $('#basic-datatables').DataTable().ajax.reload();
                }
            }
        });

    });

</script>

<script>
    // ELIMINAR PERSONAL
    var perid;

    $(document).on('click','.delete',function(){
        perid=$(this).attr('id');

        $('#exampleModalCenter').modal('show');

    });
    $('#btneliminar').click(function(){
        $.ajax({
            url : "personal/eliminar/"+perid,
            beforeSend:function(){
                $('#btneliminar').text('Eliminando...');
            },
            success:function(data){
                setTimeout(function(){
                    $('#exampleModalCenter').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente','Eliminar registro',{timeOut:3000});
                    $('#btneliminar').text('Eliminar');
                    $('#basic-datatables').DataTable().ajax.reload();
                },2000);

            }
      });
    });
</script>

<script>
    //EDITAR PERSONAL
    function editarPersonal(per_id){
        $.get('personal/editar/'+per_id, function(personal){
            //asignar los datos recuperados a la ventana modal
            $('#id2').val(personal[0].per_id);
            $('#dni2').val(personal[0].per_dni);
            $('#nombre2').val(personal[0].per_nombre);
            $('#apellido2').val(personal[0].per_apellido);
            $('#correo2').val(personal[0].per_correo);
            $('#direccion2').val(personal[0].per_direccion);
            $('#celular2').val(personal[0].per_celular);
            $('#area2').val(personal[0].per_area);
            $('#piso2').val(personal[0].per_piso);
            $('#seltipo2').val(personal[0].tper_id);
            $("input[name=_token]").val();
            $('#exampleModal').modal('toggle');
        })

    }
</script>
<script>
    //ACTUALIZAR UN REGISTRO
    $('#editar_personal').submit(function(e){

        e.preventDefault();
        var id2=$('#id2').val();
        var dni2=$('#dni2').val();
        var nombre2=$('#nombre2').val();
        var apellido2=$('#apellido2').val();
        var correo2=$('#correo2').val();
        var direccion2=$('#direccion2').val();
        var celular2=$('#celular2').val();
        var area2=$('#area2').val();
        var piso2=$('#piso2').val();
        var seltipo2=$('#seltipo2').val();
        var _token2 = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('personal.actualizar') }}",
            type: "POST",
            data:{
                per_id:id2,
                per_dni: dni2,
                per_nombre: nombre2,
                per_apellido: apellido2,
                per_correo: correo2,
                per_direccion: direccion2,
                per_celular: celular2,
                per_area: area2,
                per_piso: piso2,
                tper_id: seltipo2,
                _token:_token2
            },
            success:function(response){
                if(response){
                    $('#exampleModal').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000});
                    $('#basic-datatables').DataTable().ajax.reload();
                }
            }

        })

    });

</script>

@endsection
