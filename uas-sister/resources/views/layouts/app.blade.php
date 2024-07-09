<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
            {{-- karena template untuk frontpage, silakan Lengkapi meta tag yang lain untuk SEO --}}
            {{-- nama web sesuai konfigurasi, dapat juga dibuat dinamis --}}
        <title>{{ config('app.name', 'Laravel') }}</title>
            <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
            <!-- Scripts -->
            {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
            {{-- karena terjadi maslah pada instalasi tailwind, shg masih menggunakan CDN --}}
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
        <!-- resources/views/layouts/app.blade.php atau di bagian bawah file HTML -->

<!-- resources/views/layouts/app.blade.php -->

<!-- ... (bagian sebelumnya) -->

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            var productId = $(this).data('product-id');

            // Kirim request AJAX untuk menambahkan barang ke keranjang
            $.ajax({
                url: '/add-to-cart',
                type: 'POST',
                data: { product_id: productId },
                success: function(response) {
                    // Reload konten setelah berhasil menambahkan barang ke keranjang
                    $('#content').html(response);
                }
            });
        });
    });
</script>

</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigationhome')
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>

    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            {{-- membuat komponen navigation untuk home --}}
            {{-- basenya bisa menggunakan layouts.navigation, hanya saja hilangkan bagian menu login --}}
            @include('layouts.navigationhome')
            <!-- Page Content -->
            <main>
                {{-- SLot untuk halaman konten yang berubah dinamis sesuai dengan view yang dipanggil oleh controller --}}
                {{ $slot }}
            </main>
        </div>
    </body>
</html>