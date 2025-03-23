let prayerTimes = {};
const audio = new Audio("audios/adan-audio.mp3");

function updateClock() {
    const date = new Date();

    const optionsOne = {
        weekday: "long",
        day: "numeric",
        month: "long",
        year: "numeric",
    };

    const optionsTwo = {
        hour: '2-digit', 
        minute: '2-digit', 
        second: '2-digit', 
        hour12: false,
    };

    document.getElementById("date").textContent = date.toLocaleString('fr-Fr',optionsOne)
    document.getElementById("heure").textContent = date.toLocaleString('fr-Fr',optionsTwo)


    if (Object.keys(prayerTimes).length > 0) {
        const currentTime = String(date.getHours()).padStart(2,'0')+":"+String(date.getMinutes()).padStart(2,'0')

        if (Object.values(prayerTimes).includes(currentTime)) {
            audio.play();
            console.log("work");
        }
    }
}

async function fetchPrayerTimes() {
    if (document.getElementById('city-search').value) { 
        const response = await fetch(`getter.php?city=${document.getElementById('city-search').value}`);
        prayerTimes = await response.json();

        document.getElementById('fajr').textContent = prayerTimes.fajr;
        document.getElementById('dhuhr').textContent = prayerTimes.dhuhr;
        document.getElementById('asr').textContent = prayerTimes.asr;
        document.getElementById('maghrib').textContent = prayerTimes.maghrib;
        document.getElementById('isha').textContent = prayerTimes.isha;
        document.getElementById('city').textContent = prayerTimes.city;
    } else {
        const response = await fetch('getter.php');
        prayerTimes = await response.json();

        document.getElementById('fajr').textContent = prayerTimes.fajr;
        document.getElementById('dhuhr').textContent = prayerTimes.dhuhr;
        document.getElementById('asr').textContent = prayerTimes.asr;
        document.getElementById('maghrib').textContent = prayerTimes.maghrib;
        document.getElementById('isha').textContent = prayerTimes.isha;
        document.getElementById('city').textContent = prayerTimes.city;
    }
}

setInterval(() => {
    updateClock();
}, 1000);

fetchPrayerTimes();