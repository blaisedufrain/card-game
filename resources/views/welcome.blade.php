<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
        <script>
            window.__VUE_DEVTOOLS_HOST__ = '809' // default: localhost
            window.__VUE_DEVTOOLS_PORT__ = '8098' // default: 8098
        </script>
        <script src="http://192.168.1.212:8098"></script>
    </head>
    <body>
    <div id="app" class=" w-full p-8 flex justify-center font-sans">
        <card-game></card-game>

    </div>
    <script src="{{ url('js/app.js') }}?v={{ time() }}"></script>
    </body>
</html>
