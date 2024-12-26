const cacheName = 'winexstore-cache-v1';
const assetsToCache = [
    '/',
    '/index.php',
    '/index.css',
    '/manifest.json',
    '/icons/icon-512.jpeg',
    '/icons/icon-192.jpeg'
];

self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(cacheName).then(cache => {
            return cache.addAll(assetsToCache);
        })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(response => {
            return response || fetch(event.request);
        })
    );
});
