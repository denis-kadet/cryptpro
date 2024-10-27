<?php

//php -f SecondSing.php -- --id=6 --path=storage/app/public/docs/6.pdf

$options = getopt('', ['id:', 'path:']);
function SetupStore($location, $name, $mode)
{
    $store = new CPStore();
    $store->Open($location, $name, $mode);
    return $store;
}

function SetupCertificates($location, $name, $mode)
{
    $store = SetupStore($location, $name, $mode);
    $certs = $store->get_Certificates();
    return $certs;
}

function SetupCertificate($location, $name, $mode,
                          $find_type, $query, $valid_only,
                          $number)
{
    $certs = SetupCertificates($location, $name, $mode);
    if (!is_null($find_type)) {
        $certs = $certs->Find($find_type, $query, $valid_only);
        return $certs->Item($number);
    } else {
        $cert = $certs->Item($number);
        return $cert;
    }
}

function CPSignedData_Sign_Verify($options)
{

    try {
        $data = 'Тестовый текст подписи';

        //$address = "http://testgost2012.cryptopro.ru/ocsp2012g/ocsp.srf";
        $cert = SetupCertificate(
            LOCAL_MACHINE_STORE,
            "My",
            STORE_OPEN_READ_ONLY,
            CERTIFICATE_FIND_SUBJECT_NAME,
            "test",
            0,
            1
        );

        if (!$cert)
            return "Certificate not found";

        $signer = new CPSigner();
        //$signer->set_TSAAddress($address);

        $signer->set_KeyPin('vlad210700');
        $signer->set_Certificate($cert);

        $sd = new CPSignedData();
        $sd->set_ContentEncoding(1);
        $sd->set_Content(base64_encode($data));

        $sm = $sd->SignCades($signer, CADES_BES, true, 0);

        //Проверка подписи
        $sd->VerifyCades($sm, CADES_BES, true);
        return true;
    } catch (Exception $e) {
        printf($e->getMessage());
        return false;
    }
}

//CPSignedData_Sign_Verify($options);
if (CPSignedData_Sign_Verify($options) == 1) {
    printf("ok\n");
} else {
    printf("fail\n");
}
