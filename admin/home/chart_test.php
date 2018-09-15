<?php
if(empty($_SESSION['username'])){
			echo "<p style='color:red'>akses denied</p>";
		exit();		
	}
?>

<?php 
//===========CODE DELETE RECORD ================


$query= "SELECT * from hotel";

$result=mysql_query($query) or die(mysql_error());
while($rows=mysql_fetch_object($result)){
    ?>
    <input type='hidden' name='nama_hotel' value="<?php echo $rows->nama_hotel ?>">
    <?php
}

?>

<canvas id="myChart" width="400" height="200"></canvas>

<script>
var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["januari", "februari", "maret", "april", "mei", "juni","juli","agustus","september","oktober","november","desember"],
        datasets: [{
            label: '929',
            data: [21, 16],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                
              
            ],
            borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(255, 99, 132, 1)',
                
            ],
            borderWidth: 1
        },{
            label: 'City',
            data: [12,10],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(54, 162, 235, 0.2)',
              
            ],
            borderColor: [
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
                
            ],
            borderWidth: 1
        }
    
    ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>