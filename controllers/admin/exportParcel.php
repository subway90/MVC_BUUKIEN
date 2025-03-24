<?php

# [MODEL]
model('admin', 'parcel');
require 'vendor/autoload.php'; // Đảm bảo đường dẫn đúng đến autoload.php của Composer

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['exportParcel'])) {
    // Giả sử $data_export đã được lấy từ cơ sở dữ liệu
    $data_export = get_all_parcel();

    if (!$data_export || count($data_export) == 0) {
        echo "Không có dữ liệu để xuất.";
        exit;
    }

    // Tạo một Spreadsheet mới
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Đặt tiêu đề cho dòng đầu tiên
    $headers = [
        'Mã bưu điện', 'Chuyển phát', 'Mã nhân viên', 'Ngày gửi',
        'Người nhận', 'Ngày nhận', 'Điện thoại', 'Địa chỉ', 'Phí gửi',
        'COD', 'Sản phẩm', 'Trạng thái', 'Ghi chú'
    ];
    $sheet->fromArray($headers, null, 'A1');

    // Thêm dữ liệu vào tệp Excel
    $rowIndex = 2; // Bắt đầu từ dòng 2
    foreach ($data_export as $data) {
        $sheet->setCellValue("A$rowIndex", $data['id_parcel']);
        $sheet->setCellValue("B$rowIndex", $data['brand_post']);
        $sheet->setCellValue("C$rowIndex", $data['username']);
        $sheet->setCellValue("D$rowIndex", $data['date_sent']);
        $sheet->setCellValue("E$rowIndex", $data['name_receiver']); // Thêm người nhận
        $sheet->setCellValue("F$rowIndex", $data['date_received'] ?? ''); // Ngày nhận có thể không có
        $sheet->setCellValue("G$rowIndex", $data['phone_receiver']);
        $sheet->setCellValue("H$rowIndex", $data['address_receiver']);
        $sheet->setCellValue("I$rowIndex", $data['fee']);
        $sheet->setCellValue("J$rowIndex", $data['cod']);
        $sheet->setCellValue("K$rowIndex", $data['name_product']);
        $sheet->setCellValue("L$rowIndex", $data['state_parcel']);
        $sheet->setCellValue("M$rowIndex", $data['note']);
        $rowIndex++;
    }

    // Thiết lập độ rộng cho từng cột
    $columnWidths = [
        'A' => 20, // Mã bưu điện
        'B' => 30, // Chuyển phát
        'C' => 20, // Mã nhân viên
        'D' => 15, // Ngày gửi
        'E' => 20, // Người nhận
        'F' => 15, // Ngày nhận
        'G' => 15, // Điện thoại
        'H' => 30, // Địa chỉ
        'I' => 15, // Phí gửi
        'J' => 15, // COD
        'K' => 30, // Sản phẩm
        'L' => 20, // Trạng thái
        'M' => 30, // Ghi chú
    ];

    foreach ($columnWidths as $column => $width) {
        $sheet->getColumnDimension($column)->setWidth($width);
    }

    // Đặt tiêu đề cho file tải về
    $filename = "export_parcel_" . date('d_m_Y_H_i_s') . ".xlsx";
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    // Ghi tệp và gửi đến trình duyệt
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
}