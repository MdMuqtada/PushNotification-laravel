// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyCyCDHuz35kvHf_tW0l1_h348_Yag5yiR0",
    authDomain: "investor-unite.firebaseapp.com",
    projectId: "investor-unite",
    storageBucket: "investor-unite.appspot.com",
    messagingSenderId: "963236618605",
    appId: "1:963236618605:web:db8627fef2a8b4be87ba64",
    measurementId: "G-9J45JD7HBS"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    // console.log('Message received.', payload);
    const title = 'Hello world is awesome';
    const options = {
        body: 'Your notification message .',
        icon: 'Your notification message .',
        image: 'Your notification message .',
    };
    return self.registration.showNotification(
        title,
        options,
    );
});



