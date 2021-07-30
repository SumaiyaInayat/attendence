<!DOCTYPE HTML>
<html>
<head>  
<script type="text/javascript">
window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {
	
    axisX:{
		valueFormatString: "DD-MMM" ,
				interval: 5,
				intervalType: "day",
				labelAngle: -50,
				labelFontColor: "LightSeaGreen",
        gridThickness: 0
    },
	axisY:{
        labelFontColor: "LightSeaGreen",
        gridThickness: 0
    },

    data: [
    {        
        type: "area",
		color:"RoyalBlue",
        dataPoints: [//array
        { x: new Date(2021, 07, 1), y: 4},
        { x: new Date(2021, 07, 3), y: 3},
        { x: new Date(2021, 07, 5), y: 5},
        { x: new Date(2021, 07, 7), y: 4},
        { x: new Date(2021, 07, 11), y: 8},
        { x: new Date(2021, 07, 13), y: 4},
        { x: new Date(2021, 07, 20), y: 6},
        { x: new Date(2021, 07, 21), y: 10},
        { x: new Date(2021, 07, 25), y: 9},
        { x: new Date(2021, 07, 27), y: 4}

        ]
    }
    ]
});

    chart.render();
}
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<body>
<div id="chartContainer" style="height: 300px; width: 380px;">
</div>
</body>
</html>