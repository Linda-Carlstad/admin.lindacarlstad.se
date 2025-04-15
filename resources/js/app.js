const flatpickr = require("flatpickr");
const Swedish = require("flatpickr/dist/l10n/sv.js").default.sv;

$(".table").DataTable({
    lengthChange: false,
    info: false,
    language: {
        search: "Sök:",
        paginate: {
            previous: "Bakåt",
            next: "Nästa",
        },
    },
});

flatpickr("#date", {
    dateFormat: "Y-m-d",
    altInput: true,
    altFormat: "d F Y",
    weekNumbers: true,
    locale: Swedish,
});

flatpickr("#year", {
    dateFormat: "Y",
    minDate: Date.now(),
    weekNumbers: true,
    allowInput: true,
    locale: Swedish,
});

flatpickr("#time", {
    enableTime: true,
    noCalendar: true,
    dateFormat: "H:i",
    time_24hr: true,
});

$(function () {
    $('[ data-toggle="tooltip" ]').tooltip();
});
