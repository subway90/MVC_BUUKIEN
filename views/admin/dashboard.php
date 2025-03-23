<!-- sa-app__body -->
<div id="top" class="sa-app__body px-2 px-lg-4">
    <div class="container-fluid pb-6">
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
                                    <input type="text" class="form-control form-control-sm datepicker-here" placeholder="Từ ngày" data-auto-close="true" data-language="en" aria-label="Datepicker"/>
                                    <div class="text-muted mx-3 my-auto small">
                                        Đến ngày
                                    </div>
                                    <input type="text" class="form-control form-control-sm datepicker-here" placeholder="Đến ngày" data-auto-close="true" data-language="en" aria-label="Datepicker" />
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
                    <style>
                        canvas {
    max-width: none; /* Đảm bảo không giới hạn chiều rộng */
    width: 100%; /* Đảm bảo chiều rộng là 100% */
}
                    </style>
<div class="card-body">
    <div style="overflow-x: auto; width: 100%;">
        <canvas id="stacked-bar" style="min-width: 800px;"></canvas>
    </div>
    <div id="data" style="display: none;" 
        type-chart='bar' 
        array-unit='[ <?= EXAMPLE_ARRAY_UNIT ?> ]'
        data='[
            ["Đang gửi","#92C5F9",[0,3,4,5,5,3,1,5,3,4,5,5,3,1]],
            ["Đang đi phát","#0066CC",[4,11,0,6,2,2,1,2,3,4,5,5,3,1]],
            ["Chưa phát được","#F8AE54",[1,2,3,0,5,6,7,0,3,4,5,5,3,1]],
            ["Chuyển hoàn","#CA6C0F",[12,3,4,5,5,0,1,3,3,4,5,5,3,1]],
            ["Chưa nhận COD","#E0E0E0",[2,5,5,5,5,3,5,2,3,4,5,5,3,1]],
            ["Đã nhận COD","#AFDC8F",[6,6,4,5,0,0,12,2,3,4,5,5,3,1]],
            ["Đã nhận CH","#B6A6E9",[2,3,3,0,0,7,2,1,3,4,5,5,3,1]]
        ]'>
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
    <!-- sa-app__body / end -->