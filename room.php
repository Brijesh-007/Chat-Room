<?php

include 'db_connect.php';

$roomName = $_GET['room_name'];
$username = $_GET['username'];


$query = "SELECT * FROM `claimed_rooms` WHERE room_name = '$roomName'";
$result = mysqli_query($conn, $query);

if($result){
    if(mysqli_num_rows($result) == 0){
        $msg = "room doesn't exist...first create room";
        echo  "<script language = 'javascript'>";
        echo  "alert('$msg');";
        echo  'window.location="./home2.php";';
        echo  "</script>";
    }
    else{
    }
}
else{
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link href="product.css" rel="stylesheet">
<style>
body {
  background: rgb(54, 54, 63);
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyClass{
    height: 350px;
    overflow-y: auto;
    scroll-behavior: revert;
}
</style>
</head>
<body>
<div style="background-color: black;">


</div>
<!-- <header class="site-header sticky-top py-1"> -->
<!-- </header> -->
<br>
<h2 style="color: whitesmoke;">Chat Messages - <?php echo $roomName ?></h2>
<h2 style="color: whitesmoke;"><?php echo $_GET['username'] ?></h2>
  <form action="login.php" method="get">
  <!-- <input type="submit" value="Logout"> -->
  <button class="btn btn-outline-secondary" href="#" style="background-color: lightskyblue;">
    Logout
  </button>
  </form><br>
  <form action="deletechat.php" method="get">
    <input type="hidden" name="name" value="<?php echo $_GET['username'];?>">
    <input type="hidden" name="roomname" value="<?php echo $roomName;?>">
    <button class="btn btn-outline-secondary" name="clear" id="clear" style="background-color: lightskyblue;">
      DeleteChat
    </button>
  </form><br>
  <form action="export.php" method="get">
    <input type="hidden" name="name" value="<?php echo $_GET['username'];?>">
    <input type="hidden" name="roomname" value="<?php echo $roomName;?>">
    <button class="btn btn-outline-secondary" name="export" id="export" style="background-color: lightskyblue;">
      Export
    </button>
  </form>
  

  <!-- <button>
    <h6>Logout</h6>
  </button> -->
<div class="container">
<div class="anyClass">
  <!-- <img src="/w3images/bandmember.jpg" alt="Avatar" style="width:100%;"> -->
  <!-- <p>Hello. How are you today?</p> -->
  <!-- <span class="time-right">11:00</span> -->
  </div>
</div>

<input type="text" class="form-control" name="msg" id="msg" placeholder="Type Message"><br> 
<button class="btn btn-outline-secondary" name="submitmsg" id="submitmsg" style="background-color: lightskyblue;">
    Send
</button>
<!-- </button> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

    setInterval(runFunction, 1000);
    function runFunction(){
        $.post("chats.php", {roombox:'<?php echo $roomName ?>', name:'<?php echo $username?>'},   
        function(data, status){
            document.getElementsByClassName('anyClass')[0].innerHTML  = data;
        }
        )
    }
    // function PrintChat() {
    //   $.post("chats.php", {roombox:'<?php echo $roomName ?>', name:'<?php echo $username?>'},   
    //     function(data, status){
    //         var chatContents = document.getElementById('anyclass')[0].innerHTML;  
    //         var printWindow = window.open('', '', 'height=200,width=400');  
    //         printWindow.document.write('<html><head><title>Chat</title>');  
    //         printWindow.document.write('</head><body >');  
    //         printWindow.document.write(chatContents);  
    //         printWindow.document.write('</body></html>');  
    //         printWindow.document.close();  
    //         printWindow.print();  
    //     } 
    //   } 
    var input = document.getElementById("msg");
    input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("submitmsg").click();
    }

});

    $("#submitmsg").click(function(){
        var c_msg = $("#msg").val();
  $.post("msg.php", {msg: c_msg, room: '<?php echo $roomName?>', ip: '<?php echo $_GET['username']?>'},

  function(data, status){
      document.getElementsByClassName('anyClass')[0].innerHTML  = data;});
      $("#msg").val("");
      return false; 
});
</script>
</div>
</body>
</html>
