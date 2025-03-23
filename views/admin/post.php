<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="pb-5">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="sa-divider"></div>
                <!-- <table class="sa-datatables-init table table-hover border-muted" data-order="[[ 9, &quot;asc&quot; ]]" data-sa-search-input="#table-search"> -->
                <table class="table table-striped table-hover border-muted mb-0">
                    <thead>
                        <tr class="small">
                            <!-- <th class="w-min">ID</th> -->
                            <th class="col-1 text-center">Mã bưu kiện</th>
                            <th class="col-1 text-center">Chuyển phát</th>
                            <th class="col-1 text-center">Mã NV</th>
                            <th class="col-1 text-center">Ngày gửi</th>
                            <th class="col-1 text-center">Người nhận</th>
                            <th class="col-1 text-center">Điện thoại</th>
                            <th class="col-1 text-center">Địa chỉ</th>
                            <th class="col-1 text-center">Phí gửi</th>
                            <th class="col-1 text-center">COD</th>
                            <th class="col-1 text-center">Sản phẩm</th>
                            <th class="col-1 text-center">Trạng thái</th>
                            <th class="col-1 text-center">Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        for ($i = 0; $i < 50; $i++): ?>
                            <tr class="small" onclick="getOnePost(<?= $i ?>)">
                                <td class="small align-middle text-center">
                                    <?= '#' . rand() ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= ARR_POST_BRAND[array_rand(ARR_POST_BRAND)] ?>
                                </td>
                                <td class="small align-middle text-center">
                                    EMP_<?= rand(1, 999) ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= rand(1, 28) . '/' . rand(1, 12) . '/20' . rand(20, 25) ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= 'TO_' . rand(1000, 9999) ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= '0' . rand(300000000, 999999999) ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= ARR_PROVINCE[array_rand(ARR_PROVINCE)] ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= ARR_COD[array_rand(ARR_COD)] ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= ARR_COD[array_rand(ARR_COD)] ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= 'PRO_' . rand(1000, 9999) ?>
                                </td>
                                <td class="small align-middle text-center text-light">
                                    <?php $rand_order_state = array_rand(ARR_STATE_POST) ?>
                                    <span class="p-2 small d-block text-center" style="background-color : <?= ARR_STATE_POST[$rand_order_state]['color'] ?>">
                                        <?= ARR_STATE_POST[$rand_order_state]['name'] ?>
                                    </span>
                                </td>
                                <td class="small align-middle text-center">
                                    Ghi chú nè
                                </td>
                            </tr>
                            <?php
                        endfor
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Footer Page -->
<div class="position-fixed fixed-bottom d-flex bg-primary">
    <div class="container-fluid d-flex px-0 py-3">
        <div class="col-1 invisible">
            space
        </div>

        <div class="col-1">
            <select class="form-select form-select-sm border-0 bg-blue-light text-light rounded-0">
                <option value="0" selected disabled>- Lọc đơn vị -</option>
                <?php foreach (ARR_POST_BRAND as $i => $name): ?>
                    <option value="<?= ++$i ?>"><?= $name ?></option>
                <?php endforeach ?>
            </select>
        </div>
        
        <div class="col-1 invisible">
            space
        </div>

        <div class="col-1">
            <div class="dropdown sa-toolbar__item">
                <button class="sa-toolbar-user btn-sm bg-primary small fw-normal bg-blue-light text-light rounded-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                    data-bs-offset="0,1" aria-expanded="false">
                    - Lọc ngày gửi -
                </button>
                <ul style="width: 360px !important" class="dropdown-menu p-5" aria-labelledby="dropdownMenuButton">
                    <li>
                        <div class="">
                            <div class="input-group mb-3">
                                <span class="input-group-text w-25">
                                    <small>Từ ngày</small>
                                </span>
                                <input type="date" class="form-control" placeholder="Username" aria-label="Username">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text w-25">
                                    <small>Đến ngày</small>
                                </span>
                                <input type="date" class="form-control" placeholder="Username" aria-label="Username">
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn btn-sm btn-primary text-light small">Xác nhận lọc</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-6 invisible">
            space
        </div>

        <div class="col-1">
            <select class="form-select form-select-sm border-0 bg-blue-light text-light rounded-0">
                <option value="0" selected disabled>- Lọc trạng thái -</option>
                <?php foreach (ARR_STATE_POST as $i => $item): extract($item)?>
                    <option value="<?= ++$i ?>"><?= $name ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
</div>

<!-- Modal Thêm mới -->
<style>
    .select2-container--open {
        z-index: 9999;
    }
</style>

<!-- Modal thêm bưu kiện -->
<div class="modal fade" id="modalAddPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <form method="post">
                <input type="hidden" name="id_force" value="">
                <div class="modal-body text-center px-5">
                    <div class="row justify-content-between">
                        <div class="col-12 text-center h4 fw-normal mb-5 pb-5">
                            Thông tin bưu kiện
                        </div>
                        <div class="col-6 row align-content-start">
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="code_post">Mã bưu kiện</label>
                                <input name="code_post" id="code_post" type="text" placeholder="Nhập mã bưu kiện"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="shipping_unit">Đơn vị vận chuyển</label>
                                <select name="shipping_unit" id="shipping_unit" class="form-select ps-0 border-0 border-bottom border-2 outline-none">
                                    <option value="0" selected disabled>--- Chọn đơn vị ---</option>
                                    <?php foreach (ARR_POST_BRAND as $i => $name): ?>
                                        <option value="<?= ++$i ?>"><?= $name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="to_province">Nhân viên</label>
                                <select name="to_province" id="to_province" class="form-select ps-0 border-0 border-bottom border-2 outline-none">
                                    <option value="0" selected disabled>--- Chọn nhân viên ---</option>
                                    <option value="1">Adminitrator</option>
                                </select>
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="date_sent">Ngày gửi</label>
                                <input name="date_sent" id="date_sent" type="date" class="form-control ps-0 border-0 border-bottom border-2 outline-none datepicker-here"
                                    data-auto-close="true" data-language="en" aria-label="Datepicker" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="fee">Phí gửi</label>
                                <input name="fee" type="text" placeholder="Nhập phí vận chuyển" class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="cod">Tiền thu hộ COD</label>
                                <input name="cod" type="text" placeholder="Nhập COD" class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="to_province">Tỉnh thành</label>
                                <select name="to_province" id="to_province" class="form-select ps-0 border-0 border-bottom border-2 outline-none">
                                    <option value="0" selected disabled>--- Chọn địa điểm ---</option>
                                    <?php foreach (ARR_PROVINCE as $i => $name): ?>
                                        <option value="<?= ++$i ?>"><?= $name ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="to_province">Trạng thái</label>
                                <select name="to_province" id="to_province" class="form-select ps-0 border-0 border-bottom border-2 outline-none">
                                    <option value="0" selected disabled>--- Chọn trạng thái ---</option>
                                    <?php foreach (ARR_STATE_POST as $i => $item): ?>
                                        <option value="<?= ++$i ?>"><?= $item['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-6 row align-content-start">
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="receiver">Họ tên người nhận</label>
                                <input name="receiver" id="receiver" type="text" placeholder="Nhập họ và tên người nhận"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="phone">Số điện thoại</label>
                                <input name="phone" id="phone" type="text" placeholder="Nhập số điện thoại người nhận"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-8 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="address">Địa chỉ</label>
                                <input name="address" id="address" type="text" placeholder="Nhập địa chỉ người nhận"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-4 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="product">Sản phẩm</label>
                                <input name="product" id="product" type="text" placeholder="Nhập tên sản phẩm"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-12 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="note">Ghi chú về bưu kiện</label>
                                <input name="note" id="note" type="text" placeholder="Nhập ghi chú về bưu kiện"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div id="btn-delete" class="d-none col-12 py-2 px-3 text-start mb-4">
                                <div class="small text-muted mb-3">Hành động</div>
                                <button class="ms-2 btn btn-sm btn-danger">Xoá bưu kiện</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                            <button name="addPost" type="submit" class="btn btn-primary text-light ms-2">Xác nhận</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('modalAddPost'));
        myModal.show();
    });
</script> -->

<script>
    function getOnePost(id) {
        document.querySelector('input[name="id_post"]').value = id;
        
        // Xoá class d-none cho div có id btn-delete
        var btnDelete = document.getElementById('btn-delete');
        btnDelete.classList.remove('d-none');
        
        var myModal = new bootstrap.Modal(document.getElementById('modalAddPost'));
        myModal.show();
    }
</script>