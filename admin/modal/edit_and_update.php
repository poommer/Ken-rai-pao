<?php
require('../server/conn.php');
session_start();
// print_r($_GET)
?>
<div id="modal">
    <div class="modal-container">
        <div class="modal-header">
            <h2><?php echo $_GET['stt'] == 'edit' ? 'แก้ไขผู้ใช้' : 'รายละเอียด' ?></h2>
            <a href="user.php">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
            </a>
        </div>

        <form <?php echo $_GET['stt'] == 'edit' ? 'action="../server/admin/user/editUser.php"' : '' ?>  method="post">
        <div class="modal-body">
                <?php 
                if($_GET['stt'] != 'create'): ?>

                    <?php
                    $result = $conn->query('SELECT * FROM user WHERE u_id = '.$_GET['id'].'');

                    
                    
                    while ($row = $result->fetch_assoc()) {
                
                        
                ?>
                <div class="row" style="display:flex; gap:1rem;">
                    <div class="group-inp">
                        <label for="Tname">ชื่อจริง</label>
                        <select name="Tname" id="Tname" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_titleName'] : '' ?>>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                    <div class="group-inp" style="width:40%;">
                        <label for="Fname">ชื่อจริง</label>
                        <input type="text" name="Fname" id="Fname" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_Fname'] : '' ?>>
                    </div>
                    <div class="group-inp" style="width:40%;">
                        <label for="Lname">นามสกุล</label>
                        <input type="text" name="Lname" id="Lname" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_Lname'] : '' ?>>
                    </div>


                </div>

                <div class="row" style="display:flex; gap:1rem;">

                    <div class="group-inp" style="width:50%;">
                        <label for="code">รหัสประจำตัว</label>
                        <input type="text" name="code" id="code" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_id'] : '' ?>>
                    </div>
                    <div class="group-inp" style="width:50%;">
                        <label for="department">แผนก</label>
                        <input type="text" name="department" id="department" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_dep'] : '' ?>>
                    </div>



                </div>
                <div class="row" style="display:flex; gap:1rem;">

                    <div class="group-inp" style="width:50%;">
                        <label for="tel">เบอร์โทร</label>
                        <input type="tel" name="tel" id="tel" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_tel'] : '' ?>>
                    </div>
                    <div class="group-inp" style="width:50%;">
                        <label for="line">ไลน์</label>
                        <input type="text" name="line" id="line" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_line'] : '' ?>>
                    </div>



                </div>
                <div class="row" style="display:flex; gap:1rem;">

                    <div class="group-inp" style="width:50%;">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_email'] : '' ?>>
                    </div>
                    <div class="group-inp" style="width:50%;">
                        <label for="password">รหัสผ่าน</label>
                        <input type=<?php echo $_GET['stt'] == 'view' ? 'text' : 'password' ?> name="password" id="password" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?> value=<?php echo $_GET['stt'] != 'create' ? $row['u_password'] : '' ?>>
                    </div>

<?php } ?>
<?php endif ?>

                </div>
            </div>
            <div class="modal-footer" style=<?php echo $_GET['stt'] == 'view' ? 'display:none;' : '' ?>>
                <a href="user.php" class="btn-light">ยกเลิก</a>
                <button type="submit" class="btn">แก้ไข</button>
            </div>
        </form>

    </div>
</div>