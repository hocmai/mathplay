<?php
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header("Content-Disposition: attachment; filename=".'Export_file_data_'.rand().".csv");
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache");
header("Expires: 0");
echo "\xEF\xBB\xBF"; // UTF-8 BOM
require_once('db.php');

function outputCSV($data)
{
    $output = fopen("php://output", "w");
    fputs($output, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
    foreach ($data as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
   exit();
}
$data_output=array();
$data_output[]=array("Họ tên","Email","Điện thoại","Tỉnh Thành","Ngày đăng ký [Năm - tháng - ngày]");
$rows=mysql_query('select name,email,phone,address,created_date from tbl_data');
while ($row = mysql_fetch_assoc($rows))
    $data_output[]=$row;
outputCSV($data_output);
