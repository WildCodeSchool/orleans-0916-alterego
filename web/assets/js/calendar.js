$(document).ready(function () {

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({

        locale: 'fr',
        firstDay: 1,
        defaultView: 'basicWeek',
        eventColor: '#378006',

        header: {
            center: 'agendaWeek,month' // buttons for switching between views
        },

        views: {
            basicWeek: {

            }
        },

        events: [
            {
                title: 'Lunch',
                start: new Date(y, m, d, 12, 0),
                end: new Date(y, m, d, 14, 0),
                allDay: false
            }
        ]

    })

});