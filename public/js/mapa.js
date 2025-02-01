
async function initMap() {
    // Request needed libraries.
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
      "marker",
    );
    const puntos = window.puntos;
    
    const map = new Map(document.getElementById("map"), {
      zoom: 5,
      center: { lat: 23.6345, lng: -102.5528 },
      mapId: "a947c81ef05926d8",
    });
  
    
    


    // Create the markers.
    puntos.forEach((punto) => {
       // Create an info window to share between markers.
    const infoWindow = new InfoWindow();
    
    // A marker with a with a URL pointing to a PNG.
    const iconMaps = document.createElement("img");
  
    iconMaps.src ="../images/iconoMaps.png";


    iconMaps.style.width="40px";
    iconMaps.style.height="40px";
  
      const marker = new AdvancedMarkerElement({
        position:{lat:parseFloat(punto.latitud), lng: parseFloat(punto.longitud)},
        map,
        
        title: `playa ${punto.nombre_playa}`,
        content: iconMaps,
      });
  
      // Add a click listener for each marker, and set up the info window.
      marker.addListener("click", ({ domEvent, latLng }) => {
        const { target } = domEvent;
        
        infoWindow.close();
        var contenidoInfowindow=`<div class="info-window ">
                                  <h5 class="title "><strong>Playa ${punto.nombre_playa}</strong> </h5>
                                  <p class="details ">Estado: ${punto.nombre_estado}</p>
                                  <p class="details ">Municipio :${punto.nombre_municipio}</p>
                                  <p class="details ">Muestreos realizados: ${punto.muestreos}</p>
                                  <div class="info-buttons ">
                                    <a href="/resultados/${punto.id_playa}">
                                      <button type="button" class="btn-mostrarmas">Ver piezas encontradas</button>
                                    </a>
                                  </div>
                                  <br><br>
                                 </div>`;
        infoWindow.setContent(contenidoInfowindow);
        infoWindow.open(marker.map, marker);
        
      });
  
       
    });
  
  }
  
  initMap();