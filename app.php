<?php
require_once __DIR__ . '/app/repository/MemberRepository.php';
require_once __DIR__ . '/app/repository/ArticleRepository.php';

require_once __DIR__ . '/app/service/MemberService.php';
require_once __DIR__ . '/app/service/ArticleService.php';

require_once __DIR__ . '/app/controller/MemberController.php';
require_once __DIR__ . '/app/controller/ArticleController.php';

// 뷰에서 사용할 이용자의 로그인 상태관련 전역변수
$isLogined = false;
$loginedMemberId = 0;
$loginedMember = null;

function App__getViewPath($viewName) {
  return __DIR__ . '/public/' . $viewName . '.view.php';
}

function App__runBeforActionInterCeptor() {
  global $isLogined;
  global $loginedMemberId;
  global $loginedMember;
  
  if ( isset($_SESSION['loginedMemberId']) ) {
    $isLogined = true;
    $loginedMemberId = intval($_SESSION['loginedMemberId']);
    $memberService = new APP__MemberService();
    $loginedMember = $memberService->getForPrintMemberById($loginedMemberId);
  }
}

function App__runInterceptors() {
  App__runBeforActionInterCeptor();
}

function App__runAction(string $action) {
  list($controllerTypeCode, $controllerName, $actionFuncName) = explode('/', $action);

  $controllerClassName = "APP__" . ucfirst($controllerTypeCode) . ucfirst($controllerName) . "Controller";
  $actionMethodName = "action";

  if ( str_starts_with($actionFuncName, "do") ) {
    $actionMethodName .= ucfirst($actionFuncName);
  }
  else {
    $actionMethodName .= "Show" . ucfirst($actionFuncName);
  }

  $usrArticleController = new $controllerClassName();
  $usrArticleController->$actionMethodName();
}

function App__run(string $action) {
  App__runInterceptors();
  App__runAction($action);  
}