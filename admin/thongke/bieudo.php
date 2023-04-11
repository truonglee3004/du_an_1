<!DOCTYPE html>
<html>
<head>
    <title>Biểu đồ tròn - Chart.js</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<style>
canvas {
  max-width: 500px;
  max-height: 500px;
}
</style>
<body>
    <p>Cơ cấu doanh thu của các danh mục</p>
    <canvas id="myChart" ></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
               
                labels: [<?php $tongdm = count($thongke); $i = 1; foreach ($thongke as $tk) {if($i == $tongdm) $dphay = ""; else $dphay =", ";$i++;echo "'" . $tk['dm'] . "'" . $dphay; } ?>],
                
                datasets: [{
                    label: 'Cơ cấu doanh thu của các danh mục',
                    data: [<?php $tongdm = count($thongke); $i = 1; foreach ($thongke as $tk) {if($i == $tongdm) $dphay = ""; else $dphay =", ";$i++;echo "'" . $tk['doanhthu'] . "'" . $dphay; } ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Cơ cấu doanh thu của các danh mục'
                }
            }
        });
    </script>
</body>
</html>