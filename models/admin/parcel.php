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
        WHERE id_parcel ='.$id
    );
}

function create_parcel($id_parcel,$brand_post,$id_user,$date_sent,$name_receiver,$phone_receiver,$address_receiver,$fee,$cod,$note,$state_parcel) {
    pdo_execute(
        "INSERT INTO parcel (id_parcel, brand_post,id_user,date_sent,name_receiver,phone_receiver,address_receiver,fee,cod,note,state_parcel)
        VALUES (
        '".$id_parcel."',
        '".$brand_post."',
        '".$id_user."',
        '".$date_sent."',
        '".$name_receiver."',
        '".$phone_receiver."',
        '".$address_receiver."',
        ".$fee.",
        ".$cod.",
        '".$note."',
        '".$state_parcel."
        )'
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