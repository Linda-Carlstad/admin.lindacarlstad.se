const flatpickr = require("flatpickr");
const Swedish = require("flatpickr/dist/l10n/sv.js").default.sv;


$('.table').DataTable( {
    'lengthChange': false,
    'info': false
} );

flatpickr( '#date', {
    altInput: true,
    altFormat: "F j",
    dateFormat: "d M",
    locale: Swedish,
} );xs
