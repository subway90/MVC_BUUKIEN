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
        '".$state_parcel."'
        )'
    ");
}