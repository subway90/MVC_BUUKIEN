<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="mt-5">
        <div class="container-fluid">
            <div class="card">
                <div class="sa-divider"></div>
                <table class="sa-datatables-init table table-hover border-muted" data-order="[[ 9, &quot;asc&quot; ]]"
                    data-sa-search-input="#table-search">
                    <thead>
                        <tr class="small">
                            <!-- <th class="w-min">ID</th> -->
                            <th class="min-w-5x">Mã bưu kiện</th>
                            <th class="min-w-5x">Chuyển phát</th>
                            <th class="min-w-5x">Mã NV</th>
                            <th class="min-w-5x">Ngày gửi</th>
                            <th class="min-w-5x">Người nhận</th>
                            <th class="min-w-5x">Điện thoại</th>
                            <th class="min-w-5x">Địa chỉ</th>
                            <th class="min-w-5x">Phí gửi</th>
                            <th class="min-w-5x">COD</th>
                            <th class="min-w-5x">Sản phẩm</th>
                            <th class="min-w-5x">Trạng thái</th>
                            <th class="min-w-5x">Ghi chú</th>
                            <th class="min-w-5x" data-orderable="false">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < 100; $i++): ?>
                            <tr class="small text-muted">
                                <td class="small align-middle">
                                    <?= '#' . rand() ?>
                                </td>
                                <td class="small align-middle">
                                    <?= ARR_POST_BRAND[array_rand(ARR_POST_BRAND)] ?>
                                </td>
                                <td class="small align-middle">
                                    EMP_<?=rand(1,999)?>
                                </td>
                                <td class="small align-middle">
                                    <?= rand(1,28).'/'.rand(1,12).'/20'.rand(20,25) ?>
                                </td>
                                <td class="small align-middle">
                                    <?='TO_'.rand(1000,9999)?>
                                </td>
                                <td class="small align-middle">
                                    <?='0'.rand(300000000,999999999)?>
                                </td>
                                <td class="small align-middle">
                                    <?= ARR_PROVINCE[array_rand(ARR_PROVINCE)] ?>
                                </td>
                                <td class="small align-middle">
                                    <?= ARR_COD[array_rand(ARR_COD)] ?>
                                </td>
                                <td class="small align-middle">
                                    <?= ARR_COD[array_rand(ARR_COD)] ?>
                                </td>
                                <td class="small align-middle">
                                    <?='PRO_'.rand(1000,9999)?>
                                </td>
                                <td class="small align-middle">
                                    <?= ARR_STATE_POST[array_rand(ARR_STATE_POST)] ?>
                                </td>
                                <td class="small align-middle">
                                    Ghi chú nè
                                </td>
                                <td class="">
                                    <form method="post">
                                        <button class="shadow btn btn-sm border-1 btn-primary me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#canvasEditPost" aria-controls="canvasEditPost">
                                            <small><i class="fa fas fa-edit"></i></small>
                                        </button>
                                        <button class="shadow btn btn-sm border-1 btn-danger" type="button" onclick="delete_force(<?= $i ?>)" >
                                            <small><i class="fa fas fa-trash"></i></small>
                                        </button>
                                    </form>
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

<!-- Modal Thêm mới -->
<style>
    .select2-container--open {
        z-index: 9999;
    }
</style>
<div class="modal fade" id="modalAddPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm bưu kiện mới</h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="post">
                <input type="hidden" name="id_force" value="">
                <div class="modal-body text-center px-5">
                    <div class="mb-5 row">
                        <div class="col-12 text-center fw-bold mb-5">
                            Thông tin người nhận
                        </div>
                        <div class="col-12 col-lg-6 text-start mb-3">
                                <label class="small" for="receiver">Họ và tên</label>
                                <input name="receiver" id="receiver" type="text" placeholder="Nhập họ và tên người nhận" class="form-control" />
                        </div>
                        <div class="col-12 col-lg-6 text-start mb-3">
                                <label class="small" for="phone">Số điện thoại</label>
                                <input name="phone" id="phone" type="text" placeholder="Nhập số điện thoại người nhận" class="form-control" />
                        </div>
                        <div class="col-12 text-start mb-3">
                                <label class="small" for="address">Địa chỉ</label>
                                <input name="address" id="address" type="text" placeholder="Nhập địa chỉ người nhận" class="form-control" />
                        </div>
                        <div class="col-12 text-center fw-bold my-5">
                            Thông tin bưu kiện
                        </div>
                        <div class="col-6 col-lg-3 text-start mb-3">
                                <label class="small" for="code_post">Mã bưu kiện</label>
                                <input name="code_post" id="code_post" type="text" placeholder="Nhập mã bưu kiện" class="form-control" />
                        </div>
                        <div class="col-6 col-lg-3 text-start mb-3">
                                <label class="small" for="shipping_unit">Đơn vị vận chuyển</label>
                                <select name="shipping_unit" id="shipping_unit" class="form-select">
                                    <option value="0" selected>--- Chọn đơn vị ---</option>
                                    <?php foreach (ARR_POST_BRAND as $i => $name) : ?>
                                    <option value="<?=++$i?>"><?= $name ?></option>
                                    <?php endforeach ?>
                                </select>
                        </div>
                        <div class="col-6 col-lg-3 text-start mb-3">
                                <label class="small" for="date_sent">Ngày gửi</label>
                                <input name="date_sent" id="date_sent" type="text" class="form-control datepicker-here" data-auto-close="true" data-language="en" aria-label="Datepicker"
                                />
                        </div>
                        <div class="col-6 col-lg-3 text-start mb-3">
                                <label class="small" for="to_province">Gửi đến (Tỉnh thành)</label>
                                <select name="to_province" id="to_province" class="form-select">
                                    <option value="0" selected>--- Chọn địa điểm ---</option>
                                    <?php foreach (ARR_PROVINCE as $i => $name) : ?>
                                    <option value="<?=++$i?>"><?= $name ?></option>
                                    <?php endforeach ?>
                                </select>
                        </div>
                        <div class="col-12 col-lg-6 text-start mb-3">
                                <label class="small" for="name_post">Tên bưu kiện</label>
                                <input name="name_post" type="text" placeholder="Nhập tên bưu kiện" class="form-control" />
                        </div>
                        <div class="col-6 col-lg-3 text-start mb-3">
                                <label class="small" for="fee">Phí vận chuyển</label>
                                <input name="fee" type="text" placeholder="Nhập phí vận chuyển" class="form-control" />
                        </div>
                        <div class="col-6 col-lg-3 text-start mb-3">
                                <label class="small" for="cod">COD</label>
                                <input name="cod" type="text" placeholder="Nhập COD" class="form-control" />
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button name="addPost" type="submit" class="btn btn-primary ms-2">Xác nhận</button>
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

<!-- Offcanvas Sửa -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="canvasEditPost" aria-labelledby="canvasEditPostLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasEndLabel">Sửa thông tin</h5>
        <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">...</div>
</div>

<!-- Modal xoá vĩnh viễn -->
<div class="modal fade" id="modalDeleteProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xoá vĩnh viễn sản phẩm</h5>
                <button type="button" class="sa-close sa-close--modal" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="post">
                <input type="hidden" name="id_force" value="">
                <div class="modal-body text-center px-5">
                    <div class="mb-5">
                        Bạn có chắc chắn xoá ? Việc xoá vĩnh viễn sẽ không thể khôi phục lại !
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                    <button name="delete_force" type="submit" class="btn btn-danger">Xoá</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function delete_force(id) {
        document.querySelector('input[name="id_force"]').value = id;
        var myModal = new bootstrap.Modal(document.getElementById('modalDeleteProduct'));
        myModal.show();
    }
</script>