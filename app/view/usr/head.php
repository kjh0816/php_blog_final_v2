<?php
global $application;
$envCode = $application->getEnvCode();
$prodSiteDomain = $application->getProdSiteDomain();
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

  <!-- 제이쿼리 불러오기 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- 폰트어썸 불러오기 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- 테일윈드 불러오기 -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <!-- 데이지UI 불러오기, 테일윈드 필요 -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="/resource/common.css">

  <?php if ( $envCode == 'prod' ) { ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-94LNZ8CK0K"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-94LNZ8CK0K');
  </script>
  <?php } ?>

  <?php
  if ( !isset($meta) ) {
    $meta = [];
  }

  $meta['siteName'] = "BBB BLOG";
  $meta['siteCanonicalUrl'] = $_SERVER['REQUEST_URI'];
  $meta['siteKeywords'] = "IT, Java, PHP, HTML, CSS, Javascript, MySQL, Linux";

  if ( !isset($meta['pageGenDate']) ) {
    $meta['pageGenDate'] = date("Y-m-d") . 'T' . date("H:i:s") . 'Z';
  }

  if ( !isset($meta['siteSubject']) ) {
    $meta['siteSubject'] = "IT 전문 블로그 플랫폼, BBB BLOG";
  }

  if ( !isset($meta['siteDescription']) ) {
    $meta['siteDescription'] = "IT 전문 블로그 플랫폼, BBB BLOG 입니다. 누구나 멋진 나만의 IT 블로그를 만들 수 있습니다.";
  }

  $meta['siteDomain'] = $prodSiteDomain;
  $meta['siteMainUrl'] = "https://{$prodSiteDomain}";
  $meta['siteMetaImgUrl'] = "/resource/img/logo/logo_meta.png";
  ?>

  <meta name="apple-mobile-web-app-title" content="<?=$meta['siteName']?>" />
  <!-- 메타태그정보 //-->
  <!-- META -->
  <link rel="canonical" href="<?=$meta['siteCanonicalUrl']?>" />
  <meta name="subject" content="<?=$meta['siteSubject']?>"/>
  <meta name="title" content="<?=$meta['siteSubject']?>" />
  <meta name="keywords" content="<?=$meta['siteKeywords']?>" />
  <meta name="copyright" content="<?=$meta['siteName']?>" />
  <meta name="pubdate" content="<?=$meta['pageGenDate']?>" />
  <meta name="lastmod" content="<?=$meta['pageGenDate']?>" />
  <!-- OPENGRAPH -->
  <meta property="og:site_name" content="<?=$meta['siteName']?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?=$meta['siteSubject']?>" />
  <meta property="og:description" content="<?=$meta['siteDescription']?>" />
  <meta property="og:locale" content="ko_KR" />
  <meta property="og:image" content="<?=$meta['siteMainUrl']?><?=$meta['siteMetaImgUrl']?>" />
  <meta property="og:image:alt" content="<?=$meta['siteDomain']?>" />
  <meta property="og:image:width" content="486" />
  <meta property="og:image:height" content="254" />
  <meta property="og:updated_time" content="<?=$meta['pageGenDate']?>"/>
  <meta property="og:pubdate" content="<?=$meta['pageGenDate']?>" />
  <meta property="og:url" content="<?=$meta['siteCanonicalUrl']?>" />
  <!-- TWITTER -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?=$meta['siteSubject']?>" />
  <meta name="twitter:site" content="<?=$meta['siteName']?>" />
  <meta name="twitter:creator" content="<?=$meta['siteName']?>" />
  <meta name="twitter:image" content="<?=$meta['siteMetaImgUrl']?>">
  <meta name="twitter:description" content="<?=$meta['siteDescription']?>" />
  <!-- GOOGLE+ -->
  <meta itemprop="headline" content="<?=$meta['siteName']?>" />
  <meta itemprop="name" content="<?=$meta['siteName']?>" />
  <meta itemprop="description" content="<?=$meta['siteDescription']?>" />
  <meta itemprop="image" content="<?=$meta['siteMetaImgUrl']?>" />

</head>
<body>
  <div class="site-wrap min-h-screen flex flex-col pt-10">
    <header class="top-bar fixed top-0 inset-x-0 bg-black text-white h-10">
      <div class="container mx-auto h-full flex">
        <a href="/" class="top-bar__logo px-5 flex items-center">
          <span><i class="fas fa-lemon"></i></span>
          <span class="ml-2 font-bold hidden sm:inline">LEMON BLOG</span>
        </a>

        <div class="flex-grow"></div>

        <nav class="menu-box-1">
          <ul class="flex h-full">
            <li class="hover:bg-white hover:text-black">
              <a href="/" class="h-full flex items-center px-5">
                <span><i class="fas fa-home"></i></span>
                <span class="ml-2 font-bold hidden sm:inline">HOME</span>
              </a>
            </li>
            <li class="hover:bg-white hover:text-black">
              <a href="/usr/home/aboutMe" class="h-full flex items-center px-5">
                <span><i class="far fa-id-card"></i></span>
                <span class="ml-2 font-bold hidden sm:inline">ABOUT ME</span>
              </a>
            </li>
            <?php if ( $isLogined ) { ?>
            <li class="hover:bg-white hover:text-black">
              <a href="/usr/member/doLogout" class="h-full flex items-center px-5">
                <span><i class="fas fa-sign-out-alt"></i></span>
                <span class="ml-2 font-bold hidden sm:inline">LOGOUT</span>
              </a>
            </li>
            <?php } else { ?>
            <li class="hover:bg-white hover:text-black">
              <a href="/usr/member/login" class="h-full flex items-center px-5">
                <span><i class="fas fa-sign-in-alt"></i></span>
                <span class="ml-2 font-bold hidden sm:inline">LOGIN</span>
              </a>
            </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </header>

    <main class="flex-grow">
      <section class="section-title mt-5 text-2xl font-bold">
        <h1 class="container mx-auto">
          <div class="con-pad">
            <span><?=$pageTitleIcon?></span>
            <span><?=$pageTitle?></span>
          </div>
        </h1>
      </section>