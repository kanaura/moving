/* javascriptのコードを記載 */
$(function() {
    var startDate = new Date()
    var d    = startDate.getDate(),
        m    = startDate.getMonth(),
        y    = startDate.getFullYear()

    var Calendar = FullCalendar.Calendar;

    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left  : 'prev,next',
            center: 'title',
        },
        locale: 'ja',
        selectable: true,
        selectConstraint: {
            start: startDate
        },
        select: function(start, end, event, view) {
            console.log(start);
            $('#date').val(start.startStr);
        }
    });

    calendar.render();
});