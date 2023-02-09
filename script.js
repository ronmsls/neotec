if ("serviceWorker" in navigator) {
  window.addEventListener("load", function() {
    navigator.serviceWorker
      .register("/sw.js")
      .then(res => console.log('Registro de SW exitoso', reg))
      .catch(err => console.log("service worker not registered", err))
  })
}
