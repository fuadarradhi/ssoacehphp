# ssoacehphp

SSO Aceh client for PHP languange

contoh penggunaan:
```php
<?php

$token = $_POST['token'];

$sso = new \SSOAceh\PHPClient\SSOClient("/Path/ke/file/sso_secure.json");
$res = $sso->parseToken($token);

echo $res->ID;
echo $res->NIK;
echo $res->NIP;
echo $res->Nama;
echo $res->HP;
echo $res->Email;
echo $res->TelegramID;
echo $res->EmailAlternatif;
echo $res->Avatar;
echo $res->Datetime;

```
