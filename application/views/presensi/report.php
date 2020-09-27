<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <title><?= $title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!--CHART JS-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css" integrity="sha512-SUJFImtiT87gVCOXl3aGC00zfDl6ggYAw5+oheJvRJ8KBXZrr/TMISSdVJ5bBarbQDRC2pR5Kto3xTR0kpZInA==" crossorigin="anonymous" />

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.css"/>

    </head>
    <body>
        <div class="container p-4">
            <h5 class="text-center font-weight-bold"><?= $title ?></h5>
            <div class="row  d-flex justify-content-center ">
                <div class="col-md-8">
                    <div class="w-100">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="table-responsive mt-5"> 
                <table class="table table-sm table-bordered dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Presensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rekap as $key => $r) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $r->nama ?></td>
                                <td><?= date_format(date_create($r->presensi_masuk), "d/m/Y") ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha512-QEiC894KVkN9Tsoi6+mKf8HaCLJvyA6QIRzY5KrfINXYuP9NxdIkRQhGq3BZi0J4I7V5SidGM3XUQ5wFiMDuWg==" crossorigin="anonymous"></script>

        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.22/b-1.6.4/b-html5-1.6.4/b-print-1.6.4/datatables.min.js"></script>

        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: <?php echo json_encode($labels) ?>,
                    datasets: [{
                            label: '# of Votes',
                            data: <?php echo json_encode($data) ?>,
                            backgroundColor: <?php echo json_encode($background) ?>,
                        }]
                }
            });

            $(document).ready(function () {
                $(".dataTable").DataTable({
                    dom: "Bt",
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            text: 'Export Ke Excel',
                            className: 'btn btn-sm btn-success rounded-0 border-0'
                        }
                    ]
                });
            });
        </script>
    </body>
</html>