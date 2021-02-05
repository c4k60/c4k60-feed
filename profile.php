
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
require $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
if (isset($_GET['username'])) {
$username = $_GET['username'];
$sql = "SELECT name, email, profile_pic, cover_pic, date, verified, permission FROM accounts WHERE username='$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>
<div class="content" style="
    margin-top: 50px;
    margin-bottom: 65px;
">
<div style="position:relative">
<img src="<?php echo $row['cover_pic'] ?>" alt="Logo" style="object-fit: cover;
width: 100%;position: absolute;
height: 355px;border-radius: 10px;z-index: -1;">
  <img src="<?php echo $row['profile_pic'] ?>" alt="Logo" style="width:165px;border: 4px solid #fff;border-radius: 50%;position: absolute;left: 41%;margin-top: 210px;">
  </div>
<h3><strong><?php echo $row['name'] ?></strong></h3>

</div>
<?php
}
} else {
  $content = 'block';
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