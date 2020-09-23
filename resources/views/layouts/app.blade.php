<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire Examples</title>
    <link rel="stylesheet" href="/css/main.css">
    <livewire:styles />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/taggle/src/taggle.js" defer></script>

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

        .textarea {
            width: 100%;
            height: 300px;
            border: 1px solid red;
            padding: 8px;
        }

        .taggle_list {
            padding: 0;
            margin: 0;
            line-height: 2.5;
            width: 100%;
        }

        .taggle_input {
            border: none;
            outline: none;
            font-size: 16px;
            font-weight: 300;
        }

        .taggle_list li {
            display: inline;
            vertical-align: baseline;
            white-space: nowrap;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .taggle_list .taggle {
            margin-right: 8px;
            background: #E2E1DF;
            padding: 5px 10px;
            border-radius: 3px;
            position: relative;
            cursor: pointer;
            transition: all .3s;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .taggle_list .taggle_hot {
            background: #cac8c4;
        }

        .taggle_list .taggle .close {
            font-size: 1.1rem;
            position: absolute;
            top: 10px;
            right: 3px;
            text-decoration: none;
            padding: 0;
            line-height: 0.5;
            color: #ccc;
            color: rgba(0, 0, 0, 0.2);
            padding-bottom: 4px;
            display: inline-block;
            opacity: 0;
            pointer-events: none;
            border: 0;
            background: none;
            cursor: pointer;
        }

        .taggle_list .taggle:hover {
            padding: 5px;
            padding-right: 15px;
            background: #ccc;
            transition: all .3s;
        }

        .taggle_list .taggle:hover > .close {
            opacity: 1;
            pointer-events: auto;
        }

        .taggle_list .taggle .close:hover {
            color: #990033;
        }

        .taggle_placeholder {
            position: absolute;
            color: #CCC;
            top: 24px;
            left: 16px;
            transition: opacity, .25s;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .taggle_input {
            padding: 8px;
            padding-left: 0;
            margin-top: -5px;
            background: none;
            max-width: 100%;
        }

        .taggle_sizer {
            padding: 0;
            margin: 0;
            position: absolute;
            top: -500px;
            z-index: -1;
            visibility: hidden;
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
