
$(function () {
    $.ajax({
        url: baseUrl + 'public_space/chartdata',
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: "Visitor",
                    fillColor: "#343a40",
                    borderColor: '#868e96',
                    strokeColor: "#343a40",
                    pointColor: "#343a40",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "r#343a40",
                    data: data
                }]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            var areaChart = new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error get data from ajax');
        }
    })
})
