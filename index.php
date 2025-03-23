<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="pictures/logo.png">
    <link rel="stylesheet" href="asset/css/style.css">
    <script src="asset/js/script.js" defer></script>
    <title>Horaires de Prière</title>

</head>
<body>
    <header>
        <div class="logo">
            <img src="pictures/logo.png" alt="Logo">
        </div>
    </header>

    <section class="current-time">
        <div id="date">chargement...</div>
        <div id="heure">chargement...</div>
        <div id="city">chargement...</div>
    </section>

    <div class="search-bar">
        <form action="getter.php" method="post">
            <input list="cities" name="city" id="city-search" placeholder="Tapez une ville...">
            <datalist id="cities">
                <option value="Casablanca">
                <option value="Agadir">
                <option value="Fès">
                <option value="Marrakech">
                <option value="Meknès">
                <option value="Rabat">
                <option value="Salé">
                <option value="Mohammedia">
                <option value="Kénitra">
                <option value="Tétouan">
                <option value="Eljadida">
                <option value="Safi">
                <option value="Benimellal">
                <option value="Ksarelkebir">
                <option value="Nador">
                <option value="Larache">
                <option value="Ouarzazate">
                <option value="Essaouira">
                <option value="Taroudant">
                <option value="Dakhla">
                <option value="Tanger">
                <option value="Assilah">
                <option value="Ifrane">
                <option value="Berkane">
                <option value="Settat">
                <option value="Sidikacem">
                <option value="Taza">
                <option value="Khouribga">
                <option value="Sidiifni">
                <option value="Midelt">
                <option value="Errachidia">
                <option value="Oualidia">
                <option value="Tiznit">
                <option value="Rissani">
                <option value="Khemisset">
                <option value="Guercif">
                <option value="Taounate">
                <option value="Azilal">
                <option value="Alhoceima">
                <option value="Elaioun">
                <option value="Nador">
                <option value="Figuig">
                <option value="Tiznit">
                <option value="Guelmim">
                <option value="Laâyoune">
                <option value="Boujdour">
                <option value="Tantan">
                <option value="Dakhla">
            </datalist>
            <button type="button" onclick="fetchPrayerTimes()">Changer</button>
        </form>
    </div>

    <section class="cards">
        <div class="card">
            <h3>Fajr</h3>
            <p id="fajr">chargement...</p>
            <p id="fajr-arabic">الفجر</p> 
        </div>
        <div class="card">
            <h3>Dhuhr</h3>
            <p id="dhuhr">chargement...</p>
            <p id="dhuhr-arabic">الظهر</p> 
        </div>
        <div class="card">
            <h3>Asr</h3>
            <p id="asr">chargement...</p>
            <p id="asr-arabic">العصر</p>
        </div>
        <div class="card">
            <h3>Maghrib</h3>
            <p id="maghrib">chargement...</p>
            <p id="maghrib-arabic">المغرب</p>
        </div>
        <div class="card">
            <h3>Isha</h3>
            <p id="isha">chargement...</p>
            <p id="isha-arabic">العشاء</p>
        </div>
    </section>
</body>
</html>
