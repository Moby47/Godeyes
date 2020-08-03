var staticCacheName = "pwa-WDog" + new Date().getTime();
var filesToCache = [
  '/',

  '/css/custom.min.css',
  '/css/wicked.min.css',


  'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons',
  'https://unpkg.com/nprogress@0.2.0/nprogress.css',
  'https://cdn.metroui.org.ua/v4.3.2/css/metro-all.min.css',
  

  
  '/images/fav2/apple-touch-icon.png',
  '/images/fav2/favicon-32x32.png',
  '/images/fav2/favicon-16x16.png',
  
  '/images/fav.jpg',


  '/images/app-icons/app-icon-48x48.png',
  '/images/app-icons/app-icon-96x96.png',
  '/images/app-icons/app-icon-192x192.png',
  '/images/app-icons/app-icon-256x256.png',
  '/images/app-icons/app-icon-114x114.png',
  '/images/app-icons/app-icon-384x384.png',
  '/images/app-icons/app-icon-512x512.png',
  

  '/images/bg.jpg',
 
  '/images/white-spinner.gif',
 

  'https://unpkg.com/nprogress@0.2.0/nprogress.js',
  'https://cdn.metroui.org.ua/v4.3.2/js/metro.min.js',
  '/js/particles.min.js'
  
];

// Cache on install
self.addEventListener("install", event => {
    console.log('[Service Worker] Installing Service Worker ...', event);
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    console.log('[Service Worker] Activating Service Worker ....', event);
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-car")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return response;
                //return caches.match('offline.html');
            })
    )
});