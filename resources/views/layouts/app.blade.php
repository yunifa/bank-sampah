<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Informasi Bank Sampah')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#faf3e0] text-[#330e01] antialiased">
    <div class="flex min-h-screen">
        {{-- ============ SIDEBAR ============ --}}
        <aside class="fixed inset-y-0 left-0 w-[260px] bg-[#4e220f] flex flex-col justify-between shadow-[0px_1px_4px_rgba(0,0,0,0.04)]">
            <div>
                {{-- Brand --}}
                <div class="h-[80px] flex items-center gap-3 px-4 bg-[rgba(51,14,1,0.2)]">
                    <div class="size-8 rounded-md bg-[#855226] flex items-center justify-center text-[#fff9e8] font-bold">
                        BS
                    </div>
                    <div>
                        <p class="text-[#fff9e8] text-[18px] font-semibold leading-6">Bank Sampah</p>
                        <p class="text-[#c1cba9] text-[11px] font-semibold tracking-[0.44px] leading-[14px]">SMK Hijau Lestari</p>
                    </div>
                </div>

                {{-- Menu --}}
                <p class="px-4 pt-4 pb-3 text-[11px] font-semibold tracking-[0.55px] uppercase text-[#c1cba9]">
                    Menu Utama
                </p>
                <nav class="flex flex-col gap-1 px-3">
                    @php
                        $menu = [
                            ['label' => 'Dashboard', 'route' => 'dashboard.pengelola', 'icon' => '🏠'],
                            ['label' => 'Nasabah', 'route' => 'nasabah.index', 'icon' => '👤'],
                            ['label' => 'Jenis Sampah', 'route' => null, 'icon' => '♻️'],
                            ['label' => 'Riwayat Transaksi', 'route' => null, 'icon' => '📄'],
                            ['label' => 'Akun', 'route' => null, 'icon' => '⚙️'],
                        ];
                    @endphp
                    @foreach ($menu as $item)
                        @php $active = $item['route'] && request()->routeIs($item['route']); @endphp
                        <a href="{{ $item['route'] ? route($item['route']) : '#' }}"
                           class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-semibold tracking-[0.26px]
                                  {{ $active ? 'bg-[#855226] text-[#f7f1de]' : 'text-[#c1cba9] hover:bg-[rgba(255,255,255,0.06)]' }}">
                            <span class="w-[16px] text-center">{{ $item['icon'] }}</span>
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>

            {{-- User / logout --}}
            <div class="bg-[rgba(51,14,1,0.3)] p-3 flex flex-col gap-2">
                <div class="bg-[rgba(255,255,255,0.1)] rounded-lg p-3 flex items-center gap-3">
                    <span class="size-2.5 rounded-full bg-[#dde7c4]"></span>
                    <div>
                        <p class="text-[#fff9e8] text-[11px] font-semibold tracking-[0.44px]">Petugas / Admin</p>
                        <p class="text-[#c1cba9] text-[12px] tracking-[0.12px]">Unit SMK Hijau</p>
                    </div>
                </div>
                <a href="#" class="flex items-center gap-3 rounded-lg px-3 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#c1cba9] hover:bg-[rgba(255,255,255,0.06)]">
                    <span class="w-[15px] text-center">⏻</span>
                    <span>Keluar</span>
                </a>
            </div>
        </aside>

        {{-- ============ MAIN AREA ============ --}}
        <div class="ml-[260px] flex-1 flex flex-col min-h-screen">
            {{-- Header --}}
            <header class="sticky top-0 z-10 h-[80px] flex items-center gap-6 px-6 bg-[rgba(255,249,232,0.9)] backdrop-blur-md shadow-[0px_1px_8px_rgba(0,0,0,0.04)]">
                <p class="text-[12px] text-[#52443e] whitespace-nowrap">Sistem Informasi Bank Sampah</p>

                <div class="flex-1 max-w-[306px] bg-white rounded-lg px-3 py-2 flex items-center gap-2 shadow-[0px_1px_4px_rgba(0,0,0,0.04)]">
                    <span class="text-[#85736d]">🔍</span>
                    <input type="text" placeholder="Cari transaksi, nasabah, sampah..."
                           class="w-full text-[12px] tracking-[0.12px] text-[#85736d] placeholder-[#85736d] bg-transparent outline-none">
                </div>

                <div class="ml-auto text-right">
                    <p class="text-[13px] font-semibold tracking-[0.26px] text-[#1e1c10]">{{ $namaPengguna ?? 'Ibu Sri Wahyuni' }}</p>
                    <p class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">{{ $peranPengguna ?? 'Petugas /Koordinator' }}</p>
                </div>
            </header>

            {{-- Page content --}}
            <main class="flex-1 p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>