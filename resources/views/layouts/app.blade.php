<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire Examples</title>
    <link rel="stylesheet" href="/css/main.css">
    <livewire:styles />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>

    <style>
        progress {
            border-radius: 7px;
        }

        progress::-webkit-progress-bar {
            background-color: lightgray;
            border-radius: 7px;
        }

        progress::-webkit-progress-value {
            background-color: blue;
            border-radius: 7px;
        }

    </style>
</head>

<body>
    <main class="container mx-auto">
        @yield('content')
    </main>

    <livewire:scripts />
</body>

</html>
