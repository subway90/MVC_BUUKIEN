<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
        <div class="container-fluid">
            <div class="py-5">
                <div class="row g-4 align-items-center">
                    <div class="col">
                        <nav class="mb-2" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-sa-simple">
                                <li class="breadcrumb-item active" aria-current="page">Danh sách bưu kiện</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-auto d-flex">
                        <button type="button" class="btn btn-primary me-3">
                            <i class="fa fas fa-plus me-3"></i><small>Thêm</small>
                        </button>
                        <button type="button" class="btn btn-success">
                            <i class="fa far fa-file-excel me-3"></i><small>Nhập từ Excel</small>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="p-4"><input type="text" placeholder="Nhập thông tin tìm kiếm"
                        class="form-control form-control--search mx-auto" id="table-search" /></div>
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
                            <th class="min-w-5x">Sản phẩm</th>
                            <th class="min-w-5x">Trạng thái</th>
                            <th class="min-w-5x" data-orderable="false">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < 20; $i++): ?>
                            <tr class="small text-muted">
                                <td class="small align-middle">
                                    <?= '#' . rand() ?>
                                </td>
                                <td class="small align-middle">
                                    <?= ARR_POST_BRAND[array_rand(ARR_POST_BRAND)] ?>
                                </td>
                                </td class="small align-middle">
                                <td>
                                    Employee<?=rand(1,999)?>
                                </td>
                                <td class="small align-middle">
                                    <?= rand(1,28).'/'.rand(1,12).'/20'.rand(20,25) ?>
                                </td>
                                <td class="small align-middle">
                                    <?='ABC'.rand(1000,9999)?>
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
                                    <?='PRO_'.rand(1000,9999)?>
                                </td>
                                <td class="small align-middle">
                                    <?= ARR_STATE_POST[array_rand(ARR_STATE_POST)] ?>
                                </td>
                                <td class="">
                                    <form method="post">
                                        <button class="shadow btn btn-sm border-1 btn-primary me-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEnd" aria-controls="offcanvasEnd">
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
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel">
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