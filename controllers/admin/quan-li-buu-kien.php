<?php

# [AUTHOR]

# [MODEL]
model('admin','parcel');

# [VARIABLE]

# [HANDLE]

# [DATA]
$data = [
    'list_parcel' => get_all_parcel(),
];

# [RENDER]
view('admin','Quản lí bưu kiện','parcel',$data);