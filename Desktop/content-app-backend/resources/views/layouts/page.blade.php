<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @laravelTelInputStyles

    @livewireStyles
</head>

<body class="p-0 m-0 font-sans bg-blue-300">

    @include('includes.sections.header-section')

    <main>
        {{ $slot }}
    </main>

    @include('includes.sections.footer-section')

    @livewire('notifications')

    @filamentScripts
    @livewireScripts
    @laravelTelInputScripts
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <!-- At the end of your body tag -->
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#phone");
        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.0.10/build/js/utils.js",
        });
         document.addEventListener('DOMContentLoaded', initializeIntlTelInput);
  // for updated page components too 

    </script>

    

</body>

</html>
