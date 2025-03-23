<?php

# [MODEL]
model('admin','employee');

# [VARIABLE]
$username = $full_name = $phone =  $show_modal = '';
$error_valid = [];

# [HANDLE]
// Thêm nhân viên mới
if(isset($_POST['addEmployee'])) {
    
    // lấy input
    if(isset($_POST['full_name'])) $full_name = clear_input($_POST['full_name']);
    if(isset($_POST['phone'])) $phone = clear_input($_POST['phone']);
    if(isset($_POST['username'])) $username = clear_input($_POST['username']);
    if(isset($_POST['password'])) $password = clear_input($_POST['password']);

    // validate
    if(!$full_name) $error_valid[] = 'Vui lòng nhập họ tên';
    if(!$phone) $error_valid[] = 'Vui lòng nhập số điện thoại';
    if(!$username) $error_valid[] = 'Vui lòng nhập username';
    if(!$password) $error_valid[] = 'Vui lòng nhập mật khẩu';
    if(check_exist_employee($username)) $error_valid[] = 'Username này đã được đăng kí';

    // nếu hợp lệ
    if (empty($error_valid)) {
        // insert
        create_employee($full_name,$phone,$username,$password);
        // thông báo
        toast_create('success','Thêm mới thành công');
        // chuyển route
        route('admin/quan-li-nhan-vien');
    }
    // báo lỗi
    else $show_modal = 'modalAddEmployee'; // bật modal lên
}

# [DATA]
$data = [
    'full_name' => $full_name,
    'phone' => $phone,
    'username' => $username,
    'show_modal' => $show_modal,
    'error_valid' => $error_valid,
];

# [RENDER]
view('admin','Quản lí nhân viên','nhan-vien',$data);