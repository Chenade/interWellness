@include('includes.language')
<!doctype html>
<html>

<head>
    @include('includes.head')
    <title>interWellness | 為你而思</title>
    <link rel="icon" href="/img/logo_icon.ico">
    <link rel="stylesheet" href="/lib/DataTables/datatables.min.css">
    <meta name="author" content="Yangchi K.">
</head>

<body style="padding: 0 20px;">
    <h3 style="background-color: #ADD8E6; margin-bottom:5px;">傳單測試</h3>
    <h6>Last Updated: <span id="updated_time"></span></h6>
    <hr>
    <div class="d-flex justify-content-center flex-wrap">
        <div class="col-12 col-lg-4">
            <div id="chartBox">
                <canvas id="myChart" width="200" height="200"></canvas>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <table id="flyerTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Version</th>
                        <th>Created at</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Version</th>
                        <th>Created at</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>

<script src="/js/lib/chart.min.js"></script>
<script src="/js/flyer.min.js"></script>
<script src="/lib/moment.min.js"></script>
<script src="/lib/DataTables/datatables.min.js"></script>