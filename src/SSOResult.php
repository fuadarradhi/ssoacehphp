<?php

/**
 * @author Fuad Ar-Radhi
 * @email fuad.arradhi@gmail.com
 *
 * @since 0.1.0
 * @description PHP Client SDK for SSO Pemerintah Aceh
 */

namespace SSOAceh\PHPClient;

/**
 * SSO Result
 * return value untuk user setelah proses parsing,
 */
class SSOResult{
    public $SessionID;
    public $NIK;
    public $NIP;
    public $Nama;
    public $HP;
    public $Email;
    public $TelegramID;
    public $EmailAlternatif;
    public $Avatar;
    public $Datetime;
}
