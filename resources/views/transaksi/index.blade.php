@extends('layouts.app')

@section('title', 'Riwayat Transaksi')

@section('content')
    @php
        // NOTE: masih data dummy untuk keperluan tampilan.
        $totalTransaksi = $totalTransaksi ?? 128;
        $pertumbuhanPekanIni = $pertumbuhanPekanIni ?? 14.2;
        $totalSampahKg = $totalSampahKg ?? 356.5;
        $komposisiTerbesar = $komposisiTerbesar ?? '42% Plastik & Kertas';
        $totalSaldoMasuk = $totalSaldoMasuk ?? 1250000;
        $jumlahBukuNasabah = $jumlahBukuNasabah ?? 46;
        $rataRataTransaksi = $rataRataTransaksi ?? 9765;
        $konversiPerSetoran = $konversiPerSetoran ?? 2.78;

        $daftarTransaksi = $daftarTransaksi ?? [
            ['id' => 'ST-00021', 'tgl' => '07 Sep 2026', 'jam' => '08:21 WIB', 'nasabah' => 'Budi Santoso', 'kode' => 'NS003 • XII RPL B', 'inisial' => 'BS', 'inisial_bg' => 'rgba(133,82,38,0.15)', 'inisial_text' => '#855226', 'kategori' => 'Plastik Daur Ulang', 'warna' => '#855226', 'warna_bg' => '#f4eedb', 'berat' => 2.5, 'tarif' => 3000, 'total' => 7500, 'petugas' => 'Ibu Sri Wahyuni', 'status' => 'Sukses'],
            ['id' => 'ST-00020', 'tgl' => '07 Sep 2026', 'jam' => '07:50 WIB', 'nasabah' => 'Siti Aisyah', 'kode' => 'NS012 • X AKL 1', 'inisial' => 'SA', 'inisial_bg' => 'rgba(133,82,38,0.15)', 'inisial_text' => '#855226', 'kategori' => 'Kardus & Box', 'warna' => '#855226', 'warna_bg' => 'rgba(255,220,195,0.5)', 'berat' => 4.0, 'tarif' => 2000, 'total' => 8000, 'petugas' => 'Ibu Sri Wahyuni', 'status' => 'Sukses'],
            ['id' => 'ST-00019', 'tgl' => '06 Sep 2026', 'jam' => '14:10 WIB', 'nasabah' => 'Pak Hendra Pratama', 'kode' => 'NS001 • Guru BK', 'inisial' => 'HP', 'inisial_bg' => '#dde7c4', 'inisial_text' => '#161e08', 'kategori' => 'Kertas Arsip & HVS', 'warna' => '#7a491d', 'warna_bg' => '#f4eedb', 'berat' => 6.2, 'tarif' => 2500, 'total' => 15500, 'petugas' => 'Pak Joko', 'status' => 'Sukses'],
            ['id' => 'ST-00018', 'tgl' => '06 Sep 2026', 'jam' => '11:30 WIB', 'nasabah' => 'Rian Pratama', 'kode' => 'NS045 • XI TKJ 2', 'inisial' => 'RP', 'inisial_bg' => 'rgba(133,82,38,0.15)', 'inisial_text' => '#855226', 'kategori' => 'Botol Plastik Bersih', 'warna' => '#7a491d', 'warna_bg' => '#f4eedb', 'berat' => 1.8, 'tarif' => 4000, 'total' => 7200, 'petugas' => 'Ibu Sri Wahyuni', 'status' => 'Sukses'],
            ['id' => 'ST-00017', 'tgl' => '05 Sep 2026', 'jam' => '10:15 WIB', 'nasabah' => 'Dewi Sartika', 'kode' => 'NS078 • X DKV 3', 'inisial' => 'DS', 'inisial_bg' => 'rgba(133,82,38,0.15)', 'inisial_text' => '#855226', 'kategori' => 'Kaleng Aluminium', 'warna' => '#7a491d', 'warna_bg' => 'rgba(255,187,134,0.5)', 'berat' => 3.0, 'tarif' => 6000, 'total' => 18000, 'petugas' => 'Pak Joko', 'status' => 'Sukses'],
        ];

        $totalHalaman = $totalHalaman ?? 26;
        $halamanAktif = $halamanAktif ?? 1;
    @endphp

    {{-- ===== Breadcrumb & Header ===== --}}
    <div class="flex items-end justify-between pb-8">
        <div>
            <div class="flex items-center gap-1.5 pb-2 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">
                <span>Beranda</span>
                <span>›</span>
                <span class="text-[#855226]">Riwayat Transaksi</span>
            </div>
            <h1 class="text-[36px] font-bold leading-[44px] tracking-[-0.9px] text-[#330e01]">Riwayat Transaksi &amp; Pembukuan Setoran</h1>
            <p class="mt-0.5 max-w-[768px] text-[14px] leading-5 text-[#52443e]">
                Rekapitulasi seluruh setoran sampah masuk, audit mutasi saldo nasabah, dan ekspor laporan berkala unit sekolah.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" class="flex items-center gap-2 rounded-lg bg-[#fff9e8] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#855226] shadow-sm">
                🖨️ Cetak Buku Kas
            </button>
            <button type="button" class="flex items-center gap-2 rounded-lg bg-[#855226] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#fff9e8] shadow-md">
                ⬇️ Unduh Rekap Laporan (PDF/Excel)
            </button>
        </div>
    </div>

    {{-- ===== Metrics Strip ===== --}}
    <div class="grid grid-cols-4 gap-4 pb-8">
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="pointer-events-none absolute -bottom-4 -right-4 size-24 rounded-full bg-[rgba(133,82,38,0.05)]"></div>
            <div class="relative flex items-center justify-between">
                <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Total Transaksi</p>
                <span class="flex size-8 items-center justify-center rounded-lg bg-[#f4eedb]">🧾</span>
            </div>
            <p class="relative mt-1 flex items-baseline gap-2">
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ $totalTransaksi }}</span>
                <span class="text-[13px] font-semibold text-[#52443e]">Setoran</span>
            </p>
            <p class="relative mt-1 flex items-center gap-1 text-[11px] font-semibold tracking-[0.44px] text-[#855226]">↗ +{{ $pertumbuhanPekanIni }}% dari pekan lalu</p>
        </div>

        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="pointer-events-none absolute -bottom-4 -right-4 size-24 rounded-full bg-[rgba(221,231,196,0.3)]"></div>
            <div class="relative flex items-center justify-between">
                <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Total Sampah Ditimbang</p>
                <span class="flex size-8 items-center justify-center rounded-lg bg-[rgba(221,231,196,0.5)]">⚖️</span>
            </div>
            <p class="relative mt-1 flex items-baseline gap-2">
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ number_format($totalSampahKg, 1) }}</span>
                <span class="text-[13px] font-semibold text-[#52443e]">Kg</span>
            </p>
            <p class="relative mt-1 flex items-center gap-1 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">🥧 {{ $komposisiTerbesar }}</p>
        </div>

        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="pointer-events-none absolute -bottom-4 -right-4 size-24 rounded-full bg-[rgba(255,220,195,0.4)]"></div>
            <div class="relative flex items-center justify-between">
                <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Nilai Saldo Masuk</p>
                <span class="flex size-8 items-center justify-center rounded-lg bg-[#eee8d5]">💰</span>
            </div>
            <p class="relative mt-1">
                <span class="align-top text-[13px] font-bold text-[#855226]">Rp</span>
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ number_format($totalSaldoMasuk, 0, ',', '.') }}</span>
            </p>
            <p class="relative mt-1 flex items-center gap-1 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">📘 Kredit ke {{ $jumlahBukuNasabah }} Buku Nasabah</p>
        </div>

        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="pointer-events-none absolute -bottom-4 -right-4 size-24 rounded-full bg-[rgba(51,14,1,0.05)]"></div>
            <div class="relative flex items-center justify-between">
                <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Rata-Rata Transaksi</p>
                <span class="flex size-8 items-center justify-center rounded-lg bg-[#f4eedb]">📊</span>
            </div>
            <p class="relative mt-1">
                <span class="align-top text-[13px] font-bold text-[#855226]">Rp</span>
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ number_format($rataRataTransaksi, 0, ',', '.') }}</span>
            </p>
            <p class="relative mt-1 flex items-center gap-1 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">⚡ Konversi {{ $konversiPerSetoran }} Kg/setoran</p>
        </div>
    </div>

    {{-- ===== Filter Panel ===== --}}
    <div class="mb-4 flex flex-col gap-3 rounded-xl bg-white p-4 shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
        <div class="grid grid-cols-12 gap-3">
            <div class="col-span-3">
                <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Rentang Tanggal</label>
                <div class="flex items-center gap-2 rounded-lg bg-[#faf3e0] px-3 py-2">
                    <span>📅</span>
                    <span class="text-[12px] tracking-[0.12px] text-[#1e1c10]">01 Sep 2026 - 07 Sep 2026</span>
                </div>
            </div>
            <div class="col-span-2">
                <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Kategori Sampah</label>
                <select class="w-full rounded-lg bg-[#faf3e0] px-4 py-2.5 text-[12px] tracking-[0.12px] text-[#1e1c10] outline-none">
                    <option>Semua Kategori</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Petugas</label>
                <select class="w-full rounded-lg bg-[#faf3e0] px-4 py-2.5 text-[12px] tracking-[0.12px] text-[#1e1c10] outline-none">
                    <option>Semua Petugas</option>
                </select>
            </div>
            <div class="col-span-2">
                <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Status</label>
                <select class="w-full rounded-lg bg-[#faf3e0] px-4 py-2.5 text-[12px] tracking-[0.12px] text-[#1e1c10] outline-none">
                    <option>Semua Status</option>
                </select>
            </div>
            <div class="col-span-3">
                <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Cari No. Slip / Nama Nasabah</label>
                <div class="flex items-center gap-2 rounded-lg bg-[#faf3e0] px-3 py-2">
                    <span class="text-[#85736d]">🔍</span>
                    <input type="text" placeholder="Ketik kata kunci..." class="w-full bg-transparent text-[12px] tracking-[0.12px] text-[#1e1c10] outline-none placeholder:text-[#85736d]">
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between pt-1">
            <div class="flex items-center gap-2">
                <span class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Penyaringan Aktif:</span>
                <span class="flex items-center gap-1 rounded-full bg-[rgba(221,231,196,0.6)] px-2 py-0.5 text-[11px] font-semibold text-[#151d07]">01 Sep - 07 Sep 2026 ✕</span>
                <span class="flex items-center gap-1 rounded-full bg-[rgba(221,231,196,0.6)] px-2 py-0.5 text-[11px] font-semibold text-[#151d07]">Semua Petugas ✕</span>
                <button type="button" class="pl-1 text-[11px] font-semibold tracking-[0.44px] text-[#855226]">Reset Filter</button>
            </div>
            <p class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">
                Menampilkan <span class="font-bold">{{ count($daftarTransaksi) }}</span> dari <span class="font-bold">{{ $totalTransaksi }}</span> entri pembukuan
            </p>
        </div>
    </div>

    {{-- ===== Tabel Ledger ===== --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1020px] text-left">
                <thead class="bg-[#faf3e0]">
                    <tr class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#330e01]">
                        <th class="px-4 py-3">No. Transaksi</th>
                        <th class="px-4 py-3">Waktu &amp; Tanggal</th>
                        <th class="px-4 py-3">Identitas Nasabah</th>
                        <th class="px-4 py-3">Komoditas Sampah</th>
                        <th class="px-4 py-3 text-right">Berat</th>
                        <th class="px-4 py-3 text-right">Tarif/Kg</th>
                        <th class="px-4 py-3 text-right">Total Transaksi</th>
                        <th class="px-4 py-3">Petugas Validasi</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarTransaksi as $i => $t)
                        <tr class="{{ $i % 2 === 1 ? 'bg-[rgba(250,243,224,0.2)]' : '' }}">
                            <td class="px-4 py-4 text-[13px] font-bold tracking-[0.26px] text-[#855226]">{{ $t['id'] }}</td>
                            <td class="px-4 py-4">
                                <p class="text-[13px] font-medium tracking-[0.26px] text-[#1e1c10]">{{ $t['tgl'] }}</p>
                                <p class="text-[12px] tracking-[0.12px] text-[#52443e]">{{ $t['jam'] }}</p>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="flex size-7 items-center justify-center rounded-full text-[11px] font-bold tracking-[0.44px]" style="background-color: {{ $t['inisial_bg'] }}; color: {{ $t['inisial_text'] }}">
                                        {{ $t['inisial'] }}
                                    </span>
                                    <div>
                                        <p class="text-[13px] font-semibold tracking-[0.26px] text-[#1e1c10]">{{ $t['nasabah'] }}</p>
                                        <p class="text-[12px] tracking-[0.12px] text-[#52443e]">{{ $t['kode'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full px-2 py-0.5 text-[11px] font-semibold tracking-[0.44px]" style="background-color: {{ $t['warna_bg'] }}; color: {{ $t['warna'] }}">
                                    <span class="size-1.5 rounded-full" style="background-color: {{ $t['warna'] }}"></span>
                                    {{ $t['kategori'] }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right">
                                <span class="text-[14px] font-medium text-[#1e1c10]">{{ number_format($t['berat'], 1) }}</span>
                                <span class="text-[12px] tracking-[0.12px] text-[#52443e]">Kg</span>
                            </td>
                            <td class="px-4 py-4 text-right text-[12px] tracking-[0.12px] text-[#52443e]">Rp {{ number_format($t['tarif'], 0, ',', '.') }}</td>
                            <td class="px-4 py-4 text-right text-[13px] font-bold tracking-[0.26px] text-[#330e01]">Rp {{ number_format($t['total'], 0, ',', '.') }}</td>
                            <td class="px-4 py-4 text-[12px] tracking-[0.12px] text-[#1e1c10]">{{ $t['petugas'] }}</td>
                            <td class="px-4 py-4 text-center">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#dde7c4] px-2 py-0.5 text-[11px] font-semibold tracking-[0.44px] text-[#161e08]">✓ {{ $t['status'] }}</span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-2 text-[13px]">
                                    <button type="button" title="Detail" onclick="document.getElementById('modal-detail-{{ $t['id'] }}').classList.remove('hidden')">📄</button>
                                    <button type="button" title="Cetak">🖨️</button>
                                    <button type="button" title="Hapus">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex items-center justify-between bg-white p-4">
            <div class="flex items-center gap-2 text-[12px] tracking-[0.12px] text-[#52443e]">
                <span>Menampilkan</span>
                <select class="rounded bg-[#faf3e0] px-3 py-0.5 text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10] outline-none">
                    <option>5</option>
                    <option>10</option>
                    <option>25</option>
                </select>
                <span>dari <span class="font-bold">{{ $totalTransaksi }}</span> total mutasi setoran</span>
            </div>
            <div class="flex items-center gap-1">
                <button class="flex size-8 items-center justify-center rounded-lg text-[#52443e]">←</button>
                @for ($p = 1; $p <= min(3, $totalHalaman); $p++)
                    <button class="flex size-8 items-center justify-center rounded-lg text-[11px] font-semibold tracking-[0.44px] {{ $p === $halamanAktif ? 'bg-[#855226] text-[#fff9e8]' : 'text-[#1e1c10]' }}">{{ $p }}</button>
                @endfor
                <span class="px-1 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">…</span>
                <button class="flex size-8 items-center justify-center rounded-lg text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">{{ $totalHalaman }}</button>
                <button class="flex size-8 items-center justify-center rounded-lg text-[#52443e]">→</button>
            </div>
        </div>
    </div>

    {{-- ===== Modal Detail Transaksi (pakai data yang sama seperti di Dashboard) ===== --}}
    @foreach ($daftarTransaksi as $t)
        @php $saldoSebelum = 20000; $saldoAkhir = $saldoSebelum + $t['total']; @endphp
        <div id="modal-detail-{{ $t['id'] }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(78,34,15,0.65)] p-6 backdrop-blur-[3px]">
            <div class="flex w-full max-w-[672px] flex-col overflow-hidden rounded-2xl border border-[rgba(215,194,187,0.4)] bg-white shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)]">
                <div class="flex items-center justify-between border-b border-[rgba(215,194,187,0.3)] bg-[rgba(250,243,224,0.8)] px-6 py-4">
                    <div>
                        <h3 class="text-[18px] font-bold tracking-[-0.45px] text-[#330e01]">Detail Transaksi {{ $t['id'] }}</h3>
                        <p class="text-[12px] tracking-[0.12px] text-[#52443e]">{{ $t['tgl'] }} • {{ $t['jam'] }}</p>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-detail-{{ $t['id'] }}').classList.add('hidden')" class="flex size-8 items-center justify-center rounded-lg text-[#52443e]">✕</button>
                </div>
                <div class="flex flex-col gap-4 p-6">
                    <div class="flex items-center justify-between rounded-xl border border-[rgba(215,194,187,0.3)] bg-[#faf3e0] p-4">
                        <div class="flex items-center gap-3">
                            <span class="flex size-10 items-center justify-center rounded-full text-[13px] font-bold" style="background-color: {{ $t['inisial_bg'] }}; color: {{ $t['inisial_text'] }}">{{ $t['inisial'] }}</span>
                            <div>
                                <p class="text-[14px] font-bold text-[#330e01]">{{ $t['nasabah'] }}</p>
                                <p class="text-[12px] text-[#52443e]">{{ $t['kode'] }}</p>
                            </div>
                        </div>
                        <p class="text-[12px] text-[#52443e]">Petugas: <span class="font-semibold text-[#330e01]">{{ $t['petugas'] }}</span></p>
                    </div>
                    <div class="rounded-xl border border-[rgba(215,194,187,0.3)] bg-white p-4">
                        <div class="flex items-center justify-between border-b border-[rgba(215,194,187,0.2)] pb-3">
                            <div>
                                <p class="text-[13px] font-bold text-[#330e01]">{{ $t['kategori'] }}</p>
                                <p class="text-[12px] text-[#52443e]">Berat: {{ number_format($t['berat'], 1) }} Kg × Rp {{ number_format($t['tarif'], 0, ',', '.') }}/Kg</p>
                            </div>
                            <p class="text-[18px] font-bold text-[#855226]">Rp {{ number_format($t['total'], 0, ',', '.') }}</p>
                        </div>
                        <div class="mt-3 rounded-lg border border-[rgba(252,184,131,0.4)] bg-[rgba(255,220,195,0.3)] p-3.5">
                            <div class="flex items-center justify-between text-[12px] text-[#52443e]">
                                <span>Saldo Sebelum</span><span>Rp {{ number_format($saldoSebelum, 0, ',', '.') }}</span>
                            </div>
                            <div class="mt-1 flex items-center justify-between text-[12px] font-semibold text-[#855226]">
                                <span>Kredit Masuk (+)</span><span>+ Rp {{ number_format($t['total'], 0, ',', '.') }}</span>
                            </div>
                            <div class="mt-1.5 flex items-center justify-between border-t border-[rgba(133,82,38,0.2)] pt-1.5">
                                <span class="text-[11px] font-bold uppercase text-[#330e01]">Saldo Akhir</span>
                                <span class="text-[18px] font-extrabold text-[#330e01]">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end gap-2 border-t border-[rgba(215,194,187,0.3)] bg-[rgba(250,243,224,0.8)] px-6 py-4">
                    <button type="button" onclick="document.getElementById('modal-detail-{{ $t['id'] }}').classList.add('hidden')" class="rounded-lg border border-[rgba(215,194,187,0.6)] px-4 py-2 text-[13px] font-semibold text-[#1e1c10]">Tutup</button>
                    <button type="button" class="rounded-lg bg-[#f4eedb] px-4 py-2 text-[13px] font-semibold text-[#330e01]">⬇️ Unduh PDF</button>
                </div>
            </div>
        </div>
    @endforeach
@endsection