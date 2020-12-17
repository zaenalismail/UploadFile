<!DOCTYPE HTML>
<html>

<head>
    <style>
        img {
            pointer-events: none;
        }
    </style>
    <script>
        window.onload = function() {
            function update() {
                const settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://www.alphavantage.co/query?function=FX_INTRADAY&from_symbol=EUR&to_symbol=USD&interval=1min&apikey=MTYF21DXMPUTO8LZ",
                    "method": "GET"
                };

                $.ajax(settings).done(function(response) {
                    const dataChart = response;
                    console.log(response);
                    const dataArrayChart = dataChart['Time Series FX (1min)'];
                    const keys = Object.keys(dataArrayChart);
                    const values = Object.values(dataArrayChart);
                    console.log(keys);
                    console.log(values);
                    let dataPointshigh = [];
                    let dataPointslow = [];
                    for (var i = keys.length - 91; i >= 0; i--) {
                        let high = parseFloat(values[i]["2. high"]);
                        let low = parseFloat(values[i]["3. low"]);
                        let dt = keys[i];
                        dataPointshigh.push({
                            label: dt,
                            y: high
                        });
                        dataPointslow.push({
                            label: dt,
                            y: low
                        });
                    };

                    var chart = new CanvasJS.Chart("chartContainer", {
                        type: "rangeSplineArea",
                        fillOpacity: 0.1,
                        color: "#91AAB1",
                        title: {
                            text: "EUR to USD Forex"
                        },
                        axisX: {
                            title: "(Date-Time)",
                        },
                        axisY: {
                            title: "Value",
                            gridThickness: 0
                        },
                        toolTip: {
                            shared: true
                        },
                        legend: {
                            fontColor: 'black',
                            fontSize: 12
                        },
                        data: [{
                            name: "High",
                            color: "#91AAB1",
                            showInLegend: true,
                            dataPoints: dataPointshigh
                        }, {
                            name: "Low",
                            color: "grey",
                            showInLegend: true,
                            dataPoints: dataPointslow
                        }, ]
                    });
                    $(window).resize(function() {});
                    chart.render();
                });

            }
            update();
            setInterval(function() {
                update()
            }, 60000);
        }
    </script>
</head>

<body>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <div id="chartContainer" style="height: 300px; width: 100%; position: relative;"></div>
</body>

</html>