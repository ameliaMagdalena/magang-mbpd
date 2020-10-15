<!DOCTYPE html>
<html>
<head>
    <!-- head -->
    <link href="<?php echo base_url()?>assets/vendor/daypilot/main.css?v=2020.3.4594" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet"/>
    <script src="<?php echo base_url()?>assets/javascripts/daypilot-all.min.js?v=2020.3.4594"></script>
    <!-- /head -->

    <style>
        .scheduler_default_corner div:nth-of-type(2) {
            display: none !important;
        }
    </style>


<!--*****************************-->
<?php include('_css.php'); ?>
<?php include('_header.php'); ?>
<?php include('_navbar.php'); ?>
<!--*****************************-->
<!--*****************************-->

</head>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Perencanaan Material</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Perencanaan Material</span></li>
            </ol>

            <a class="sidebar-right-toggle" style="cursor:inherit !important"></a>
        </div>
    </header>
<!--*****************************-->
<!--KODINGAN ISI HALAMAN-->
<h1>Detail Perencanaan</h1>
<hr>

<section class="panel">
    <!-- <div class="space">
        <a href="#" id="previous">Previous</a>
        |
        <a href="#" id="today">Today</a>
        |
        <a href="#" id="next">Next</a>
    </div> -->
    <div>
        <div id="dp"></div>
    </div>

    <script type="text/javascript">
        var dp = new DayPilot.Scheduler("dp");

        // view
        dp.startDate = DayPilot.Date.today();//.firstDayOfMonth();
        dp.cellGroupBy = "Month";
        dp.days = 365; //dp.startDate.daysInMonth();
        dp.scale = "Day";
        //dp.cellWidthSpec = "Auto";
        dp.timeHeaders = [
            {groupBy: "Month"},
            {groupBy: "Day", format: "d"}
        ];

        dp.resources = [
            {name: "Reb 55", id: "A"},
            {name: "Benang", id: "B"},
        ];

        // generate and load events
        /* for (var i = 0; i < 10; i++) {
            var duration = Math.floor(Math.random() * 6) + 1; // 1 to 6
            var start = Math.floor(Math.random() * 6) - 3; // -3 to 3

            var e = new DayPilot.Event({
                start: new DayPilot.Date("2016-03-25T00:00:00").addHours(start),
                end: new DayPilot.Date("2016-03-25T12:00:00").addHours(start).addHours(duration),
                id: DayPilot.guid(),
                resource: "A",
                text: "Event"
            });
            dp.events.add(e);
        }

        // event moving
        dp.eventMoveHandling = "JavaScript";
        dp.onEventMove = function (args) {
            var e = args.e
            e.start(args.newStart);
            e.end(args.newEnd);
            e.resource(args.newResource);
            dp.events.update(e);
            dp.message("Moved");
        };

        // event resizing
        dp.eventResizeHandling = "JavaScript";
        dp.onEventResize = function (args) {
            var e = args.e;
            e.start(args.newStart);
            e.end(args.newEnd);
            dp.events.update(e);
            dp.message("Resized");
        }; */

        // event creating
        dp.timeRangeSelectedHandling = "JavaScript";
        dp.onTimeRangeSelected = function (args) {
            var name = prompt("Jumlah:", "");
            if (!name) return;
            var e = new DayPilot.Event({
                start: args.start,
                end: args.end,
                id: DayPilot.guid(),
                resource: args.resource,
                text: name
            });
            dp.events.add(e);
            dp.clearSelection();
            //dp.message("Created");
        };

        dp.init();


        /* var elements = {
            previous: document.getElementById("previous"),
            today: document.getElementById("today"),
            next: document.getElementById("next")
        };

        elements.previous.addEventListener("click", function (e) {
            e.preventDefault();
            changeDate(dp.startDate.addMonths(-1));
        });
        elements.today.addEventListener("click", function (e) {
            e.preventDefault();
            changeDate(DayPilot.Date.today());
        });
        elements.next.addEventListener("click", function (e) {
            e.preventDefault();
            changeDate(dp.startDate.addMonths(1));
        }); */


        function changeDate(date) {
            dp.startDate = date.firstDayOfMonth();
            dp.days = dp.startDate.daysInMonth();
            dp.events.list = [/* ... */]; // provide event data for the new date range
            dp.update();
        }

    </script>
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