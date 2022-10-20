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
            <h3>Movimiento de bienes patrimoniales</h3>
        </div>
        <div class="card-body">
            <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-target="#ModalMovimiento" style="margin-left: 15px; width: 67px;">
                <span class="btn-label">
                    <i class="fas fa-plus"></i>
                </span>
                Nuevo
            </button>
        </div>
        <div class="card-body" style="padding-top: 0px;">
            <div class="table-responsive">
                <table id="tabla_movimiento" class="display table table-striped table-hover" >
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Marca</th>
                            <!--<th>Serie</th>-->
                            <th>Color</th>
                            <th>Dsp.</th>
                            <th>Movimiento</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Marca</th>
                            <!--<th>Serie</th>-->
                            <th>Color</th>
                            <th>Dsp.</th>
                            <th>Movimiento</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>   
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalMovimiento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #D6EAF8;">
                <h5 class="modal-title" id="exampleModalLabel"><b>Movimiento de bienes patrimoniales</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="insertar_movimiento">
                <div class="modal-body">
                    @csrf
                    <!--<input type="hidden" id="id2" name="id2">-->
                    <div class="row">
                        <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group form-floating-label">
                                <input type="txt" class="form-control input-solid" value= "    <?php echo date("Y/m/d"); ?>" id="fecha" name="fecha" required disabled>
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-calendar-alt"></i>  
                                    <!--<script>
                                        date = new Date().toLocaleDateString();
                                        document.write(date);
                                    </script>-->
                                </font></font></label>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-5 col-lg-5">                            
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="dnipersonal" name="dnipersonal" required>
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-id-card"></i> DNI Personal</font></font></label>                                 
                            </div>
                            <br>
                            <div class="form-group input-icon">
                                <span class="input-icon-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="personal" name="personal" placeholder="Personal" disabled>
                            </div>
                            <!--<div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="personal" name="personal" required disabled>
                                <label class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-user"></i> Personal</font></font></label>                                 
                            </div>-->
                            <br>
                            <div class="form-group form-floating-label">
                                <select class="form-control input-solid" id="selmovimiento" name="selmovimiento" required="">
                                    <option value="">&nbsp;</option>
                                    <option value="1">Prestado</option>
                                    <option value="2">Baja</option>
                                    <option selected="selected" value="3">Asignado</option>
                                </select>
                                <label for="" class="placeholder"><i class="fas fa-list"></i>  Movimiento</label>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="patrimonio" name="patrimonio" required pattern="[0-9]{5}">
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-cubes"></i>  Código Patrimonial</font></font></label>
                            </div>
                            <br>            
                            <!--<div class="selectgroup selectgroup-secondary selectgroup-pills">
                                <label class="selectgroup-item" style="padding-left:12px;">
                                    <input type="radio" name="icon-input" value="1" class="selectgroup-input" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
                                </label>
                            </div>-->
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body" style="width: 380px;padding-top: 0px; padding-left: 9px;">
                                    <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4" style="margin-top:2px;">
										<thead>
											<tr>
												<th scope="col">Descripción</th>
												<th scope="col">Serie</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><input type="text" id="des_patrimonio" name="des_patrimonio" style="border:0;"></td>
												<td><input type="text" id="ser_patrimonio" name="ser_patrimonio" style="border:0;"></td>
											</tr>
										</tbody>
									</table>
                                </div>
                            </div>
                            <div class="form-check">
                                <label><i class="fas fa-ban"></i> Disponibilidad</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="rbdisp" value="Si" checked="">
                                    <span class="form-radio-sign badge badge-success">Si</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="rbdisp" value="No">
                                    <span class="form-radio-sign badge badge-secondary">No</span>
                                </label>
                            </div>
                        </div>  
                        <div class="col-md-1 col-lg-1" style="padding-left: 0px;">
                            <div class="selectgroup selectgroup-primary selectgroup-pills">
                                <label class="selectgroup-item" style="margin-top:10px;">
                                    <input type="radio" name="icon-input" value="1" class="selectgroup-input" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <span class="selectgroup-button selectgroup-button-icon"><i class="fa fa-eye"></i></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="ModalMovimientoEditar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #D6EAF8;">
                <h5 class="modal-title" id="exampleModalLabel"><b>Editar</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="Editar_movimiento">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="id2" name="id2">
                    <input type="hidden" id="id2_patrimonio" name="id2_patrimonio">
                    <div class="row">
                        <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-3 col-lg-3">
                            <div class="form-group form-floating-label">
                                <input type="date" class="form-control input-solid" id="fecha2" name="fecha2" required>
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font></label>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-1 col-lg-1"></div>
                        <div class="col-md-5 col-lg-5">                            
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="dnipersonal2" name="dnipersonal2" required>
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-id-card"></i> DNI Personal</font></font></label>                                 
                            </div>
                            <br>
                            <div class="form-group input-icon">                
                                <span class="input-icon-addon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <input type="text" class="form-control" id="personal2" name="personal2" disabled>
                            </div>        
                            <br>
                            <div class="form-group form-floating-label">
                                <select class="form-control input-solid" id="selmovimiento2" name="selmovimiento2" required="">
                                    <option value="">&nbsp;</option>
                                    <option value="1">Prestado</option>
                                    <option value="2">Baja</option>
                                    <option selected="selected" value="3">Asignado</option>
                                </select>
                                <label for="" class="placeholder"><i class="fas fa-list"></i>  Movimiento</label>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="patrimonio2" name="patrimonio2" required pattern="[0-9]{5}">
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-cubes"></i>  Código Patrimonial</font></font></label>
                            </div>
                            <table class="table table-bordered table-head-bg-info table-bordered-bd-info mt-4">
                                <thead>
                                    <tr>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Serie</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" id="des_patrimonio2" name="des_patrimonio2" style="border:0;"></td>
                                        <td><input type="text" id="ser_patrimonio2" name="ser_patrimonio2" style="border:0;"></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="form-check">
                                <label><i class="fas fa-ban"></i> Disponibilidad</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="rbdisp2" value="Si">
                                    <span class="form-radio-sign badge badge-success">Si</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="rbdisp2" value="No"  checked="">
                                    <span class="form-radio-sign badge badge-secondary">No</span>
                                </label>
                            </div>
                        </div>  
                        <div class="col-md-1 col-lg-1" style="padding-left: 0px;">
                            
                        </div>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Eliminar-->
<div class="modal fade" id="eliminarMovimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

<script >
    $(document).ready(function() {

        $('#tabla_movimiento').DataTable( {
            "pageLength": 5,
            ajax:{
                    url: "{{route('vequipo.index')}}",
            },
            columns:[
                //{data: 'pat_id'},
                {data: 'pat_codigo'},
                {data: 'pat_descripcion'},
                {data: 'pat_marca'},
                //{data: 'pat_serie'},
                {data: 'pat_color'},
                //{data: 'pat_estado'},
                {data: 'pat_disponibilidad'},
                {data: 'tmov_descripcion'},
                {data: 'nombres'},
                {data: 'mov_fecha'},
                {data: 'action',orderable:false}
            ],
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> Excel',
                className: 'btn btn-success',
                header: false,
                excelStyles:{
                    //template:'cyan_medium'
                    cells:"2",
                    style:{
                        font:{
                            name:'Arial',
                            size:"10",
                            color:'FFFFFF',
                            b: true
                        },
                        fill:{
                            pattern:{
                                color:'1F283E'
                            }
                        }
                    }
                },
                insertCells:[
                    {
                        cells: 's1',
                        content: "CODIGO",
                        pushRow: true
                    },
                    {
                        cells:'B2',
                        content:'DESCRIPCION',
                    },
                    {
                        cells:'C2',
                        content:'MARCA',
                    },
                    {
                        cells:'D2',
                        content:'COLOR',
                    },
                    {
                        cells:'E2',
                        content:'DISPONIBILIDAD',
                    },
                    {
                        cells:'F2',
                        content:'MOVIMIENTO',
                    },
                    {
                        cells:'G2',
                        content:'RESPONSABLE',
                    },
                    {
                        cells:'H2',
                        content:'FECHA',
                    },
                    {
                        cells:'I2',
                        content:'OBSERVACION',
                    },
                ]
            }
            //'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            
            initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    $(column.header()).append("<br>") //adicional
                    var select = $('<select class="form-control"><option value=""></option></select>')
                    //.appendTo( $(column.footer()).empty() )
                    .appendTo( $(column.header()) )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                            );

                        column
                        .search( val ? '^'+val+'$' : '', true, false )
                        .draw();
                    } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        });
    });
</script>

<script>
    // ELIMINAR 
    var movid;

    $(document).on('click','.delete',function(){
        movid=$(this).attr('id');

        $('#eliminarMovimiento').modal('show');

    });
    $('#btneliminar').click(function(){
        $.ajax({
            url : "vequipo/eliminar/"+movid,
            beforeSend:function(){
                $('#btneliminar').text('Eliminando...');
            },
            success:function(data){
                setTimeout(function(){
                    $('#eliminarMovimiento').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente','Eliminar registro',{timeOut:3000});
                    $('#btneliminar').text('Eliminar');
                    $('#tabla_movimiento').DataTable().ajax.reload();
                },2000);

            }
      });
    });
</script>

<script>
    // REGISTRAR NUEVO 
    $('#insertar_movimiento').submit(function(e){
        e.preventDefault();
        var fecha = $("#fecha").val();
        var dni = $('#dnipersonal').val();
        var mov = $('#selmovimiento').val();
        var codigo = $('#patrimonio').val();
        var disponibilidad = $("input[name='rbdisp']:checked").val();
        var _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('vequipo.registrar') }}",
            type: "POST",
            data:{
                mov_fecha: fecha,
                per_dni: dni,
                tmov_id: mov,
                pat_codigo: codigo,
                pat_disponibilidad: disponibilidad,
                _token:_token

            },
            success:function(response){
                if(response){
                    $('#ModalMovimiento').modal('hide');
                    $('#insertar_movimiento')[0].reset();
                    toastr.success('El registro se ingreso correctamente.', 'Nuevo Registro', {timeOut:3000});
                    $('#tabla_movimiento').DataTable().ajax.reload();
                }
            }
        });

    });

</script>

<script>
    //EDITAR 
    function editarMovimiento(mov_id){
        $.get('vequipo/editar/'+mov_id, function(movimiento){
            //asignar los datos recuperados a la ventana modal
            $('#id2').val(movimiento[0].mov_id);
            $('#id2_patrimonio').val(movimiento[0].pat_id);
            $('#fecha2').val(movimiento[0].mov_fecha);
            $('#dnipersonal2').val(movimiento[0].per_dni);
            $('#personal2').val(movimiento[0].nombre_completo);
            $('#selmovimiento2').val(movimiento[0].tmov_id);
            $('#patrimonio2').val(movimiento[0].pat_codigo);
            $('#des_patrimonio2').val(movimiento[0].pat_descripcion);
            $('#ser_patrimonio2').val(movimiento[0].pat_serie);
            if(movimiento[0].pat_disponibilidad == "Si"){
                $('input[name=rbdisp2][value="Si"]').prop('checked', true);
            }
            else if(movimiento[0].pat_disponibilidad == "No"){
                $('input[name=rbdisp2][value="No"]').prop('checked', true);
            }
            $("input[name=_token]").val();
            $('#ModalMovimientoEditar').modal('toggle');
        })

    }
</script>

<script>
    //ACTUALIZAR
    $('#Editar_movimiento').submit(function(e){
        e.preventDefault();
        var id2=$('#id2').val();
        var fecha2=$('#fecha2').val();
        var dni2=$('#dnipersonal2').val();
        var t_movimiento=$('#selmovimiento2').val();
        var codigo_p=$('#patrimonio2').val();
        var disponibilidad2=$("input[name='rbdisp2']:checked").val();
        var _token2 = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('vequipo.actualizar') }}",
            type: "POST",
            data:{
                mov_id:id2,
                mov_fecha: fecha2,
                per_dni: dni2,
                tmov_id: t_movimiento,
                pat_codigo: codigo_p,
                pat_disponibilidad: disponibilidad2,
                _token:_token2
            },
            success:function(response){
                //console.log(response);
                if(response){
                    $('#ModalMovimientoEditar').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000});
                    $('#tabla_movimiento').DataTable().ajax.reload();
                }
            }

        })

    });

</script>

<!----------------Autocompletador Personal-----------------
<script type="text/javascript">
    $('#personal').on('keyup',function()
    {
        $value=$(this).val();
        $.ajax({
            type:'get',
            url:'{{URL::to('personal')}}',
            data:{'personal':$value},

            success:function(data)
            {
                console.log(data);
                $('#Listpersonal').html(data);
            }
        });
    })
    
</script>--->

<script>
//--------BUSCAR PERSONAL POR DNI---------
$('#dnipersonal').keyup(function() {
    p = $('#dnipersonal').val();
    var _token4 = $("input[name=_token]").val();
    setTimeout(function() {
        if($('#dnipersonal').val() == p){ 
            $.ajax({
                type: "POST",
                url: "{{route('vequipo.buscarpersonal')}}",
                data: {buscar: p,
                    _token: _token4
                },
                cache: false,
                beforeSend: function() {
                    // loading image
                },
                success: function(dato) {
                        $('#personal').val(dato[0].descrpcion);
                },

            })
        }
    }, 1000); // 1 sec delay to check.

}); 
</script>

<script>
//--------BUSCAR PERSONAL POR DNI2---------
$('#dnipersonal2').keyup(function() {
    p = $('#dnipersonal2').val();
    var _token4 = $("input[name=_token]").val();
    setTimeout(function() {
        if($('#dnipersonal2').val() == p){ 
            $.ajax({
                type: "POST",
                url: "{{route('vequipo.buscarpersonal')}}",
                data: {buscar: p,
                    _token: _token4
                },
                cache: false,
                beforeSend: function() {
                    // loading image
                },
                success: function(dato) {
                        $('#personal2').val(dato[0].descrpcion);
                },

            })
        }
    }, 1000); // 1 sec delay to check.

}); 
</script>

<script>
//--------BUSCAR PATRIMONIO POR CODIGO---------
$('#patrimonio').keyup(function() {
    s = $('#patrimonio').val();
    var _token4 = $("input[name=_token]").val();
    setTimeout(function() {
        if($('#patrimonio').val() == s){ 
            $.ajax({
                type: "POST",
                url: "{{route('vequipo.buscarnombre')}}",
                data: {buscar: s,
                    _token: _token4
                },
                cache: false,
                beforeSend: function() {
                    // loading image
                },
                success: function(dato) {
                        $('#des_patrimonio').val(dato[0].nombre);
                        $('#ser_patrimonio').val(dato[0].serie);
                },

            })
        }
    }, 1000); // 1 sec delay to check.

}); 
</script>

<script>
//--------BUSCAR PATRIMONIO POR CODIGO2---------
$('#patrimonio2').keyup(function() {
    s = $('#patrimonio2').val();
    var _token4 = $("input[name=_token]").val();
    setTimeout(function() {
        if($('#patrimonio2').val() == s){ 
            $.ajax({
                type: "POST",
                url: "{{route('vequipo.buscarnombre')}}",
                data: {buscar: s,
                    _token: _token4
                },
                cache: false,
                beforeSend: function() {
                    // loading image
                },
                success: function(dato) {
                        $('#des_patrimonio2').val(dato[0].nombre);
                        $('#ser_patrimonio2').val(dato[0].serie);
                },

            })
        }
    }, 1000); // 1 sec delay to check.

}); 
</script>

@endsection