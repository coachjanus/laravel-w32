<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title ?? "Admin Layout"}}</title>
</head>
<body>
    <main>
        @if (isset($header))
            {{ $header }}
        @endif
        {{ $slot }}
    </main>
    {{-- 
    <footer>
    <p>time()</p>
    <p>Copyright &copy; {{ date('Y') }}</p>
    </footer>
     --}}
    <x-admin.footer />
</body>
</html>