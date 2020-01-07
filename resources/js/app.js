const flatpickr = require( 'flatpickr' );
const Swedish = require( 'flatpickr/dist/l10n/sv.js' ).default.sv;


$('.table').DataTable(
{
    'lengthChange': false,
    'info': false
} );

flatpickr( '#date',
{
    dateFormat: "Y-m-d",
    altInput: true,
    altFormat: "d F Y",
    weekNumbers: true,
    locale: Swedish,
} );

flatpickr( '#year',
    {
        dateFormat: "Y",
        minDate: Date.now(),
        weekNumbers: true,
        allowInput: true,
        locale: Swedish,
    } );


$( function ()
{
    $( '[ data-toggle="tooltip" ]' ).tooltip()
} );
