<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex p-0">
                <div class="card flex-grow-1">
                    <div style="height: 93vh !important" class="card-body">

                            <div class="chartCard">
                                <div class="chartBox">
                                    <div class="chartContent">
                                        <div class="colLarge">
                                            <div style="width: 2400px" class="box">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
                            <script>
                                // Setup data for stacked bar chart with new labels matching the image
                                const labels = [<?= $arrayDate ?>];

                                // Total orders for each day (visible on top of each bar in the image)
                                const totals = [<?= $arrayTotal ?>];
                                // Tìm giá trị tối đa trong mảng totals
                                const maxTotal = Math.max(...totals);
                                
                                // Data based on the image
                                const data = {
                                    labels: labels,
                                    datasets: [<?= $arrayCount ?>]
                                };

                                // Configuration for main chart (scrollable)
                                const config = {
                                    type: 'bar',
                                    data,
                                    options: {
                                        maintainAspectRatio: false,
                                        layout: {
                                            padding: {
                                                // top: 30
                                            }
                                        },
                                        scales: {
                                            x: {
                                                stacked: true,
                                                grid: {
                                                    display: false
                                                }
                                            },
                                            y: {
                                                stacked: true,
                                                beginAtZero: true,
                                                max: maxTotal, // Match the scale in the image
                                                ticks: {
                                                    display: true
                                                },
                                                grid: {
                                                    // color: '#eeeeee',
                                                    // drawTicks: false
                                                },
                                                border: {
                                                    display: false
                                                }
                                            }
                                        },
                                        plugins: {
                                            legend: {
                                                display: false
                                            },
                                            tooltip: {
                                                mode: 'index'
                                            }
                                        },
                                        // Plugins to display the total number of orders on top of each bar
                                        plugins: [{
                                            afterDraw: function (chart) {
                                                const ctx = chart.ctx;
                                                chart.data.datasets[0].data.forEach((_, i) => {
                                                    // Calculate total for this index across all datasets
                                                    const total = totals[i];
                                                    if (!total) return;

                                                    // Find the position for the total label
                                                    const meta = chart.getDatasetMeta(chart.data.datasets.length - 1);
                                                    if (!meta.data[i]) return;

                                                    const x = meta.data[i].x;
                                                    const y = meta.data[i].y - 15;

                                                    // Draw total on top of the stacked bar
                                                    ctx.save(); 
                                                    ctx.textAlign = 'center';
                                                    ctx.textBaseline = 'bottom';
                                                    ctx.font = 'bold 12px Arial';
                                                    ctx.fillStyle = '#333';
                                                    ctx.fillText(total, x, y);
                                                    ctx.restore();
                                                });
                                            }
                                        }]
                                    }
                                };

                                // Render main chart
                                const myChart = new Chart(
                                    document.getElementById('myChart'),
                                    config
                                );

                                // Add event listeners for view option buttons
                                document.querySelectorAll('.viewOption').forEach(button => {
                                    button.addEventListener('click', function () {
                                        document.querySelectorAll('.viewOption').forEach(btn => {
                                            btn.classList.remove('selected');
                                        });
                                        this.classList.add('selected');
                                    });
                                });

                                // Make slider draggable (simple implementation)
                                const slider = document.querySelector('.sliderHandle');
                                let isDragging = false;

                                slider.addEventListener('mousedown', () => {
                                    isDragging = true;
                                });

                                document.addEventListener('mousemove', (e) => {
                                    if (!isDragging) return;

                                    const track = document.querySelector('.timelineSlider');
                                    const rect = track.getBoundingClientRect();
                                    let newPos = (e.clientX - rect.left) / rect.width;

                                    // Constrain to track bounds
                                    newPos = Math.max(0, Math.min(1, newPos));

                                    // Update slider position
                                    slider.style.left = newPos * 100 + '%';
                                });

                                document.addEventListener('mouseup', () => {
                                    isDragging = false;
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
        document.getElementById('showDay').addEventListener('click', function() {
            typeShowInput.value = 'day';
            redirectToUrl();
        });

        document.getElementById('showWeek').addEventListener('click', function() {
            typeShowInput.value = 'week';
            redirectToUrl();
        });

        document.getElementById('showMonth').addEventListener('click', function() {
            typeShowInput.value = 'month';
            redirectToUrl();
        });

        document.getElementById('showYear').addEventListener('click', function() {
            typeShowInput.value = 'year';
            redirectToUrl();
        });
    });
</script>