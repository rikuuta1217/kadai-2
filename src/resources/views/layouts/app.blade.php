<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mogitate</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/') }}"></link> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/') }}"></link> -->
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header-inner">
            <h2 class="header-logo">
                mogitate
            </h2>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>