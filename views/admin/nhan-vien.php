<!-- sa-app__body -->
<div id="top" class="sa-app__body">
    <div class="pb-5">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="sa-divider"></div>
                <!-- <table class="sa-datatables-init table table-hover border-muted" data-order="[[ 9, &quot;asc&quot; ]]" data-sa-search-input="#table-search"> -->
                <table class="table table-hover border-muted mb-5">
                    <thead>
                        <tr class="small">
                            <!-- <th class="w-min">ID</th> -->
                            <th class="col-3 text-center">Mã nhân viên</th>
                            <th class="col-3 text-center">Họ tên</th>
                            <th class="col-3 text-center">Số điện thoại</th>
                            <th class="col-2 text-center">Username</th>
                            <th class="col-2 text-center">Phân quyền</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        for ($i = 0; $i < 50; $i++): ?>
                            <tr class="small" onclick="getOnePost(<?= $i ?>)">
                                <td class="small align-middle text-center">
                                    <?= 'EMP_' . rand() ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= 'ABC_' . rand() ?>
                                <td class="small align-middle text-center">
                                    0<?=rand(300000000,999999999) ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= 'user_' . rand(100,9999) ?>
                                </td>
                                <td class="small align-middle text-center">
                                    <?= ARR_ROLE[array_rand(ARR_ROLE)] ?>
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
<div class="d-none position-fixed fixed-bottom d-flex bg-primary">
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

<!-- Modal thêm nhân viên -->
<div class="modal fade" id="modalAddEmployee" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <form method="post">
                <input type="hidden" name="id_force" value="">
                <div class="modal-body text-center px-5">
                    <div class="row justify-content-between">
                        <div class="col-12 text-center h4 fw-normal mb-5 pb-5">
                            Thông tin nhân viên
                        </div>
                        <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="receiver">Họ tên</label>
                                <input name="receiver" id="receiver" type="text" placeholder="Nhập họ và tên"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="phone">Số điện thoại</label>
                                <input name="phone" id="phone" type="text" placeholder="Nhập số điện thoại"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="address">Email/Username</label>
                                <input name="address" id="address" type="text" placeholder="Nhập email đăng nhập"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                            <div class="col-6 py-2 px-3 text-start mb-4">
                                <label class="small text-muted" for="product">Mật khẩu</label>
                                <input name="product" id="product" type="password" placeholder="Nhập mật khẩu"
                                    class="form-control ps-0 border-0 border-bottom border-2 outline-none" />
                            </div>
                        <div class="col-12 mt-4">
                            <button name="addPost" type="submit" class="w-btn-fill btn btn-primary text-light ms-2">Xác nhận</button>
                            <button type="button" class="w-btn-fill btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myModal = new bootstrap.Modal(document.getElementById('modalAddEmployee'));
        myModal.show();
    });
</script>

<script>
    function getOnePost(id) {
        document.querySelector('input[name="id_post"]').value = id;
        
        // Xoá class d-none cho div có id btn-delete
        var btnDelete = document.getElementById('btn-delete');
        btnDelete.classList.remove('d-none');
        
        var myModal = new bootstrap.Modal(document.getElementById('modalAddEmployee'));
        myModal.show();
    }
</script>