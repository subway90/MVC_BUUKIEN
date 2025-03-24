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