if(document.querySelector('#mapa')){

    const lat = -34.5801272;
    const lng = -58.4224341;
    const zoom = 16.75;
    
    const map = L.map('mapa').setView([lat , lng ], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat , lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">DevWebCamp</h2>
            <p class="mapa__texto">Centro de Convenciones La Rural</p>
        `)
        .openPopup();
}