@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification
                </button>
                <div class="card mt-3">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('send.web-notification') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Message Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Message Body</label>
                                <textarea class="form-control" name="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script>


        const firebaseConfig = {
            apiKey: "AIzaSyCyCDHuz35kvHf_tW0l1_h348_Yag5yiR0",
            authDomain: "investor-unite.firebaseapp.com",
            projectId: "investor-unite",
            storageBucket: "investor-unite.appspot.com",
            messagingSenderId: "963236618605",
            appId: "1:963236618605:web:db8627fef2a8b4be87ba64",
            measurementId: "G-9J45JD7HBS"
        };
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
        const messaging = firebase.messaging();
        messaging.getToken({ vapidKey: "BPHztRYmmnIqPknJcL5VOKlSJZJitZC8NdgNXgoJNd652i-jvQU_iFIZqgflFN6mMbBQmgctcsLkwz5_BLvWtXE" })
        .then(function(currentToken) {
        if (currentToken) {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": '{{ csrf_token() }}'
                },
                url: '{{ route('store.token') }}',
                type: "POST",
                data: {
                    token: currentToken,
                },
                dataType: "json",
                success: function(response) {
                    alert("Token saved.");
                },
                error: function(error) {
                    alert("Token error.", error);
                }
            });
        } else {
            alert("No registration token available. Request permission to generate one.");
        }
    })
    .catch(function(error) {
        alert("An error occurred while retrieving token. " + error);
    });

            messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
                image: payload.notification.image,
            };
            new Notification(title, options);
            });

            // document.addEventListener('DOMContentLoaded', function() {
            //     alert('hi');
            // });
    </script>
@endsection
