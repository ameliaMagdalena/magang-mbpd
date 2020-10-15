<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Pengeluaran Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Pengeluaran Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->

<h1>Jadwal Pengeluaran Material</h1>
<hr>

<!-- start: page -->
<section class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar"></div>
            </div>
            <div class="col-md-3">
                <p class="h4 text-light">Keterangan</p>

                <hr />

                <div id='external-events'>
                    <div class="external-event label label-default" data-event-class="fc-event-default">Sudah Selesai</div><br>
                    <div class="external-event label label-primary" data-event-class="fc-event-primary">Hari Ini</div><br>
                    <div class="external-event label label-warning" data-event-class="fc-event-success">Akan Datang</div>

                    <hr />
                    <!-- <div>
                        <div class="checkbox-custom checkbox-default ib">
                            <input id="RemoveAfterDrop" type="checkbox"/>
                            <label for="RemoveAfterDrop">remove after drop</label>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>



<!--*****************************-->
<?php include('_endtitle.php'); ?>
<?php include('_js.php'); ?>
<!--*****************************-->
<!--*****************************-->
<?php //include('_rightbar.php');
?>

<script>
    function reload() {
    location.reload();
    }
</script>

<script>
    var $calendar = $('#calendar');
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $calendar.fullCalendar({
        header: {
            left: 'title',
            right: 'prev,today,next,basicDay,basicWeek,month'
        },

        timeFormat: 'h:mm',

        titleFormat: {
            month: 'MMMM YYYY',      // September 2009
            week: "MMM d YYYY",      // Sep 13 2009
            day: 'dddd, MMM d, YYYY' // Tuesday, Sep 8, 2009
        },

        themeButtonIcons: {
            prev: 'fa fa-caret-left',
            next: 'fa fa-caret-right',
        },

        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(date, allDay) { // this function is called when something is dropped
            var $externalEvent = $(this);
            // retrieve the dropped element's stored Event Object
            var originalEventObject = $externalEvent.data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.className = $externalEvent.attr('data-event-class');

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#RemoveAfterDrop').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }

        },
        events: [
            /*{
                title: 'All Day Event',
                start: new Date(y, m, 1),
                className: 'fc-event-default'
            },
            {
                title: 'Long Event',
                start: new Date(y, m, d-5),
                end: new Date(y, m, d-2),
                className: 'fc-event-default'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d-3, 16, 0),
                allDay: false,
                className: 'fc-event-default'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: new Date(y, m, d+4, 16, 0),
                allDay: false
            },
            {
                title: 'Meeting',
                start: new Date(y, m, d, 10, 30),
                allDay: false
            },
            {
                title: 'Birthday Party',
                start: new Date(y, m, d+1, 19, 0),
                end: new Date(y, m, d+1, 22, 30),
                allDay: false
            },
            {
                title: 'Click for Google',
                start: new Date(y, m, 28),
                end: new Date(y, m, 29),
                url: 'http://google.com/'
            }*/
            {
                title: 'Foam A',
                start: new Date(y, m, d, 12, 0),
                description: 'Foam A 15 pcs',
                allDay: false,
                className: 'fc-event-primary'
            },
            {
                title: 'Benang',
                start: new Date(y, m, d, 13, 0),
                description: 'Benang 100m untuk produksi',
                allDay: false,
                className: 'fc-event-primary'
            },
            {
                title: 'Foam A',
                start: new Date(y, m, d+3, 12, 0),
                allDay: false,
                className: 'fc-event-warning'
            },
        ],
        dayRender: function (date, cell) {
            var today = new Date();
            var end = new Date();                
            end.setDate(today.getDate()-1);                 

            if( date < end) {
                cell.css("background-color", "lightgray");
            } // this is for previous date 

            if(date > today) {
                cell.css("background-color", "white");
            }

            if(date.day()==6 || date.day()==0){
                cell.css("color", "red");
            } //sabtu-minggu = libur
        },
        eventRender: function (eventObj, $el) {
            $el.popover({
                title: eventObj.title,
                content: eventObj.description,
                trigger: 'hover',
                placement: 'top',
                container: 'body'
            });
        },
    });
</script>