<?php


namespace App\Enums;


class UserLevel
{
    const ADMIN_UTAMA = "ADMIN_UTAMA";
    const ADMIN_PENYEWA = "ADMIN_PENYEWA";
    const PELANGGAN = "PELANGGAN";

    const LEVELS = [
        self::ADMIN_UTAMA,
        self::ADMIN_PENYEWA,
        self::PELANGGAN,
    ];
}