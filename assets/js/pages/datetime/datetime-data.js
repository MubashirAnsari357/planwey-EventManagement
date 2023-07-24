$(document).ready(function () {
    flatpickr("#date", {
        "dateFormat": "Y-n-j",
        "allowInput": true,
        "onOpen": function (selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        }
    });
    flatpickr("#date2", {
        "dateFormat": "n/j/Y",
        "allowInput": true,
        "onOpen": function (selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        }
    });
    flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        "onOpen": function (selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        }
    });
    flatpickr("#myDatePicker", {
        "dateFormat": "n/j/Y",
        "allowInput": true,
        "onOpen": function (selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        }
    });

    flatpickr("#time", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        "onOpen": function (selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        }
    });
    flatpickr("#multiselectdate", {
        mode: "multiple",
        dateFormat: "Y-m-d",
        "onOpen": function (selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        }
    });
    flatpickr("#daterange", {
        mode: "range",
        "onOpen": function (selectedDates, dateStr, instance) {
            instance.setDate(instance.input.value, false);
        }
    });
});