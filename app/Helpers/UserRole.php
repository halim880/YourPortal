<?php
namespace App\Helpers;

class UserRole{
    public const SYSTEM_ADMIN = 1;
    public const MEMBER_SUPER_ADMIN = 2;
    public const MEMBER_ADMIN = 3;
    public const MEMBER_USER = 4;
    public const CLIENT = 5;
    public const GUEST = 6;

    public static function getName(int $role): string{
        if($role==self::SYSTEM_ADMIN) return "System Admin";
        if($role==self::MEMBER_SUPER_ADMIN) return "Super Admin";
        if($role==self::MEMBER_ADMIN) return "Admin";
        if($role==self::MEMBER_USER) return "User";
        if($role==self::CLIENT) return "Client";
        if($role==self::MEMBER_USER) return "Guest";

        return "Unknown";
    }

    public static function getFromName(string $str):int{
        $name = makeSlug($str);

        if($name=="system-admin") return self::SYSTEM_ADMIN;
        if($name=="super-admin") return self::MEMBER_SUPER_ADMIN;
        if($name=="admin") return self::MEMBER_ADMIN;
        if($name=="user") return self::MEMBER_USER;
        if($name=="client") return self::CLIENT;
        if($name=="guest") return self::GUEST;
        
        return -1;
    }
}