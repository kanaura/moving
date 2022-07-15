/* javascriptのコードを記載 */
$(function() {
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;

    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left  : 'prev,next',
            center: 'title',
        },
        locale: 'ja',
    });

    calendar.render();
});