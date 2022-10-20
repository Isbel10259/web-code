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
                        <i class="fas fa-archive"></i> Registrar Nuevo
                    </a>
                </li>
            </ul> 
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <!--<th>ID</th>-->
                                        <th>Código</th>
                                        <th>Descripción</th>
                                        <th>Marca</th>
                                        <th>Color</th>
                                        <th>Estado</th>
                                        <th>Dsp.</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <!--<th>ID</th>-->
                                        <th>Código</th>
                                        <th>Descripción</th>
                                        <th>Marca</th>
                                        <th>Color</th>
                                        <th>Estado</th>
                                        <th>Dsp.</th>
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
                        <form action="electrodomestico" id="insertar-electrodomestico">
                            @csrf
                            <div class="row" style="padding-left:140px";>
                                <div class="col-md-6 col-lg-5">
                                    <div class="form-group form-floating-label">
                                        <input type="text" class="form-control input-solid" id="codigo" name="codigo" required pattern="[0-9]{5}">
                                        <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-key"></i>  Código patrimonial</font></font></label>
                                    </div>
                                    <br>
                                    <div class="form-group form-floating-label">
                                        <input type="text" class="form-control input-solid" id="descripcion" name="descripcion" required>
                                        <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-file-signature"></i>  Descripción</font></font></label>
                                    </div>
                                    <br>
                                    <div class="form-group form-floating-label">
                                        <input type="text" class="form-control input-solid" id="color" name="color" required>
                                        <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-palette"></i>  Color</font></font></label>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-6 col-lg-5">
                                    <div class="form-group form-floating-label">
                                        <input type="text" class="form-control input-solid" id="marca" name="marca" required>
                                        <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-tags"></i>  Marca</font></font></label>
                                    </div>
                                    <br>
                                    <div class="form-group form-floating-label">
                                        <input type="text" class="form-control input-solid" id="modelo" name="modelo">
                                        <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-cubes"></i>  Modelo</font></font></label>
                                    </div>
                                    <div class="form-check">
                                        <label><i class="fas fa-heartbeat"></i> Estado</label><br>
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="rbestado" value="Bueno" checked="">
                                            <span class="form-radio-sign badge badge-success"> Bueno</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="rbestado" value="Regular">
                                            <span class="form-radio-sign badge badge-warning"> Regular</span>
                                        </label>
                                        <label class="form-radio-label ml-3">
                                            <input class="form-radio-input" type="radio" name="rbestado" value="Malo">
                                            <span class="form-radio-sign badge badge-danger"> Malo</span>
                                        </label>
                                    </div>
                                    <div class="form-check" style="display: none;">
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
                                    <div class="form-group form-floating-label">
                                        <select class="form-control input-solid" style="visibility:hidden" id="selcategoria" name="selcategoria" required="">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Equipo</option>
                                            <option value="2">Mobiliario</option>
                                            <option value="3">Vehículo</option>
                                            <option selected="selected" value="4">Electrodoméstico</option>
                                        </select>
                                        <!--<label for="" class="placeholder"><i class="fas fa-list"></i>  Categoría</label>-->
                                    </div>
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

<!-- Modal -->
<div class="modal fade" id="ModalElectrodomestico" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #D6EAF8;">
                <h5 class="modal-title" id="exampleModalLabel"><b>Actualizar registro</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editar_electrodomestico">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="id2" name="id2">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="codigo2" name="codigo2" required pattern="[0-9]{5}">
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-key"></i>  Código patrimonial</font></font></label>
                            </div>
                            <br>
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="descripcion2" name="descripcion2" required>
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-file-signature"></i>  Descripción</font></font></label>
                            </div>
                            <br>
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="color2" name="color2" required>
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-palette"></i>  Color</font></font></label>
                            </div>
                            <br>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="marca2" name="marca2" required>
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-tags"></i>  Marca</font></font></label>
                            </div>
                            <br>
                            <div class="form-group form-floating-label">
                                <input type="text" class="form-control input-solid" id="modelo2" name="modelo2">
                                <label for="inputFloatingLabel2" class="placeholder"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fas fa-cubes"></i>  Modelo</font></font></label>
                            </div>
                            <div class="form-check">
                                <label><i class="fas fa-heartbeat"></i> Estado</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="rbestado2" value="Bueno" checked="">
                                    <span class="form-radio-sign badge badge-success"> Bueno</span>
                                </label>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="rbestado2" value="Regular">
                                    <span class="form-radio-sign badge badge-warning"> Regular</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="rbestado2" value="Malo">
                                    <span class="form-radio-sign badge badge-danger"> Malo</span>
                                </label>
                            </div>
                            <div class="form-check" style="display: none;">
                                <label><i class="fas fa-ban"></i> Disponibilidad</label><br>
                                <label class="form-radio-label">
                                    <input class="form-radio-input" type="radio" name="rbdisp2" value="Si" checked="">
                                    <span class="form-radio-sign badge badge-success">Si</span>
                                </label>
                                <label class="form-radio-label ml-3">
                                    <input class="form-radio-input" type="radio" name="rbdisp2" value="No">
                                    <span class="form-radio-sign badge badge-secondary">No</span>
                                </label>
                            </div>
                            <div class="form-group form-floating-label">
                                <select class="form-control input-solid" style="display:none;" id="selcategoria2" name="selcategoria2" required="">
                                    <option value="">&nbsp;</option>
                                    <option value="1">Equipo</option>
                                    <option value="2">Mobiliario</option>
                                    <option value="3">Vehículo</option>
                                    <option selected="selected" value="4">Electrodoméstico</option>
                                </select>
                                <!--<label for="" class="placeholder"><i class="fas fa-list"></i>  Categoría</label>-->
                            </div>
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

<!-- Modal Eliminar-->
<div class="modal fade" id="eliminarElectrodomestico" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    //LISTAR PATRIMONIO
    $(document).ready(function() {
        $('#multi-filter-select').DataTable( {
            "pageLength": 5,
            ajax:{
                    url: "{{route('electrodomestico.index')}}",
            },
            columns:[
                //{data: 'pat_id'},
                {data: 'pat_codigo'},
                {data: 'pat_descripcion'},
                {data: 'pat_marca'},
                {data: 'pat_color'},
                {data: 'pat_estado'},
                {data: 'pat_disponibilidad'},
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
                        content:'ESTADO',
                    },
                    {
                        cells:'F2',
                        content:'DISPONIBILIDAD',
                    },
                    {
                        cells:'G2',
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
    // REGISTRAR NUEVO PATRIMONIO
    $('#insertar-electrodomestico').submit(function(e){
        e.preventDefault();
        var codigo = $("#codigo").val();
        var descripcion = $('#descripcion').val();
        var marca = $('#marca').val();
        var modelo = $('#modelo').val();
        var color = $('#color').val();
        var estado = $("input[name='rbestado']:checked").val(); 
        var disponibilidad = $("input[name='rbdisp']:checked").val();
        var categoria = $("#selcategoria").val();
        var _token = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('electrodomestico.registrar') }}",
            type: "POST",
            data:{
                pat_codigo: codigo,
                pat_descripcion: descripcion,
                pat_marca: marca,
                pat_modelo: modelo,
                pat_color: color,
                pat_estado: estado,
                pat_disponibilidad: disponibilidad,
                cat_id: categoria,
                _token:_token

            },
            success:function(response){
                if(response){
                    $('#insertar-electrodomestico')[0].reset();
                    toastr.success('El registro se ingreso correctamente.', 'Nuevo Registro', {timeOut:3000});
                    $('#multi-filter-select').DataTable().ajax.reload();
                }
            }
        });

    });

</script>
<script>
    // ELIMINAR PATRIMONIO
    var patid;

    $(document).on('click','.delete',function(){
        patid=$(this).attr('id');

        $('#eliminarElectrodomestico').modal('show');

    });
    $('#btneliminar').click(function(){
        $.ajax({
            url : "electrodomestico/eliminar/"+patid,
            beforeSend:function(){
                $('#btneliminar').text('Eliminando...');
            },
            success:function(data){
                setTimeout(function(){
                    $('#eliminarElectrodomestico').modal('hide');
                    toastr.warning('El registro fue eliminado correctamente','Eliminar registro',{timeOut:3000});
                    $('#btneliminar').text('Eliminar');
                    $('#multi-filter-select').DataTable().ajax.reload();
                },2000);

            }
      });
    });
</script>

<script>
    //EDITAR PATRIMONIO
    function editarElectrodomestico(pat_id){
        $.get('electrodomestico/editar/'+pat_id, function(patrimonio){
            //asignar los datos recuperados a la ventana modal
            $('#id2').val(patrimonio[0].pat_id);
            $('#codigo2').val(patrimonio[0].pat_codigo);
            $('#descripcion2').val(patrimonio[0].pat_descripcion);
            $('#marca2').val(patrimonio[0].pat_marca);
            $('#modelo2').val(patrimonio[0].pat_modelo);
            $('#color2').val(patrimonio[0].pat_color);
            if(patrimonio[0].pat_estado == "Bueno"){
                $('input[name=rbestado2][value="Bueno"]').prop('checked', true);
            }
            else if(patrimonio[0].pat_estado == "Regular"){
                $('input[name=rbestado2][value="Regular"]').prop('checked', true);
            }
            else if(patrimonio[0].pat_estado == "Malo"){
                $('input[name=rbestado2][value="Malo"]').prop('checked', true);
            }

            if(patrimonio[0].pat_disponibilidad == "Si"){
                $('input[name=rbdisp2][value="Si"]').prop('checked', true);
            }
            else if(patrimonio[0].pat_disponibilidad == "No"){
                $('input[name=rbdisp2][value="No"]').prop('checked', true);
            }
            $('#selcategoria2').val(patrimonio[0].cat_id);
            console.log(patrimonio[0].cat_id);
            $('#selcategoria2').change();
            $("input[name=_token]").val();
            $('#ModalElectrodomestico').modal('toggle');
        })

    }
</script>

<script>
    //ACTUALIZAR EQUIPO
    $('#editar_electrodomestico').submit(function(e){
        e.preventDefault();
        var id2=$('#id2').val();
        var codigo2=$('#codigo2').val();
        var descripcion2=$('#descripcion2').val();
        var marca2=$('#marca2').val();
        var modelo2=$('#modelo2').val();
        var color2=$('#color2').val();
        var estado2=$("input[name='rbestado2']:checked").val();
        var disponibilidad2=$("input[name='rbdisp2']:checked").val();
        var selcategoria2=$('#selcategoria2').val();
        var _token2 = $("input[name=_token]").val();

        $.ajax({
            url: "{{ route('electrodomestico.actualizar') }}",
            type: "POST",
            data:{
                pat_id:id2,
                pat_codigo: codigo2,
                pat_descripcion: descripcion2,
                pat_marca: marca2,
                pat_modelo: modelo2,
                pat_color: color2,
                pat_estado: estado2,
                pat_disponibilidad: disponibilidad2,
                cat_id: selcategoria2,
                _token:_token2
            },
            success:function(response){
                if(response){
                    $('#ModalElectrodomestico').modal('hide');
                    toastr.info('El registro fue actualizado correctamente.', 'Actualizar Registro', {timeOut:3000});
                    $('#multi-filter-select').DataTable().ajax.reload();
                }
            }

        })

    });

</script>

@endsection