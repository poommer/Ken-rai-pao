<?php

use function PHPSTORM_META\type;

    try{
        
require('conn.php');
session_start();

function check_dateTime($roomId, $date, $start){
    require('conn.php');
    $sql = "SELECT * FROM `booking` WHERE `bk_roomID` = ?  AND `bk_date` = ? AND ? BETWEEN `bk_timeStart` AND `bk_timeEnd`;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $roomId, $date, $start);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 0){
        return true ;
    }else{
        return false ;
    }

}

$id = $_POST['id'];
$title = $_POST['title'];
$attendee = $_POST['attendee'];
$date = $_POST['date'];
$stTime = $_POST['stTime'];
$endTime = $_POST['endTime'];
$note = $_POST['note'];
$userID = $_SESSION['user_ID'];

// print_r($_POST);
$dateOBJ = new DateTime($date);
$stTimeOBJ = new DateTime($stTime);
$endTimeOBJ = new DateTime($endTime);

$dateOBJ = date_format($dateOBJ, 'ymd');
$stTimeOBJ = $stTimeOBJ->format('Hi');
$endTimeOBJ = $endTimeOBJ->format('Hi');
// $date = $date->setTimeZone($date);

$booking_ID = $id.$dateOBJ.$stTimeOBJ.$endTimeOBJ;
echo $booking_ID.'<br>' ;

$checkStart = check_dateTime($id, $date, $stTime);
print_r([$booking_ID, $id, $userID, $date, $stTime, $endTime, $title, $attendee, $note]);
echo $checkStart ? 'สามารถจองได้' : 'มีคนจองแล้ว';
if($checkStart){
        $sql = "INSERT INTO `booking`(`bk_id`,  `bk_userID`, `bk_roomID`, `bk_date`, `bk_timeStart`, `bk_timeEnd`, `bk_title`, `bk_attendee`, `bk_note`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $booking_ID, $userID, $id, $date, $stTime, $endTime, $title, $attendee, $note);
        $result = $stmt->execute();
        print_r($result);
        echo $result ;
        echo 'Error: ' . $stmt->error;
        if($result){
            $_SESSION['msg_success'] = 'จองห้องประชุมแล้ว';
        }else{
            $_SESSION['msg_err'] = 'เกิดข้อผิดพลาด กรุณาลองอีกครั้ง';
        }
    
        
    }
    
    header('location: ../');
    }catch(Exception $e){
        
    }

?>
