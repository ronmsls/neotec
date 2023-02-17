const CACHE_NAME = 'my-cache-v1';

self.addEventListener('fetch', event => {
  event.respondWith(
    fetch(event.request)
      .then(response => {
        // Clonar la respuesta para que podamos guardarla en caché
        const responseClone = response.clone();

        caches.open(CACHE_NAME)
          .then(cache => {
            cache.put(event.request, responseClone);
          });

        return response;
      })
      .catch(() => {
        return caches.match(event.request)
          .then(response => {
            return response || new Response(null, {status: 404});
          });
      })
  );
});
