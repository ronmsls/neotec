if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {
    navigator.serviceWorker.register('/sw.js').then(function(registration) {
      // Registro exitoso
      console.log('ServiceWorker registrado exitosamente con scope: ', registration.scope);
    }, function(err) {
      // Falla en el registro
      console.log('ServiceWorker falló al registrarse: ', err);
    });
  });
}
