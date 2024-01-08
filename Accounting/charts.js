fetch('chart_for_js.php')
    .then(response => response.json())
    .then(chartData => {
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        const barChart = document.querySelector(".bar-chart");

        const monthLabels = chartData.labels.map(month => {
            const [year, monthNum] = month.split('-');
            const monthIndex = parseInt(monthNum) - 1; 
            return `${months[monthIndex]} ${year}`;
        });

        new Chart(barChart, {
            type: 'bar',
            data: {
                labels: monthLabels, 
                datasets: [{
                    label: "Monthly Expenses",
                    data: chartData.data,
                    backgroundColor: '#F0C519',
                }],
            },
        });
    })
    .catch(error => console.error('Error fetching data:', error));
