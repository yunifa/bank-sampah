@extends('layouts.guest')

@section('title', 'Masuk ke Sistem')

@section('content')
    <div class="flex h-[740px] w-full max-w-[1280px] overflow-hidden rounded-3xl border border-[rgba(176,186,153,0.4)] bg-white shadow-[0px_20px_25px_-5px_rgba(78,34,15,0.05),0px_8px_10px_-6px_rgba(78,34,15,0.05)]">

        {{-- ===== Kolom kiri: branding ===== --}}
        <div class="relative hidden w-[45%] shrink-0 overflow-hidden bg-[#4e220f] p-12 lg:flex lg:flex-col lg:justify-between">
            <div class="pointer-events-none absolute -right-16 -top-16 size-64 rounded-full border border-[rgba(176,186,153,0.2)]"></div>
            <div class="pointer-events-none absolute -right-8 top-32 size-80 rounded-full border border-[rgba(157,102,56,0.3)]"></div>
            <div class="pointer-events-none absolute -bottom-12 -left-12 size-48 rounded-full bg-[rgba(157,102,56,0.1)] blur-2xl"></div>

            <div class="relative flex flex-col gap-[57px]">
                <h1 class="text-[36px] font-extrabold leading-[40px] tracking-[-0.9px] text-[#f7f1de]">
                    Kelola Sampah,<br>Tumbuhkan Tabungan.
                </h1>

                <p class="max-w-[384px] text-[14px] leading-[22.75px] text-[rgba(247,241,222,0.8)]">
                    Platform tata kelola timbang sampah terpadu untuk menanamkan literasi sirkular ekonomi
                    dan tabungan masa depan warga SMK Negeri Hijau Lestari.
                </p>

                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3.5 rounded-2xl border border-[rgba(176,186,153,0.2)] bg-[rgba(157,102,56,0.25)] p-[15px]">
                        <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-[#b0ba99] text-[#4e220f]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18M7 21h10M5 7l-3 6a3 3 0 0 0 6 0l-3-6Zm14 0-3 6a3 3 0 0 0 6 0l-3-6ZM5 7h14M12 3l-2 4h4l-2-4Z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-[12px] font-bold leading-4 text-[#f7f1de]">Penimbangan Terverifikasi ISO</p>
                            <p class="text-[11px] leading-[16.5px] text-[rgba(247,241,222,0.7)]">Timbangan digital langsung terhubung ke mutasi buku tabungan.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3.5 rounded-2xl border border-[rgba(176,186,153,0.2)] bg-[rgba(157,102,56,0.25)] p-[15px]">
                        <span class="flex size-10 shrink-0 items-center justify-center rounded-xl bg-[#b0ba99] text-[#4e220f]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5">
                                <rect x="2.5" y="6" width="19" height="12" rx="2"/>
                                <circle cx="12" cy="12" r="2.5"/>
                                <path stroke-linecap="round" d="M6 9v0M18 15v0"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-[12px] font-bold leading-4 text-[#f7f1de]">Kompensasi Transparan Real-Time</p>
                            <p class="text-[11px] leading-[16.5px] text-[rgba(247,241,222,0.7)]">Total Rp dihitung otomatis (Berat × Tarif acuan resmi per kg).</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative flex items-center justify-between border-t border-[rgba(176,186,153,0.2)] pt-[33px] text-[12px] text-[rgba(247,241,222,0.6)]">
                <span>Versi Sistem 2.4.0-PROD</span>
                <span>SMKN Hijau Lestari © 2026</span>
            </div>
        </div>

        {{-- ===== Kolom kanan: form login ===== --}}
        <div class="flex flex-1 items-center justify-center px-8 py-12 lg:px-16">
            <div class="flex w-full max-w-[448px] flex-col gap-6">

                <div>
                    <h2 class="text-[30px] font-extrabold leading-9 tracking-[-0.75px] text-[#4e220f]">Masuk ke Sistem</h2>
                </div>

                {{-- Notifikasi peran --}}
                <div class="flex items-center gap-3 rounded-xl border border-[rgba(176,186,153,0.4)] bg-[rgba(247,241,222,0.7)] p-[15px]">
                    <span class="flex size-6 shrink-0 items-center justify-center rounded-lg bg-[#b0ba99] text-[#4e220f]">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3 4.5 6v5.5c0 4.5 3.2 7.6 7.5 9 4.3-1.4 7.5-4.5 7.5-9V6L12 3Z"/>
                        </svg>
                    </span>
                    <p class="text-[12px] leading-4 text-[#4e220f]">
                        <span class="font-bold">Akses Operasional:</span> Digunakan oleh petugas piket, koordinator
                        bank sampah, dan administrator sekolah.
                    </p>
                </div>

                {{-- Pesan error / validasi (kalau ada) --}}
                @if ($errors->any())
                    <div class="rounded-xl border border-red-200 bg-red-50 p-3 text-[12px] text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/login') }}" class="flex flex-col gap-4">
                    @csrf

                    {{-- Username --}}
                    <div class="flex flex-col gap-1.5">
                        <label for="username" class="text-[12px] font-bold uppercase tracking-[0.3px] text-[#4e220f]">Username</label>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-[#9d6638]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5">
                                    <circle cx="12" cy="8" r="3.5"/>
                                    <path stroke-linecap="round" d="M5 20c0-3.5 3.1-6 7-6s7 2.5 7 6"/>
                                </svg>
                            </span>
                            <input id="username" name="username" type="text" value="{{ old('username') }}"
                                   placeholder="nama@smkhijau.sch.id"
                                   class="w-full rounded-xl border border-[rgba(176,186,153,0.5)] bg-white py-3 pl-11 pr-4 text-[14px] font-medium text-[#4e220f] outline-none focus:border-[#9d6638]">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div class="flex flex-col gap-1.5">
                        <div class="flex items-center justify-between">
                            <label for="password" class="text-[12px] font-bold uppercase tracking-[0.3px] text-[#4e220f]">Kata Sandi</label>
                            <a href="#" class="text-[12px] font-semibold text-[#9d6638]">Lupa Kata Sandi?</a>
                        </div>
                        <div class="relative">
                            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5 text-[#9d6638]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5">
                                    <rect x="5" y="11" width="14" height="9" rx="2"/>
                                    <path stroke-linecap="round" d="M8 11V7.5a4 4 0 0 1 8 0V11"/>
                                </svg>
                            </span>
                            <input id="password" name="password" type="password"
                                   placeholder="••••••••"
                                   class="w-full rounded-xl border border-[rgba(176,186,153,0.5)] bg-white py-3 pl-11 pr-11 text-[14px] font-medium text-[#4e220f] outline-none focus:border-[#9d6638]">
                            <button type="button" onclick="const p=document.getElementById('password'); p.type = p.type === 'password' ? 'text' : 'password';"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3.5 text-[#9d6638]">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12Z"/>
                                    <circle cx="12" cy="12" r="2.75"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="mt-1 flex w-full items-center justify-center gap-2 rounded-xl bg-[#9d6638] px-6 py-3.5 text-[14px] font-bold text-[#f7f1de] shadow-[0px_4px_6px_-1px_rgba(0,0,0,0.1),0px_2px_4px_-2px_rgba(0,0,0,0.1)]">
                        Masuk ke Sistem <span>→</span>
                    </button>
                </form>

                {{-- Info bantuan --}}
                <div class="border-t border-[rgba(176,186,153,0.3)] pt-6">
                    <div class="flex gap-3 rounded-xl border border-[rgba(176,186,153,0.3)] bg-[rgba(247,241,222,0.6)] p-[15px]">
                        <span class="mt-0.5 flex size-4 shrink-0 items-center justify-center text-[#9d6638]">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="size-4">
                                <circle cx="12" cy="12" r="9.25"/>
                                <path stroke-linecap="round" d="M12 11v5.5"/>
                                <circle cx="12" cy="8" r="0.9" fill="currentColor" stroke="none"/>
                            </svg>
                        </span>
                        <p class="text-[12px] leading-[19.5px] text-[#4e220f]">
                            <span class="font-bold">Belum memiliki akun nasabah?</span><br>
                            Buku tabungan dan aktivasi akun digital diterbitkan di ruang piket
                            Bank Sampah Gedung C oleh pengurus sekolah.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection