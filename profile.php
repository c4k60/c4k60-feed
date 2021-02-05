<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
    // If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  $edit = 'none';
} else {
$edit = 'block';
if ($_SESSION['username'] == str_replace("/","",$_SERVER['REQUEST_URI'])) {
  $edit = 'block';
} else {
  $edit = 'none';
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
if ($edit == 'none') {
$back_height = 520;
} 
if (empty($row['about'])) {
      $back_height = 490;
    }
    if (empty($row['about']) && $edit == 'block') {
$back_height = 520;
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
<hr style="margin-top: 10px;">
<div style="width: 82px;float: left;cursor: pointer;">
  <span style="color:#1876f2;font-weight: 500;margin-left: 15px;">Bài viết</span>
  <div style="background-color: #1876f2;height: 3px;margin-top: 14px;"></div>
</div>
<div style="width: 100px;display: inline;float: left;color: #65676b;cursor: pointer;">
  <span style="font-weight: 500;margin-left: 15px;">Giới thiệu</span>
</div>
<div style="width: 80px;display: inline;float: left;color: #65676b;cursor: pointer;">
  <span style="font-weight: 500;margin-left: 15px;">Bạn bè</span>
</div>

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