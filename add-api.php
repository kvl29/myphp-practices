<?php
require __DIR__ . '/parts/db_connect.php';

$output = [
  "success" => false,
  "error" => "",
  "code" => 0,
  "postData" => $_POST,
  "errors" => [],
];

// TODO: 資料輸入之前, 要做檢查
# filter_var('bob@example.com', FILTER_VALIDATE_EMAIL)


$sql = "INSERT INTO `address_book`(`name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES (?, ?, ?, ?, ?, NOW() )";

$stmt = $pdo->prepare($sql);
$stmt->execute([
  $_POST['name'],
  $_POST['email'],
  $_POST['mobile'],
  $_POST['birthday'],
  $_POST['address'],
]);

// $stmt->rowCount(); # 新增幾筆
$output['success'] = boolval($stmt->rowCount());

header('Content-Type: application/json');

echo json_encode($output, JSON_UNESCAPED_UNICODE);
