


<html>
  <head>
    <title>Displaying Text Directions With setPanel()</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="module" src="index.js"></script>
  </head>
  <body>
    <div id="floating-panel">
      <strong>Start:</strong>
      <select id="start">
        <option value="chicago, il">Chicago</option>
        <option value="st louis, mo">St Louis</option>
        <option value="joplin, mo">Joplin, MO</option>
        <option value="oklahoma city, ok">Oklahoma City</option>
        <option value="amarillo, tx">Amarillo</option>
        <option value="gallup, nm">Gallup, NM</option>
        <option value="flagstaff, az">Flagstaff, AZ</option>
        <option value="winona, az">Winona</option>
        <option value="kingman, az">Kingman</option>
        <option value="barstow, ca">Barstow</option>
        <option value="san bernardino, ca">San Bernardino</option>
        <option value="los angeles, ca">Los Angeles</option>
      </select>
      <br />
      <strong>End:</strong>
      <select id="end">
        <option value="chicago, il">Chicago</option>
        <option value="st louis, mo">St Louis</option>
        <option value="joplin, mo">Joplin, MO</option>
        <option value="oklahoma city, ok">Oklahoma City</option>
        <option value="amarillo, tx">Amarillo</option>
        <option value="gallup, nm">Gallup, NM</option>
        <option value="flagstaff, az">Flagstaff, AZ</option>
        <option value="winona, az">Winona</option>
        <option value="kingman, az">Kingman</option>
        <option value="barstow, ca">Barstow</option>
        <option value="san bernardino, ca">San Bernardino</option>
        <option value="los angeles, ca">Los Angeles</option>
      </select>
    </div>
    <div id="container">
      <div id="map"></div>
      <div id="sidebar"></div>
    </div>
    <div style="display: none">
      <div id="floating-panel">
        <strong>Start:</strong>
        <select id="start">
          <option value="chicago, il">Chicago</option>
          <option value="st louis, mo">St Louis</option>
          <option value="joplin, mo">Joplin, MO</option>
          <option value="oklahoma city, ok">Oklahoma City</option>
          <option value="amarillo, tx">Amarillo</option>
          <option value="gallup, nm">Gallup, NM</option>
          <option value="flagstaff, az">Flagstaff, AZ</option>
          <option value="winona, az">Winona</option>
          <option value="kingman, az">Kingman</option>
          <option value="barstow, ca">Barstow</option>
          <option value="san bernardino, ca">San Bernardino</option>
          <option value="los angeles, ca">Los Angeles</option>
        </select>
        <br />
        <strong>End:</strong>
        <select id="end">
          <option value="chicago, il">Chicago</option>
          <option value="st louis, mo">St Louis</option>
          <option value="joplin, mo">Joplin, MO</option>
          <option value="oklahoma city, ok">Oklahoma City</option>
          <option value="amarillo, tx">Amarillo</option>
          <option value="gallup, nm">Gallup, NM</option>
          <option value="flagstaff, az">Flagstaff, AZ</option>
          <option value="winona, az">Winona</option>
          <option value="kingman, az">Kingman</option>
          <option value="barstow, ca">Barstow</option>
          <option value="san bernardino, ca">San Bernardino</option>
          <option value="los angeles, ca">Los Angeles</option>
        </select>
      </div>
    </div>

    <!-- 
      The `defer` attribute causes the callback to execute after the full HTML
      document has been parsed. For non-blocking uses, avoiding race conditions,
      and consistent behavior across browsers, consider loading using Promises.
      See https://developers.google.com/maps/documentation/javascript/load-maps-js-api
      for more information.
      -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBE1Xgn2mQmGOtUevIuFYw6443BkKCjbI&callback=initMap&v=weekly"
      defer
    ></script>
    
  </body>
</html>