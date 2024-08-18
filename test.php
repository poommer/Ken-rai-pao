<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
    <link rel="shortcut icon" href="static/logo-ken_rai_pao 2.png" type="image/x-icon">
     <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <!-- 
    <title> <?php
        // session_start();
        // echo isset($_SESSION['user_ID']) ? 'homepage' : 'login'?> | ken rai pao</title>
    <script src="script.js"></script>
</head>
<body>
    <div class="container">
        
        <a href="back-end/logout.php">logout</a>
        <?php
        // unset($_SESSION['ID']);
        // unset($_SESSION['name']);
        // if(isset($_SESSION['user_ID'])){
        //     if($_SESSION['user_role'] == 'admin'){
        //         require('admin/homepage.php');
        //     }else if($_SESSION['user_role'] == 'user'){
        //         require('user/homepage.php');
        //     }
        //     // echo'Login success! <br>'. $_SESSION['user_role'];
        // }else{
        // print_r($_SESSION);
        //     require('login.php');
        // }

?>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html>

<!-- <head>
   <title>how to create full calendar in jquery</title> -->
     <!-- 
</head> -->

<body>
  <!-- <h1>How to create searchable select box</h1> -->
  <div id="calendar"></div>
</body>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script> <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      locale: 'th',
      timeZone: 'Asia/Bangkok',
      // initialView: 'timeGridWeek',
      eventTimeFormat: { // like '14:30:00'
        hour12: true
      },
      headerToolbar: {
        left: 'prev,next',
        center: 'title',
         right: 'timeGridWeek,timeGridDay,dayGridMonth'
      },
     
      events: [
        {
          title  : 'event1',
          start  : '2024-08-01'
        },
        {
          
          title  : 'meetting room1 @sale department',
          start  : '2024-08-18T08:30:00',
          end    : '2024-08-20T16:30:00',
          description: 'Lecture',
          color: 'red'
        },
        {
          title  : 'event2.5',
          start  : '2024-08-16T19:30:00',
          end    : '2024-08-16T21:00:00',
           allDay : false
        },
        {
          title  : 'event3',
          start  : '2024-08-09T01:30:00',
          allDay : true // will make the time show
        }
      ]
    });

    calendar.render();
  });
</script>

</html>