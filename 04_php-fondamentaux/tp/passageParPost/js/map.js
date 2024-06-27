import * as eventDisplay from "./modules/eventDisplay.js";


var map = L.map('map').setView([43.6107, 3.8799], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

//export eventlist manage it and send it to eventDisplay

let eventAdressArray = [
    [43.6107, 3.8799], 
    [42.6107, 3.0799], 
    [44.6107, 2.9799]
];

let eventDisplay1 = new eventDisplay.eventDisplay(eventAdressArray);

eventAdressArray.forEach(adress => {
    L.marker([adress[0], adress[1]]).addTo(map);
    
});

