<?php
$isLogined = $_REQUEST['App__isLogined'];
$loginedMemberId = $_REQUEST['App__loginedMemberId'];
$loginedMember = $_REQUEST['App__loginedMember'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle?></title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="/resource/common.css">
</head>
<body>
  <div class="site-wrap">
    <header class="top-bar bg-black h-4">
      
    </header>

    <h1><?=$pageTitle?></h1>
    <hr>
    <?php if ( $isLogined ) { ?>
      <a href="../member/mypage"><?=$loginedMember['nickname']?> 마이페이지</a>
      <a href="../member/doLogout">로그아웃</a>
      <a href="../member/doSecession">탈퇴</a>
    <!-- unset($_SESSION); -->
    <?php } else { ?>
      <a href="../member/login">로그인</a>
      <a href="../member/join">회원가입</a>
    <?php } ?>
  </div>