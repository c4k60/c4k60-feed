<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
    // If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  $edit = 'none';
  $editpro = 'none';
  $addfriend = "none";
  $doyouknow = "none";
} else {
$edit = 'block';
$editpro = 'inline';
$addfriend = "inline";
$doyouknow = "block";
if ($_SESSION['username'] == str_replace("/","",$_SERVER['REQUEST_URI'])) {
  $edit = 'block';
  $editpro = 'inline';
  $addfriend = "none";
  $doyouknow = "none";
} else {
  $edit = 'none';
  $editpro = 'none';
  $addfriend = "inline";
  $doyouknow = "block";
}
}


?>
<!DOCTYPE html>
<html>
<head>
<title>C4K60 - Tin tức</title>
<!-- Bộ mã Bootstrap 4 -->
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bộ mã jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<!-- Bộ mã JavaScript cho Bootstrap 4 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Bộ mã Font Awesome -->
 <script src="https://kit.fontawesome.com/5468db3c8c.js" crossorigin="anonymous"></script>
<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/vi.min.js"></script>
<link rel="icon" type="image/png" href="c4k60.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style type="text/css">
  .content {
    width: 940px;
    margin: 0 auto;
  }
</style>
<body style="background-color: #f0f2f5;">
<nav class="navbar navbar-expand-md bg-warning navbar-light fixed-top">
	<a class="navbar-brand" href="/">
    <img src="/images/c4k60.png" alt="Logo" style="width:40px;">
  </a>
  <ul class="navbar-nav mr-auto">
    
    <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm">
    <button class="btn btn-success" type="submit" style="background-color:#e4562b85;border-color:#e4562b85"><i class="fas fa-search"></i></button>
  </form>
    
  </ul>
   <ul class="navbar-nav">
  
  <li class="nav-item">
 <a class="nav-link" href="#" style="font-size: 1.4rem;"><i class="fas fa-user-plus"></i></a>
    </li>
    <li class="nav-item">
 <a class="nav-link" href="#" style="font-size: 1.4rem;"><i class="fas fa-comment"></i></a>
    </li>
    <li class="nav-item">
 <a class="nav-link" href="#" style="font-size: 1.4rem;"><i class="fas fa-globe-americas"></i></a>
    </li>
  <a class="navbar-brand" href="/">
    <img src="/images/tunna.jpg" alt="Logo" style="width:40px;border-radius: 50%;margin-left: 10px;">
  </a>
</ul>
</nav>
<?php
$content = "none";
$back = 'block';
require $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
if (isset($_GET['username'])) {
$username = $_GET['username'];
$sql = "SELECT name, email, about, has_cover, profile_pic, other_name, cover_pic, date, verified, permission FROM accounts WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if (empty($row['other_name'])) {
      $other_name = 'none';
    } else {
      $other_name = 'inline-block';
    }
    if ($row['verified'] == 'yes') {
      $is_veri = 'inline';
    } else {
      $is_veri = 'none';
    }
    

$back_height = 545;
$top = 548;
if ($edit == 'none') {
$back_height = 520;
$top = 523;
} 
if (empty($row['about'])) {
      $back_height = 490;
      $top = 493;
    }
    if (empty($row['about']) && $edit == 'block') {
$back_height = 520;
$top = 524;
    }
?>
<div style="display: <?php echo $back; ?>;background-color: white;width:100%;height: <?php echo $back_height ?>px;position: absolute;z-index: -3;    -webkit-box-shadow: 0px 0px 3px -1px rgb(0 0 0 / 75%);">
<img src="/images/black_fade.png" style="width: 100%;height:300px;position: absolute;z-index: -3;">
</div>
<div class="content" style="
    margin-top: 50px;
    margin-bottom: 65px;
">
<div style="position:relative">
  <img src="/images/gray.jpg" style="object-fit: cover;
width: 100%;position: absolute;
height: 355px;border-radius: 10px;z-index: -2;">
<img src="<?php echo $row['cover_pic'] ?>" style="display: <?php echo $row['has_cover'] ?>;object-fit: cover;
width: 100%;position: absolute;
height: 355px;border-radius: 10px;z-index: -1;">
  <img src="<?php echo $row['profile_pic'] ?>" alt="Logo" style="width:165px;border: 4px solid #fff;border-radius: 50%;position: absolute;left: 41%;margin-top: 210px;">
  </div>
<h2 style="
    padding-top: 385px;
    text-align: center;
vertical-align: middle;font-weight: 490;
    font-size: 1.78rem;
"><strong style="
    font-size: 2rem;
"><?php echo $row['name'] ?></strong>
 <span style="display: <?php echo $other_name ?>">(<?php echo $row['other_name'] ?>)</span> <i title="Tài khoản đã xác minh" style="color:#07f;font-size:17px;display:<?php echo $is_veri ?>" class="fas fa-check-circle" data-toggle="tooltip" data-placement="top"></i></h2>

<p style="text-align: center;line-height: 22px;margin-bottom: 0;
vertical-align: middle;font-size: 1.1rem;color:#65676b;"><?php echo htmlspecialchars($row['about']) ?></p>
<div style="display:<?php echo $edit ?>;text-align: center;vertical-align: middle;font-weight: 500;">
<a href="#">Chỉnh sửa</a>
</div>
<hr style="margin-top: 10px;margin-bottom: 10px;">
<div>
<div style="width: 82px;float: left;cursor: pointer;padding-top: 6px;">
  <span style="color:#1876f2;font-weight: 500;margin-left: 15px;">Bài viết</span>
  <div style="background-color: #1876f2;height: 3px;margin-top: 14px;"></div>
</div>
<div style="width: 100px;display: inline;float: left;color: #65676b;cursor: pointer;padding-top: 6px;">
  <span style="font-weight: 500;margin-left: 15px;">Giới thiệu</span>
</div>
<div style="width: 80px;display: inline;float: left;color: #65676b;cursor: pointer;padding-top: 6px;">
  <span style="font-weight: 500;margin-left: 15px;">Bạn bè</span>
</div>
<div style="width: 60px;display: inline;float: left;color: #65676b;cursor: pointer;padding-top: 6px;">
  <span style="font-weight: 500;margin-left: 15px;">Ảnh</span>
</div>
</div>

<div style="float: right;">
  <style type="text/css">
    .editprofile {
      border-radius: 7px;
      border: none;
      transition: 0.3s;
      background-color: #e4e6eb;
    }
    .editprofile:hover{
      background-color:#cccccc;
    }
    .editprofile2 {
      border-radius: 7px;
      border: none;
      transition: 0.3s;
      background-color: #e7f3ff;
    }
    .editprofile2:hover{
      background-color:#b4c7da;
    }
    .editprofile3 {
      border-radius: 7px;
      border: none;
      transition: 0.3s;
      background-color: #1877f2;
    }
    .editprofile3:hover{
      background-color:#0f53ab;
    }
    
  </style>
<button class="editprofile" style="
display: <?php echo $editpro ?>;
    padding-top: 7px;
    padding-bottom: 7px;
    
    left: 1177px;
    top: <?php echo $top ?>px;
"><i class="fas fa-pencil-alt"></i> Chỉnh sửa trang cá nhân</button>

<div style="display: <?php echo $addfriend ?>;">
<button class="editprofile2" style="
    padding-top: 7px;
    padding-bottom: 7px;
    color: #0571ed;
    padding-left: 15px;
    padding-right: 15px;font-weight: 500;
"><i class="fas fa-user-plus"></i> Thêm bạn bè</button>
<button class="editprofile" style="
    padding-top: 7px;
    padding-bottom: 7px;
    width: 43px;
"><i class="fas fa-comment"></i></button>
</div>
<button class="editprofile" style="
    padding-top: 7px;
    padding-bottom: 7px;
    
    left: 1388px;
    top: <?php echo $top ?>px;
    width: 43px;
"><i class="fas fa-ellipsis-h"></i></button>
</div>
<br><br>
<div style="background-color: white;padding-top: 10px;padding-left: 15px;padding-bottom: 5px;margin-top: 10px;-webkit-box-shadow: 0px 0px 3px -1px rgb(0 0 0 / 75%);border-radius: 7px;height: 79px;display: <?php echo $doyouknow ?>">
  <div style="float: left">
<h4 style="font-size: 1.2rem;font-weight: 700;">Bạn có biết <?php echo $row['name'] ?> không?</h4>
  <p style="color:#65676b;font-size: 1.1rem;">Hãy gửi lời mời kết bạn để xem những gì anh ấy chia sẻ với bạn bè.</p>
  </div>
  <button class="editprofile3" style="

  float: right;
  padding-top: 7px;
  padding-bottom: 7px;
  color: white;
  padding-left: 15px;
  padding-right: 15px;
  margin-right: 15px;
  margin-top: 10px;
font-weight: 500;
"><i class="fas fa-user-plus"></i> Thêm bạn bè</button>
</div>
<div style="background-color: white;padding-top: 10px;padding-left: 15px;padding-bottom: 15px;margin-top: 12px;-webkit-box-shadow: 0px 0px 3px -1px rgb(0 0 0 / 75%);border-radius: 7px;width: 385px;padding-right: 15px;float: left;">
  <h5 style="
    margin-bottom: 12px;
"><strong>Giới thiệu</strong></h5>
<p style="margin-bottom: 13px;"><i class="fas fa-graduation-cap" style="color: #8c939d;font-size: 20px;margin-right: 7px;"></i> Học ở <strong style="font-weight: 500;">THPT Chuyên Biên Hoà</strong></p>
  <p style="margin-bottom: 13px;"><i class="fas fa-home" style="color: #8c939d;font-size: 20px;margin-right: 10px;"></i> Sống tại <strong style="font-weight: 500;">Phủ Lý</strong></p>
  <p style="margin-bottom: 13px;"><i class="fas fa-map-marker-alt" style="color: #8c939d;font-size: 20px;margin-right: 13px;margin-left: 4px;"></i> Đến từ <strong style="font-weight: 500;">Kim Bảng, Hà Nam</strong></p>
  <p style="margin-bottom: 13px;"><i class="fas fa-heart" style="color: #8c939d;font-size: 20px;margin-left: 2px;margin-right: 10px;"></i> Độc thân</p>
<p style="margin-bottom: 13px;"><i class="fas fa-wifi" style="transform: rotate(45deg);color: #8c939d;font-size: 20px;margin-right: 7px;"></i> Có <strong style="font-weight: 500;">81,834 người</strong> theo dõi</p>

<button class="editprofile" style="display: <?php echo $editpro ?>;padding-top: 7px;padding-bottom: 7px;width: 100%;margin-bottom: 15px;">Chỉnh sửa chi tiết</button>

<img src="/images/tunganhhai.jpg" style="
object-fit: cover;
width: 100%;
height: 355px;
border-radius: 10px;
border: 1px solid black;
">
<button class="editprofile" style="display: <?php echo $editpro ?>;padding-top: 7px;padding-bottom: 7px;width: 100%;margin-top: 15px;">Chỉnh sửa phần Đáng chú ý</button>
</div>
<div id="mydiv" style="float: right;background-color: white;padding-top: 10px;padding-left:20px;padding-right: 20px;padding-bottom: 10px;margin-top: 12px;width: 537px;-webkit-box-shadow: 0px 0px 3px -1px rgb(0 0 0 / 75%);border-radius: 7px;">
  <div>
<img src="/images/tunna.jpg" style="border-radius: 50%;width: 40px;display: inline-block;">

<div id="textbox" onclick="setTimeout(myFunction2, 2000);" data-toggle="modal" data-target="#myModal" style="display: inline-block;width: 445px;margin-left: 5px;height: 41px;padding-top: 8px;border-radius: 20px;padding-left: 13px;transition: 0.3s;cursor: pointer;">Bạn đang nghĩ gì vậy, Tùng Anh?</div>
<style type="text/css">
  #textbox{
    background-color: #f0f2f5

   }
  #textbox:hover{

    background-color: #e6e6e6
   }
</style>
<hr style="margin-top: 10px;margin-bottom: 8px;">
</div>
<div id="butto1" style="
    height: 40px;
    width: 243px;
    padding-top: 8px;
    position: absolute;
    float: left;
    border-radius: 7px;
    transition: 0.3s;
    cursor: pointer;
">
<div style="
  width: auto;
  padding: 0 70px;
  height: 100%;
  width: 240px;
  float: left;
  text-align: left;
  color: #65676b;
  ">
 
<i class="fas fa-images" style="color: #45bd62"></i> Ảnh/Video
  </div>
</div>
<div id="butto2" style="height: 40px;width: 250px;padding-top: 8px;border-radius: 7px;float: right;transition: 0.3s;cursor: pointer;">
  <div style="width: auto;
  padding: 0 42px;
  height: 100%;
  float: right;
  text-align: left;
 color: #65676b">
<i class="fas fa-smile" style="color: #f7b928"></i> Cảm xúc/Hoạt động
</div>
  </div>
  <style type="text/css">
   #butto1:hover{
    background-color: #f0f2f5
   }
   #butto2:hover{
    background-color: #f0f2f5
   }
   #butto1:active{
    background-color: #c3c3c3
   }
   #butto2:active{
    background-color: #c3c3c3
   }

 </style>
</div>

<center>
  <br>
  <img src="/images/pingpong.png" style="
    height: 97px;
    margin-top: 40px;
">
  <br><br>
<p style="color: grey">Có vẻ như không còn bài viết nào.</p>
</center>

</div>
<?php
}
} else {
  $content = 'block';
  $back = "none";
}
}

?>


<div class="content2" style="
  display: <?php echo $content; ?>;
    position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
">
<center>
<img src="/images/404.svg" style="
    width: 110px;
">
<h4 style="color: #64676b">Nội dung bạn truy cập không có sẵn!</h4>
<p style="color: #64676b">Liên kết có thể bị hỏng hoặc trang có thể đã bị xóa.<br> Hãy thử kiểm tra xem liên kết bạn đang cố mở có <br>chính xác không.</p>
<button type="button" class="btn btn-primary" style="
    width: 186px;
    margin-bottom: 10px;
" onclick="location.href = '/';">Đi đến bảng tin</button><br>
<a href="/">Quay lại</a><br>
</center>
</div>


</body>
</html>