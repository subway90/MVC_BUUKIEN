<!-- sa-app__body -->
<div id="top" class="sa-app__body px-2 px-lg-4">
    <div class="container-fluid pb-6">
        <div class="row g-4 g-xl-5 mt-2">
            <div class="col-12 d-flex">
                <div class="card flex-grow-1">
                    <div class="ms-4 mt-4 my-auto">
                        <small class="me-2 text-muted">Xem theo : </small>
                        <button class="btn btn-sm btn-outline-dark me-1">
                            Ngày
                        </button>
                        <button class="btn btn-sm btn-outline-dark me-1 active">
                            Tuần
                        </button>
                        <button class="btn btn-sm btn-outline-dark me-1">
                            Tháng
                        </button>
                        <button class="btn btn-sm btn-outline-dark">
                            Năm
                        </button>
                    </div>
                    <div class="card-body">
                        <canvas id="stacked-bar"></canvas>
                        <div id="data" style="display: none;"
                            type-chart="bar"
                            data=
                            '[
                                ["Đang gửi","#92C5F9",[0,3,4,5,5,3,1,0,3,4,5,5,3,1]],
                                ["Đang đi phát","#0066CC",[4,11,0,6,2,2,1,0,3,4,5,5,3,1]],
                                ["Chưa phát được","#F8AE54",[1,2,3,0,5,6,7,0,3,4,5,5,3,1]],
                                ["Chuyển hoàn","#CA6C0F",[12,3,4,5,5,0,1,0,3,4,5,5,3,1]],
                                ["Chưa nhận COD","#E0E0E0",[2,5,5,5,5,3,5,0,3,4,5,5,3,1]],
                                ["Đã nhận COD","#AFDC8F",[6,6,4,5,0,0,12,0,3,4,5,5,3,1]],
                                ["Đã nhận CH","#B6A6E9",[2,3,3,0,0,7,2,0,3,4,5,5,3,1]]
                            ]'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sa-app__body / end -->