$(document).ready(function(){
	$.ajax({
		url: "http://localhost/chartjs/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var name = [];
			var score = [];

			for(var i in data) {
				name.push(data[i].name);
				score.push(data[i].total);
			}

			var chartdata = {
				labels: name,
				datasets : [
					{
						label: 'GRAPH',
						backgroundColor: 'rgba(100, 200, 200, 0.75)',
						borderColor: 'rgba(100, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(100, 200, 200, 1)',
						hoverBorderColor: 'rgba(100, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});