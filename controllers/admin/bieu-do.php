<?php

# [MODEL]
model('admin','chart');

# [VARIABLE]
$type_show = 'ngay';
$dateRange = [];
$totalRange = [];

# [HANDLE]

// Lấy loại
if(isset($_GET['type_show']) && in_array($_GET['type_show'],['day','week','month','year'])) $type_show = $_GET['type_show'];
else view_error(404);

// Lấy ngày bắt đầu
if(isset($_GET['time_start']) && is_date($_GET['time_start'])) $timeStart = $_GET['time_start'];
else view_error(404);
// Show theo ngày
if($type_show == 'day') {

    // Nhận tham số từ URL và tạo đối tượng DateTime
    $startDay = new DateTime($_GET['time_start']); // Ngày bắt đầu
    $endDay = clone $startDay; // Tạo bản sao của ngày bắt đầu
    $endDay->modify('+30 days'); // Ngày kết thúc, thêm 30 ngày

    // Tạo mảng timeline
    $dateRange = []; // Khởi tạo mảng để lưu trữ các ngày
    while ($startDay <= $endDay) {
        $dateRange[] = $startDay->format('Y-m-d'); // Định dạng ngày và thêm vào mảng
        $startDay->modify('+1 day'); // Tăng thêm một ngày
    }

    // Kiểm tra kết quả
    test_array($dateRange); // In ra mảng các ngày

    // Lặp theo mảng state
    foreach (ARR_STATE_POST as $state) {
        // Tạo mảng data theo state
        $array_count_state[$state['name']] = [];
        // Lặp theo timeline
        foreach ($dateRange as $date) {
            $array_count_state[$state['name']][] = pdo_query_value(
                'SELECT COUNT(*)
                FROM parcel
                WHERE date_sent = "'.$date.'"
                AND state_parcel = "'.$state['name'].'"'
            );
        }
    }

    // Lặp theo timeline lấy tổng count
    foreach ($dateRange as $date) {
        $totalRange[] = pdo_query_value(
            'SELECT COUNT(*)
            FROM parcel
            WHERE date_sent = "'.$date.'"'
        );
    }


}

// test_array($query);

# [DATA]
$data = [
    'array_count_state' => $array_count_state,
    'dateRange' => $dateRange,
];

# [RENDER]
view('admin','Thống kê','dashboard',$data);