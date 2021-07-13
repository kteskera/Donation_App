$(document).ready(function () {

var tablicakorisnici = $('#privatno').DataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
    "pageLength": 7,
    "columnDefs": [{ "orderable": false, "targets": 1 }],
    dom: 'Bfrtip',
    buttons: [
      'print', 'pdf'
    ], "language": {
      search: '<i class="fa fa-search" aria-hidden="true"></i>',
      searchPlaceholder: 'Pretraži',
      "oPaginate": {
        "sFirst": "Prva",
        "sLast": "Zadnja",
        "sNext": "Sljedeća",
        "sPrevious": "Prethodna"
      }
    }
  });
  $('#privatno thead tr').clone(true).appendTo('#privatno thead ');
  $('#privatno thead tr:eq(1) th').each(function (i) {
    var title = $(this).text();
    $(this).html('<input type="text" placeholder="Pretraži ' + title + '" />');

    $('input', this).on('keyup change', function () {
      if (tablicakorisnici.column(i).search() !== this.value) {
        tablicakorisnici
          .column(i)
          .search(this.value)
          .draw();
      }
    });
  });
});