<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex p-0">
                <div class="card flex-grow-1">
                    <div style="height: 93vh !important" class="card-body">
                        <div class="colLarge">
                            <div id="myPlotlyChart"></div>
                        </div>
                        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
                        <script>
                            var dataLabels = JSON.parse(`<?= $arrayCount?>`)
                            dataLabels = dataLabels.map(data => {
                                return {
                                    x: [<?= $arrayDate ?>],
                                    y: data.data,
                                    name: data.label,
                                    marker: {color: data.backgroundColor},
                                    width: data.width,
                                    type: 'bar',
                                }
                            })
                            dataLabels.push({
                                x: dataLabels[0].x,
                                y: [<?= $arrayTotal ?>], // nâng nhẹ để text không bị đè
                                mode: 'text',
                                type: 'scatter',
                                text: [<?= $arrayTotal ?>],
                                textposition: 'top center',
                                showlegend: false,
                                hoverinfo: 'skip', // không cần tooltip
                                textfont: {
                                    size: 14,
                                    color: 'black',
                                    weight: 'bold'
                                }
                            })
                            var layout = {
                                bargap: 0.5,
                                dragmode: 'pan',
                                uirevision: true,
                                xaxis: {
                                    tickangle: -10, // Xoay nhãn để dễ đọc
                                    tickmode: 'linear', // Hiển thị tất cả các nhãn
                                    automargin: true, // Tự động căn lề để tránh tràn
                                },
                                yaxis: {
                                    fixedrange: true // Ngăn zoom trên trục y
                                },
                                height: 600,
                                legend: {
                                    orientation: 'h', // Đặt legend theo chiều ngang
                                    x: 0.2, // Căn giữa theo trục x
                                    y: 1.2, // Đặt lên trên biểu đồ
                                },
                                barmode: 'stack'
                            };

                            var config = {
                                displayModeBar: false
                            }

                            Plotly.newPlot('myPlotlyChart', dataLabels, layout, config).then(function() {
                                var xValues = dataLabels[0].x; // Lấy danh sách x
                                var lastValue = xValues[xValues.length - 1]; // Lấy giá trị cuối
                                Plotly.relayout('myPlotlyChart', {
                                    'xaxis.range': [xValues.length - 10, xValues.length], // Cuộn đến phần cuối
                                    // 'xaxis.autorange': false, // Ngăn tự động điều chỉnh
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sa-app__body / end -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Lấy các phần tử input
            const typeShowInput = document.getElementById('type_show');
            const timeStartInput = document.getElementById('time_start'); // Đổi tên để tránh trùng ID
            const timeEndInput = document.getElementById('time_end'); // Đổi tên để tránh trùng ID

            // Hàm chuyển hướng
            function redirectToUrl() {
                const typeShow = typeShowInput.value;
                const timeStart = timeStartInput.value;
                const timeEnd = timeEndInput.value;

                // Tạo URL
                const url = `/admin/bieu-do?type_show=${encodeURIComponent(typeShow)}&time_start=${encodeURIComponent(timeStart)}&time_end=${encodeURIComponent(timeEnd)}`;

                // Chuyển hướng
                window.location.href = url;
            }

            // Lắng nghe sự kiện input trên các trường ngày
            timeStartInput.addEventListener('input', redirectToUrl);
            timeEndInput.addEventListener('input', redirectToUrl);

            // Lắng nghe sự kiện click trên các nút
            document.getElementById('showDay').addEventListener('click', function () {
                typeShowInput.value = 'day';
                redirectToUrl();
            });

            document.getElementById('showWeek').addEventListener('click', function () {
                typeShowInput.value = 'week';
                redirectToUrl();
            });

            document.getElementById('showMonth').addEventListener('click', function () {
                typeShowInput.value = 'month';
                redirectToUrl();
            });

            document.getElementById('showYear').addEventListener('click', function () {
                typeShowInput.value = 'year';
                redirectToUrl();
            });
        });
    </script>
