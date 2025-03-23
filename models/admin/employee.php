<?php

function get_all_employee() {
    return pdo_query(
        'SELECT u.*, r.name_role
        FROM user u
        JOIN role r ON u.id_role = r.id_role'
    );
}

/**
 * Kiểm tra username đã tồn tại chưa
 * 
 * Trả về TRUE nếu tồn tại, FALSE là chưa tồn tại
 */
function check_exist_employee($username) {
    return pdo_query_value(
        'SELECT id_user 
        FROM user
        WHERE username = "'.$username.'"'
    );
}

function create_employee($full_name,$phone,$username,$password) {
    // mã hoá mật khẩu
    $password = md5($password);
    // thực thi sql
    pdo_execute(
        "INSERT INTO user (full_name,phone,username,password)
        VALUES (
        '".$full_name."',
        '".$phone."',
        '".$username."',
        '".$password."'
        )
    ");
}