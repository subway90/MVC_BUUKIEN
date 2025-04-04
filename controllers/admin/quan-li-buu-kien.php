<?php

# [AUTHOR]

# [MODEL]
model('admin','parcel');
model('admin','employee');

# [VARIABLE]
$error_valid = []; // mảng lỗi valid
$show_modal = '';
$username = auth('username');
$id_parcel = $brand_post = $date_sent = $name_receiver = $phone_receiver = $province_receiver = $address_receiver = $note = $state_parcel = $name_product = '';
$fee = $cod = 0;

# [HANDLE]

// Thêm parcel mới
if(isset($_POST['addParcel'])) {
    // lấy input
    if(isset($_POST['id_parcel'])) $id_parcel = clear_input($_POST['id_parcel']);
    if(isset($_POST['username'])) $username = clear_input($_POST['username']);
    if(isset($_POST['brand_post'])) $brand_post = clear_input($_POST['brand_post']);
    if(isset($_POST['date_sent'])) $date_sent = clear_input($_POST['date_sent']);
    if(isset($_POST['name_receiver'])) $name_receiver = clear_input($_POST['name_receiver']);
    if(isset($_POST['phone_receiver'])) $phone_receiver = clear_input($_POST['phone_receiver']);
    if(isset($_POST['address_receiver'])) $address_receiver = clear_input($_POST['address_receiver']);
    if(isset($_POST['province_receiver'])) $province_receiver = clear_input($_POST['province_receiver']);
    if(isset($_POST['fee'])) $fee = clear_input($_POST['fee']);
    if(isset($_POST['cod'])) $cod = clear_input($_POST['cod']);
    if(isset($_POST['name_product'])) $name_product = clear_input($_POST['name_product']);
    if(isset($_POST['note'])) $note = clear_input($_POST['note']);
    if(isset($_POST['state_parcel'])) $state_parcel = clear_input($_POST['state_parcel']);

    // validate
    if(!$id_parcel) $error_valid[] = 'Vui lòng nhập Mã bưu kiện';
    if(!$brand_post) $error_valid[] = 'Vui lòng chọn đơn vị chuyển phát';
    if(!$date_sent) $error_valid[] = 'Vui lòng chọn ngày gửi';
    if(!$name_receiver) $error_valid[] = 'Vui lòng nhập tên người nhận';
    if(!$phone_receiver) $error_valid[] = 'Vui lòng nhập SĐT người nhận';
    if(!$address_receiver) $error_valid[] = 'Vui lòng nhập địa chỉ người nhận';
    if(!$name_product) $error_valid[] = 'Vui lòng nhập tên sản phẩm';
    if(!$state_parcel) $error_valid[] = 'Vui lòng chọn trạng thái bưu kiện';

    // nếu hợp lệ
    if (!$error_valid) {
        // insert
        create_parcel($id_parcel,$brand_post,$username,$date_sent,$name_receiver,$phone_receiver,$address_receiver,$province_receiver,$fee,$cod,$name_product,$state_parcel,$note);
        // thông báo
        toast_create('success','Thêm mới thành công');
        // chuyển route
        route('admin/quan-li-buu-kien');
    }
    // báo lỗi
    else $show_modal = 'modalAddParcel'; // bật modal lên
}

// Sửa parcel
if(isset($_POST['editParcel'])) {
    
    // lấy input
    if(isset($_POST['id_parcel'])) $id_parcel = clear_input($_POST['id_parcel']);
    if(isset($_POST['username'])) $username = clear_input($_POST['username']);
    if(isset($_POST['brand_post'])) $brand_post = clear_input($_POST['brand_post']);
    if(isset($_POST['date_sent'])) $date_sent = clear_input($_POST['date_sent']);
    if(isset($_POST['name_receiver'])) $name_receiver = clear_input($_POST['name_receiver']);
    if(isset($_POST['phone_receiver'])) $phone_receiver = clear_input($_POST['phone_receiver']);
    if(isset($_POST['address_receiver'])) $address_receiver = clear_input($_POST['address_receiver']);
    if(isset($_POST['province_receiver'])) $province_receiver = clear_input($_POST['province_receiver']);
    if(isset($_POST['fee'])) $fee = clear_input($_POST['fee']);
    if(isset($_POST['cod'])) $cod = clear_input($_POST['cod']);
    if(isset($_POST['name_product'])) $name_product = clear_input($_POST['name_product']);
    if(isset($_POST['note'])) $note = clear_input($_POST['note']);
    if(isset($_POST['state_parcel'])) $state_parcel = clear_input($_POST['state_parcel']);

    // validate
    if(!$id_parcel) $error_valid[] = 'Vui lòng nhập Mã bưu kiện';
    if(!$brand_post) $error_valid[] = 'Vui lòng chọn đơn vị chuyển phát';
    if(!$name_receiver) $error_valid[] = 'Vui lòng nhập tên người nhận';
    if(!$phone_receiver) $error_valid[] = 'Vui lòng nhập SĐT người nhận';
    if(!$address_receiver) $error_valid[] = 'Vui lòng nhập địa chỉ người nhận';
    if(!$state_parcel) $error_valid[] = 'Vui lòng chọn trạng thái bưu kiện';

    // nếu hợp lệ
    if (!$error_valid) {
        // insert
        update_parcel(false,$id_parcel,$brand_post,$username,$date_sent,$name_receiver,$phone_receiver,$address_receiver,$province_receiver,$fee,$cod,$note,$state_parcel);
        // thông báo
        toast_create('success','Cập nhật thành công');
        // chuyển route
        route('admin/quan-li-buu-kien');
    }
    // báo lỗi
    else $show_modal = 'modalEditParcel'; // bật modal lên
}

# [DATA]
$data = [
    'list_parcel' => get_all_parcel(),
    'list_employee' => get_all_employee(),
    'error_valid' => $error_valid,
    'brand_post' => $brand_post,
    'id_parcel' => $id_parcel,
    'username' => $username,
    'date_sent' => $date_sent,
    'name_receiver' => $name_receiver,
    'phone_receiver' => $phone_receiver,
    'address_receiver' => $address_receiver,
    'fee' => $fee,
    'cod' => $cod,
    'name_product' => $name_product,
    'note' => $note,
    'state_parcel' => $state_parcel,
    'province_receiver' => $province_receiver,
    'show_modal' => $show_modal,
];

# [RENDER]
view('admin','Quản lí bưu kiện','parcel',$data);