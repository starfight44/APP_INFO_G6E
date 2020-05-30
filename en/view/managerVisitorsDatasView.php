<?php ob_start();?>

<section>
    <h2>Site datas</h2>
    <article>
        <div class="datas">
        <div id="diagram">
             <canvas id="myChart1" width="400" height="300"></canvas>
        </div>
            <div id="diagram">
            <canvas id="myChart"></canvas>
            </div>
        </div>

    </article>
</section>
<?php  $content = ob_get_clean();


 ob_start(); ?>

<script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['Day -6', 'Day -5', 'Day -4', 'Day -3', 'Before yesterday', 'yesterday', 'Today'],
            datasets: [{
                label: 'Number of visitors per day',
                backgroundColor: 'rgb(167, 200, 232)',
                borderColor: 'rgb(167, 200, 232)',
                data: [<?= $nbOfLogPerDay[6] ?>,
                    <?= $nbOfLogPerDay[5] ?>,
                    <?= $nbOfLogPerDay[4] ?>,
                    <?= $nbOfLogPerDay[3] ?>,
                    <?= $nbOfLogPerDay[2] ?>,
                    <?= $nbOfLogPerDay[1] ?>,
                    <?= $nbOfLogPerDay[0] ?>]
            }]
        },

        // Configuration options go here
        options: {
            responsive: true,
            title :{
                display : true,
                text : 'Number of visitors on 6 days'
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'doughnut',
        labels: "Proportion",
        // The data for our dataset
        data: {
            labels: ['Women', 'Man',],
            datasets: [{
                data: [<?= $womenProportion ?>,
                    <?= $menProportion ?>],
                backgroundColor: ["rgb(167, 200, 232)","rgb(255, 112, 127)"],//rgb(54, 162, 235)
                borderColor: "rgba(221,221,221,0.1)"
            }]

        },

        // Configuration options go here
        options: {
            responsive: true,
            title :{
                display : true,
                text : 'Proportion of Women and Men in users'
            }
        }
    });</script>

<?php $script = ob_get_clean();



require('view/managerSpaceView.php');?>
