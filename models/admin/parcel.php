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