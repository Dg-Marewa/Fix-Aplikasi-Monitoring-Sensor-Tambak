<html lang="en">
<head>
    <title>Page Reload after 10 seconds - Tutsmake.com</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>

    <!-- <h2>Hello, I am Tutsmake.com</h2> -->

    <h3>Suhu Atas : {{$suhuA}}</h3>
    <h3>Suhu Bawah : {{$suhuB}}</h3>
    <h3>pH Air : {{$pH}}</h3>
    <h3>Tinggi Air : {{$tinggiAir}}</h3>
    <h3>Kadar Oksigen : {{$do}}</h3>


    <script type="text/javascript">
        function autoRefreshPage()
        {
            window.location = window.location.href;
        }
        setInterval('autoRefreshPage()', 3000);
    </script>
</body>
</html>