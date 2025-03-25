<?php

function render_row_parcel($data) {
    extract($data);
    $id_parcel_after = "'".$id_parcel."'";
    //format state
    foreach (ARR_STATE_POST as $state){ extract($state);
        if(strtolower(trim($name)) === strtolower(trim($state_parcel))) {
            $label_state = '<span class="p-2 small d-block text-center" style="background-color : '.$color.'">'.$name.'</span>';
        }
    }
    // format ngày
    if($date_sent == '0000-00-00') $date_sent = null;

    //return
    return <<<HTML
    <tr class="small" onclick="getOnePost({$id_parcel_after})">
        <td class="small align-middle text-center">
            {$id_parcel}
        </td>
        <td class="small align-middle text-center">
            {$brand_post}
        </td>
        <td class="small align-middle text-center">
            {$username}
        </td>
        <td class="small align-middle text-center">
            {$date_sent}
        </td>
        <td class="small align-middle text-center">
            {$name_receiver}
        </td>
        <td class="small align-middle text-center">
            {$phone_receiver}
        </td>
        <td class="small align-middle text-center">
            {$address_receiver}
        </td>
        <td class="small align-middle text-center">
            {$fee}
        </td>
        <td class="small align-middle text-center">
            {$cod}
        </td>
        <td class="small align-middle text-center">
            {$name_product}
        </td>
        <td class="small align-middle text-center text-light">
            {$label_state}
        </td>
        <td class="small align-middle text-center">
            {$note}
        </td>
    </tr>
    HTML;
}

function render_row_empty() {
    return <<<HTML
    <tr class="align-middle">
        <td class="text-center" colspan="12">
            Không tìm thấy kết quả tìm kiếm
        </td>
    </tr>
    HTML;
}

function render_paginate_parcel($total_row, $page_active) {
    // khởi tạo
    $content = '';
    // tính tổng số lần trang
    $total_page = ceil($total_row/LIMIT_ROW_PAGINATE);

    // Render trang trước
        if($page_active == 1 ) {
            $state_before_page = '-disabled';
            $value_before_page = 0;
        }
        else {
            $state_before_page = '';
            $value_before_page = $page_active - 1;
        }
        $content .= <<<HTML
        <button value=" {$value_before_page}" class="btn-paginate sa-toolbar-user btn-sm bg-primary small fw-normal text-light rounded-0 bg-blue-light{$state_before_page}">
            <small>Trước</small>
        </button>
        HTML;

    //return
    for ($i=1; $i <= $total_page; $i++) {
        // format
        if($i == $page_active) {
            $state_inner_page = '-active';
            $value_inner_page = 0;
        }else {
            $state_inner_page = '';
            $value_inner_page = $i;
        };

        // render
        $content .= <<<HTML
        <button value="{$value_inner_page}" class="btn-paginate sa-toolbar-user btn-sm bg-primary small fw-normal text-light rounded-0 bg-blue-light{$state_inner_page}">
            <small>{$i}</small>
        </button>
        HTML;
    };

    // Render trang sau
    if($total_page > 1) {
        if($page_active == $total_page ) {
            $state_after_page = '-disabled';
            $value_after_page = 0;
        }
        else {
            $state_after_page = '';
            $value_after_page = $page_active + 1;
        }
        
        $content .= <<<HTML
        <button value="{$value_after_page}" class="btn-paginate sa-toolbar-user btn-sm bg-primary small fw-normal text-light rounded-0 bg-blue-light{$state_after_page}">
            <small>Sau</small>
        </button>
        HTML;
    
        return $content;
    };
}