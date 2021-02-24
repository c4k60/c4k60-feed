<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: /login');
}
require $_SERVER['DOCUMENT_ROOT'] . '/require/serverconnect.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/head.php';
require $_SERVER['DOCUMENT_ROOT'] . '/include/navbar.php';
?>
<style type="text/css">

	#outer-container {
	display: table;
	width: 100%;
	height: 100%;
}

.sidenav {
	display: table-cell;
	width: 19%;
	vertical-align: top;
}

.main {
	display: table-cell;
	width: 81%;
	vertical-align: top;
	top: 66px;
}
	.sidenav {
  height: 100%;
  width: 360px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  overflow-x: hidden;
  padding-top: 15px;
  margin-top: 66px;
  -webkit-box-shadow: 0px 0px 3px -1px rgb(0 0 0 / 75%);
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}
.circle-menu {
	background-color: #e4e6eb;
}
.circle-menu:hover {
	background-color: #d8d9da;
    cursor: pointer;
}
</style>
<div id="outer-container">
<div class="sidenav">
	<h4 style="margin-left: 17px;display: inline;"><strong>Chat</strong></h4>
	<div class="circle-menu" style="border-radius: 50%;padding-top: 5px;padding-bottom: 5px;padding-left: 8px;padding-right: 8px;font-weight: 500;display: inline;float: right;margin-right:15px;">
		<i class="fas fa-edit"></i>
	</div>
	<div class="circle-menu" style="border-radius: 50%;padding-top: 5px;padding-bottom: 5px;padding-left: 9px;padding-right: 9px;font-weight: 500;display: inline;float: right;margin-right:10px;">
		<i class="fas fa-ellipsis-h"></i>
	</div>
	<div contenteditable="true" id="myarea" class="commentar" id="comment40" placeholder="Tìm kiếm tin nhắn" style="border:none;outline: none;resize: none;overflow: auto;border-radius: 24px;width: 330px;height: 40px;margin-left: 15px;margin-top: 15px;padding-top: 7px;background-color: #f0f2f5;padding-left: 15px;margin-bottom: 23px;">
		<span style="color: #65676b" id="span"><i class="fas fa-search"></i> Tìm kiếm</span>
	</div>
	<div style="
    padding-left: 8px;
    padding-right: 8px;
    padding-top: 8px;
    padding-bottom: 8px;
    background-color: #eaf3ff;
    margin-left: 8px;
    margin-right: 8px;
    border-radius: 8px;
    cursor: pointer;
">
<style type="text/css">
	.icon-container {
  position: relative;
}
.status-circle {
  border-radius: 50%;
  border: 2px solid white;
  bottom: 0;
  right: 0;
  position: absolute;
  background-color: #31a24c;
  top: 25px;
    right: 4px;
    width: 14px;
    height: 14px;
}
</style>
<div class='icon-container' style="display: inline;">
<img src="/images/ngungbich.jpg" style="width: 56px;border-radius: 50%;">
<div class="status-circle"></div>
</div>
<p style="display: inline;margin-left: 7px;font-size: 15px;">Ngưng Bích Buildings :))))))</p>
</div>
</div>
<div class="main" style="margin-top: 66px;position: relative;">
<p style="font-weight: 600;font-size: 1.0625rem;">Ngưng Bích Buildings :))))))</p>
<table>
<tbody>
  <tr>
    <td>Ngưng Bích Buildings :))))))</td>
  </tr>
  <tr>
    <td>Chat</td>
  </tr>
</tbody>
</table>
</div>
</div>
<script type="text/javascript">
	var firstFocus = true;
$('#myarea').focus(function() {
    if (firstFocus) {
        $('#myarea').html('');
        firstFocus = false;
    }
});
$(document).click(function(){
  $('#myarea').html('<span style="color: #65676b" id="span"><i class="fas fa-search"></i> Tìm kiếm</span>');
  firstFocus = true;
});

/* Clicks within the dropdown won't make
   it past the dropdown itself */
$("#myarea").click(function(e){
 e.stopPropagation();
});
</script>
