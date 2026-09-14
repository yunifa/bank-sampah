<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Masuk ke Sistem')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#faf3e0] text-[#4e220f] antialiased">
    <div class="flex min-h-screen flex-col justify-between">

        {{-- Header sederhana --}}
        <header class="border-b border-[rgba(176,186,153,0.3)] bg-[rgba(255,255,255,0.7)] px-8 py-4 backdrop-blur-md">
            <div class="mx-auto flex max-w-[1280px] items-center">
                <div class="flex size-10 items-center justify-center rounded-xl bg-[#4e220f] text-[20px] shadow-sm">
                    ♻️
                </div>
                <div class="pl-3">
                    <p class="text-[18px] font-bold leading-[18px] tracking-[-0.45px]">Bank Sampah Sekolah</p>
                    <p class="text-[12px] font-medium leading-[16px] text-[#9d6638]">SMK Negeri Hijau Lestari • Unit Mandiri</p>
                </div>
            </div>
        </header>

        {{-- Konten (form login) --}}
        <main class="flex flex-1 items-center justify-center p-8">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="border-t border-[rgba(157,102,56,0.4)] bg-[#4e220f] px-8 py-4">
            <div class="mx-auto max-w-[1280px]">
                <p class="text-[12px] text-[rgba(247,241,222,0.8)]">
                    © 2026 <span class="font-bold text-[#f7f1de]">Bank Sampah SMK Negeri Hijau Lestari</span>. Seluruh hak cipta dilindungi.
                </p>
            </div>
        </footer>
    </div>
</body>
</html>