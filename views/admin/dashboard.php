<!-- sa-app__body -->
<div id="top" class="sa-app__body px-2 px-lg-4">
    <div class="container-fluid">
        <div class="row g-4 g-xl-5 mt-2">
            <div class="col-12 d-flex">
                <div class="card flex-grow-1">
                    <div class="sa-chart-toolbar mb-5 mt-n2">
                        <div class="sa-chart-toolbar__body p-5 pb-0">
                            <div class="sa-chart-toolbar__item ms-0 me-auto">
                                <div class="sa-chart-toolbar__item-range">
                                    <div class="text-muted mx-3 my-auto small">
                                        Từ ngày
                                    </div>
                                    <input type="text" class="form-control form-control-sm datepicker-here"
                                        placeholder="Từ ngày" data-auto-close="true" data-language="en"
                                        aria-label="Datepicker" />
                                    <div class="text-muted mx-3 my-auto small">
                                        Đến ngày
                                    </div>
                                    <input type="text" class="form-control form-control-sm datepicker-here"
                                        placeholder="Đến ngày" data-auto-close="true" data-language="en"
                                        aria-label="Datepicker" />
                                </div>
                            </div>
                            <div class="sa-chart-toolbar__item">
                                <span class="text-muted small me-2">Hiển thị theo :</span>
                                <button class="btn btn-sm btn-outline-dark me-2 active">
                                    Ngày
                                </button>
                                <button class="btn btn-sm btn-outline-dark me-2">
                                    Tuần
                                </button>
                                <button class="btn btn-sm btn-outline-dark me-2">
                                    Tháng
                                </button>
                                <button class="btn btn-sm btn-outline-dark">
                                    Năm
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                            <div class="chartCard">
                                <div class="chartBox">
                                    <div class="chartContent">
                                        <div class="colSmall">
                                            <canvas id="myChart2"></canvas>
                                        </div>
                                        <div class="colLarge">
                                            <div class="box">
                                                <canvas id="myChart"></canvas>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <script type="text/javascript"
                                src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
                            <script>
                                // Setup data for stacked bar chart with new labels matching the image
                                const labels = [
                                    '01 Thg 5',
                                    '02 Thg 5',
                                ];

                                // Total orders for each day (visible on top of each bar in the image)
                                const totals = [5, 10, 25, 20, 45, 41, 18, 60, 38, 52, 31, 14, 20, 13];

                                // Data based on the image
                                const data = {
                                    labels: labels,
                                    datasets: [
                                        {
                                            label: 'Đang gửi',
                                            data: [0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0],
                                            backgroundColor: '#FFEB3B',
                                            borderColor: '#FFEB3B',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Đang đi phát',
                                            data: [0, 0, 0, 0, 0, 0, 0, 5, 6, 0, 0, 0, 3, 0],
                                            backgroundColor: '#FFC107',
                                            borderColor: '#FFC107',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Chưa phát được',
                                            data: [0, 1, 1, 0, 2, 2, 1, 0, 0, 2, 0, 1, 0, 1],
                                            backgroundColor: '#FF9800',
                                            borderColor: '#FF9800',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Chuyển hoàn',
                                            data: [0, 0, 0, 0, 3, 6, 0, 0, 0, 0, 0, 0, 0, 0],
                                            backgroundColor: '#F44336',
                                            borderColor: '#F44336',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Chưa nhận COD',
                                            data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 45, 0, 0, 0, 0],
                                            backgroundColor: '#8BC34A',
                                            borderColor: '#8BC34A',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Đã nhận COD',
                                            data: [4, 7, 22, 16, 37, 31, 16, 45, 27, 0, 28, 13, 16, 12],
                                            backgroundColor: '#4CAF50',
                                            borderColor: '#4CAF50',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Đã nhận CH',
                                            data: [1, 2, 2, 4, 3, 2, 1, 7, 5, 5, 3, 0, 1, 0],
                                            backgroundColor: '#9C27B0',
                                            borderColor: '#9C27B0',
                                            borderWidth: 1
                                        }
                                    ]
                                };

                                // Configuration for main chart (scrollable)
                                const config = {
                                    type: 'bar',
                                    data,
                                    options: {
                                        maintainAspectRatio: false,
                                        layout: {
                                            padding: {
                                                top: 30
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
                                                max: 65, // Match the scale in the image
                                                ticks: {
                                                    display: false
                                                },
                                                grid: {
                                                    color: '#eeeeee',
                                                    drawTicks: false
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
                                                    ctx.fillText(total + ' Đơn', x, y);
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

                                // Setup data for y-axis chart
                                const data2 = {
                                    labels: ['', '', '', '', '', '', ''],
                                    datasets: [{
                                        label: '',
                                        data: [0, 10, 20, 30, 40, 50, 60],
                                        backgroundColor: 'rgba(0, 0, 0, 0)',
                                        borderColor: 'rgba(0, 0, 0, 0)'
                                    }]
                                };

                                // Configuration for y-axis chart
                                const config2 = {
                                    type: 'bar',
                                    data: data2,
                                    options: {
                                        indexAxis: 'y',
                                        maintainAspectRatio: false,
                                        layout: {
                                            padding: {
                                                bottom: 28.5
                                            }
                                        },
                                        scales: {
                                            x: {
                                                display: false
                                            },
                                            y: {
                                                position: 'right',
                                                beginAtZero: true,
                                                reverse: true,
                                                ticks: {
                                                    padding: 8,
                                                    callback: function (value) {
                                                        return value;
                                                    },
                                                    font: {
                                                        size: 10
                                                    }
                                                },
                                                afterFit: (ctx) => {
                                                    ctx.width = 65;
                                                },
                                                grid: {
                                                    display: false
                                                }
                                            }
                                        },
                                        plugins: {
                                            legend: {
                                                display: false,
                                            }
                                        }
                                    }
                                };

                                // Render y-axis chart
                                const myChart2 = new Chart(
                                    document.getElementById('myChart2'),
                                    config2
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