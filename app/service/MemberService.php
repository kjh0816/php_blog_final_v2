<?php
class APP__MemberService {
  private APP__MemberRepository $memberRepository;

  public function __construct() {
    $this->memberRepository = new APP__MemberRepository();
  }

  public function getForPrintMemberByLoginIdAndLoginPw(string $loginId, string $loginPw): array|null {
    return $this->memberRepository->getForPrintMemberByLoginIdAndLoginPw($loginId, $loginPw);
  }

  public function getForPrintMemberById(int $id): array|null {
    return $this->memberRepository->getForPrintMemberById($id);
  }
}