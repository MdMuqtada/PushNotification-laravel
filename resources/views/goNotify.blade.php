<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button name="button" id="button">Click Me</button>


    <script>
        const button = document.querySelector("button");
        button.addEventListener("click", () => {
            Notification.requestPermission().then(perm => {
                const notification =  new Notification("Example Notification" , {
                    body: "hello this is body",
                    icon: '{{asset('logo.png')}}',
                });
            });
        });
    </script>



</body>
</html>
