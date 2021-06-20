<?php

namespace App\Service;

use App\Repository\MemberRepository;

class MemberService
{
    private MemberRepository $memberRepository;

    public static function getInstance(): MemberService
    {
        static $instance;

        if ($instance === null) {
            $instance = new MemberService();
        }

        return $instance;
    }

    private function __construct()
    {
        $this->memberRepository = MemberRepository::getInstance();
    }

    public function getForPrintMemberByLoginIdAndLoginPw(string $loginId, string $loginPw): array|null
    {
        return $this->memberRepository->getForPrintMemberByLoginIdAndLoginPw($loginId, $loginPw);
    }

    public function getForPrintMemberById(int $id): array|null
    {
        return $this->memberRepository->getForPrintMemberById($id);
    }

    public function secession(int $id)
    {
        $this->memberRepository->secession($id);
    }
}