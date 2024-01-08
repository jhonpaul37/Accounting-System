const chartData = {
    labels: ["01", "05", "06", "07"],
    data: [50,20,10,20],
};
const doughnutChart = document.querySelector(".doughnut-chart");

new Chart(doughnutChart,{
    type: 'doughnut',
    data:{
        labels: chartData.labels,
        datasets: [
            {
                labels: "Clusters",
                data: chartData.data,
            },
        ],
    },
    options: {
        borderRadius: 2,
        hoverBorderWidth: 0,
        plugins: {
            legend: {
                display: false,
            },
        },
    },
    });
    
    const BarChart = document.querySelector(".bar-chart");
    
    new Chart(BarChart,{
        type: 'bar',
        data:{
            labels: chartData.labels,
            datasets: [
                {
                    labels: "Clusters",
                    data: chartData.data,
                },
            ],
        },
        options: {
            borderRadius: 2,
            hoverBorderWidth: 0,
            plugins: {
                legend: {
                    display: false,
                },
            },
        },
        });
    