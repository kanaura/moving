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
        // selectable: true,
        selectConstraint: {
            start: startDate
        },
        select: function(start, end, event, view) {
            console.log(start);
            $('#date').val(start.startStr);
            // return false;
        }, 
    });

    $('body').on('click', '.fc-daygrid-day', function() {
        if ($(this).hasClass('fc-day-past') || $(this).hasClass('fc-day-today')) {
            return;
        }

        $('.fc-daygrid-day').each(function(index) {
            $(this).removeClass('selected');
        });

        $(this).addClass('selected');

        $('#date').val($(this).data('date'));
    });

    function init_selected_date() {
        date = $('#date').val();
        if (date) {
            $("td[data-date='" + date +"']").addClass('selected');
        }
    }

    $('body').on('click', '.fc-prev-button', function(){
        init_selected_date();
    });
     
    $('body').on('click', '.fc-next-button', function(){
        init_selected_date();
    });

    $('.btn-clear').on('click', function() {
        if (flow_step == 3) {
            $('.fc-daygrid-day').each(function(index) {
                $(this).removeClass('selected');
            });

            date = $('#date').val('');

            $('input[name=time]').prop('checked', false);
        }
    });

    calendar.render();
});