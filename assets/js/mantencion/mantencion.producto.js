$(document).ready(function () {

    function dataProductos(data) {
        $('#tabla-productos').dataTable({
            "bAutoWidth": false,
            "oLanguage": {
                "sProcessing": "<img src='/assets/image/ajax-loader.gif'>"
            },
            "processing": true,
            "bRetrieve": true,
            "bDestroy": true,
            "data": data,
            "columns": [
                {"data": "bodega", "width": "20%", "targets": 0},
                {"data": "codigo", "width": "10%", "targets": 1},
                {"data": "producto", "width": "30%", "targets": 2},
                {"data": "categoria", "width": "30%", "targets": 3},
                {"data": "cantidad", "width": "10%", "targets": 4},
                {"data": "id_producto", "width": "10%", "targets": 4}
            ],
            "order": [
                [1, 'asc']
            ]
        });
        $('#loader').hide();
    }
    $.getJSON(baseUrl + '/producto/json', function (data) {
        console.log(data);
        dataProductos(data);

    });

});
/*
 function format(d) {
 // `d` is the original data object for the row
 return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
 '<tr>' +
 '<td>Full name:</td>' +
 '<td>' + d.name + '</td>' +
 '</tr>' +
 '<tr>' +
 '<td>Extension number:</td>' +
 '<td>' + d.extn + '</td>' +
 '</tr>' +
 '<tr>' +
 '<td>Extra info:</td>' +
 '<td>And any further details here (images etc)...</td>' +
 '</tr>' +
 '</table>';
 }
 
 $(document).ready(function () {
 // Listar productos por id bodega.
 var idbodega = document.getElementById('idbodega').value;
 if (idbodega !== null) {
 // alert(idbodega);
 
 }
 
 var table = $('#tabla-productos').DataTable({
 "ajax": baseUrl + '/producto/json',
 "columns": [
 {
 "className": 'details-control',
 "orderable": false,
 "data": null,
 "defaultContent": ''
 },
 {"data": "codigo"},
 {"data": "producto"},
 {"data": "bodega"},
 {"data": "categoria"}
 ],
 "order": [[1, 'asc']]
 });
 
 
 // Add event listener for opening and closing details
 $('#tabla-productos tbody').on('click', 'td.details-control', function () {
 var tr = $(this).closest('tr');
 var row = table.row(tr);
 
 if (row.child.isShown()) {
 // This row is already open - close it
 row.child.hide();
 tr.removeClass('shown');
 } else {
 // Open this row
 row.child(format(row.data())).show();
 tr.addClass('shown');
 }
 });
 
 $.getJSON(baseUrl + '/producto/json', function (data) {
 console.log(data);         
 });
 });
 */