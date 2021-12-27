<!-- ChartJS -->
<script src="<?php echo base_url().'bower_components/chart.js/Chart.js';?>"></script>

<script>
    $(function() {
        'use strict';

        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        // -----------------------
        // - MONTHLY SALES CHART -
        // -----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var salesChart = new Chart(salesChartCanvas);

        var salesChartData = {
            labels: [
                    <?php
                    $max = count($penjualan_monthly); 
                    $i=1;
                    foreach($penjualan_monthly as $data){ 
                        echo '"'.date_format(new DateTime($data['tanggal']),'M Y');

                        if ($i < $max) {
                            echo '", ';
                        } else {
                            echo '"';
                        }
                        $i++;
                    } ?>
                    ],
            datasets: [{
                    label: 'Dititipkan',
                    fillColor: 'rgba(220, 224, 232, 0.8)',
                    strokeColor: 'rgba(190, 194, 202 0.8)',
                    pointColor: 'rgb(210, 214, 222)',
                    pointStrokeColor: '#c1c7d1',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgb(220,220,220)',
                    data: [
                        <?php 
                    $i=1;
                    foreach($penjualan_monthly as $data){ 
                        echo $data['jml_titip'];

                        if ($i < $max) {
                            echo ', ';
                        }
                        $i++;
                    } ?>
                    ]
                },
                {
                    label: 'Terjual',
                    fillColor: 'rgba(114, 192, 255, 0.8)',
                    strokeColor: 'rgba(84, 162, 235, 0.8)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188, 1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php 
                    $i=1;
                    foreach($penjualan_monthly as $data){ 
                        echo $data['jml_laku'];

                        if ($i < $max) {
                            echo ', ';
                        }
                        $i++;
                    } ?>
                    ]
                }
            ]
        };

        var ChartOptions = {
            // Boolean - If we should show the scale at all
            showScale: true,
            // Boolean - Whether grid lines are shown across the chart
            scaleShowGridLines: true,
            // String - Colour of the grid lines
            scaleGridLineColor: 'rgba(0,0,0,.05)',
            // Number - Width of the grid lines
            scaleGridLineWidth: 2,
            // Boolean - Whether to show horizontal lines (except X axis)
            scaleShowHorizontalLines: true,
            // Boolean - Whether to show vertical lines (except Y axis)
            scaleShowVerticalLines: true,
            // Boolean - Whether the line is curved between points
            bezierCurve: true,
            // Number - Tension of the bezier curve between points
            bezierCurveTension: 0.3,
            // Boolean - Whether to show a dot for each point
            pointDot: false,
            // Number - Radius of each point dot in pixels
            pointDotRadius: 4,
            // Number - Pixel width of point dot stroke
            pointDotStrokeWidth: 2,
            // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
            pointHitDetectionRadius: 20,
            // Boolean - Whether to show a stroke for datasets
            datasetStroke: true,
            // Number - Pixel width of dataset stroke
            datasetStrokeWidth: 4,
            // Boolean - Whether to fill the dataset with a color
            datasetFill: true,
            // String - A legend template
            legendTemplate: '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
            // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
            maintainAspectRatio: false,
            // Boolean - whether to make the chart responsive to window resizing
            responsive: true
        };

        // Create the line chart
        salesChart.Line(salesChartData, ChartOptions);

        // ---------------------------
        // - END MONTHLY SALES CHART -
        // ---------------------------




        // -----------------------
        // - CHART PENJUALAN -
        // -----------------------

        // Get context with jQuery - using jQuery's .get() method.
        var pendapatanChartCanvas = $('#pendapatanChart').get(0).getContext('2d');
        // This will get the first returned node in the jQuery collection.
        var pendapatanChart = new Chart(pendapatanChartCanvas);

        var pendapatanChartData = {
            labels: [
                    <?php
                    $max = count($penjualan_monthly); 
                    $i=1;
                    foreach($penjualan_monthly as $data){ 
                        echo '"'.date_format(new DateTime($data['tanggal']),'M Y');

                        if ($i < $max) {
                            echo '", ';
                        } else {
                            echo '"';
                        }
                        $i++;
                    } ?>
                    ],
                    datasets: [
                {
                    label: 'Pendapatan',
                    fillColor: 'rgba(183, 216, 165, 0.9)',
                    strokeColor: 'rgba(153, 186, 135, 1)',
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(109, 139, 93,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [
                        <?php 
                    $i=1;
                    foreach($penjualan_monthly as $data){ 
                        echo $data['total'];

                        if ($i < $max) {
                            echo ', ';
                        }
                        $i++;
                    } ?>
                    ]
                }
            ]
        };


        // Create the line chart
        pendapatanChart.Line(pendapatanChartData, ChartOptions);

        // ---------------------------
        // - END CHART PENJUALAN -
        // ---------------------------

        
    })
</script>