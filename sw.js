//asignar un nombre y versión al cache
var CACHE_NAME = 'mi-cache-v4';
var urlsToCache = [
    './',
    'https://fonts.googleapis.com/css?family=Raleway:400,700',
    'https://fonts.gstatic.com/s/raleway/v12/1Ptrg8zYS_SKggPNwJYtWqZPAA.woff2',
    'https://use.fontawesome.com/releases/v5.0.7/css/all.css',
    'https://use.fontawesome.com/releases/v5.0.6/webfonts/fa-brands-400.woff2',
    '/css/style.css',
    '/js/app.js',
    '/img/logo.png'
  ] 

  self.addEventListener('install', function(event) {
    // Realizar la instalación del service worker y almacenar en caché los recursos necesarios.
    event.waitUntil(
      caches.open(CACHE_NAME)
        .then(function(cache) {
          console.log('Abriendo cache');
          return cache.addAll(urlsToCache);
        })
    );
  });

  self.addEventListener('fetch', function(event) {
    // Atender peticiones y devolver los recursos desde la caché o desde la red.
    event.respondWith(
      caches.match(event.request)
        .then(function(response) {
          if (response) {
            return response;
          }
  
          var fetchRequest = event.request.clone();
  
          return fetch(fetchRequest).then(
            function(response) {
              if(!response || response.status !== 200 || response.type !== 'basic') {
                return response;
              }
  
              var responseToCache = response.clone();
  
              caches.open(CACHE_NAME)
                .then(function(cache) {
                  cache.put(event.request, responseToCache);
                });
  
              return response;
            }
          );
        })
    );
  });