<?php
    //---------------------------- SETTING API ----------------------------
    if (isset($_GET['city']) && !empty($_GET['city'])) {
        $city= $_GET['city'];
        $country= "Morocco";
        $date= "today";
        $apiPrayerTimesUrl= "https://api.aladhan.com/v1/timingsByAddress/$date?address=$city&country=$country";
    } else {
        //-------------- YOUR IP ADDRESS FOR TESTING --------------
        $adressIp = "";

        //-------------- UNCOMMENT THIS LINE IN PRODUCTION --------------
        //$adressIp = $_SERVER['REMOTE_ADDR'];
        if (isset($adressIp) && !empty($adressIp)) {
            $apiLocationUrl = "http://ip-api.com/json/$adressIp";
            $responseLocation = file_get_contents($apiLocationUrl);
            $dataLocation = json_decode($responseLocation,false);
            $city= $dataLocation->city;
            $country= $dataLocation->country;
            $date= "today";
            $apiPrayerTimesUrl= "https://api.aladhan.com/v1/timingsByAddress/$date?address=$city&country=$country";
        } else {
            $city= 'Rabat';
            $country= "Morocco";
            $date= "today";
            $apiPrayerTimesUrl= "https://api.aladhan.com/v1/timingsByAddress/$date?address=$city&country=$country";
        }
    }

    //---------------------------- TRAITEMENT DATA ----------------------------
    $responsePrayerTimes = file_get_contents($apiPrayerTimesUrl);
    $dataPrayerTimes = json_decode($responsePrayerTimes,false);

    echo json_encode([
        'fajr' => $dataPrayerTimes->data->timings->Fajr,
        'dhuhr' => $dataPrayerTimes->data->timings->Dhuhr,
        'asr' => $dataPrayerTimes->data->timings->Asr,
        'maghrib' => $dataPrayerTimes->data->timings->Maghrib,
        'isha' => $dataPrayerTimes->data->timings->Isha,
        'city' => $city,
    ]);
?>