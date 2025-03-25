<!DOCTYPE html>
<html lang="en" dir="ltr" data-scompiler-id="0">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <title><?= (isset($title)) ? $title : WEB_NAME ?></title>
    <!-- icon -->
    <link rel="icon" type="image/png" href="<?= WEB_FAVICON ?>" />
    <!-- fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" />
    <!-- css -->
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/bootstrap/css/bootstrap.ltr.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/highlight.js/styles/github.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/simplebar/simplebar.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/quill/quill.snow.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/air-datepicker/css/datepicker.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/select2/css/select2.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/datatables/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/vendor/fullcalendar/main.min.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/css/style.css" />
    <link rel="stylesheet" href="<?=URL?>assets/admin/css/custom.css" />
    <!-- cdn bootstrap icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    <!-- cdn jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- cdn google -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->
    
</head>
    <?=toast_show();//dùng toast?>


<body>

    <!-- Spinner -->
    <style>
        #spinner {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white; /* Nền trắng */
            z-index: 9999; /* Đảm bảo spinner nằm trên cùng */
            display: flex;
            justify-content: center;
            align-items: center;
            visibility: visible; /* Hiển thị spinner ban đầu */
        }
    </style>

    <div id="spinner">
        <div  style="width: 8px; height: 8px;" class="spinner-grow text-danger" role="status">
        </div>
        <div  style="width: 12px; height: 12px;" class="spinner-grow text-warning mx-2" role="status">
        </div>
        <div  style="width: 16px; height: 16px;" class="spinner-grow text-success" role="status">
        </div>
        <div  style="width: 20px; height: 20px;" class="spinner-grow text-danger mx-2" role="status">
        </div>
        <div  style="width: 24px; height: 24px;" class="spinner-grow text-warning" role="status">
        </div>
    </div>

    <!-- sa-app -->
    <?php if(is_login()) : // Nếu đăng nhập sẽ show?>
    <div class="sa-app sa-app--desktop-sidebar-hidden sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
        <!-- sa-app__sidebar -->
        <div class="sa-app__sidebar">
            <div class="sa-sidebar">
                <div class="sa-sidebar__header">
                    <a class="sa-sidebar__logo" href="<?=URL_ADMIN?>">
                        <!-- logo -->
                        <div class="sa-sidebar-logo text-center">
                                <img width="32" src="<?= WEB_LOGO ?>" alt="">
                                <div class="ms-3 text-light"><?= WEB_NAME ?></div>
                        </div>
                        <!-- logo / end -->
                    </a>
                </div>
                <div class="sa-sidebar__body bg-light bg-opacity-10" data-simplebar="">
                    <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                        <li class="sa-nav__section">
                            <ul class="sa-nav__menu sa-nav__menu--root">
                                <!-- Project Case -->
                                <?php if(auth('name_role') == 'admin') : ?>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=URL_ADMIN?>bieu-do?type_show=day&time_start=2023-09-05" class="sa-nav__link <?=($page=='dashboard') ? 'bg-dark' : ''?>">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-chart-bar"></i>
                                        </span>
                                        <span class="sa-nav__title">Biểu đồ</span>
                                    </a>
                                </li>
                                <?php endif ?>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=URL_ADMIN?>quan-li-buu-kien" class="sa-nav__link <?=($page=='post') ? 'bg-dark' : ''?>">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-boxes"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí bưu kiện</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=URL_ADMIN?>doi-soat" class="sa-nav__link <?=($page=='doi-soat') ? 'bg-dark' : ''?>">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-file-alt"></i>
                                        </span>
                                        <span class="sa-nav__title">Đối soát</span>
                                    </a>
                                </li>
                                <?php if(auth('name_role') == 'admin') : ?>
                                <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                    <a href="<?=URL_ADMIN?>quan-li-nhan-vien" class="sa-nav__link <?=($page=='nhan-vien') ? 'bg-dark' : ''?>">
                                        <span class="sa-nav__icon">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <span class="sa-nav__title">Quản lí nhân viên</span>
                                    </a>
                                </li>
                                <?php endif ?>
                                <form action="/dang-xuat" method="post">
                                    <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                                        <button type="submit" name="logout" href="<?=URL_ADMIN?>quan-li-buu-kien" class="sa-nav__link bg-transparent border-0 w-100">
                                            <span class="sa-nav__icon">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </span>
                                            <span class="sa-nav__title text-start">Đăng xuất</span>
                                        </button>
                                    </li>
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sa-app__sidebar-shadow"></div>
            <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
        </div>
        <!-- sa-app__sidebar / end -->
        <!-- sa-app__content -->
        <div class="sa-app__content">
            <!-- sa-app__toolbar -->
            <div class="sa-toolbar sa-toolbar--search-hidden sa-app__toolbar">
                <div class="sa-toolbar__body bg-primary">
                    <div class="sa-toolbar__item">
                        <button class="sa-toolbar__button text-light bg-transparent" type="button" aria-label="Menu" data-sa-toggle-sidebar="">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    
                    <div class="mx-auto d-flex my-auto py-2 flex-grow-1 justify-content-center">
                        <?php if($page == 'parcel') : //Show chức năng quản lí bưu kiện ?>
                        <div class="sa-toolbar_item my-auto px-3 p-2 bg-blue-light rounded rounded-fill-header">
                            <i class="fas fa-search text-light small ms-1 me-3"></i>
                            <input name="searchParcel" type="text" placeholder="Nhập thông tin tìm kiếm" class="form-search"/>                     
                            <button class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header" data-bs-toggle="modal" data-bs-target="#modalAddParcel">
                                Thêm bưu kiện
                            </button>
                            <button id="importParcel" class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                Nhập XLSX
                            </button>
                            <button id="updateParcel" class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                Cập nhật trạng thái
                            </button>
                            <button id="deleteParcel" class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                Xoá dữ liệu
                            </button>
                            <button id="exportParcel" class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                Print
                            </button>
                        </div>
                        <?php endif ?>
                        <?php if($page == 'doi-soat') : //Show chức năng quản lí bưu kiện ?>
                        <div class="sa-toolbar_item my-auto px-3 p-2 bg-blue-light rounded rounded-fill-header">
                            <i class="fas fa-search text-light small ms-1 me-3"></i>
                            <input type="text" placeholder="Nhập thông tin tìm kiếm" class="form-search" id="table-search"/>                     
                            <button class="invisible min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header" data-bs-toggle="modal" data-bs-target="#modalAddPost">
                                space
                            </button>
                            <button class="invisible min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                space
                            </button>
                            <button class="invisible min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                space
                            </button>
                            <button id="compareParcel" class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                Tải XLSX
                            </button>
                            <button class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                Print
                            </button>
                        </div>
                        <?php endif ?>
                        <?php if($page == 'nhan-vien') : //Show chức năng quản lí bưu kiện ?>
                        <div class="sa-toolbar_item my-auto px-3 p-2 bg-blue-light rounded rounded-fill-header">
                            <i class="fas fa-search text-light small ms-1 me-3"></i>
                            <input type="text" placeholder="Nhập thông tin tìm kiếm" class="form-search" id="table-search"/>                     
                            <button class="invisible min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                space
                            </button>
                            <button class="invisible min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                space
                            </button>
                            <button class="invisible min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                space
                            </button>
                            <button class="invisible min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header">
                                space
                            </button>
                            <button class="min-w-10x btn btn-sm btn-primary text-light fs-btn-fill-header" data-bs-toggle="modal" data-bs-target="#modalAddEmployee">
                                Thêm
                            </button>
                        </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="sa-toolbar__shadow"></div>
            </div>
    <?php endif ?>

            
<!-- Dùng toast -->
<?=toast_show()?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function loadParcel(keyword) {
    // Thay thế nội dung box-result bằng loading indicator
    $("#resultParcel").html(`
        <tr class="align-middle">
            <td class="text-center" colspan="12">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </td>
        </tr>
    `);

    $.ajax({
        url: `/admin/filterParcel?keyword=${encodeURIComponent(keyword)}`,
        method: 'GET',
        dataType: 'json', // Dữ liệu trả về là JSON
        success: function (response) {
            // Kiểm tra mã trạng thái
            if (response.status === 200) {
                // Cập nhật nội dung mới
                $("#resultParcel").html(response.data); // Cập nhật nội dung mới
            } else {
                // Hiển thị thông báo lỗi nếu có
                $("#resultParcel").html("<p>Không tìm thấy dữ liệu.</p>");
            }
        },
        error: function () {
            console.log("Đã có lỗi xảy ra.");
            $("#resultParcel").html("<p>Đã có lỗi khi tải dữ liệu.</p>"); // Thông báo lỗi
        }
    });
}

$(document).ready(function () {
    // Gửi yêu cầu mặc định khi trang được tải
    loadParcel('');

    // Theo dõi sự kiện nhập liệu trong ô tìm kiếm
    $('#searchParcel').on('input', function () {
        var keyword = $(this).val();
        loadParcel(keyword); // Gửi yêu cầu tìm kiếm
    });
});
</script>

<script>
    document.getElementById('importParcel').addEventListener('click', function() {
        // Tạo input file ẩn
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.name = 'file_request'; // Đặt tên cho input file
        fileInput.accept = '.xls, .xlsx'; // Cho phép chỉ định định dạng xls và xlsx

        // Xử lý sự kiện khi tệp được chọn
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Tạo một form ẩn để gửi dữ liệu
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/importParcel'; // Đường dẫn đến controller
                form.enctype = 'multipart/form-data'; // Đặt kiểu mã hóa để gửi tệp

                // Thêm input file vào form
                form.appendChild(fileInput);

                // Thêm form vào body và gửi đi
                document.body.appendChild(form);
                form.submit(); // Gửi form
            }
        });

        // Kích hoạt input file
        fileInput.click(); // Kích hoạt dialog chọn tệp
    });
</script>

<script>
    document.getElementById('updateParcel').addEventListener('click', function() {
        // Tạo input file ẩn
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.name = 'file_request'; // Đặt tên cho input file
        fileInput.accept = '.xls, .xlsx'; // Cho phép chỉ định định dạng xls và xlsx

        // Xử lý sự kiện khi tệp được chọn
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Tạo một form ẩn để gửi dữ liệu
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/updateParcel'; // Đường dẫn đến controller
                form.enctype = 'multipart/form-data'; // Đặt kiểu mã hóa để gửi tệp

                // Thêm input file vào form
                form.appendChild(fileInput);

                // Thêm form vào body và gửi đi
                document.body.appendChild(form);
                form.submit(); // Gửi form
            }
        });

        // Kích hoạt input file
        fileInput.click(); // Kích hoạt dialog chọn tệp
    });
</script>

<script>
    document.getElementById('deleteParcel').addEventListener('click', function() {
        // Tạo input file ẩn
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.name = 'file_request'; // Đặt tên cho input file
        fileInput.accept = '.xls, .xlsx'; // Cho phép chỉ định định dạng xls và xlsx

        // Xử lý sự kiện khi tệp được chọn
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Tạo một form ẩn để gửi dữ liệu
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/deleteParcel'; // Đường dẫn đến controller
                form.enctype = 'multipart/form-data'; // Đặt kiểu mã hóa để gửi tệp

                // Thêm input file vào form
                form.appendChild(fileInput);

                // Thêm form vào body và gửi đi
                document.body.appendChild(form);
                form.submit(); // Gửi form
            }
        });

        // Kích hoạt input file
        fileInput.click(); // Kích hoạt dialog chọn tệp
    });
</script>

<script>
    document.getElementById('compareParcel').addEventListener('click', function() {
        // Tạo input file ẩn
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.name = 'file_request'; // Đặt tên cho input file
        fileInput.accept = '.xls, .xlsx'; // Cho phép chỉ định định dạng xls và xlsx

        // Xử lý sự kiện khi tệp được chọn
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                // Tạo một form ẩn để gửi dữ liệu
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '/admin/doi-soat'; // Đường dẫn đến controller
                form.enctype = 'multipart/form-data'; // Đặt kiểu mã hóa để gửi tệp

                // Thêm input file vào form
                form.appendChild(fileInput);

                // Thêm form vào body và gửi đi
                document.body.appendChild(form);
                form.submit(); // Gửi form
            }
        });

        // Kích hoạt input file
        fileInput.click(); // Kích hoạt dialog chọn tệp
    });
</script>
<script>
function loadParcel(keyword, postParcel) {
    // Thay thế nội dung box-result bằng loading indicator
    $("#resultParcel").html(`
        <tr class="align-middle">
            <td class="text-center" colspan="12">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </td>
        </tr>
    `);

    $.ajax({
        url: `/admin/filterParcel?keyword=${encodeURIComponent(keyword)}&postParcel=${encodeURIComponent(postParcel)}`,
        method: 'GET',
        dataType: 'json', // Dữ liệu trả về là JSON
        success: function (response) {
            // Kiểm tra mã trạng thái
            if (response.status === 200) {
                // Cập nhật nội dung mới
                $("#resultParcel").html(response.data); // Cập nhật nội dung mới
            } else {
                // Hiển thị thông báo lỗi nếu có
                $("#resultParcel").html("<p>Không tìm thấy dữ liệu.</p>");
            }
        },
        error: function () {
            console.log("Đã có lỗi xảy ra.");
            $("#resultParcel").html("<p>Đã có lỗi khi tải dữ liệu.</p>"); // Thông báo lỗi
        }
    });
}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    function loadParcel(keyword, filterPostParcel, startDate, endDate, filterState) {
        // Thay thế nội dung box-result bằng loading indicator
        $("#resultParcel").html(`
            <tr class="align-middle">
                <td class="text-center" colspan="12">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </td>
            </tr>
        `);

        const url = `/admin/filterParcel?keyword=${encodeURIComponent(keyword)}` +
                    `&postParcel=${encodeURIComponent(filterPostParcel)}` +
                    `&start_date=${encodeURIComponent(startDate)}` +
                    `&end_date=${encodeURIComponent(endDate)}` +
                    `&filterState=${encodeURIComponent(filterState)}`;

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 200) {
                    $("#resultParcel").html(response.data); // Cập nhật nội dung mới
                } else {
                    $("#resultParcel").html("<p>Không tìm thấy dữ liệu.</p>");
                }
            },
            error: function () {
                console.log("Đã có lỗi xảy ra.");
                $("#resultParcel").html("<p>Đã có lỗi khi tải dữ liệu.</p>"); // Thông báo lỗi
            }
        });
    }

    // Biến để lưu trữ giá trị hiện tại
    let currentKeyword = '';
    let currentFilterPostParcel = 0; // Giá trị mặc định cho filterPostParcel
    let currentStartDate = ''; // Giá trị mặc định cho ngày bắt đầu
    let currentEndDate = ''; // Giá trị mặc định cho ngày kết thúc
    let currentFilterState = 0; // Giá trị mặc định cho filterState

    // Theo dõi sự kiện nhập liệu trong ô tìm kiếm
    $('input[name="searchParcel"]').on('input', function () {
        currentKeyword = $(this).val();
        loadParcel(currentKeyword, currentFilterPostParcel, currentStartDate, currentEndDate, currentFilterState);
    });

    // Theo dõi sự kiện thay đổi trong dropdown lọc đơn vị
    $('select[name="filterPostParcel"]').on('change', function () {
        currentFilterPostParcel = $(this).val(); // Lấy giá trị của dropdown
        loadParcel(currentKeyword, currentFilterPostParcel, currentStartDate, currentEndDate, currentFilterState);
    });

    // Theo dõi sự kiện thay đổi trong ô nhập ngày bắt đầu
    $('input[name="start_date"]').on('change', function () {
        currentStartDate = $(this).val();
        loadParcel(currentKeyword, currentFilterPostParcel, currentStartDate, currentEndDate, currentFilterState);
    });

    // Theo dõi sự kiện thay đổi trong ô nhập ngày kết thúc
    $('input[name="end_date"]').on('change', function () {
        currentEndDate = $(this).val();
        loadParcel(currentKeyword, currentFilterPostParcel, currentStartDate, currentEndDate, currentFilterState);
    });

    // Theo dõi sự kiện thay đổi trong dropdown lọc trạng thái
    $('select[name="filterState"]').on('change', function () {
        currentFilterState = $(this).val(); // Lấy giá trị của dropdown
        loadParcel(currentKeyword, currentFilterPostParcel, currentStartDate, currentEndDate, currentFilterState);
    });
});
</script>