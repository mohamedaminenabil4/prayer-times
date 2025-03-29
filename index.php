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
            <select id="country-search" required>
                <option value="">Veillez choisir un pay</option>
            </select>
            <select id="city-search" required>
                <option value="">Veillez choisir une ville</option>
            </select>

            <button type="button" onclick="fetchPrayerTimes()">Changer</button>
        </form>
    </div>


    <section class="cards">
        <div class="card">
            <h3>Fajr</h3>
            <p id="fajr">chargement...</p>
            <p id="fajr-arabic">الفجر</p> 
            <div class="icon">
                <svg id="icon-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" color="red">
                    <path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" fill="currentColor"/>
                </svg>
            </div>
        </div>
        <div class="card">
            <h3>Dhuhr</h3>
            <p id="dhuhr">chargement...</p>
            <p id="dhuhr-arabic">الظهر</p> 
            <div class="icon">
                <svg id="icon-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" color="red">
                    <path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" fill="currentColor"/>
                </svg>
            </div>
        </div>
        <div class="card">
            <h3>Asr</h3>
            <p id="asr">chargement...</p>
            <p id="asr-arabic">العصر</p>
            <div class="icon">
                <svg id="icon-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" color="red">
                    <path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" fill="currentColor"/>
                </svg>
            </div>
        </div>
        <div class="card">
            <h3>Maghrib</h3>
            <p id="maghrib">chargement...</p>
            <p id="maghrib-arabic">المغرب</p>
            <div class="icon">
                <svg id="icon-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" color="red">
                    <path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" fill="currentColor"/>
                </svg>
            </div>
        </div>
        <div class="card">
            <h3>Isha</h3>
            <p id="isha">chargement...</p>
            <p id="isha-arabic">العشاء</p>
            <div class="icon">
                <svg id="icon-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" color="red">
                    <path d="M224 0c-17.7 0-32 14.3-32 32l0 19.2C119 66 64 130.6 64 208l0 18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416l384 0c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8l0-18.8c0-77.4-55-142-128-156.8L256 32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3l-64 0-64 0c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" fill="currentColor"/>
                </svg>
            </div>
        </div>
    </section>
</body>
</html>
