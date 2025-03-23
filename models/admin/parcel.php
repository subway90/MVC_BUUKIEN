<?php

/**
 * Lấy danh sách bưu kiện
 * @return array
 */
function get_all_parcel() {
    return pdo_query(
        'SELECT *
        FROM parcel p'
    );
}

function get_parcel_with_id($id) {
    return pdo_query_one(
        'SELECT *
        FROM parcel p
        WHERE id_parcel ="'.$id.'"'
    );
}

function create_parcel($id_parcel,$brand_post,$id_user,$date_sent,$name_receiver,$phone_receiver,$address_receiver,$fee,$cod,$name_product,$state_parcel,$note) {
    // custom
    (!$id_user) ? $id_user = "NULL" :  $id_user = "'".$id_user."'";
    if(!$fee)  $fee = "0";
    if(!$cod) $cod = "0";
    (!$note) ? $note = "NULL" : $note = "'".$note."'";

    // thực thi sql
    pdo_execute(
        "INSERT INTO parcel (id_parcel, brand_post,id_user,date_sent,name_receiver,phone_receiver,address_receiver,fee,cod,name_product,state_parcel,note)
        VALUES (
        '".$id_parcel."',
        '".$brand_post."',
        ".$id_user.",
        '".$date_sent."',
        '".$name_receiver."',
        '".$phone_receiver."',
        '".$address_receiver."',
        ".$fee.",
        ".$cod.",
        '".$name_product."',
        '".$state_parcel."',
        ".$note."
        )
    ");
}

function update_state_parcel($id_parcel,$new_state) {
    // thực thi sql
    pdo_execute(
        "UPDATE parcel 
        SET 
        state_parcel = '".$new_state."'
        WHERE id_parcel = '".$id_parcel."'
    ");
}

function update_parcel($id_parcel,$brand_post,$id_user,$date_sent,$name_receiver,$phone_receiver,$address_receiver,$fee,$cod,$note,$state_parcel) {
    pdo_execute(
        "UPDATE parcel 
        SET 
        brand_post = '".$brand_post."',
        id_user = '".$id_user."',
        date_sent = '".$date_sent."',
        name_receiver = '".$name_receiver."',
        phone_receiver = '".$phone_receiver."',
        address_receiver = '".$address_receiver."',
        fee = ".$fee.",
        cod = ".$cod.",
        note = '".$note."',
        state_parcel = '".$state_parcel."'
        WHERE id_parcel = '".$id_parcel."'
    ");
}

function delete_parcel_with_id($id_parcel) {
    pdo_execute(
        "DELETE FROM parcel WHERE id_parcel = '".$id_parcel."'
    ");
}

function compare_parcel($id_parcel,$new_fee,$new_cod,$new_state) {
    // Lấy parcel
    $get_old = pdo_query_one(
        'SELECT *
        FROM parcel
        WHERE id_parcel = "'.$id_parcel.'"'
    );
    // Trả false nếu không tìm thấy
    if(!$get_old) return false;

    // So sánh
    $reason = [];
    if($get_old['fee'] != $new_fee) $reason[] =  'Thay đổi phí gửi';
    if($get_old['cod'] != $new_cod) $reason[] = 'Thay đổi tiền COD';
    if($get_old['state_parcel'] != $new_state ) $reason[] = 'Thay đổi trạng thái';

    // gộp
    if(!empty($reason)) $reason = implode(', ',$reason);
    else $reason = null;
    

    // Trả data
    return [
        'id_parcel' => $id_parcel,
        'old_fee' => $get_old['fee'],
        'new_fee' => $new_fee,
        'old_cod' => $get_old['cod'],
        'new_cod' => $new_cod,
        'old_state' => $get_old['state_parcel'],
        'new_state' => $new_state,
        'reason' => $reason,
    ];

}