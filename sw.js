//asignar un nombre y versión al cache
const CACHE_NAME = 'Neotec_10',
  urlsToCache = [
   	'<?php echo base_url();?>',
		'<?php echo base_url(); ?>/assets/css/avatar.png',
	  '<?php echo base_url(); ?>/assets/img/favicon.png',
	  '<?php echo base_url(); ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css',
	  '<?php echo base_url(); ?>/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css',
	  '<?php echo base_url(); ?>/assets/css/bootstrap.min.css',
	  '<?php echo base_url(); ?>/assets/css/style.css',
	  '<?php echo base_url(); ?>/assets/css/styleLogin.css',
	  '<?php echo base_url(); ?>/assets/css/avatar.png',
	    '<?php echo base_url(); ?>/assets/lib/chart/chart.min.js',
    	'<?php echo base_url(); ?>/assets/lib/easing/easing.min.js',
   ' <?php echo base_url(); ?>/assets/lib/waypoints/waypoints.min.js',
    '<?php echo base_url(); ?>/assets/lib/owlcarousel/owl.carousel.min.js',
    '<?php echo base_url(); ?>/assets/lib/tempusdominus/js/moment.min.js',
    '<?php echo base_url(); ?>/assets/lib/tempusdominus/js/moment-timezone.min.js',
    '<?php echo base_url(); ?>/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js>',
	  'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0',
    'https://fonts.googleapis.com',
    'https://fonts.gstatic.com',
    'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap'
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache)
          .then(() => self.skipWaiting())
      })
      .catch(err => console.log('Falló registro de cache', err))
  )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        //recuperar de la petición a la url
        return fetch(e.request)
      })
  )
})
