<?php
 require('../../conn.php');
 session_start();

// print_r($_POST);

function upload_image($file,$room,$roomid){
    $tmp =  $file['tmp_name'];
    $fileName = $roomid.'.webp';
    $path = '../../../static/room/'.$room.'/'.$fileName;

    if(move_uploaded_file($tmp, $path)){
        return true ;
    }else{
        return false;
    }

    
}

$id = $_POST['id'];
$name = $_POST['name'];
$seats = $_POST['seats'];
$area = $_POST['area'];
$open = $_POST['open'];
$location = $_POST['location'];
$detail = $_POST['detail'];
$fac = $_POST['fac'];
$type = $_POST['roomType'];
$file = $_FILES['Image'];


if(upload_image($file,$type,$id)){
    $sql = 'INSERT INTO `room`(`room_id`, `room_name`, `room_seats`, `room_areaSize`, `room_OpeningTime`, `room_location`, `room_detail`, `room_type`) VALUES (?,?,?,?,?,?,?,?)';

$stmt = $conn->prepare($sql);

$stmt->bind_param('ssssssss', $id, $name, $seats, $area, $open, $location, $detail, $type);

$result = $stmt->execute();

if($result){
    $sql_fac = 'INSERT INTO `facilitate`(`fac_roomID`, `fac_name`) VALUES (?,?)';
    
    $stmt_fac = $conn->prepare($sql_fac);
    
    foreach($fac as $item){
        $stmt_fac->bind_param('ss', $id, $item);
        
        $result_fac = $stmt_fac->execute();
    }
    $_SESSION['msg_success'] = 'เพิ่มห้องใหม่สำเร็จ';

}else{
    $_SESSION['msg_err'] = 'เกิดข้อผิดพลาด ไม่สามารถเพิ่มห้องได้';
}

}else{
    $_SESSION['msg_err'] = 'เกิดข้อผิดพลาด ไม่สามารถเพิ่มห้องได้';
}

header('location: ../../../admin/room.php')
?>