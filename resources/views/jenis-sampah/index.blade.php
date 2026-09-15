@extends('layouts.app')

@section('title', 'Jenis Sampah')

@section('content')
    @php
        // NOTE: masih data dummy untuk keperluan tampilan.
        $totalKategoriAktif = $totalKategoriAktif ?? 6;
        $tarifRataRata = $tarifRataRata ?? 3160;
        $tarifTertinggi = $tarifTertinggi ?? 6000;
        $komoditasTertinggi = $komoditasTertinggi ?? 'Logam & Kaleng Aluminium';

        $daftarKategori = $daftarKategori ?? [
            ['kode' => 'K-01', 'nama' => 'Plastik Daur Ulang', 'deskripsi' => 'PET bening, tutup botol & botol mineral bersih', 'satuan' => 'Kg', 'tarif' => 3000, 'timbangan_bulan' => 142.5, 'status' => 'Aktif', 'icon_bg' => '#dde7c4', 'icon' => '♻️'],
            ['kode' => 'K-02', 'nama' => 'Kardus & Box Tebal', 'deskripsi' => 'Karton gelombang cokelat, kemasan kering & terikat', 'satuan' => 'Kg', 'tarif' => 2000, 'timbangan_bulan' => 115.0, 'status' => 'Aktif', 'icon_bg' => '#ffdcc3', 'icon' => '📦'],
            ['kode' => 'K-03', 'nama' => 'Kertas HVS & Arsip', 'deskripsi' => 'Buku tulis, kertas dokumen putih, majalah bebas staples', 'satuan' => 'Kg', 'tarif' => 2500, 'timbangan_bulan' => 68.0, 'status' => 'Aktif', 'icon_bg' => '#eee8d5', 'icon' => '📄'],
            ['kode' => 'K-04', 'nama' => 'Botol Kaca Utuh', 'deskripsi' => 'Botol kecap, sirup, saus tanpa retak dan sudah dibilas', 'satuan' => 'Kg', 'tarif' => 1500, 'timbangan_bulan' => 22.0, 'status' => 'Aktif', 'icon_bg' => '#e8e2d0', 'icon' => '🍾'],
            ['kode' => 'K-05', 'nama' => 'Kaleng & Aluminium', 'deskripsi' => 'Kaleng soft drink pipih, seng lembaran, panci aluminium', 'satuan' => 'Kg', 'tarif' => 6000, 'timbangan_bulan' => 45.2, 'status' => 'Aktif', 'icon_bg' => '#ffdcc3', 'icon' => '🥫'],
            ['kode' => 'K-06', 'nama' => 'Minyak Jelantah (UCO)', 'deskripsi' => 'Minyak goreng jelantah jernih disaring, wadah jerigen tertutup', 'satuan' => 'Liter', 'tarif' => 4500, 'timbangan_bulan' => 18.0, 'status' => 'Aktif', 'icon_bg' => '#ffdbce', 'icon' => '🛢️'],
        ];

        $totalKomoditas = $totalKomoditas ?? 6;
    @endphp

    {{-- ===== Breadcrumb & Header ===== --}}
    <div class="flex items-end justify-between pb-8">
        <div>
            <div class="flex items-center gap-1.5 pb-2 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">
                <span>Beranda</span>
                <span>›</span>
                <span class="text-[#855226]">Jenis Sampah</span>
            </div>
            <h1 class="text-[36px] font-bold leading-[44px] tracking-[-0.9px] text-[#330e01]">Kelola Jenis Sampah &amp; Tarif Komoditas</h1>
            <p class="mt-0.5 max-w-[768px] text-[14px] leading-5 text-[#52443e]">
                Atur katalog komoditas daur ulang yang diterima, perbarui tarif acuan beli per satuan.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" class="flex items-center gap-2 rounded-lg bg-[#eee8d5] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#330e01] shadow-sm">
                🖨️ Download Katalog SK (PDF)
            </button>
            <button type="button" onclick="document.getElementById('modal-form-komoditas').classList.remove('hidden')"
                    class="flex items-center gap-2 rounded-lg bg-[#855226] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-white shadow-sm">
                + Tambah Jenis Sampah
            </button>
        </div>
    </div>

    {{-- ===== Stat Cards ===== --}}
    <div class="grid grid-cols-3 gap-4 pb-8">
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="absolute inset-x-0 top-0 h-1 bg-[#855226]"></div>
            <div class="flex items-center justify-between">
                <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Total Kategori Aktif</p>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#ffdcc3]">🗂️</span>
            </div>
            <p class="mt-4 text-[32px] font-extrabold leading-[38px] tracking-tight text-[#330e01]">{{ $totalKategoriAktif }} Komoditas</p>
            <p class="mt-0.5 flex items-center gap-1.5 text-[12px] text-[#52443e]">
                <span class="size-1.5 rounded-full bg-[#855226]"></span> 100% aktif di loket piket harian
            </p>
        </div>
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="absolute inset-x-0 top-0 h-1 bg-[#c1cba9]"></div>
            <div class="flex items-center justify-between">
                <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Tarif Rata-Rata</p>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#dde7c4]">📊</span>
            </div>
            <p class="mt-4">
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">Rp {{ number_format($tarifRataRata, 0, ',', '.') }}</span>
                <span class="text-[14px] text-[#52443e]">/ Kg</span>
            </p>
            <p class="mt-0.5 text-[12px] text-[#52443e]">Penyesuaian SK 01 Sep 2026</p>
        </div>
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="absolute inset-x-0 top-0 h-1 bg-[#ffbb86]"></div>
            <div class="flex items-center justify-between">
                <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Komoditas Tertinggi</p>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#eee8d5]">📈</span>
            </div>
            <p class="mt-4">
                <span class="text-[22px] font-semibold tracking-tight text-[#330e01]">Rp {{ number_format($tarifTertinggi, 0, ',', '.') }}</span>
                <span class="text-[12px] text-[#52443e]">/ Kg</span>
            </p>
            <p class="mt-0.5 text-[13px] font-semibold text-[#855226]">{{ $komoditasTertinggi }}</p>
        </div>
    </div>

    {{-- ===== Search & Filter Pills ===== --}}
    <div class="mb-4 flex flex-col gap-3 rounded-xl bg-white p-4 shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
        <div class="flex items-center justify-between">
            <div class="flex w-[280px] items-center gap-2 rounded-lg bg-[#f4eedb] px-3 py-2">
                <span class="text-[#85736d]">🔍</span>
                <input type="text" placeholder="Cari nama jenis sampah, kode komoditas..." class="w-full bg-transparent text-[12px] tracking-[0.12px] text-[#1e1c10] outline-none placeholder:text-[#85736d]">
            </div>
            <div class="flex items-center gap-2">
                <select class="rounded-lg bg-[#f4eedb] px-4 py-2 text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10] outline-none">
                    <option>Semua Status</option>
                </select>
                <select class="rounded-lg bg-[#f4eedb] px-4 py-2 text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10] outline-none">
                    <option>Tarif Tertinggi</option>
                </select>
            </div>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <span class="rounded-full bg-[#855226] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-white">Semua Kategori ({{ $totalKategoriAktif }})</span>
            <span class="rounded-full bg-[#eee8d5] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">Plastik &amp; Botol (2)</span>
            <span class="rounded-full bg-[#eee8d5] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">Kertas &amp; Karton (2)</span>
            <span class="rounded-full bg-[#eee8d5] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">Logam &amp; Kaleng (1)</span>
            <span class="rounded-full bg-[#eee8d5] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">Minyak Jelantah (1)</span>
        </div>
    </div>

    {{-- ===== Tabel Katalog ===== --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
        <div class="flex items-center justify-between bg-[#f4eedb] px-6 py-4">
            <p class="flex items-center gap-2 text-[18px] font-semibold text-[#330e01]">📘 Katalog Tarif &amp; Buku Mutasi Komoditas</p>
            <span class="rounded bg-[#e8e2d0] px-2 py-0.5 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">{{ $totalKomoditas }} Komoditas Terdaftar</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full min-w-[900px] text-left">
                <thead class="bg-[#faf3e0]">
                    <tr class="text-[11px] font-bold uppercase tracking-[0.55px] text-[#52443e]">
                        <th class="px-4 py-4 text-center">No</th>
                        <th class="px-4 py-4">Komoditas &amp; Spesifikasi</th>
                        <th class="px-4 py-4 text-center">Satuan</th>
                        <th class="px-4 py-4 text-right">Tarif Beli Acuan</th>
                        <th class="px-4 py-4 text-right">Timbangan Bln Ini</th>
                        <th class="px-4 py-4 text-center">Status</th>
                        <th class="px-4 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarKategori as $i => $k)
                        <tr class="{{ $i % 2 === 1 ? 'bg-[rgba(250,243,224,0.3)]' : '' }}">
                            <td class="px-4 py-5 text-center text-[12px] text-[#52443e]">{{ $i + 1 }}</td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex size-10 items-center justify-center rounded-lg text-[18px]" style="background-color: {{ $k['icon_bg'] }}">{{ $k['icon'] }}</span>
                                    <div>
                                        <div class="flex items-center gap-1.5">
                                            <span class="rounded bg-[#f4eedb] px-1.5 py-0.5 font-mono text-[11px] font-bold text-[#330e01]">{{ $k['kode'] }}</span>
                                            <span class="text-[15px] font-bold text-[#330e01]">{{ $k['nama'] }}</span>
                                        </div>
                                        <p class="text-[12px] tracking-[0.12px] text-[#52443e]">{{ $k['deskripsi'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-5 text-center">
                                <span class="rounded-full bg-[#eee8d5] px-2 py-0.5 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">/ {{ $k['satuan'] }}</span>
                            </td>
                            <td class="px-4 py-5 text-right font-mono text-[15px] font-bold {{ $k['tarif'] >= 5000 ? 'text-[#855226]' : 'text-[#330e01]' }}">
                                Rp {{ number_format($k['tarif'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-5 text-right font-mono text-[12px] text-[#1e1c10]">{{ number_format($k['timbangan_bulan'], 1) }} {{ $k['satuan'] === 'Liter' ? 'L' : 'Kg' }}</td>
                            <td class="px-4 py-5 text-center">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#dde7c4] px-2.5 py-1 text-[11px] font-semibold text-[#161e08]">
                                    <span class="size-1.5 rounded-full bg-[#151d07]"></span> {{ $k['status'] }}
                                </span>
                            </td>
                            <td class="px-4 py-5">
                                <div class="flex items-center justify-end gap-2 text-[13px]">
                                    <button type="button" title="Ubah" onclick="document.getElementById('modal-edit-kategori-{{ $k['kode'] }}').classList.remove('hidden')">✏️</button>
                                    <button type="button" title="Hapus" onclick="document.getElementById('modal-hapus-kategori-{{ $k['kode'] }}').classList.remove('hidden')">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between bg-[#faf3e0] p-4">
            <p class="text-[12px] tracking-[0.12px] text-[#52443e]">
                Menampilkan {{ count($daftarKategori) }} dari {{ $totalKomoditas }} komoditas aktif • Pembaruan terakhir oleh <span class="font-bold">Ibu Sri Wahyuni</span> (01 Sep 2026)
            </p>
            <div class="flex items-center gap-2">
                <button class="rounded bg-[#f4eedb] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#52443e] opacity-50">Sebelumnya</button>
                <span class="px-2 text-[11px] font-bold tracking-[0.44px] text-[#330e01]">1</span>
                <button class="rounded bg-[#f4eedb] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#52443e] opacity-50">Berikutnya</button>
            </div>
        </div>
    </div>

    {{-- ===== Modal Tambah Komoditas (mode: tambah) ===== --}}
    <div id="modal-form-komoditas" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(0,0,0,0.5)] p-4 backdrop-blur-[2px]">
        <div class="relative w-full max-w-[480px] overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="absolute inset-x-0 top-0 h-1 bg-[#855226]"></div>
            <div class="mb-4 flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="flex size-8 items-center justify-center rounded-lg bg-[#eee8d5]">📝</span>
                    <div>
                        <h3 class="text-[18px] font-semibold text-[#330e01]">Formulir Komoditas</h3>
                        <p class="text-[11px] font-semibold tracking-[0.44px] text-[#855226]">Mode: Tambah Data Baru</p>
                    </div>
                </div>
                <span class="rounded bg-[#dde7c4] px-2 py-0.5 font-mono text-[11px] font-bold text-[#161e08]">Auto K-07</span>
            </div>

            <form method="POST" action="{{ url('/jenis-sampah') }}" class="flex flex-col gap-3">
                @csrf
                <div>
                    <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Kode Komoditas</label>
                    <div class="rounded-lg bg-[#f4eedb] px-3 py-2 font-mono text-[12px] text-[#52443e]">K-07</div>
                </div>
                <div>
                    <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Nama Jenis Sampah <span class="text-red-600">*</span></label>
                    <input type="text" placeholder="Contoh: Plastik Kresek / Kantong Bening" class="w-full rounded-lg bg-[#faf3e0] px-3 py-2 text-[12px] text-[#1e1c10] outline-none placeholder:text-[#9ca3af]">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Kategori Induk</label>
                        <select class="w-full rounded-lg bg-[#faf3e0] px-3 py-2 text-[12px] text-[#1e1c10] outline-none">
                            <option>Plastik &amp; Botol</option>
                            <option>Kertas &amp; Karton</option>
                            <option>Logam &amp; Kaleng</option>
                            <option>Minyak Jelantah</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Satuan Timbang</label>
                        <select class="w-full rounded-lg bg-[#faf3e0] px-3 py-2 text-[12px] text-[#1e1c10] outline-none">
                            <option>Kilogram (Kg)</option>
                            <option>Liter</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Tarif Pembelian Resmi <span class="text-red-600">*</span></label>
                    <div class="flex items-center rounded-lg bg-[#faf3e0] px-1 py-1">
                        <span class="rounded bg-[#f4eedb] px-3 py-1.5 text-[13px] font-bold text-[#330e01]">Rp</span>
                        <input type="text" placeholder="1.800" class="w-full bg-transparent px-3 py-1.5 font-mono text-[12px] text-[#1e1c10] outline-none placeholder:text-[#9ca3af]">
                        <span class="pr-2 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">/ Satuan</span>
                    </div>
                    <p class="mt-1 text-[11px] text-[#52443e]">Sesuai penyesuaian SK Direktur Bank Sampah.</p>
                </div>
                <div>
                    <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Deskripsi &amp; Syarat Sortir</label>
                    <textarea rows="3" placeholder="Wajib dicuci bersih, tidak tercampur minyak makanan, dan dipisahkan dari jenis label PVC..." class="w-full rounded-lg bg-[#faf3e0] p-3 text-[12px] text-[#1e1c10] outline-none placeholder:text-[#9ca3af]"></textarea>
                </div>
                <div class="flex items-center gap-3 pt-2">
                    <button type="button" onclick="document.getElementById('modal-form-komoditas').classList.add('hidden')" class="rounded-lg bg-[#eee8d5] px-5 py-2.5 text-[13px] font-semibold text-[#330e01]">Batal</button>
                    <button type="submit" class="flex-1 rounded-lg bg-[#855226] px-5 py-2.5 text-[13px] font-semibold text-white shadow-sm">Simpan Komoditas</button>
                </div>
            </form>
        </div>
    </div>

    {{-- ===== Modal Edit & Hapus Kategori (satu per baris) ===== --}}
    @foreach ($daftarKategori as $k)
        {{-- Modal Ubah Kategori --}}
        <div id="modal-edit-kategori-{{ $k['kode'] }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(0,0,0,0.5)] p-4 backdrop-blur-[2px]">
            <div class="relative w-full max-w-[480px] overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
                <div class="absolute inset-x-0 top-0 h-1 bg-[#855226]"></div>
                <div class="mb-4 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="flex size-8 items-center justify-center rounded-lg bg-[#eee8d5]">📝</span>
                        <div>
                            <h3 class="text-[18px] font-semibold text-[#330e01]">Formulir Komoditas</h3>
                            <p class="text-[11px] font-semibold tracking-[0.44px] text-[#855226]">Mode: Perbarui Data</p>
                        </div>
                    </div>
                    <span class="rounded bg-[#dde7c4] px-2 py-0.5 font-mono text-[11px] font-bold text-[#161e08]">{{ $k['kode'] }}</span>
                </div>

                <form method="POST" action="{{ url('/jenis-sampah/'.$k['kode']) }}" class="flex flex-col gap-3">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Kode Komoditas</label>
                        <div class="rounded-lg bg-[#f4eedb] px-3 py-2 font-mono text-[12px] text-[#52443e]">{{ $k['kode'] }}</div>
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Nama Jenis Sampah <span class="text-red-600">*</span></label>
                        <input type="text" value="{{ $k['nama'] }}" class="w-full rounded-lg bg-[#faf3e0] px-3 py-2 text-[12px] text-[#1e1c10] outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Kategori Induk</label>
                            <select class="w-full rounded-lg bg-[#faf3e0] px-3 py-2 text-[12px] text-[#1e1c10] outline-none">
                                <option>{{ $k['nama'] }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Satuan Timbang</label>
                            <select class="w-full rounded-lg bg-[#faf3e0] px-3 py-2 text-[12px] text-[#1e1c10] outline-none">
                                <option>{{ $k['satuan'] === 'Liter' ? 'Liter' : 'Kilogram (Kg)' }}</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Tarif Pembelian Resmi <span class="text-red-600">*</span></label>
                        <div class="flex items-center rounded-lg bg-[#faf3e0] px-1 py-1">
                            <span class="rounded bg-[#f4eedb] px-3 py-1.5 text-[13px] font-bold text-[#330e01]">Rp</span>
                            <input type="text" value="{{ number_format($k['tarif'], 0, ',', '.') }}" class="w-full bg-transparent px-3 py-1.5 font-mono text-[12px] text-[#1e1c10] outline-none">
                            <span class="pr-2 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">/ {{ $k['satuan'] }}</span>
                        </div>
                        <p class="mt-1 text-[11px] text-[#52443e]">Sesuai penyesuaian SK Direktur Bank Sampah.</p>
                    </div>
                    <div>
                        <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]">Deskripsi &amp; Syarat Sortir</label>
                        <textarea rows="3" class="w-full rounded-lg bg-[#faf3e0] p-3 text-[12px] text-[#1e1c10] outline-none">{{ $k['deskripsi'] }}</textarea>
                    </div>
                    <div class="flex items-center gap-3 pt-2">
                        <button type="button" onclick="document.getElementById('modal-edit-kategori-{{ $k['kode'] }}').classList.add('hidden')" class="rounded-lg bg-[#eee8d5] px-5 py-2.5 text-[13px] font-semibold text-[#330e01]">Batal</button>
                        <button type="submit" class="flex-1 rounded-lg bg-[#855226] px-5 py-2.5 text-[13px] font-semibold text-white shadow-sm">Simpan Komoditas</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal Hapus Kategori --}}
        <div id="modal-hapus-kategori-{{ $k['kode'] }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(0,0,0,0.5)] p-4 backdrop-blur-[2px]">
            <div class="relative w-full max-w-[464px] overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
                <div class="absolute inset-x-0 top-0 h-1 bg-[#855226]"></div>
                <div class="flex gap-3.5">
                    <span class="flex size-12 shrink-0 items-center justify-center rounded-2xl border border-[rgba(78,34,15,0.2)] bg-[#ffdad6] text-[20px]">⚠️</span>
                    <div>
                        <p class="text-[11px] font-bold uppercase tracking-[0.55px] text-[#855226]">Peringatan Sistem</p>
                        <h3 class="text-[17px] font-bold text-[#330e01]">Hapus Komoditas {{ $k['kode'] }} ({{ $k['nama'] }})?</h3>
                    </div>
                </div>

                <div class="mt-4 rounded-xl border border-[rgba(215,194,187,0.6)] bg-[#faf3e0] p-[15px] text-[13px] text-[#52443e]">
                    Tindakan ini <span class="font-bold text-[#4e220f]">tidak dapat dibatalkan</span>. Komoditas ini tercatat dalam beberapa riwayat transaksi aktif bulan berjalan. Sistem menyarankan menonaktifkan status loket daripada menghapus data permanen demi integritas buku kas.
                </div>

                <div class="mt-3 flex items-center gap-2">
                    <span class="flex items-center gap-1.5 rounded-lg border border-[rgba(215,194,187,0.5)] bg-[#eee8d5] px-3 py-1.5 text-[11px] font-semibold text-[#330e01]">📄 Transaksi Terkait</span>
                    <span class="flex items-center gap-1.5 rounded-lg border border-[rgba(215,194,187,0.5)] bg-[#eee8d5] px-3 py-1.5 font-mono text-[11px] font-bold text-[#330e01]">⚖️ Total {{ number_format($k['timbangan_bulan'], 1) }} {{ $k['satuan'] === 'Liter' ? 'L' : 'Kg' }} Tercatat</span>
                </div>

                <div class="mt-4 flex flex-col gap-2">
                    <button type="button" onclick="document.getElementById('modal-hapus-kategori-{{ $k['kode'] }}').classList.add('hidden')"
                            class="w-full rounded-lg bg-[#b0ba99] px-3 py-2.5 text-[13px] font-bold text-[#151d07]">
                        ⏸️ Nonaktifkan Saja (Disarankan)
                    </button>
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="document.getElementById('modal-hapus-kategori-{{ $k['kode'] }}').classList.add('hidden')"
                                class="flex-1 rounded-lg border border-[rgba(215,194,187,0.5)] bg-[#eee8d5] px-4 py-2.5 text-[13px] font-semibold text-[#330e01]">
                            Batal
                        </button>
                        <button type="button" class="flex-1 rounded-lg bg-[#4e220f] px-4 py-2.5 text-[12px] font-bold text-[#f7f1de] shadow-sm">
                            🗑️ Tetap Hapus Permanen
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection