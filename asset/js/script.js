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

    realChangeStatus()


    if (Object.keys(prayerTimes).length > 0) {
        const currentTime = String(date.getHours()).padStart(2,'0')+":"+String(date.getMinutes()).padStart(2,'0')

        if (Object.values(prayerTimes).includes(currentTime)) {
            audio.play();
        }
    }
}

async function fetchCountries() {
    fetch('https://countriesnow.space/api/v0.1/countries')
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur réseau');
        }
        return response.json();  
    })
    .then(data => {
        const countriesData = data.data;
        countriesData.forEach(country => {
            document.getElementById('country-search').innerHTML += `<option value="${country.country}">${country.country}</option>`;      
        });
    })
    .catch(error => {
        console.error('Il y a eu un problème avec la requête fetch:', error);
    });
}

let i = 0

async function fetchPrayerTimes() {
    if (document.getElementById('city-search').value) { 
        const response = await fetch(`getter.php?country=${document.getElementById('country-search').value}&city=${document.getElementById('city-search').value}`);
        prayerTimes = await response.json();

        document.getElementById('fajr').textContent = prayerTimes.fajr;
        document.getElementById('dhuhr').textContent = prayerTimes.dhuhr;
        document.getElementById('asr').textContent = prayerTimes.asr;
        document.getElementById('maghrib').textContent = prayerTimes.maghrib;
        document.getElementById('isha').textContent = prayerTimes.isha;
        document.getElementById('city').textContent = prayerTimes.city;
    } else if(i == 0) {
        const response = await fetch('getter.php');
        prayerTimes = await response.json();

        document.getElementById('fajr').textContent = prayerTimes.fajr;
        document.getElementById('dhuhr').textContent = prayerTimes.dhuhr;
        document.getElementById('asr').textContent = prayerTimes.asr;
        document.getElementById('maghrib').textContent = prayerTimes.maghrib;
        document.getElementById('isha').textContent = prayerTimes.isha;
        document.getElementById('city').textContent = prayerTimes.city; 
        i++
    }

    realChangeStatus()
}

function realChangeStatus() {
    const date = new Date();

    const optionsThree = {
        hour: '2-digit', 
        minute: '2-digit', 
        hour12: false,
    };

    const timeNow = date.toLocaleString('fr-Fr', optionsThree);

    if (prayerTimes.fajr.toLocaleString('fr-Fr', optionsThree) <= timeNow && prayerTimes.isha.toLocaleString('fr-Fr', optionsThree) >= timeNow) {
        document.getElementById("icon-1").classList.add("class","green");
    } else if(prayerTimes.dhuhr.toLocaleString('fr-Fr', optionsThree) <= timeNow && prayerTimes.isha.toLocaleString('fr-Fr', optionsThree) >= timeNow) {
        document.getElementById("icon-2").classList.add("class","green");
    } else if(prayerTimes.asr.toLocaleString('fr-Fr', optionsThree) <= timeNow && prayerTimes.isha.toLocaleString('fr-Fr', optionsThree) >= timeNow) {
        document.getElementById("icon-3").classList.add("class","green");
    } else if(prayerTimes.maghrib.toLocaleString('fr-Fr', optionsThree) <= timeNow && prayerTimes.isha.toLocaleString('fr-Fr', optionsThree) >= timeNow) {
        document.getElementById("icon-4").classList.add("class","green");
    } else if(prayerTimes.isha.toLocaleString('fr-Fr', optionsThree) == timeNow) {
        document.getElementById("icon-5").classList.add("class","green");
    } else {
        document.getElementById("icon-1").classList.add("class","red");
        document.getElementById("icon-2").classList.add("class","red");
        document.getElementById("icon-3").classList.add("class","red");
        document.getElementById("icon-4").classList.add("class","red");
        document.getElementById("icon-5").classList.add("class","red");
    }
}

setInterval(() => {
    updateClock();
}, 1000);

document.getElementById('country-search').addEventListener("change", async ()=>{
    fetch('https://countriesnow.space/api/v0.1/countries')
    .then(response => {
        if (!response.ok) {
            throw new Error('Erreur réseau');
        }
        return response.json();  
    })
    .then(data => {
        if (document.getElementById('country-search').value != "") {
            console.log(document.getElementById('country-search').value)
            const countriesData = data.data.find((country)=>country.country == document.getElementById('country-search').value);
            document.getElementById('city-search').innerHTML = ""
            document.getElementById('city-search').innerHTML += countriesData.cities.map(city => (
                `<option value="${city}">${city}</option>`
            ))
        }else {
            document.getElementById('city-search').innerHTML = `<option value="">Veillez choisir une ville</option>`
        }
        
    })
    .catch(error => {
        console.error('Il y a eu un problème avec la requête fetch:', error);
    });
})

fetchPrayerTimes();
fetchCountries();