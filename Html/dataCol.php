<!DOCTYPE html>
<html>
<head>
  <title>Client Information</title>
</head>
<body>
  <p id="ipAddress"></p>
  <p id="appName"></p>
  <p id="appCodeName"></p>
  <p id="platform"></p>
  <p id="timeAccessed"></p>
  <p id="latitude"></p>
  <p id="longitude"></p>
  <p id="accuracy"></p>
  <p id="browserName"></p>
  <p id="browserLanguage"></p>
  <p id="browserVersion"></p>
  <p id="browserEngine"></p>
  <p id="screenWidth"></p>
  <p id="screenHeight"></p>
  <p id="windowWidth"></p>
  <p id="windowHeight"></p>
  <p id="screenAvailableWidth"></p>
  <p id="screenAvailableHeight"></p>
  <p id="screenColorDepth"></p>
  <p id="screenPixelDepth"></p>
  <p id="javaEnabled"></p>
  <p id="cookiesEnabled"></p>
  <p id="cookieData"></p>
  <p id="localStorageData"></p>

  <script>
    // Get IP Address using PHP
    <?php
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    ?>

    document.getElementById("ipAddress").textContent = `IP Address: <?php echo $ipAddress; ?>`;

    // Get App Name, App Code, and Platform
    const appName = navigator.appName || null;
    const appCodeName = navigator.appCodeName || null;
    const platform = navigator.platform || null;

    // Get Time Accessed
    const timeAccessed = new Date();

    // Get Geolocation
    const geolocationPromise = new Promise((resolve, reject) => {
      navigator.geolocation.getCurrentPosition(
        position => resolve(position),
        error => reject(error)
      );
    }).catch(() => null);

    // Get Browser Information
    const browserName = navigator.userAgent || null;
    const browserLanguage = navigator.language || null;
    const browserVersion = navigator.appVersion || null;
    const browserEngine = navigator.product || null;

    // Get Screen Information
    const screenWidth = screen.width || null;
    const screenHeight = screen.height || null;
    const windowWidth = window.innerWidth || null;
    const windowHeight = window.innerHeight || null;
    const screenAvailableWidth = screen.availWidth || null;
    const screenAvailableHeight = screen.availHeight || null;
    const screenColorDepth = screen.colorDepth || null;
    const screenPixelDepth = screen.pixelDepth || null;

    // Get Java and Cookies Information
    const javaEnabled = navigator.javaEnabled() || null;
    const cookiesEnabled = navigator.cookieEnabled || null;
    const cookieData = document.cookie || null;
    const localStorageData = localStorage || null;

    // Update HTML with the information
    Promise.resolve(geolocationPromise)
      .then(position => {
        const latitude = position?.coords?.latitude || null;
        const longitude = position?.coords?.longitude || null;
        const accuracy = position?.coords?.accuracy || null;

        document.getElementById("appName").textContent = `App Name: ${appName || 'N/A'}`;
        document.getElementById("appCodeName").textContent = `App Code Name: ${appCodeName || 'N/A'}`;
        document.getElementById("platform").textContent = `Platform: ${platform || 'N/A'}`;
        document.getElementById("timeAccessed").textContent = `Time Accessed: ${timeAccessed}`;
        document.getElementById("latitude").textContent = `Geolocation - Latitude: ${latitude || 'N/A'}`;
        document.getElementById("longitude").textContent = `Geolocation - Longitude: ${longitude || 'N/A'}`;
        document.getElementById("accuracy").textContent = `Geolocation - Accuracy: ${accuracy || 'N/A'}`;
        document.getElementById("browserName").textContent = `Browser Name: ${browserName || 'N/A'}`;
        document.getElementById("browserLanguage").textContent = `Browser Language: ${browserLanguage || 'N/A'}`;
        document.getElementById("browserVersion").textContent = `Browser Version: ${browserVersion || 'N/A'}`;
        document.getElementById("browserEngine").textContent = `Browser Engine: ${browserEngine || 'N/A'}`;
        document.getElementById("screenWidth").textContent = `Screen Width: ${screenWidth || 'N/A'}`;
        document.getElementById("screenHeight").textContent = `Screen Height: ${screenHeight || 'N/A'}`;
        document.getElementById("windowWidth").textContent = `Window Width: ${windowWidth || 'N/A'}`;
        document.getElementById("windowHeight").textContent = `Window Height: ${windowHeight || 'N/A'}`;
        document.getElementById("screenAvailableWidth").textContent = `Screen Available Width: ${screenAvailableWidth || 'N/A'}`;
        document.getElementById("screenAvailableHeight").textContent = `Screen Available Height: ${screenAvailableHeight || 'N/A'}`;
        document.getElementById("screenColorDepth").textContent = `Screen Color Depth: ${screenColorDepth || 'N/A'}`;
        document.getElementById("screenPixelDepth").textContent = `Screen Pixel Depth: ${screenPixelDepth || 'N/A'}`;
        document.getElementById("javaEnabled").textContent = `Java Enabled: ${javaEnabled || 'N/A'}`;
        document.getElementById("cookiesEnabled").textContent = `Cookies Enabled: ${cookiesEnabled || 'N/A'}`;
        document.getElementById("cookieData").textContent = `Cookie Data: ${cookieData || 'N/A'}`;
        document.getElementById("localStorageData").textContent = `Local Storage Data: ${localStorageData || 'N/A'}`;
      })
      .catch(error => {
        console.error("Error:", error);
      });
  </script>
</body>
</html>
<?php
$ipAddress = $_SERVER['REMOTE_ADDR'];
echo "IP Address: " . $ipAddress;


?>
<!DOCTYPE html>
<html>

<head>
    <title>Client Information</title>
</head>

<body>
    <p id="ipAddress"></p>
    <p id="appName"></p>
    <p id="appCodeName"></p>
    <p id="platform"></p>
    <p id="timeAccessed"></p>
    <p id="latitude"></p>
    <p id="longitude"></p>
    <p id="accuracy"></p>
    <p id="browserName"></p>
    <p id="browserLanguage"></p>
    <p id="browserVersion"></p>
    <p id="browserEngine"></p>
    <p id="screenWidth"></p>
    <p id="screenHeight"></p>
    <p id="windowWidth"></p>
    <p id="windowHeight"></p>
    <p id="screenAvailableWidth"></p>
    <p id="screenAvailableHeight"></p>
    <p id="screenColorDepth"></p>
    <p id="screenPixelDepth"></p>
    <p id="javaEnabled"></p>
    <p id="cookiesEnabled"></p>
    <p id="cookieData"></p>
    <p id="localStorageData"></p>
    <div id="Custom"></div>

    <script>
        // Get IP Address using PHP
        <?php
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        ?>
            var info = {
            timeOpened: new Date(),
            timezone: (new Date()).getTimezoneOffset() / 60,
            pageon: function() { return window.location.pathname; },
            referrer: function() { return document.referrer; },
            previousSites: function() { return history.length; },
            browserName: function() { return navigator.appName; },
            browserEngine: function() { return navigator.product; },
            browserVersion1a: function() { return navigator.appVersion; },
            browserVersion1b: function() { return navigator.userAgent; },
            browserLanguage: function() { return navigator.language; },
            browserOnline: function() { return navigator.onLine; },
            browserPlatform: function() { return navigator.platform; },
            javaEnabled: function() { return navigator.javaEnabled(); },
            dataCookiesEnabled: function() { return navigator.cookieEnabled; },
            dataCookies1: function() { return document.cookie; },
            dataCookies2: function() { return decodeURIComponent(document.cookie.split(";")); },
            sizeScreenW: function() { return screen.width; },
            sizeScreenH: function() { return screen.height; },
            sizeDocW: function() { return document.documentElement.clientWidth; },
            sizeDocH: function() { return document.documentElement.clientHeight; },
            sizeInW: function() { return window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth; },
            sizeInH: function() { return window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight; },
            sizeAvailW: function() { return screen.availWidth; },
            sizeAvailH: function() { return screen.availHeight; },
            scrColorDepth: function() { return screen.colorDepth; },
            scrPixelDepth: function() { return screen.pixelDepth; }
        };
        document.getElementById("ipAddress").textContent = `IP Address: <?php echo $ipAddress; ?>`;

        // Get App Name, App Code, and Platform
        const appName = navigator.appName || null;
        const appCodeName = navigator.appCodeName || null;
        const platform = navigator.platform || null;

        // Get Time Accessed
        const timeAccessed = new Date();

        // Get Geolocation
        const geolocationPromise = new Promise((resolve, reject) => {
            navigator.geolocation.getCurrentPosition(
                position => resolve(position),
                error => reject(error)
            );
        }).catch(() => null);

        // Get Browser Information
        const browserName = navigator.userAgent || null;
        const browserLanguage = navigator.language || null;
        const browserVersion = navigator.appVersion || null;
        const browserEngine = navigator.product || null;

        // Get Screen Information
        const screenWidth = screen.width || null;
        const screenHeight = screen.height || null;
        const windowWidth = window.innerWidth || null;
        const windowHeight = window.innerHeight || null;
        const screenAvailableWidth = screen.availWidth || null;
        const screenAvailableHeight = screen.availHeight || null;
        const screenColorDepth = screen.colorDepth || null;
        const screenPixelDepth = screen.pixelDepth || null;

        // Get Java and Cookies Information
        const javaEnabled = navigator.javaEnabled() || null;
        const cookiesEnabled = navigator.cookieEnabled || null;
        const cookieData = document.cookie || null;
        const localStorageData = localStorage || null;

        // Update HTML with the information
        Promise.resolve(geolocationPromise)
            .then(position => {
                const latitude = position?.coords?.latitude || null;
                const longitude = position?.coords?.longitude || null;
                const accuracy = position?.coords?.accuracy || null;

                document.getElementById("appName").textContent = `App Name: ${appName || 'N/A'}`;
                document.getElementById("appCodeName").textContent = `App Code Name: ${appCodeName || 'N/A'}`;
                document.getElementById("platform").textContent = `Platform: ${platform || 'N/A'}`;
                document.getElementById("timeAccessed").textContent = `Time Accessed: ${timeAccessed}`;
                document.getElementById("latitude").textContent = `Geolocation - Latitude: ${latitude || 'N/A'}`;
                document.getElementById("longitude").textContent = `Geolocation - Longitude: ${longitude || 'N/A'}`;
                document.getElementById("accuracy").textContent = `Geolocation - Accuracy: ${accuracy || 'N/A'}`;
                document.getElementById("browserName").textContent = `Browser Name: ${browserName || 'N/A'}`;
                document.getElementById("browserLanguage").textContent = `Browser Language: ${browserLanguage || 'N/A'}`;
                document.getElementById("browserVersion").textContent = `Browser Version: ${browserVersion || 'N/A'}`;
                document.getElementById("browserEngine").textContent = `Browser Engine: ${browserEngine || 'N/A'}`;
                document.getElementById("screenWidth").textContent = `Screen Width: ${screenWidth || 'N/A'}`;
                document.getElementById("screenHeight").textContent = `Screen Height: ${screenHeight || 'N/A'}`;
                document.getElementById("windowWidth").textContent = `Window Width: ${windowWidth || 'N/A'}`;
                document.getElementById("windowHeight").textContent = `Window Height: ${windowHeight || 'N/A'}`;
                document.getElementById("screenAvailableWidth").textContent = `Screen Available Width: ${screenAvailableWidth || 'N/A'}`;
                document.getElementById("screenAvailableHeight").textContent = `Screen Available Height: ${screenAvailableHeight || 'N/A'}`;
                document.getElementById("screenColorDepth").textContent = `Screen Color Depth: ${screenColorDepth || 'N/A'}`;
                document.getElementById("screenPixelDepth").textContent = `Screen Pixel Depth: ${screenPixelDepth || 'N/A'}`;
                document.getElementById("javaEnabled").textContent = `Java Enabled: ${javaEnabled || 'N/A'}`;
                document.getElementById("cookiesEnabled").textContent = `Cookies Enabled: ${cookiesEnabled || 'N/A'}`;
                document.getElementById("cookieData").textContent = `Cookie Data: ${cookieData || 'N/A'}`;
                document.getElementById("localStorageData").textContent = `Local Storage Data: ${localStorageData || 'N/A'}`;
                var customElement = document.getElementById("Custom");
 
                // Loop through each property in the info object and append it to the customElement
                for (var prop in info) {
                 // Create a new paragraph element
                    var paragraph = document.createElement("p");

                    // Set the content of the paragraph to the property name and its value from the info object
                    paragraph.textContent = prop + ": " + info[prop]();

                    // Append the paragraph to the customElement
                    customElement.appendChild(paragraph);
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    </script>
</body>

</html>