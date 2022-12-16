<?php 
$d3data = d3jsData();
$count = 0;
?>

<script defer>	
// data i søjledigram 
	const myData = [
		<?php while($data = $d3data->fetch_object()){
			$count++;
			?>
			{ id: <?php echo $count ?>,
			region: '<?php echo utf8_encode($data->name); ?>',
			value: <?php echo utf8_encode($data->antal) ?> },
			
		<?php } ?>

		];

	const margins = { horizontal: 30, vertical: 40 };
	const chartWidth = (window.innerWidth/100*50) - (margins.horizontal * 2);
	const chartHeight = 400 - (margins.vertical * 2);

	const chartContainer = d3
	.select('svg')
	.attr('width', chartWidth + (margins.horizontal * 2))
	.attr('height', chartHeight + (margins.vertical * 2));

	const chart = chartContainer.append('g');

	function renderChart(chartData) {
		const x = d3
		.scaleBand()
		.rangeRound([margins.horizontal * 2, chartWidth])
		.padding(0.1)
		.domain(chartData.map(d => d.region));
		const y = d3
		.scaleLinear()
		.range([chartHeight, 0])
		.domain([0, d3.max(chartData, d => d.value) + 3]);

		chart.selectAll('g').remove();

		chart
		.append('g')
		.call(d3.axisBottom(x).tickSizeOuter(0))
		.attr('transform', `translate(0, ${chartHeight + margins.vertical})`)
		.attr('color', '#143943');
		
		chart
		.append('g')
		.call(d3.axisLeft(y).tickSizeOuter(0))
		.attr('transform', `translate(${margins.horizontal+20}, 5)`)
		.attr('color', '#143943');



		chart.selectAll('.bar').remove();

		chart
		.selectAll('.bar')
		.data(chartData, d => d.id)
		.enter()
		.append('rect')
		.classed('bar', true)
		.attr('width', x.bandwidth())
		.attr('height', d => chartHeight - y(d.value))
		.attr('x', d => x(d.region))
		.attr('y', d => y(d.value) + 5);


		chart.selectAll('.label').remove();

		chart
		.selectAll('.label')
		.data(chartData, d => d.id)
		.enter()
		.append('text')
		.text(d => d.value)
		.attr('x', d => x(d.region) + x.bandwidth() / 2)
		.attr('y', d => y(d.value) - 10)
		.classed('label', true);
	}

	let unselectedIds = [];

	const listItems = d3
	.select('#data')
	.select('ul')
	.selectAll('li')
	.data(myData)
	.enter()
	.append('li')

	// ved label fjernet bliver tilsvarende søjle fjernet 
	listItems
	.append('input')
	.attr('type', 'checkbox')
	.attr('class', 'checkBox')
	.attr('id', d => d.id)
	.attr('checked', true)
	.on('change', (data) => {
		if (unselectedIds.indexOf(data.id) === -1) {
			unselectedIds.push(data.id);
		} else {
			unselectedIds = unselectedIds.filter(id => id !== data.id);
		}


		const newData = myData.filter(d => !unselectedIds.includes(d.id));

		renderChart(newData);
	});

	listItems
	.append('label')
	.attr('data-id', d => d.id )
	.attr('for', d => d.id)
	.text(d => d.region)



	renderChart(myData);
</script>