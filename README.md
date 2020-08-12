# ssoacehphp

SSO Aceh client for PHP languange

Install
```bash
composer require fuadarradhi/ssoacehphp
```

contoh penggunaan:
```php
<?php
//autoloader composer
require_once __DIR__ . '/vendor/autoload.php';

//get token from previous step
$token = $_POST['token'];

// load sso_secure.json and parse token
$sso = new \SSOAceh\PHPClient\SSOClient("/Path/ke/file/sso_secure.json");
$res = $sso->parseToken($token);

// result 
echo $res->SessionID;
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
