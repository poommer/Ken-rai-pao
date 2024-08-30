    <?php
    require('../server/conn.php');
    session_start();
    // print_r($_GET)
    ?>
    <div id="modal">
        <div class="modal-container">
            <div class="modal-header">
                <h2>เพิ่มห้อง</h2>
                <a href="room.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
                </a>
            </div>

            <form action="../server/admin/room/createRoom.php" method="post">
            <div class="modal-body">
                    <?php print_r($_GET); 
                    ?>
                
                    
                    <div class="row" style="display:flex; gap:1rem;" >
                        <div class="group-inp" style="width:50%;">
                            <label for="id">รหัสห้อง</label>
                            <input type="text" name="id" id="id" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>
                        <div class="group-inp" style="width:50%;">
                            <label for="roomType">ประเภท</label>
                            <select name="roomType" id="roomType" style="width:100%;">
                                <option value="M">ห้องประชุม</option>
                                <option value="C">ห้องเรียน/ห้องปฏิบัติการ</option>
                                <option value="A">หอประชุม</option>
                            </select>
                        </div>
            


                    </div>

                    <div class="row" style="display:flex; gap:1rem;">
                        <div class="group-inp" style="width:100%;">
                            <label for="name">ชื่อห้อง</label>
                            <input type="text" name="name" id="name" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>


                    </div>

                    <div class="row" style="display:flex; gap:1rem;">
                        <div class="group-inp" style="width:25%;">
                            <label for="seats">ที่นั่ง</label>
                            <input type="text" name="seats" id="seats" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>
                        <div class="group-inp" style="width:25%;">
                            <label for="area">พื้นที่</label>
                            <input type="text" name="area" id="area" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>
                        <div class="group-inp" style="width:50%;">
                            <label for="open">เวลาเปิด - ปิด</label>
                            <input type="text" name="open" id="open" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>


                    </div>
                    <div class="row" style="display:flex; gap:1rem;">
                        <div class="group-inp" style="width:50%;">
                            <label for="location">ที่ตั่ง</label>
                            <input type="text" name="location" id="location" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>

                        <div class="group-inp" style="width:50%;">
                            <label for="detail">รายละเอียดอื่น ๆ </label>
                            <input type="text" name="detail" id="detail" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>


                    </div>

                    <div class="row" style="display:flex; gap:1rem;">
                        <div class="group-inp" style="width:100%;">
                            <label for="file_Image">ชื่อห้อง</label>
                            <input type="file" name="file_Image" id="file_Image" style="width:100%;" <?php echo $_GET['stt'] == 'view' ? 'disabled' : '' ?>>
                        </div>


                    </div>

            
    <div>
        <label for="fac" style="font-size:20px;">สิงอำนวยความสะดวก</label>
        <div>
            <p>
                <input type="checkbox" name="fac[]" id="" value="โต๊ะ/เก้าอี้">
                โต๊ะ/เก้าอี้
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="เครื่องเสียง/ไมค์โครโฟน">
                เครื่องเสียง/ไมค์โครโฟน
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="จอทีวี/โปรเจคเตอร์">
                จอทีวี/โปรเจคเตอร์ 
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="กระดานฟลิปชาร์ท">
               กระดานฟลิปชาร์ท
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="Smart Board">
                Smart Board
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="ระบบวิดีโอคอนเฟอเรนซ์">
                ระบบวิดีโอคอนเฟอเรนซ์
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="Wi-Fi">
                 Wi-Fi
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="ปลั๊กไฟ และ พอร์ต USB">
                ปลั๊กไฟ และ พอร์ต USB
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="คอมพิวเตอร์ หรือ แล็ปท็อป">
                คอมพิวเตอร์ หรือ แล็ปท็อป
            </p>
            <p>
                <input type="checkbox" name="fac[]" id="" value="อุปกรณ์พื้นฐานในห้องปฏิบัติการ">
                อุปกรณ์พื้นฐานในห้องปฏิบัติการ
            </p>
  
        </div>
    </div>

    
                </div>
                <div class="modal-footer" style=<?php echo $_GET['stt'] == 'view' ? 'display:none;' : '' ?>>
                    <a href="room.php" class="btn-light">ยกเลิก</a>
                    <button type="submit" class="btn">เพิ่ม</button>
                </div>
            </form>

        </div>
    </div>