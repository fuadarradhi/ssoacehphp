<?php

/**
 * @author Fuad Ar-Radhi
 * @email fuad.arradhi@gmail.com
 *
 * @since 0.1.0
 * @description PHP Client SDK for SSO Pemerintah Aceh
 */

namespace SSOAceh\PHPClient;

class SSOClient{

    /**
     * Selama proses parsing, JSON sso_secure.json
     * disimpan di variable ini.
     */
    private $secure_json;

    /**
     * Mapping field,
     * json return dari token dibuat seminimal mungkin,
     * untuk memperkecil byte, sehingga perlu dimapping
     * kembali ke bentuk asalnya.
     */
    private $mapping = [
            "id" => "ID",
            "nk" => "NIK",
            "np" => "NIP",
            "nm" => "Nama",
            "hp" => "HP",
            "em" => "Email",
            "tl" => "TelegramID",
            "ea" => "EmailAlternatif",
            "av" => "Avatar",
            "dt" => "Datetime"
        ];

    /**
     * Get dari sso_secure.json
     * kemudian simpan ke property
     */
    public function __construct($jsonpath){
        $json = file_get_contents($jsonpath);
        $this->secure_json = json_decode($json);
    }

    /**
     * Proses parsing diawalai dengan Base64Url decode
     * kemudian didecrypt mengguna OAEP PADDING
     *
     * @return SSOResult
     */
    public function parseToken($token){
        $private_key = $this->secure_json->base64_rsa_private_key;

        $decoded_pkey = $this->decodeBase64Url($private_key);
        $decoded_token = $this->decodeBase64Url($token);

        openssl_private_decrypt($decoded_token, $decrypted, $decoded_pkey, OPENSSL_PKCS1_OAEP_PADDING);

        $result = new SSOResult();
        foreach (json_decode($decrypted, true) as $key => $value){
            $mapping_key = $this->mapping[$key];
            $result->$mapping_key = $value;
        };

        return $result;
    }

    /**
     * Yang membedakan base64 dan base64url hanya pada karakter
     * - _ dan + / sehingga perlu direplace terlebih dahulu
     * sebelum di decode
     */
    private function decodeBase64Url($string){
        return base64_decode(str_replace(array('-', '_'), array('+', '/'), $string));
    }
}
