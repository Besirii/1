// weather.js

const apiKey = "VENDOS_KETU_API_KEY"; // vendos çelësin tënd real nga OpenWeatherMap
const city = "Prishtina";

const weatherContainer = document.getElementById("weather-info");

async function getWeather() {
    try {
        const response = await fetch(
            `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=sq`
        );
        const data = await response.json();

        if (data.cod !== 200) {
            weatherContainer.innerHTML = `<p>Nuk u gjet parashikimi për motin.</p>`;
            return;
        }

        weatherContainer.innerHTML = `
            <h3>🌤 Moti në ${data.name}</h3>
            <p><strong>🌡 Temperatura:</strong> ${data.main.temp}°C</p>
            <p><strong>🤔 Ndjesia:</strong> ${data.main.feels_like}°C</p>
            <p><strong>🌥 Gjendja:</strong> ${data.weather[0].description}</p>
            <p><strong>💨 Shpejtësia e erës:</strong> ${data.wind.speed} m/s</p>
        `;
    } catch (error) {
        weatherContainer.innerHTML = `<p>⚠️ Gabim gjatë marrjes së të dhënave për motin.</p>`;
    }
}

getWeather();
