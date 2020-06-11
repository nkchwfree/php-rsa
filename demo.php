<?php

require_once("./Rsa.php");

$rsa = new Rsa();
$data['name'] = 'Tom';
$data['age']  = time();

//使用私钥进行加密
$privEncrypt = $rsa->privEncrypt(json_encode($data));
//使用私钥加密后的密文：MJL8z3BcilwXsgjLyHHvCXFNGsR7tbceG9Qh8Ur56SHNUuT8cneggieElCf+sbXpC2B92+7dV6QXqXQ0pf9z41V7yG1AsMFnDOLmLkea8YNKvilbdQQ9xW9/M2AKMqaH9lq2CrEkPoZdF+RDAfuTCqD2P9GRsUAdqbKDsArRlf4=
echo '私钥加密后:'.$privEncrypt."\n\n";

//$privEncrypt = "QqOWXrBWA9aQkZOACeomngMx61HKlDP5+kqajOMpl7HBnuai6KV2F91DQtsfI2HvWpq4mdh9ZoXEZTZ3j6By5LlkG+1y/njRNbMObbyn3cCPauUyfHK+Gduly/uTkIZsElDhhQ/aH6Zq9MENARZUijBTX/VBBy2tnZ4ZWMWtoMw=";
//使用公钥解密：{"name":"Tom","age":1588144499}
$publicDecrypt = $rsa->publicDecrypt($privEncrypt);
echo '公钥解密后:'.$publicDecrypt."\n\n";

//使用公钥进行加密
$publicEncrypt = $rsa->publicEncrypt(json_encode($data));
//公钥加密后的密文：eRpChGlmurEXq642Nmi9pCI0nxG0xfAcTn/ds2XkqIxxq1KNcIuRD01Jln/G/vJwD4Y/bVmhcUHLVRAzL6Ipn+kjVe7vbrg4RuaXSoP/GaQ/w7KWZ+hu3yPI809nZOzWZuHii8pkEq4QSSz31uwSztOTHp7rUGMcWRQ4/Tes64c=
echo '公钥加密后:'.$publicEncrypt."\n\n";

//$publicEncrypt = "e1blcM/DWAzfYbBPl9TxUIpUvpQP9zJ/5VGxazraNVwGU5xmBVMHtF8frFcNrcU9DrvybIm3UC6RbnTVH1bedGO5xL07CvUXQv2uWKPO7o3P9Xk0EFCjr7OY+aiFkdkl7zxy9jqm9XsCmJfC7X2Dnl0UxveK0ddtDbIn0R4R50A=";
$privDecrypt = $rsa->privDecrypt($publicEncrypt);
echo '私钥解密后:'.$privDecrypt."\n\n";