<?php include "../php/conn_db.php"; 

$q = "SELECT device_cat, count(*) as count FROM device GROUP BY device_cat";
$result = mysqli_query($conn, $q);
?>




<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.arrayToDataTable([
            ['device_cat', 'count'],
            <?php 
            while($row = mysqli_fetch_array($result))
            {
                echo "['".$row["device_cat"]."'], ".$row["count"]."],";
            }
            ?>
        ]);

        // Set chart options
        var options = {
            'title': 'How Much Pizza I Ate Last Night',
            'width': 400,
            'height': 300
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>