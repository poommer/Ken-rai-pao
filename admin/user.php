<?php
require('../server/conn.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../static/logo.png" type="image/x-icon">
     <link rel="stylesheet" href="../style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="head-logo" style="width:100%; border-bottom-right-radius:0 ;">
            <img src="../static/logo.png" alt="" style="width:5rem;">
            <div class="head-text">
                <h2>MCR booking</h2>
                <small>for admin</small>
            </div>
        </div>

        <main>

<?php
    if (isset($_SESSION['msg_err'])) {
echo '
<h3 style="    background: #ffe6e6;color: #b90000;padding: .5rem; border-radius: .5rem;border: solid 1px;display:flex; align-items:center;">
               <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#b90000">
                    <path d="m40-120 440-760 440 760H40Zm138-80h604L480-720 178-200Zm302-40q17 0 28.5-11.5T520-280q0-17-11.5-28.5T480-320q-17 0-28.5 11.5T440-280q0 17 11.5 28.5T480-240Zm-40-120h80v-200h-80v200Zm40-100Z"/>
                </svg> 
                "'.$_SESSION["msg_err"].'"
                </h3>
                ';
                unset($_SESSION['msg_err']);
    }else if(isset($_SESSION['msg_success'])){
        echo '
        <h3 style="    background: #e9ffe6;color: #0ab900;padding: .5rem; border-radius: .5rem;border: solid 1px;display:flex; align-items:center;">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0ab900"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q65 0 123 19t107 53l-58 59q-38-24-81-37.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q133 0 226.5-93.5T800-480q0-18-2-36t-6-35l65-65q11 32 17 66t6 70q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm-56-216L254-466l56-56 114 114 400-401 56 56-456 457Z"/></svg>
                
                '.$_SESSION["msg_success"].'
            </h3>

';
unset($_SESSION['msg_success']);
    }

    
    ?>
            


            <div class="header-compo">
                <h1>สมาชิก</h1>
                <a href="?stt=create" class="btn">เพิ่ม</a>
            </div>
            <hr>

            <div class="user-show">
            <?php
            $result = $conn->query('SELECT * FROM user');
            
            while ($row = $result->fetch_assoc()) {
            
            ?>
    <div class="user-detail">
        <small style="display:flex; justify-content:space-between; align-items:center;">
            <?php echo $row['u_dep']?>
            
            <a href=<?php echo  '../server/admin/user/delete.php?id='.$row['u_id'] ?>>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
            </a>
            
    </small>
    <div style="display:flex; align-items:center;">
        <a href=<?php echo '?stt=view&id='.$row['u_id'] ?>>

            <h3 style="display:flex; align-items:center;  color:#8030F5;">
                <?php echo $row['u_titleName'].$row['u_Fname'].' '.$row['u_Lname'] ?>
                
            </h3> 
        </a>
            <a href=<?php echo '?stt=edit&id='.$row['u_id'] ?>>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#8030F5"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
            </a>
    </div>
        
        <p style="display:flex; align-items:center;">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#8C1AF6"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg>
            <?php echo $row['u_email']?>
        </p>
        <p style="display:flex; align-items:center;">
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#8C1AF6"><path d="M280-40q-33 0-56.5-23.5T200-120v-720q0-33 23.5-56.5T280-920h400q33 0 56.5 23.5T760-840v720q0 33-23.5 56.5T680-40H280Zm0-120v40h400v-40H280Zm0-80h400v-480H280v480Zm0-560h400v-40H280v40Zm0 0v-40 40Zm0 640v40-40Z"/></svg>
            <?php echo$row['u_tel']?>
        </p>
    </div>
           

            <?php } ?>
            </div>
        </main>

      <?php
      if(isset($_GET['stt'])) {
        if($_GET['stt'] == 'create'){
            require('modal/createUser.php');
        }else if( $_GET['stt'] == 'edit' || $_GET['stt'] == 'view'){
            require('modal/edit_and_update.php');

        }
    }
      

      ?>

        <nav>
            <ul>
                <li><a href="room.php">room</a></li>
                <li><a href="user.php">user</a></li>
                <li><a href="booking.php">booking</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>