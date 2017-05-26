$(document).ready(function () {

    var baseUrl = document.location.origin + '/index.php/';
   
    if (document.getElementById('fecha-inicio')) {
        document.getElementById('fecha-inicio').valueAsDate = new Date();
    }

    $(".panel #tabla-load-equipos").on("click", function () {
        $('#tabla-load-equipos').DataTable();
    });

    $('#example').DataTable();
    $('#documentos-normativa').DataTable();

    function llenar_tabla(data) {
        $('#tabla-equipos').dataTable({
            "bAutoWidth": false,
            "oLanguage": {
                "sProcessing": "<img src='/assets/image/ajax-loader.gif'>"
            },
            "processing": true,
            "bRetrieve": true,
            "bDestroy": true,
            "data": data,
            "columns": [{
                    "data": function (row) {
                        return row.id_equipo;
                    },
                    "width": "5%",
                    "targets": 2
                },
                {
                    "data": "area",
                    "width": "15%",
                    "targets": 0
                },
                {
                    "data": "equipo_actividad",
                    "width": "30%",
                    "targets": 1
                },
                {
                    "data": "observacion",
                    "width": "30%",
                    "targets": 2
                },
                {
                    "data": function (row) {
                        if (row.programa >= 1) {
                            return '<i class="fa fa-check-square" style="color:green;"></i>';
                        } else {
                            return '<i class="fa fa-square" style="color:silver;"></i>';
                        }

                    },
                    "width": "5%",
                    "targets": 2
                },
                {
                    "data": function (row) {
                        var link = "";
                        if (row.programa >= 1) {
                            link = '<li><a href="' + baseUrl + '/plan/detalle/' + row.id_equipo + '">Detalle programa</a></li>';
                        } else {
                            link = '<li><a href="' + baseUrl + '/mantenimiento/programa/' + row.id_equipo + '">Crear plan de Mantención</a></li>';
                        }
                        return '<div class="btn-group">' +
                                '<button type="button" class="btn btn-default btn-xs">Acciones</button>' +
                                '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> ' +
                                '<span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>' +
                                '<ul class="dropdown-menu">' +
                                link +
                                '<li><a href="' + baseUrl + '/mantenimiento/agregar_actividad/' + row.id_equipo + '">Agregar actividad</a></li>' +
                                '<li><a href="' + baseUrl + '/parametro/editar_equipo/' + row.id_equipo + '">Modificar</a></li>' +
                                '<li><a href="' + baseUrl + '/parametro/eliminar_equipo/' + row.id_equipo + '">Eliminar</a></li>' +
                                '</ul>' +
                                '</div>';
                    },
                    "width": "10%",
                    "targets": 3
                }

            ],
            "order": [
                [1, 'asc']
            ]
        });
        $('#loader').hide();
    }

    function llenar_tabla_area(data) {
        $('#tabla-area').dataTable({
            "bAutoWidth": false,
            "oLanguage": {
                "sProcessing": "<img src='/assets/image/ajax-loader.gif'>"
            },
            "processing": true,
            "bRetrieve": true,
            "bDestroy": true,
            "data": data,
            "columns": [{
                    "data": "area",
                    "width": "20%",
                    "targets": 0
                },
                {
                    "data": function (row, data, index) {
                        return '<a href="' + window.urlParametroEditarArea + row.id_area + '" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a> ' +
                                ' <a href="' + baseUrl + '/parametro/eliminar_area/' + row.id_area + '" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>' +
                                ' <a href="' + baseUrl + '/parametro/crear_subarea/' + row.id_area + '" class="btn btn-success btn-xs"><i class="fa fa-circle"></i> Crear sub-área</a>' +
                                ' <a href="' + baseUrl + '/parametro/listar_subarea/' + row.id_area + '" class="btn btn-default btn-xs"><i class="fa fa-circle"></i> Sub Areas</a>';
                    },
                    "width": "60%",
                    "targets": 1
                }

            ],
            "order": [
                [1, 'asc']
            ],
            "sDom": '<"toolbar">frtip<"bottom">l"'
        });
        $('#loader').hide();
    }

    function llenar_tabla_plan(data) {
        //console.log(data);
        $('#tabla-plan').dataTable({
            "bAutoWidth": false,
            "oLanguage": {
                "sProcessing": "<img src='/assets/image/ajax-loader.gif'>"
            },
            "processing": true,
            "bRetrieve": true,
            "bDestroy": true,
            "data": data,
            "columns": [{
                    "data": "codigo_plan",
                    "width": "10%",
                    "targets": 0,
                    "sClass": "codigo-plan"
                },
                {
                    "data": "fecha_plan",
                    "width": "8%",
                    "targets": 0
                },
                {
                    "data": "version",
                    "width": "8%",
                    "targets": 0
                },
                {
                    "data": "fecha_registro",
                    "width": "20%",
                    "targets": 0
                },
                {
                    "data": "nombre_plan",
                    "width": "50%",
                    "targets": 0,
                    "sClass": "nombre-plan"
                },
                {
                    "data": function (row) {
                        return '<a href="' + baseUrl + '/plan/editar/' + row.id_plan + '" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a> ' +
                                ' <a href="' + baseUrl + '/plan/eliminar/' + row.id_plan + '" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>';
                    },
                    "width": "10%",
                    "targets": 1
                }

            ],
            "order": [
                [1, 'asc']
            ],
            "sDom": '<"toolbar">frtip<"bottom">l"'
        });
        $('#loader').hide();
    }

    function llenar_tabla_ordenes(data) {
        //console.log(data);
        $('#ordenes').dataTable({
            "bAutoWidth": false,
            "oLanguage": {
                "sProcessing": "<img src='/assets/image/ajax-loader.gif'>"
            },
            "processing": true,
            "bRetrieve": true,
            "bDestroy": true,
            "data": data,
            "columns": [{
                    "data": "id_orden",
                    "width": "4%",
                    "targets": 0,
                    "sClass": "id-orden"
                },
                {
                    "data": "id_equipo",
                    "width": "4%",
                    "targets": 1
                },
                {
                    "data": "semana",
                    "width": "4%",
                    "targets": 2
                },
                {
                    "data": function (row) {
                        return '<a href="' + baseUrl + '/mantenimiento/pdf/' + row.id_orden + '" target="_blank" ' +
                                'style="border:0px solid transparent;color:red;border-color:green;margin-left: 2px;">' +
                                '<img alt="document, pdf icon" class="tiled-icon" style="max-width: 128px; max-height: 128px;" ' +
                                'src="/assets/image/document-pdf.png" data-pin-nopin="true"></a>';
                    },
                    "width": "4%",
                    "targets": 3
                },
                {
                    "data": function (row) {
                        if (row.estado_aprobacion === '1') {
                            return '<span class="label label-success">Aprobado</span>';
                        } else if (row.estado_aprobacion === '0') {
                            return '<span class="label label-warning">Pendiente</span>';
                        } else if (row.estado_aprobacion === '2') {
                            return '<span class="label label-danger">Rechazado</span>';
                        }
                    },
                    "width": "10%",
                    "targets": 4
                },
                {
                    "data": "fecha_inicio",
                    "width": "8%",
                    "targets": 5
                },
                {
                    "data": "fecha_termino",
                    "width": "8%",
                    "targets": 6
                },
                {
                    "data": "equipo_actividad",
                    "width": "39%",
                    "targets": 7,
                    "sClass": "fuente-equipo"
                },
                {
                    "data": "tipo_mantencion",
                    "width": "8%",
                    "targets": 8
                },
                {
                    "data": function (row) {
                        var opcionAutorizar = '';
                        if (row.estado_aprobacion === '1') {
                            opcionAutorizar = '<a href="http://sistema.mobagricola.cl/index.php/mantenimiento/supervisar/' + row.id_orden + '" class="btn btn-default btn-xs"><i class="fa fa-fire" style="color:green;"></i> </a>';
                        }
                        return '<a href="' + baseUrl + '/mantenimiento/asistente_editar/' + row.id_orden + '/' + row.semana + '" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i> </a> ' +
                                ' <a href="' + baseUrl + '/mantenimiento/eliminar_orden/' + row.id_orden + '/' + row.semana + '" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i> </a>' +
                                ' <a href="http://sistema.mobagricola.cl/index.php/mantenimiento/autorizar/' + row.id_orden + '" class="btn btn-default btn-xs"><i class="fa fa-user" style="color:green;"></i> </a>' +
                                ' ' + opcionAutorizar;
                    },
                    "width": "18%",
                    "targets": 9
                }

            ],
            "order": [
                [1, 'asc']
            ],
            "sDom": '<"toolbar">frtip<"bottom">l"'
        });
        $('#loader').hide();
    }

    function llenarTablaProgramaSemanal(data) {
        $('#tabla-programa-semanal').dataTable({
            "bAutoWidth": false,
            "oLanguage": {
                "sProcessing": "<img src='/assets/image/ajax-loader.gif'>"
            },
            "processing": true,
            "bRetrieve": true,
            "bDestroy": true,
            "data": data,
            "columns": [
                {"data": "anio", "width": "5%", "targets": 0},
                {"data": "semana", "width": "5%", "targets": 1},
                {"data": function (row) {
                        return 'EQ' + row.id_equipo;
                    }, "width": "5%", "targets": 2},
                {"data": "equipo", "width": "35%", "targets": 3, "sClass": "equipo"},
                {"data": "actividad", "width": "40%", "targets": 4},
                {"data": function (row) {
                        if (row.orden_trabajo === 0) {
                            return '<a href="/mantenimiento/ordentrabajo/' + row.anio + '/' + row.semana + '" class="btn btn-default btn-xs">';
                        } else {
                            return '<a href="/mantenimiento/ordentrabajo/' + row.anio + '/' + row.semana + '/' + row.id_equipo + '" class="btn btn-default btn-xs">Crear orden de trabajo</a>';
                        }
                    }, "width": "10%", "targets": 5}
            ],
            "order": [
                [1, 'asc']
            ]
        });
        $('#loader').hide();
    }

    $.getJSON(baseUrl + '/parametro/equipo_json', function (data) {
        console.info('Se han cargado ' + data.length + ' equipos.');
        llenar_tabla(data);
    });
    /*  */
    $.getJSON(baseUrl + '/parametro/area_json', function (data) {
        console.info('Se han cargado ' + data.length + ' áreas.');
        llenar_tabla_area(data);
    });
    /*  */
    $.getJSON(baseUrl + '/plan/json', function (data) {
        //console.log(data);
        llenar_tabla_plan(data);
    });
    /* */
    $.getJSON(baseUrl + '/mantenimiento/semanajson', function (data) {
        console.info('Programana semanal datos cargados: ' + data.length);
        llenarTablaProgramaSemanal(data);
    });

    /* */
    $.getJSON(baseUrl + '/mantenimiento/json', function (data) {
        //console.log(data);
        llenar_tabla_ordenes(data);
    });

    $('[data-toggle="popover"]').popover();

    $('a[data-tab="paso2"]').click(function () {
        //alert('dasd');
        var m = '<div class="col-lg-6 col-lg-offset-3"><div class="alert alert-danger alert-dismissible" role="alert" style="margin:4px 4px 4px 4px;">' +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">×</span></button>' +
                '<strong>¡Validación!</strong> Debe completar el campo ... </div></div>';
        if (document.getElementById('sector').value === '' || document.getElementById('sector').value === null) {
            $('#panel-primero').before(m);
            return false;
        }
    });

    $('a[data-tab="paso3"]').click(function () {
        //alert('dasd');
    });

    var i = 0;
    $('#btn-agregar-respuesto').click(function () {
        if (i < 10) {
            $('#tabla-repuestos tr:last').after('<tr>' +
                    '<td class="col-md-2"><input type="number" class="form-control" name="cantidad[]" maxlength="6" min="1" max="999" required></td>' +
                    '<td class="col-md-6"><input type="text" class="form-control" name="repuesto[]" maxlength="100" placeholder="Ingrese descripción del repuesto" required></td>' +
                    '<td class="col-md-4"><button type="button" class="btn btn-primary btn-sm eliminar-fila">Remover</button></td>' +
                    '</tr>');
            i = i + 1;
        } else {
            if (i === 10) {
                var m = '<div class="alert alert-danger alert-dismissible" role="alert">' +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                        '<span aria-hidden="true">×</span></button>' +
                        '<strong>¡Nota!</strong> No puede ingresar mas de 10 registros. </div>';
                $('#panel-repuesto').append(m);
            }
            i = i + 1;
        }
    });

    $('#tabla-repuestos').on('click', '.eliminar-fila', function () {
        $(this).closest('tr').remove();
    });
    // Validaciones antes del envio del formulario para ingresar equipo o actividad.
    $('#crear-equipo-actividad').on('submit', function (e) {
        if (document.getElementById('id-area').value === '0') {
            alert('!Debe seleccionar un area!');
            e.preventDefault();
        }
        if (document.getElementById('id-plan').value === '0') {
            alert('!Debe seleccionar un plan!');
            e.preventDefault();
        }
        if (document.getElementById('id-responzable').value === '0') {
            alert('!Debe seleccionar un responsable!');
            e.preventDefault();
        }
    });

    // Evitar enviar formulario sin datos de semanas
    $('#form-crear-programa').on('submit', function (e) {
        var j = $('input:checkbox').filter(':checked').length;
        if (j === 0) {
            var mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' +
                    '¡Debe seleccionar una semana del listado!</div>';
            $('#btn-crear-programa').before(mensaje);
            e.preventDefault();
        }
    });

    $('#form-crear-orden').on('submit', function (e) {
        /*
         if(i > 0){
         alert('valor de i es: '+i);
         for (var i = 0; i < array.length; i++) {
         console.log(array[i]);
         }
         }
         */

        // Validar principales input.
        var sector = document.getElementById('sector').value;
        var elemento = document.getElementById('elemento').value;
        if (sector === '' || sector === null || elemento === '' || elemento === null) {
            alert('Debe completar los campos sector y elemento.');
            e.preventDefault();
        }

    });

    var urlSubArea = 'subarea_json/';
    $('#id-area').on('change', function () {
        var idArea = this.value;
        $.ajax({
            type: "GET",
            url: urlSubArea + idArea,
            contentType: "application/json",
            dataType: "json",
            success: function (data) {
                $("#id-sub-area").empty();
                if (data !== null) {
                    $.each(data, function () {
                        $("#id-sub-area").append($("<option></option>").val(this['id_sub_area']).html(this['subarea']));
                    });
                }

                console.log('null: ' + data);
                if (data.length === '' || data.length === 0 || data.length === false) {
                    $('#mensaje-subarea').html('<p>No existe sub-área para la área seleccionada.</p>');
                    $("#id-sub-area").append('<option value="0">Sin sub - área</option>');
                }
            }
        });
    });

});