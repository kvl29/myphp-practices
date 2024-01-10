<?php
require __DIR__ . '/admin-required.php';
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


$birthday = empty($_POST['birthday'])? null : $_POST ['birthday'];
$birthday = strtotime($birthday);
if($birthday===false){
    $birthday = null;
}else{
    $birthday = date('Y-m-d', $birthday);   
}

try{
    $stmt->execute([
        $_POST['name'],
        $_POST['email'],
        $_POST['mobile'],
        $birthday,
        $_POST['address'],
      ]);
      

}catch(PDOException $e){
    $output['error'] = 'SQL有東西出錯了'. $e->getMessage();
}


// $stmt->rowCount(); # 新增幾筆
$output['success'] = boolval($stmt->rowCount());
$output['lastInsertId'] = $pdo -> lastInsertId();//取的最新資料的ＰＫ

header('Content-Type: application/json');

echo json_encode($output, JSON_UNESCAPED_UNICODE);
