<?php
    //---------------------------- SETTING API ----------------------------
    if (isset($_GET['country']) && !empty($_GET['country']) && isset($_GET['city']) && !empty($_GET['city'])) {
        $country=  str_replace(" ","",$_GET['country']);
        $city=  str_replace(" ","",$_GET['city']);
        $date= "today";
        $apiPrayerTimesUrl= "https://api.aladhan.com/v1/timingsByAddress/$date?address=$city&country=$country";
    } else {
        $adressIp = "197.145.129.18";
        if (isset($adressIp) && !empty($adressIp)) {
            $apiLocationUrl = "http://ipinfo.io/$adressIp/json";
            $responseLocation = file_get_contents($apiLocationUrl);
            $dataLocation = json_decode($responseLocation,false);
            $country= str_replace(" ","",$dataLocation->country);
            $city= str_replace(" ","",$dataLocation->city);
            $date= "today";
            $apiPrayerTimesUrl= "https://api.aladhan.com/v1/timingsByAddress/$date?address=$city&country=$country";
        } else {
            $city= "Rabat";
            $country= "Morocco";
            $date= "today";
            $apiPrayerTimesUrl= "https://api.aladhan.com/v1/timingsByAddress/$date?address=$city&country=$country";
        }
    }

    //---------------------------- TRAITEMENT DATA ----------------------------
    $responsePrayerTimes = file_get_contents($apiPrayerTimesUrl);
    $dataPrayerTimes = json_decode($responsePrayerTimes,false);

    if (isset($_GET['city'])) {
        echo json_encode([
            'fajr' => $dataPrayerTimes->data->timings->Fajr,
            'dhuhr' => $dataPrayerTimes->data->timings->Dhuhr,
            'asr' => $dataPrayerTimes->data->timings->Asr,
            'maghrib' => $dataPrayerTimes->data->timings->Maghrib,
            'isha' => $dataPrayerTimes->data->timings->Isha,
            'city' => $_GET['city'],
        ]);
    } else {
        echo json_encode([
            'fajr' => $dataPrayerTimes->data->timings->Fajr,
            'dhuhr' => $dataPrayerTimes->data->timings->Dhuhr,
            'asr' => $dataPrayerTimes->data->timings->Asr,
            'maghrib' => $dataPrayerTimes->data->timings->Maghrib,
            'isha' => $dataPrayerTimes->data->timings->Isha,
            'city' => $dataLocation->city,
        ]);
    }
    
?>