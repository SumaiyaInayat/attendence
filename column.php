<?php
 
$dataPoints = array( 
	array("y" => 10, "label" => "Students","color"=> "RoyalBlue" ),
	array("y" => 4, "label" => "Teachers" ,"color"=> "yellow"),
	array("y" => 5, "label" => "Courses","color"=>"red" ),
	
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Gold Reserves"
	},

	data: [{
		type: "column",
		yValueFormatString: "#",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 100px"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>