$('#date-range1').dateRangePicker(
    {
        language: 'ru',
        separator: ' to ',
        startOfWeek: 'monday',
        startDate: Date.now(),
        setValue: function (s, s1, s2) {
            $('#date-range1').val(s1);
            $('#date-range2').val(s2);
        }
    }
);