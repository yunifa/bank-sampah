@extends('layouts.app')

@section('title', 'Dashboard Pengelola')

@section('content')
    @php
        // NOTE: ini masih data dummy untuk keperluan tampilan.
        // Nanti tinggal diganti dengan data asli dari controller
        // dengan nama variabel yang sama.
        $totalTransaksiPekanIni = $totalTransaksiPekanIni ?? 128;
        $rataRataPerHari = $rataRataPerHari ?? 25;
        $transaksiHariIni = $transaksiHariIni ?? 19;

        $totalBeratKg = $totalBeratKg ?? 356.5;
        $jumlahZonaPilah = $jumlahZonaPilah ?? 4;

        $totalKas = $totalKas ?? 1250000;
        $kasCadangan = $kasCadangan ?? 480000;

        $komposisiSampah = $komposisiSampah ?? [
            ['nama' => 'Plastik Daur Ulang', 'berat' => 142.5, 'porsi' => 40, 'harga' => 3000, 'warna' => '#330e01'],
            ['nama' => 'Kardus & Box Tebal', 'berat' => 115.0, 'porsi' => 32, 'harga' => 2000, 'warna' => '#855226'],
            ['nama' => 'Logam & Kaleng',     'berat' => 61.5,  'porsi' => 17, 'harga' => 6000, 'warna' => '#c1cba9'],
            ['nama' => 'Botol Kaca Utuh',    'berat' => 37.5,  'porsi' => 11, 'harga' => 1500, 'warna' => '#dfdac7'],
        ];

        $transaksiTerkini = $transaksiTerkini ?? [
            [
                'id' => 'ST-00128', 'no_slip' => 'ST-20260907-0128', 'waktu' => '07 Sep 2026 • 10:14 WIB',
                'nasabah' => 'Budi Santoso', 'kelas' => 'XII RPL B', 'status_nasabah' => 'Siswa Aktif', 'telepon' => '0812-3456-7890',
                'kategori' => 'Plastik Daur Ulang', 'warna' => '#330e01',
                'item_nama' => 'Botol Plastik PET Bening', 'item_grade' => 'Plastik Daur Ulang • Grade A',
                'item_catatan' => 'Kondisi botol bersih & kering tanpa tutup segel.',
                'berat' => 4.5, 'tarif' => 3000, 'total' => 13500,
                'saldo_sebelum' => 35000, 'petugas' => 'Ibu Sri Wahyuni',
            ],
            [
                'id' => 'ST-00127', 'no_slip' => 'ST-20260907-0127', 'waktu' => '07 Sep 2026 • 09:48 WIB',
                'nasabah' => 'Siti Aisyah', 'kelas' => 'X AKL 1', 'status_nasabah' => 'Siswa Aktif', 'telepon' => '0813-2211-9087',
                'kategori' => 'Kardus & Box Tebal', 'warna' => '#855226',
                'item_nama' => 'Kardus Bekas Kemasan', 'item_grade' => 'Kardus & Box Tebal • Grade B',
                'item_catatan' => 'Sudah dipipihkan, tidak basah.',
                'berat' => 8.2, 'tarif' => 2000, 'total' => 16400,
                'saldo_sebelum' => 52000, 'petugas' => 'Ibu Sri Wahyuni',
            ],
            [
                'id' => 'ST-00126', 'no_slip' => 'ST-20260907-0126', 'waktu' => '07 Sep 2026 • 09:12 WIB',
                'nasabah' => 'Pak Hendra, S.Pd.', 'kelas' => 'Guru BK / Tendik', 'status_nasabah' => 'Tenaga Pendidik', 'telepon' => '0857-1122-3344',
                'kategori' => 'Logam & Kaleng', 'warna' => '#c1cba9',
                'item_nama' => 'Kaleng Minuman Aluminium', 'item_grade' => 'Logam & Kaleng • Grade A',
                'item_catatan' => 'Sudah dipipihkan sebagian.',
                'berat' => 3.0, 'tarif' => 6000, 'total' => 18000,
                'saldo_sebelum' => 120000, 'petugas' => 'Ahmad Fauzi (Kader)',
            ],
            [
                'id' => 'ST-00125', 'no_slip' => 'ST-20260907-0125', 'waktu' => '07 Sep 2026 • 08:35 WIB',
                'nasabah' => 'Dewi Anggraeni', 'kelas' => 'XI TBSM 2', 'status_nasabah' => 'Siswa Aktif', 'telepon' => '0821-7788-0099',
                'kategori' => 'Botol Kaca Utuh', 'warna' => '#dfdac7',
                'item_nama' => 'Botol Kaca Sirup Utuh', 'item_grade' => 'Botol Kaca Utuh • Grade A',
                'item_catatan' => 'Tidak retak/pecah.',
                'berat' => 6.0, 'tarif' => 1500, 'total' => 9000,
                'saldo_sebelum' => 18000, 'petugas' => 'Ibu Sri Wahyuni',
            ],
            [
                'id' => 'ST-00124', 'no_slip' => 'ST-20260906-0124', 'waktu' => '06 Sep 2026 • 14:20 WIB',
                'nasabah' => 'Rizky Maulana', 'kelas' => 'X DKV 3', 'status_nasabah' => 'Siswa Aktif', 'telepon' => '0895-4433-2211',
                'kategori' => 'Plastik Daur Ulang', 'warna' => '#330e01',
                'item_nama' => 'Gelas Plastik Bekas Minuman', 'item_grade' => 'Plastik Daur Ulang • Grade B',
                'item_catatan' => 'Campuran beberapa merek, sudah dibilas.',
                'berat' => 2.8, 'tarif' => 3000, 'total' => 8400,
                'saldo_sebelum' => 41500, 'petugas' => 'Ahmad Fauzi (Kader)',
            ],
        ];

        $totalTransaksi = $totalTransaksi ?? 128;
    @endphp

    {{-- ===== Welcome Banner ===== --}}
    <div class="relative overflow-hidden rounded-xl bg-[#f4eedb] p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
        <div class="pointer-events-none absolute -right-16 -top-20 size-[320px] rounded-full bg-[rgba(255,220,195,0.3)] blur-3xl"></div>

        <div class="relative flex items-center justify-between">
            <div>
                <span class="inline-flex items-center rounded-full bg-[#eee8d5] px-2.5 py-0.5 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">
                    📅 {{ now()->translatedFormat('l, d F Y') }}
                </span>
                <h1 class="mt-1 text-[30px] font-bold tracking-tight text-[#4e220f]">Dashboard Pengelola</h1>
                <p class="mt-1 max-w-xl text-[14px] text-[#52443e]">
                    Selamat datang kembali, <span class="font-semibold text-[#330e01]">{{ $namaPengguna ?? 'Ibu Sri Wahyuni' }}</span>
                    • Panel operasional timbang dan tabungan bank sampah sekolah hari ini.
                </p>
            </div>

            <button type="button"
                    class="flex items-center gap-2 rounded-lg bg-[#855226] px-4 py-2.5 text-[13px] font-semibold tracking-[0.26px] text-[#f7f1de] shadow-sm">
                <span>+</span> Catat Setoran Baru
            </button>
        </div>
    </div>

    {{-- ===== Stat Cards ===== --}}
    <div class="mt-4 grid grid-cols-3 gap-4">
        {{-- Total Transaksi --}}
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="absolute inset-x-0 top-0 h-1 bg-[#c1cba9]"></div>
            <div class="flex items-start justify-between">
                <p class="text-[13px] font-semibold uppercase tracking-[0.65px] text-[#52443e]">Transaksi Pekan Ini</p>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#f4eedb]">🧾</span>
            </div>
            <p class="mt-2 flex items-baseline gap-2">
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ $totalTransaksiPekanIni }}</span>
                <span class="text-[11px] font-semibold tracking-[0.44px] text-[#855226]">Slip Selesai</span>
            </p>
            <p class="mt-1 text-[12px] tracking-[0.12px] text-[#52443e]">Rata-rata {{ $rataRataPerHari }} setoran / hari operasional</p>
            <div class="mt-4 flex items-center justify-between rounded-md bg-[#faf3e0] px-2.5 py-2">
                <span class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Hari ini tercatat</span>
                <span class="text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">{{ $transaksiHariIni }} slip</span>
            </div>
        </div>

        {{-- Total Berat --}}
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="absolute inset-x-0 top-0 h-1 bg-[#330e01]"></div>
            <div class="flex items-start justify-between">
                <p class="text-[13px] font-semibold uppercase tracking-[0.65px] text-[#52443e]">Berat Terpilah</p>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#f4eedb]">⚖️</span>
            </div>
            <p class="mt-2 flex items-baseline gap-1.5">
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ number_format($totalBeratKg, 1) }}</span>
                <span class="text-[18px] font-bold text-[#855226]">Kg</span>
            </p>
            <p class="mt-1 text-[12px] tracking-[0.12px] text-[#52443e]">Dari {{ $jumlahZonaPilah }} zona pilah gedung sekolah</p>
        </div>

        {{-- Total Kas --}}
        <div class="relative overflow-hidden rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="absolute inset-x-0 top-0 h-1 bg-[#fcb883]"></div>
            <div class="flex items-start justify-between">
                <p class="text-[13px] font-semibold uppercase tracking-[0.65px] text-[#52443e]">Total Kas & Saldo</p>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#f4eedb]">💰</span>
            </div>
            <p class="mt-2">
                <span class="align-top text-[13px] font-bold text-[#52443e]">Rp</span>
                <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ number_format($totalKas, 0, ',', '.') }}</span>
            </p>
            <p class="mt-1 text-[12px] tracking-[0.12px] text-[#52443e]">Dana tabungan aktif nasabah</p>
            <div class="mt-4 flex items-center justify-between rounded-md bg-[#faf3e0] px-2.5 py-2.5">
                <span class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Kas cadangan tunai</span>
                <span class="text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">Rp. {{ number_format($kasCadangan, 0, ',', '.') }}</span>
            </div>
        </div>
    </div>

    {{-- ===== Komposisi Sampah ===== --}}
    <div class="mt-4 rounded-xl bg-white p-6 shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-[18px] font-semibold text-[#330e01]">Komposisi Sampah Terpilah Pekan Ini</h2>
                <p class="text-[12px] tracking-[0.12px] text-[#52443e]">Distribusi perolehan material daur ulang terakumulasi</p>
            </div>
            <span class="rounded-full bg-[#f4eedb] px-2.5 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#855226]">
                Total {{ number_format($totalBeratKg, 1) }} Kg
            </span>
        </div>

        {{-- Segmented bar --}}
        <div class="mt-4 h-4 w-full overflow-hidden rounded-full bg-[#f4eedb]">
            <div class="flex h-full w-full">
                @foreach ($komposisiSampah as $item)
                    <div class="h-full" style="width: {{ $item['porsi'] }}%; background-color: {{ $item['warna'] }}"></div>
                @endforeach
            </div>
        </div>
        <div class="mt-1 flex items-center justify-between px-1 text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">
            <span>0 Kg</span>
            <span>{{ number_format($totalBeratKg / 2, 0) }} Kg (50%)</span>
            <span>{{ number_format($totalBeratKg, 1) }} Kg (100%)</span>
        </div>

        {{-- Grid kategori --}}
        <div class="mt-4 grid grid-cols-2 gap-3">
            @foreach ($komposisiSampah as $item)
                <div class="flex gap-3 rounded-lg bg-[#faf3e0] p-3">
                    <span class="mt-1 size-3.5 shrink-0 rounded-full" style="background-color: {{ $item['warna'] }}"></span>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <p class="text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">{{ $item['nama'] }}</p>
                            <p class="text-[11px] font-bold tracking-[0.44px] text-[#330e01]">{{ number_format($item['berat'], 1) }} Kg</p>
                        </div>
                        <div class="mt-0.5 flex items-center justify-between">
                            <span class="text-[12px] tracking-[0.12px] text-[#52443e]">Porsi: {{ $item['porsi'] }}%</span>
                            <span class="text-[12px] tracking-[0.12px] text-[#855226]">Rp {{ number_format($item['harga'], 0, ',', '.') }} / Kg</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- ===== Tabel Transaksi Terkini ===== --}}
    <div class="mt-4 rounded-xl bg-white p-6 shadow-[0px_1px_1px_rgba(0,0,0,0.05)]">
        <div class="flex items-center justify-between pb-2">
            <div>
                <h2 class="text-[18px] font-semibold text-[#330e01]">Tabel Transaksi Setoran Terkini</h2>
                <p class="text-[12px] tracking-[0.12px] text-[#52443e]">Daftar verifikasi setoran dan kredit saldo nasabah terbaru</p>
            </div>
            <div class="flex items-center gap-2">
                <div class="flex w-64 items-center gap-2 rounded-lg bg-[#faf3e0] px-3 py-1.5">
                    <span class="text-[#85736d]">🔍</span>
                    <input type="text" placeholder="Cari ID, nasabah, kelas..."
                           class="w-full bg-transparent text-[12px] tracking-[0.12px] text-[#85736d] outline-none placeholder-[#85736d]">
                </div>
                <select class="rounded-lg bg-[#faf3e0] px-4 py-2 text-[12px] tracking-[0.12px] text-[#1e1c10] outline-none">
                    <option>Semua Kategori</option>
                </select>
                <button type="button" class="flex items-center justify-center rounded-lg bg-[#faf3e0] px-2 py-2 text-[13px]">
                    ⬇️
                </button>
            </div>
        </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="w-full min-w-[900px] text-left">
                <thead class="bg-[#f4eedb]">
                    <tr class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#330e01]">
                        <th class="px-4 py-3">ID Transaksi</th>
                        <th class="px-4 py-3">Waktu & Tanggal</th>
                        <th class="px-4 py-3">Nasabah & Kelas</th>
                        <th class="px-4 py-3">Kategori Sampah</th>
                        <th class="px-4 py-3 text-right">Berat</th>
                        <th class="px-4 py-3 text-right">Tarif/Kg</th>
                        <th class="px-4 py-3 text-right">Total Nilai</th>
                        <th class="px-4 py-3">Petugas Validasi</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksiTerkini as $i => $row)
                        <tr class="{{ $i % 2 === 1 ? 'bg-[rgba(250,243,224,0.4)]' : '' }}">
                            <td class="px-4 py-4 text-[13px] font-bold tracking-[0.26px] text-[#330e01]">{{ $row['id'] }}</td>
                            <td class="px-4 py-4 text-[12px] tracking-[0.12px] text-[#52443e]">{{ $row['waktu'] }}</td>
                            <td class="px-4 py-4">
                                <p class="text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">{{ $row['nasabah'] }}</p>
                                <p class="text-[12px] tracking-[0.12px] text-[#52443e]">{{ $row['kelas'] }}</p>
                            </td>
                            <td class="px-4 py-4">
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-[#f4eedb] px-2.5 py-1 text-[11px] font-medium tracking-[0.44px] text-[#330e01]">
                                    <span class="size-2 rounded-full" style="background-color: {{ $row['warna'] }}"></span>
                                    {{ $row['kategori'] }}
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right text-[14px] font-bold text-[#330e01]">{{ number_format($row['berat'], 1) }} Kg</td>
                            <td class="px-4 py-4 text-right text-[12px] tracking-[0.12px] text-[#52443e]">Rp {{ number_format($row['tarif'], 0, ',', '.') }}</td>
                            <td class="px-4 py-4 text-right text-[14px] font-bold text-[#855226]">Rp {{ number_format($row['total'], 0, ',', '.') }}</td>
                            <td class="px-4 py-4 text-[12px] tracking-[0.12px] text-[#330e01]">{{ $row['petugas'] }}</td>
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-2 text-[13px]">
                                    <button type="button" title="Detail" onclick="document.getElementById('modal-detail-{{ $row['id'] }}').classList.remove('hidden')">📄</button>
                                    <button type="button" title="Cetak">🖨️</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ===== Modal Detail Transaksi (satu per baris transaksi) ===== --}}
        @foreach ($transaksiTerkini as $row)
            @php $saldoAkhir = $row['saldo_sebelum'] + $row['total']; @endphp
            <div id="modal-detail-{{ $row['id'] }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(78,34,15,0.65)] p-6 backdrop-blur-[3px]">
                <div class="flex w-full max-w-[768px] flex-col overflow-hidden rounded-2xl border border-[rgba(215,194,187,0.4)] bg-white shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)]">

                    {{-- Header --}}
                    <div class="flex items-center justify-between border-b border-[rgba(215,194,187,0.3)] bg-[rgba(250,243,224,0.8)] px-6 py-4">
                        <div class="flex items-center gap-3">
                            <span class="flex size-10 items-center justify-center rounded-xl bg-[rgba(133,82,38,0.15)] text-[18px] shadow-sm">🧾</span>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h3 class="text-[18px] font-bold tracking-[-0.45px] text-[#330e01]">Detail Transaksi Setoran</h3>
                                    <span class="rounded-full bg-[#dde7c4] px-2 py-0.5 text-[11px] font-semibold tracking-[0.44px] text-[#161e08]">✓ Sukses / Terverifikasi</span>
                                </div>
                                <p class="text-[12px] tracking-[0.12px] text-[#52443e]">Rincian bukti penerimaan sampah dan kredit saldo nasabah</p>
                            </div>
                        </div>
                        <button type="button" onclick="document.getElementById('modal-detail-{{ $row['id'] }}').classList.add('hidden')"
                                class="flex size-8 items-center justify-center rounded-lg text-[#52443e] hover:bg-[rgba(0,0,0,0.05)]">✕</button>
                    </div>

                    {{-- Body --}}
                    <div class="flex max-h-[600px] flex-col gap-4 overflow-auto p-6">

                        {{-- Info strip --}}
                        <div class="grid grid-cols-4 gap-3 rounded-xl border border-[rgba(215,194,187,0.3)] bg-[rgba(250,243,224,0.6)] p-3.5">
                            <div>
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#52443e]">ID_Setoran (PK)</p>
                                <p class="text-[13px] font-bold tracking-[0.26px] text-[#855226]">#{{ $row['id'] }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#52443e]">No. Slip / Transaksi</p>
                                <p class="text-[12px] font-semibold tracking-[0.12px] text-[#330e01]">{{ $row['no_slip'] }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#52443e]">Waktu Setor</p>
                                <p class="text-[12px] tracking-[0.12px] text-[#1e1c10]">{{ $row['waktu'] }}</p>
                            </div>
                            <div>
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#52443e]">Petugas Validasi</p>
                                <p class="text-[12px] tracking-[0.12px] text-[#1e1c10]">{{ $row['petugas'] }}</p>
                            </div>
                        </div>

                        {{-- Profil nasabah --}}
                        <div class="flex items-center justify-between rounded-xl border border-[rgba(215,194,187,0.3)] bg-white p-[17px] shadow-sm">
                            <div class="flex items-center gap-3">
                                <span class="flex size-12 items-center justify-center rounded-xl border border-[rgba(133,82,38,0.2)] bg-[rgba(133,82,38,0.15)] text-[13px] font-bold text-[#855226]">
                                    {{ collect(explode(' ', $row['nasabah']))->map(fn($w) => $w[0])->take(2)->implode('') }}
                                </span>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <p class="text-[16px] font-bold text-[#330e01]">{{ $row['nasabah'] }}</p>
                                        <span class="rounded-full bg-[#f4eedb] px-2 py-0.5 text-[11px] text-[#52443e]">{{ $row['status_nasabah'] }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 pt-0.5 text-[12px] tracking-[0.12px] text-[#52443e]">
                                        <span>🎓 {{ $row['kelas'] }}</span>
                                        <span>📞 {{ $row['telepon'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Petugas Loket</p>
                                <p class="text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">{{ $row['petugas'] }}</p>
                            </div>
                        </div>

                        {{-- Item penimbangan --}}
                        <div class="overflow-hidden rounded-xl border border-[rgba(215,194,187,0.3)]">
                            <div class="border-b border-[rgba(215,194,187,0.2)] bg-[#faf3e0] px-4 py-2">
                                <p class="text-[11px] font-bold uppercase tracking-[0.55px] text-[#330e01]">♻️ Item Penimbangan Sampah</p>
                            </div>
                            <div class="bg-white p-4">
                                <div class="flex items-center justify-between border-b border-[rgba(215,194,187,0.2)] pb-3">
                                    <div class="flex items-start gap-3">
                                        <span class="flex size-9 items-center justify-center rounded-lg bg-[#f4eedb] text-[16px]">♻️</span>
                                        <div>
                                            <p class="text-[13px] font-bold tracking-[0.26px] text-[#330e01]">{{ $row['item_nama'] }}</p>
                                            <p class="text-[12px] tracking-[0.12px] text-[#52443e]">Kategori: {{ $row['item_grade'] }}</p>
                                            <p class="text-[12px] italic text-[#85736d]">Catatan: {{ $row['item_catatan'] }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-4 text-right">
                                        <div>
                                            <p class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Berat</p>
                                            <p class="text-[18px] font-bold text-[#330e01]">{{ number_format($row['berat'], 1) }} <span class="text-[12px] font-medium text-[#52443e]">Kg</span></p>
                                        </div>
                                        <div>
                                            <p class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Tarif / Kg</p>
                                            <p class="text-[14px] text-[#1e1c10]">Rp {{ number_format($row['tarif'], 0, ',', '.') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Subtotal</p>
                                            <p class="text-[18px] font-bold text-[#855226]">Rp {{ number_format($row['total'], 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                </div>

                                {{-- Mutasi saldo --}}
                                <div class="mt-3 rounded-lg border border-[rgba(252,184,131,0.4)] bg-[rgba(255,220,195,0.3)] p-3.5">
                                    <div class="flex items-center justify-between text-[12px] text-[#52443e]">
                                        <span>Saldo Sebelum Setor</span>
                                        <span class="text-[#1e1c10]">Rp {{ number_format($row['saldo_sebelum'], 0, ',', '.') }}</span>
                                    </div>
                                    <div class="mt-1 flex items-center justify-between text-[12px] font-semibold text-[#855226]">
                                        <span>⊕ Kredit Masuk (+)</span>
                                        <span>+ Rp {{ number_format($row['total'], 0, ',', '.') }}</span>
                                    </div>
                                    <div class="mt-1.5 flex items-center justify-between border-t border-[rgba(133,82,38,0.2)] pt-1.5">
                                        <span class="text-[11px] font-bold uppercase tracking-[0.44px] text-[#330e01]">Total Saldo Akhir</span>
                                        <span class="text-[18px] font-extrabold text-[#330e01]">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-between border-t border-[rgba(215,194,187,0.3)] bg-[rgba(250,243,224,0.8)] px-6 py-4">
                        <p class="text-[12px] text-[#52443e]">🖨️ Format struk mendukung printer thermal 58/80mm & A4</p>
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="document.getElementById('modal-detail-{{ $row['id'] }}').classList.add('hidden')"
                                    class="rounded-lg border border-[rgba(215,194,187,0.6)] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#1e1c10]">
                                Tutup
                            </button>
                            <button type="button" class="flex items-center gap-1.5 rounded-lg bg-[#f4eedb] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#330e01] shadow-sm">
                                ⬇️ Unduh PDF
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- Pagination --}}
        <div class="mt-2 flex items-center justify-between pt-2">
            <p class="text-[12px] tracking-[0.12px] text-[#52443e]">
                Menampilkan <span class="font-bold">1 - {{ count($transaksiTerkini) }}</span> dari <span class="font-bold">{{ $totalTransaksi }}</span> transaksi
            </p>
            <div class="flex items-center gap-1">
                <button class="rounded-lg bg-[#f4eedb] px-3 py-1.5 text-[11px] font-semibold tracking-[0.44px] text-[#52443e] opacity-50">Sebelumnya</button>
                <button class="flex size-8 items-center justify-center rounded-lg bg-[#855226] text-[11px] font-semibold tracking-[0.44px] text-[#f7f1de]">1</button>
                <button class="flex size-8 items-center justify-center rounded-lg text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">2</button>
                <button class="flex size-8 items-center justify-center rounded-lg text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">3</button>
                <span class="px-1 text-[12px] tracking-[0.12px] text-[#52443e]">...</span>
                <button class="flex size-8 items-center justify-center rounded-lg text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">26</button>
                <button class="rounded-lg bg-[#f4eedb] px-3 py-1.5 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">Selanjutnya</button>
            </div>
        </div>
    </div>
@endsection