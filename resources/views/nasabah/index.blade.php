@extends('layouts.app')

@section('title', 'Data Nasabah')

@section('content')
    @php
        // NOTE: masih data dummy untuk keperluan tampilan.
        $totalSiswa = $totalSiswa ?? 228;
        $partisipasiSiswa = $partisipasiSiswa ?? 93;
        $totalPendidik = $totalPendidik ?? 17;
        $totalSaldoTerkumpul = $totalSaldoTerkumpul ?? 4850000;

        $daftarNasabah = $daftarNasabah ?? [
            [
                'id_nasabah' => '#1048', 'no_nasabah' => 'NS003', 'no_rekening' => 'NS003 / 2026-0048', 'nama' => 'Budi Santoso',
                'id_induk' => 'NIS: 202110928', 'peran' => 'Siswa', 'kelas' => 'XII RPL B', 'warna_kelas' => '#e8e2d0',
                'telepon' => '0812-3456-7890', 'total_setor' => 7, 'saldo' => 42000, 'status' => 'Aktif',
                'avatar_bg' => '#ffdcc3', 'avatar_text' => '#330e01',
                'reduksi_kg' => 68.4, 'timbang_terakhir_tgl' => '07 Sep 2026', 'timbang_terakhir_item' => 'Botol PET (4.2 Kg)',
                'riwayat' => [
                    ['tgl' => '07/09/2026', 'item' => 'Plastik PET Bening Bersih', 'warna' => '#855226', 'berat' => 4.2, 'subtotal' => 14700],
                    ['tgl' => '31/08/2026', 'item' => 'Kardus Bekas & Dupleks', 'warna' => '#4e220f', 'berat' => 8.5, 'subtotal' => 17000],
                    ['tgl' => '24/08/2026', 'item' => 'Kaleng Alumunium Minuman', 'warna' => '#85736d', 'berat' => 0.8, 'subtotal' => 10300],
                ],
            ],
            [
                'id_nasabah' => '#1052', 'no_nasabah' => 'NS012', 'no_rekening' => 'NS012 / 2026-0052', 'nama' => 'Siti Aisyah',
                'id_induk' => 'NIS: 202311402', 'peran' => 'Siswa', 'kelas' => 'X AKL 1', 'warna_kelas' => '#e8e2d0',
                'telepon' => '0857-1122-3344', 'total_setor' => 5, 'saldo' => 28500, 'status' => 'Aktif',
                'avatar_bg' => '#dde7c4', 'avatar_text' => '#330e01',
                'reduksi_kg' => 41.2, 'timbang_terakhir_tgl' => '05 Sep 2026', 'timbang_terakhir_item' => 'Kardus (6.1 Kg)',
                'riwayat' => [
                    ['tgl' => '05/09/2026', 'item' => 'Kardus Bekas Kemasan', 'warna' => '#855226', 'berat' => 6.1, 'subtotal' => 12200],
                    ['tgl' => '20/08/2026', 'item' => 'Botol Plastik Bening', 'warna' => '#4e220f', 'berat' => 3.4, 'subtotal' => 10200],
                    ['tgl' => '10/08/2026', 'item' => 'Kertas Bekas Koran', 'warna' => '#85736d', 'berat' => 2.0, 'subtotal' => 6100],
                ],
            ],
            [
                'id_nasabah' => '#1004', 'no_nasabah' => 'NS001', 'no_rekening' => 'NS001 / 2026-0004', 'nama' => 'Pak Hendra Pratama',
                'id_induk' => 'NIP: 198504122009031002', 'peran' => 'Guru / Tendik', 'kelas' => 'Guru BK', 'warna_kelas' => '#ffdcc3',
                'telepon' => '0813-9988-7766', 'total_setor' => 12, 'saldo' => 115000, 'status' => 'Aktif',
                'avatar_bg' => '#4e220f', 'avatar_text' => '#fff9e8',
                'reduksi_kg' => 132.6, 'timbang_terakhir_tgl' => '06 Sep 2026', 'timbang_terakhir_item' => 'Kaleng (3.0 Kg)',
                'riwayat' => [
                    ['tgl' => '06/09/2026', 'item' => 'Kaleng Minuman Aluminium', 'warna' => '#855226', 'berat' => 3.0, 'subtotal' => 18000],
                    ['tgl' => '25/08/2026', 'item' => 'Kardus Tebal Elektronik', 'warna' => '#4e220f', 'berat' => 12.0, 'subtotal' => 24000],
                    ['tgl' => '11/08/2026', 'item' => 'Botol Kaca Sirup', 'warna' => '#85736d', 'berat' => 5.5, 'subtotal' => 8250],
                ],
            ],
            [
                'id_nasabah' => '#1071', 'no_nasabah' => 'NS045', 'no_rekening' => 'NS045 / 2026-0071', 'nama' => 'Rian Pratama',
                'id_induk' => 'NIS: 202210811', 'peran' => 'Siswa', 'kelas' => 'XI TKJ 2', 'warna_kelas' => '#e8e2d0',
                'telepon' => '0878-4455-6677', 'total_setor' => 4, 'saldo' => 18200, 'status' => 'Aktif',
                'avatar_bg' => '#e8e2d0', 'avatar_text' => '#330e01',
                'reduksi_kg' => 22.7, 'timbang_terakhir_tgl' => '02 Sep 2026', 'timbang_terakhir_item' => 'Plastik (5.0 Kg)',
                'riwayat' => [
                    ['tgl' => '02/09/2026', 'item' => 'Gelas Plastik Bekas', 'warna' => '#855226', 'berat' => 5.0, 'subtotal' => 15000],
                    ['tgl' => '15/08/2026', 'item' => 'Kardus Kemasan Kecil', 'warna' => '#4e220f', 'berat' => 2.2, 'subtotal' => 4400],
                    ['tgl' => '01/08/2026', 'item' => 'Botol Kaca Bekas', 'warna' => '#85736d', 'berat' => 1.5, 'subtotal' => 2250],
                ],
            ],
            [
                'id_nasabah' => '#1090', 'no_nasabah' => 'NS078', 'no_rekening' => 'NS078 / 2026-0090', 'nama' => 'Dewi Sartika',
                'id_induk' => 'NIS: 202311540', 'peran' => 'Siswa', 'kelas' => 'X DKV 3', 'warna_kelas' => '#e8e2d0',
                'telepon' => '0896-3322-1100', 'total_setor' => 1, 'saldo' => 7500, 'status' => 'Aktif',
                'avatar_bg' => '#dde7c4', 'avatar_text' => '#330e01',
                'reduksi_kg' => 6.0, 'timbang_terakhir_tgl' => '01 Sep 2026', 'timbang_terakhir_item' => 'Kaca (6.0 Kg)',
                'riwayat' => [
                    ['tgl' => '01/09/2026', 'item' => 'Botol Kaca Sirup Utuh', 'warna' => '#855226', 'berat' => 6.0, 'subtotal' => 7500],
                ],
            ],
            [
                'id_nasabah' => '#1099', 'no_nasabah' => 'NS099', 'no_rekening' => 'NS099 / 2026-0099', 'nama' => 'Ahmad Fauzi',
                'id_induk' => 'NIS: 202110788', 'peran' => 'Siswa', 'kelas' => 'XII TBSM 1', 'warna_kelas' => '#e8e2d0',
                'telepon' => '0821-5566-7788', 'total_setor' => 0, 'saldo' => 0, 'status' => 'Baru',
                'avatar_bg' => '#e8e2d0', 'avatar_text' => '#52443e',
                'reduksi_kg' => 0, 'timbang_terakhir_tgl' => '-', 'timbang_terakhir_item' => 'Belum pernah setor',
                'riwayat' => [],
            ],
        ];

        $totalNasabah = $totalNasabah ?? 245;
    @endphp

    {{-- ===== Breadcrumb & Header ===== --}}
    <div class="flex items-end justify-between pb-8">
        <div>
            <div class="flex items-center gap-1.5 pb-2 text-[12px] text-[#52443e]">
                <span>Dashboard</span>
                <span>›</span>
                <span class="font-semibold text-[#330e01]">Data Nasabah</span>
            </div>
            <h1 class="text-[36px] font-bold leading-[44px] tracking-[-0.9px] text-[#330e01]">Data Nasabah Bank Sampah</h1>
            <p class="mt-0.5 max-w-[672px] text-[14px] leading-5 text-[#52443e]">
                Kelola data nasabah siswa dan guru aktif, informasi saldo tabungan, dan mutasi setoran sirkular sekolah.
            </p>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" class="flex items-center gap-2 rounded-lg bg-white px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#855226] shadow-sm">
                ⬇️ Export Excel / Rekap
            </button>
            <button type="button" onclick="document.getElementById('modal-tambah-nasabah').classList.remove('hidden')"
                    class="flex items-center gap-2 rounded-lg bg-[#855226] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#fff9e8] shadow-sm">
                👤+ Tambah Nasabah Baru
            </button>
        </div>
    </div>

    {{-- ===== Summary Cards ===== --}}
    <div class="grid grid-cols-3 gap-4 pb-8">
        <div class="rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Siswa Terdaftar</p>
                    <p class="mt-2.5 flex items-baseline gap-2">
                        <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ $totalSiswa }}</span>
                        <span class="text-[12px] font-medium text-[#52443e]">Siswa Aktif</span>
                    </p>
                </div>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#dde7c4] text-[16px]">🎓</span>
            </div>
            <p class="mt-4 text-[12px] text-[#855226]">↗ {{ $partisipasiSiswa }}% partisipasi per kelas kejuruan</p>
        </div>

        <div class="rounded-xl bg-white p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#52443e]">Pendidik & Tenaga Kerja</p>
                    <p class="mt-2.5 flex items-baseline gap-2">
                        <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ $totalPendidik }}</span>
                        <span class="text-[12px] font-medium text-[#52443e]">Nasabah Teladan</span>
                    </p>
                </div>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#ffdcc3] text-[16px]">💼</span>
            </div>
            <p class="mt-4 text-[12px] text-[#52443e]">Akumulasi kategori anorganik rutin</p>
        </div>

        <div class="rounded-xl bg-[#f4eedb] p-6 shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#855226]">Total Saldo Terkumpul</p>
                    <p class="mt-2.5 flex items-baseline gap-1">
                        <span class="text-[13px] font-bold text-[#855226]">Rp</span>
                        <span class="text-[32px] font-extrabold tracking-tight text-[#330e01]">{{ number_format($totalSaldoTerkumpul, 0, ',', '.') }}</span>
                    </p>
                </div>
                <span class="flex size-9 items-center justify-center rounded-lg bg-[#4e220f] text-[16px]">📘</span>
            </div>
            <div class="mt-4 flex items-center justify-between text-[12px]">
                <span class="text-[#52443e]">Cadangan Kas Unit</span>
                <span class="font-semibold text-[#330e01]">Tercatat di Buku Induk</span>
            </div>
        </div>
    </div>

    {{-- ===== Tabel & Filter ===== --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-[0px_1px_2px_rgba(0,0,0,0.05)]">

        {{-- Toolbar --}}
        <div class="flex items-center justify-between bg-[rgba(250,243,224,0.6)] p-6">
            <div class="relative w-[380px]">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-[#85736d]">🔍</span>
                <input type="text" placeholder="Cari berdasarkan nama atau no nasabah..."
                       class="w-full rounded-lg bg-white py-2.5 pl-9 pr-4 text-[14px] text-[#1e1c10] shadow-sm outline-none placeholder:text-[#85736d]">
            </div>
            <div class="flex items-center gap-3">
                <select class="rounded-lg bg-white px-3 py-1.5 text-[13px] font-semibold tracking-[0.26px] text-[#330e01] shadow-sm outline-none">
                    <option>Semua Kelas</option>
                </select>
                <select class="rounded-lg bg-white px-3 py-1.5 text-[13px] font-semibold tracking-[0.26px] text-[#330e01] shadow-sm outline-none">
                    <option>Terbaru</option>
                </select>
                <button type="button" class="flex size-8 items-center justify-center rounded-lg text-[#52443e]">⟲</button>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1000px] text-left">
                <thead class="bg-[#fff9e8]">
                    <tr class="text-[11px] font-bold uppercase tracking-[0.55px] text-[#330e01]">
                        <th class="px-4 py-3 text-center">No</th>
                        <th class="px-4 py-3">No Nasabah</th>
                        <th class="px-4 py-3">Nama Lengkap & Peran</th>
                        <th class="px-4 py-3">Kelas / Gugus</th>
                        <th class="px-4 py-3">Nomor WhatsApp</th>
                        <th class="px-4 py-3 text-center">Total Setor</th>
                        <th class="px-4 py-3 text-right">Saldo Tabungan</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarNasabah as $i => $n)
                        <tr class="{{ $i % 2 === 1 ? 'bg-[rgba(255,255,255,0.5)]' : '' }}">
                            <td class="px-4 py-4 text-center text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">{{ $i + 1 }}</td>
                            <td class="px-4 py-4 font-mono text-[13px] font-bold tracking-[0.26px] text-[#855226]">{{ $n['no_nasabah'] }}</td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex size-9 shrink-0 items-center justify-center rounded-full text-[13px] font-bold"
                                          style="background-color: {{ $n['avatar_bg'] }}; color: {{ $n['avatar_text'] }}">
                                        {{ collect(explode(' ', $n['nama']))->map(fn($w) => $w[0])->take(2)->implode('') }}
                                    </span>
                                    <div>
                                        <p class="text-[13px] font-bold tracking-[0.26px] text-[#330e01]">{{ $n['nama'] }}</p>
                                        <p class="text-[12px] tracking-[0.12px] text-[#52443e]">{{ $n['id_induk'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4">
                                <span class="inline-block rounded px-2 py-1.5 text-[11px] font-semibold tracking-[0.44px] text-[#1e1c10]" style="background-color: {{ $n['warna_kelas'] }}">
                                    {{ $n['kelas'] }}
                                </span>
                            </td>
                            <td class="px-4 py-4 font-mono text-[12px] tracking-[0.12px] text-[#1e1c10]">{{ $n['telepon'] }}</td>
                            <td class="px-4 py-4 text-center">
                                <span class="inline-block rounded-full bg-[#fff9e8] px-3 py-1 text-[11px] font-semibold tracking-[0.44px] text-[#855226]">
                                    {{ $n['total_setor'] }} Kali
                                </span>
                            </td>
                            <td class="px-4 py-4 text-right font-mono text-[14px] font-bold {{ $n['saldo'] === 0 ? 'text-[#85736d]' : 'text-[#330e01]' }}">
                                Rp {{ number_format($n['saldo'], 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-4 text-center">
                                <span class="inline-flex items-center gap-1.5 rounded-full px-2 py-1 text-[11px] font-semibold tracking-[0.44px]"
                                      style="background-color: {{ $n['status'] === 'Aktif' ? '#dde7c4' : '#e8e2d0' }}; color: {{ $n['status'] === 'Aktif' ? '#330e01' : '#52443e' }}">
                                    <span class="size-1.5 rounded-full" style="background-color: {{ $n['status'] === 'Aktif' ? '#4e220f' : '#85736d' }}"></span>
                                    {{ $n['status'] }}
                                </span>
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-3 text-[13px] opacity-80">
                                    <button type="button" title="Lihat" onclick="document.getElementById('modal-detail-nasabah-{{ $n['no_nasabah'] }}').classList.remove('hidden')">👁️</button>
                                    <button type="button" title="Edit" onclick="document.getElementById('modal-edit-nasabah-{{ $n['no_nasabah'] }}').classList.remove('hidden')">✏️</button>
                                    <button type="button" title="Hapus">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="flex items-center justify-between px-4 py-4">
            <p class="text-[12px] tracking-[0.12px] text-[#52443e]">
                Menampilkan <span class="font-semibold text-[#330e01]">1-{{ count($daftarNasabah) }}</span> dari <span class="font-semibold text-[#330e01]">{{ $totalNasabah }}</span> nasabah
            </p>
            <div class="flex items-center gap-1">
                <button class="rounded-lg px-3 py-1.5 text-[13px] font-semibold tracking-[0.26px] text-[#85736d] opacity-40">← Sebelumnya</button>
                <button class="flex size-8 items-center justify-center rounded-lg bg-[#855226] text-[13px] font-semibold tracking-[0.26px] text-[#fff9e8] shadow-sm">1</button>
                <button class="flex size-8 items-center justify-center rounded-lg text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">2</button>
                <button class="flex size-8 items-center justify-center rounded-lg text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">3</button>
                <span class="px-1 text-[13px] text-[#85736d]">...</span>
                <button class="flex size-8 items-center justify-center rounded-lg text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">41</button>
                <button class="rounded-lg px-3 py-1.5 text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">Berikutnya →</button>
            </div>
        </div>
    </div>

    {{-- ===== Modal Tambah Nasabah Baru ===== --}}
    <div id="modal-tambah-nasabah" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(0,0,0,0.5)] p-4 backdrop-blur-[2px]">
        <div class="flex max-h-[90vh] w-full max-w-[672px] flex-col overflow-hidden rounded-xl border border-[rgba(215,194,187,0.3)] bg-white shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)]">
            {{-- Header --}}
            <div class="flex items-start justify-between border-b border-[rgba(215,194,187,0.3)] bg-[#f4eedb] px-6 py-6">
                <div>
                    <h3 class="flex items-center gap-1.5 text-[22px] font-bold tracking-[-0.22px] text-[#330e01]">👤+ Tambah Nasabah Baru</h3>
                    <p class="text-[12px] tracking-[0.12px] text-[#52443e]">Daftarkan data siswa atau guru ke buku rekening Bank Sampah</p>
                </div>
                <button type="button" onclick="document.getElementById('modal-tambah-nasabah').classList.add('hidden')" class="rounded-lg p-1 text-[#52443e]">✕</button>
            </div>

            {{-- Body --}}
            <form method="POST" action="{{ url('/nasabah') }}" class="flex flex-col gap-4 overflow-y-auto p-6">
                @csrf

                <div>
                    <label class="mb-2 block text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">Jenis Nasabah</label>
                    <div class="flex gap-2 rounded-lg border border-[rgba(215,194,187,0.4)] bg-[#f4eedb] p-1">
                        <button type="button" class="flex-1 rounded-lg bg-[#855226] px-4 py-2 text-[13px] font-semibold text-[#fff9e8] shadow-sm">🎓 Siswa</button>
                        <button type="button" class="flex-1 rounded-lg px-4 py-2 text-[13px] font-medium text-[#52443e]">💼 Guru / Tendik</button>
                    </div>
                </div>

                <div class="w-[221px]">
                    <div class="mb-2 flex items-center justify-between">
                        <label class="text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">Nomor Nasabah</label>
                        <span class="rounded bg-[#dde7c4] px-1.5 py-0.5 text-[11px] font-semibold text-[#330e01]">Otomatis</span>
                    </div>
                    <div class="rounded-lg border border-[rgba(215,194,187,0.4)] bg-[#f4eedb] px-3.5 py-2.5 font-mono text-[13px] font-bold text-[#855226]">
                        NSB-2026-0049
                    </div>
                </div>

                <div>
                    <label class="mb-2 flex items-center gap-1 text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">
                        Nama Lengkap Nasabah <span class="text-[#855226]">*</span>
                    </label>
                    <input type="text" name="nama" placeholder="cth. Muhammad Rizky Pratama"
                           class="w-full rounded-lg border border-[#d7c2bb] px-3.5 py-2.5 text-[14px] text-[#330e01] shadow-sm outline-none placeholder:text-[#85736d]">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="mb-2.5 block text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">Kelas / Rombel</label>
                        <select class="w-full rounded-lg border border-[#d7c2bb] px-3.5 py-2.5 text-[14px] text-[#330e01] shadow-sm outline-none">
                            <option>Pilih Kelas</option>
                        </select>
                    </div>
                    <div>
                        <label class="mb-2.5 block text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">Nomor WhatsApp / HP</label>
                        <div class="flex items-center rounded-lg border border-[#d7c2bb] px-3.5 py-2.5 shadow-sm">
                            <span class="pr-1 font-bold text-[13px] text-[#855226]">+62</span>
                            <input type="text" placeholder="812-9876-5432" class="w-full font-mono text-[14px] text-[#330e01] outline-none placeholder:text-[#85736d]">
                        </div>
                    </div>
                </div>

                <div>
                    <label class="mb-2 block text-[13px] font-semibold tracking-[0.26px] text-[#330e01]">Saldo Awal Pembukaan Rekening</label>
                    <div class="flex items-center rounded-lg border border-[#d7c2bb] px-3.5 py-2.5 shadow-sm">
                        <span class="pr-2 font-bold text-[13px] text-[#855226]">Rp</span>
                        <input type="text" value="0" class="w-full font-mono text-[18px] font-bold text-[#330e01] outline-none">
                    </div>
                    <p class="mt-1 text-[11px] text-[#52443e]">Saldo awal standar Rp 0 untuk rekening baru unit sekolah.</p>
                </div>
            </form>

            {{-- Footer --}}
            <div class="flex items-center justify-end gap-3 border-t border-[rgba(215,194,187,0.3)] bg-[#f4eedb] px-6 py-6">
                <button type="button" onclick="document.getElementById('modal-tambah-nasabah').classList.add('hidden')"
                        class="rounded-lg border border-[#d7c2bb] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#52443e]">
                    Batal
                </button>
                <button type="button" class="flex items-center gap-2 rounded-lg bg-[#330e01] px-6 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#fff9e8] shadow-md">
                    ✓ Simpan Data Nasabah
                </button>
            </div>
        </div>
    </div>

    {{-- ===== Modal Edit & Detail Nasabah (satu per baris) ===== --}}
    @foreach ($daftarNasabah as $n)
        {{-- Modal Edit Nasabah --}}
        <div id="modal-edit-nasabah-{{ $n['no_nasabah'] }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(0,0,0,0.5)] p-4 backdrop-blur-[2px]">
            <div class="flex max-h-[90vh] w-full max-w-[672px] flex-col overflow-hidden rounded-xl border border-[#d7c2bb] bg-white shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)]">
                {{-- Header --}}
                <div class="flex items-center justify-between border-b border-[#d7c2bb] bg-[#fff9e8] px-6 py-4">
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-[18px] font-bold text-[#330e01]">Edit Data Nasabah</h3>
                            <span class="rounded-full bg-[#ffdcc3] px-2 py-0.5 font-mono text-[11px] font-bold text-[#330e01]">ID: {{ $n['id_nasabah'] }}</span>
                            <span class="rounded-full bg-[#dde7c4] px-2 py-0.5 font-mono text-[11px] font-bold text-[#330e01]">No: {{ $n['no_nasabah'] }}</span>
                        </div>
                        <p class="text-[12px] tracking-[0.12px] text-[#52443e]">Perbarui data identitas dan kontak nasabah</p>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-edit-nasabah-{{ $n['no_nasabah'] }}').classList.add('hidden')" class="rounded-lg p-1.5 text-[#52443e]">✕</button>
                </div>

                {{-- Body --}}
                <form method="POST" action="{{ url('/nasabah/'.$n['no_nasabah']) }}" class="flex flex-col gap-4 overflow-y-auto p-6">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center justify-between rounded-xl border border-[rgba(215,194,187,0.6)] bg-[#faf3e0] p-[17px]">
                        <div class="flex items-center gap-3">
                            <span class="flex size-12 items-center justify-center rounded-full text-[16px] font-bold" style="background-color: {{ $n['avatar_bg'] }}; color: {{ $n['avatar_text'] }}">
                                {{ collect(explode(' ', $n['nama']))->map(fn($w) => $w[0])->take(2)->implode('') }}
                            </span>
                            <div>
                                <div class="flex items-center gap-2">
                                    <p class="text-[13px] font-bold text-[#330e01]">{{ $n['nama'] }}</p>
                                    <span class="rounded bg-[#dde7c4] px-2 py-0.5 text-[11px] font-semibold text-[#330e01]">{{ $n['status'] }}</span>
                                </div>
                                <p class="text-[12px] text-[#52443e]">{{ $n['peran'] }} Kelas {{ $n['kelas'] }}</p>
                            </div>
                        </div>
                        <div class="rounded-lg border border-[rgba(215,194,187,0.5)] bg-white px-3.5 py-2 text-right">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.55px] text-[#855226]">Saldo Terkumpul</p>
                            <p class="font-mono text-[18px] font-bold text-[#330e01]">Rp {{ number_format($n['saldo'], 0, ',', '.') }}</p>
                            <p class="text-[11px] text-[#2a321a]">↻ Tersinkronisasi Ledger</p>
                        </div>
                    </div>

                    <div>
                        <label class="mb-1 block text-[11px] font-semibold tracking-[0.44px] text-[#52443e]">Nomor Nasabah</label>
                        <div class="flex items-center justify-between rounded-lg border border-[rgba(215,194,187,0.6)] bg-[rgba(232,226,208,0.6)] px-3.5 py-2.5">
                            <span class="font-mono text-[14px] text-[#52443e]">{{ $n['no_nasabah'] }}</span>
                            <span>🔒</span>
                        </div>
                        <p class="mt-1 text-[11px] text-[#85736d]">Nomor unik sistem (tidak dapat diubah)</p>
                    </div>

                    <div>
                        <label class="mb-1 flex items-center gap-1 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">
                            Nama Lengkap Siswa / Nasabah <span class="text-red-600">*</span>
                        </label>
                        <input type="text" value="{{ $n['nama'] }}" class="w-full rounded-lg border border-[#d7c2bb] px-3.5 py-2.5 text-[14px] text-[#330e01] shadow-sm outline-none">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="mb-1 flex items-center gap-1 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">
                                Kelas / Rombel <span class="text-red-600">*</span>
                            </label>
                            <select class="w-full rounded-lg border border-[#d7c2bb] px-3.5 py-2.5 text-[14px] text-[#330e01] shadow-sm outline-none">
                                <option>{{ $n['kelas'] }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="mb-1 flex items-center gap-1 text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">
                                Nomor HP / WhatsApp <span class="text-red-600">*</span>
                            </label>
                            <input type="text" value="+62 {{ $n['telepon'] }}" class="w-full rounded-lg border border-[#d7c2bb] px-3.5 py-2.5 font-mono text-[14px] text-[#330e01] shadow-sm outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-[11px] font-semibold tracking-[0.44px] text-[#330e01]">Status Nasabah</label>
                        <div class="flex items-center gap-6">
                            <label class="flex items-center gap-2">
                                <input type="radio" name="status_{{ $n['no_nasabah'] }}" {{ $n['status'] === 'Aktif' ? 'checked' : '' }} class="accent-[#855226]">
                                <span class="text-[13px] font-semibold text-[#330e01]">Aktif</span>
                                <span class="text-[11px] text-[#52443e]">(Bisa menimbang sampah)</span>
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="radio" name="status_{{ $n['no_nasabah'] }}" {{ $n['status'] !== 'Aktif' ? 'checked' : '' }}>
                                <span class="text-[13px] font-medium text-[#52443e]">Nonaktif / Alumni</span>
                            </label>
                        </div>
                    </div>

                    <div class="rounded-xl border border-[rgba(215,194,187,0.8)] bg-[#f4eedb] p-[17px]">
                        <div class="flex items-center justify-between">
                            <span class="text-[13px] font-semibold text-[#330e01]">📘 Saldo Tabungan Buku Kas</span>
                            <span class="font-mono text-[18px] font-bold text-[#330e01]">Rp {{ number_format($n['saldo'], 0, ',', '.') }}</span>
                        </div>
                        <p class="mt-1.5 text-[12px] text-[#52443e]">
                            ℹ️ Perubahan saldo hanya dapat dilakukan melalui transaksi setoran timbang atau penarikan kas loket.
                        </p>
                    </div>
                </form>

                {{-- Footer --}}
                <div class="flex items-center justify-end gap-3 border-t border-[#d7c2bb] bg-[#fff9e8] px-6 py-4">
                    <button type="button" onclick="document.getElementById('modal-edit-nasabah-{{ $n['no_nasabah'] }}').classList.add('hidden')"
                            class="rounded-lg border border-[#d7c2bb] bg-white px-4 py-2 text-[13px] font-semibold text-[#52443e] shadow-sm">
                        Batal
                    </button>
                    <button type="button" class="flex items-center gap-2 rounded-lg bg-[#4e220f] px-4 py-2 text-[13px] font-semibold text-[#fff9e8] shadow-sm">
                        ✓ Simpan Perubahan
                    </button>
                </div>
            </div>
        </div>

        {{-- Modal Detail Nasabah --}}
        <div id="modal-detail-nasabah-{{ $n['no_nasabah'] }}" class="fixed inset-0 z-50 hidden flex items-center justify-center bg-[rgba(30,28,16,0.6)] p-4 backdrop-blur-[2px]">
            <div class="flex max-h-[90vh] w-full max-w-[832px] flex-col overflow-hidden rounded-2xl border border-[rgba(133,82,38,0.2)] bg-[#fff9e8] shadow-[0px_25px_50px_-12px_rgba(0,0,0,0.25)]">
                {{-- Header --}}
                <div class="flex items-start justify-between border-b border-[rgba(232,226,208,0.8)] bg-[rgba(255,255,255,0.8)] px-6 py-5">
                    <div>
                        <div class="flex items-center gap-2.5">
                            <h3 class="text-[22px] font-semibold tracking-[-0.22px] text-[#330e01]">Detail Data Nasabah</h3>
                            <span class="rounded-md bg-[#ffdcc3] px-2.5 py-0.5 font-mono text-[12px] font-bold text-[#330e01]">{{ $n['no_nasabah'] }}</span>
                            <span class="flex items-center gap-1.5 rounded-full bg-[#dde7c4] px-2.5 py-0.5 text-[12px] font-semibold text-[#330e01]">
                                <span class="size-1.5 rounded-full bg-[#4e220f]"></span> {{ $n['status'] }}
                            </span>
                        </div>
                        <p class="text-[12px] tracking-[0.12px] text-[#52443e]">Informasi rekening buku tabungan, identitas siswa, dan statistik penimbangan terverifikasi.</p>
                    </div>
                    <button type="button" onclick="document.getElementById('modal-detail-nasabah-{{ $n['no_nasabah'] }}').classList.add('hidden')" class="rounded-lg p-1.5 text-[#52443e]">✕</button>
                </div>

                {{-- Body --}}
                <div class="flex flex-col gap-4 overflow-y-auto p-6">

                    {{-- Profil --}}
                    <div class="flex items-center gap-3.5 rounded-xl border border-[rgba(215,194,187,0.4)] bg-[#faf3e0] p-[17px]">
                        <span class="flex size-14 items-center justify-center rounded-2xl bg-[#4e220f] text-[18px] font-bold text-[#fff9e8] shadow-sm">
                            {{ collect(explode(' ', $n['nama']))->map(fn($w) => $w[0])->take(2)->implode('') }}
                        </span>
                        <div>
                            <div class="flex items-center gap-2">
                                <h4 class="text-[18px] font-bold text-[#330e01]">{{ $n['nama'] }}</h4>
                                <span class="rounded bg-[#e8e2d0] px-2 py-0.5 text-[11px] font-medium text-[#1e1c10]">{{ $n['peran'] }}</span>
                            </div>
                            <p class="text-[12px] font-medium text-[#855226]">Kelas {{ $n['kelas'] }}</p>
                            <p class="font-mono text-[12px] text-[#52443e]">+62 {{ $n['telepon'] }}</p>
                        </div>
                    </div>

                    {{-- Atribut data --}}
                    <div>
                        <p class="mb-2.5 flex items-center gap-1.5 text-[12px] font-bold uppercase tracking-[0.6px] text-[#855226]">📇 Data Rekening & Atribut Entitas</p>
                        <div class="grid grid-cols-3 gap-2.5">
                            <div class="rounded-lg border border-[rgba(215,194,187,0.3)] bg-white p-[13px]">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">ID_Nasabah</p>
                                <p class="font-mono text-[14px] font-bold text-[#330e01]">{{ $n['id_nasabah'] }}</p>
                            </div>
                            <div class="rounded-lg border border-[rgba(215,194,187,0.3)] bg-white p-[13px]">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">No_Nasabah</p>
                                <p class="font-mono text-[14px] font-bold text-[#855226]">{{ $n['no_rekening'] }}</p>
                            </div>
                            <div class="rounded-lg border border-[rgba(215,194,187,0.3)] bg-white p-[13px]">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">Nama_Lengkap</p>
                                <p class="text-[14px] font-bold text-[#330e01]">{{ $n['nama'] }}</p>
                            </div>
                            <div class="rounded-lg border border-[rgba(215,194,187,0.3)] bg-white p-[13px]">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">Tingkat_Kelas</p>
                                <p class="text-[14px] font-semibold text-[#330e01]">{{ $n['kelas'] }}</p>
                            </div>
                            <div class="rounded-lg border border-[rgba(215,194,187,0.3)] bg-white p-[13px]">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">Kontak_WA</p>
                                <p class="font-mono text-[14px] font-bold text-[#330e01]">{{ $n['telepon'] }}</p>
                            </div>
                            <div class="rounded-lg border border-[rgba(215,194,187,0.3)] bg-white p-[13px]">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">Status_Sync_Kas</p>
                                <p class="flex items-center gap-1 text-[14px] font-semibold text-[#151d07]">
                                    <span class="size-1.5 rounded-full bg-[#855226]"></span> Real-time Kas
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Statistik --}}
                    <div>
                        <p class="mb-2.5 flex items-center gap-1.5 text-[12px] font-bold uppercase tracking-[0.6px] text-[#855226]">📊 Ringkasan Statistik Sampah & Finansial</p>
                        <div class="grid grid-cols-4 gap-2.5">
                            <div class="rounded-xl bg-[#4e220f] p-3.5 shadow-sm">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#feb599]">Saldo Saat Ini</p>
                                <p class="mt-1 text-[12px] text-[#feb599]">Rp</p>
                                <p class="text-[24px] font-bold tracking-tight text-[#fff9e8]">{{ number_format($n['saldo'], 0, ',', '.') }}</p>
                            </div>
                            <div class="rounded-xl border border-[rgba(215,194,187,0.3)] bg-white p-3.5">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">Reduksi Sampah</p>
                                <p class="mt-2 text-[24px] font-bold tracking-tight text-[#330e01]">{{ number_format($n['reduksi_kg'], 1) }} <span class="text-[12px] font-normal text-[#52443e]">Kg</span></p>
                            </div>
                            <div class="rounded-xl border border-[rgba(215,194,187,0.3)] bg-white p-3.5">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">Frekuensi Setor</p>
                                <p class="mt-2 text-[24px] font-bold tracking-tight text-[#855226]">{{ $n['total_setor'] }} <span class="text-[12px] font-normal text-[#52443e]">Sesi</span></p>
                            </div>
                            <div class="rounded-xl border border-[rgba(215,194,187,0.3)] bg-white p-3.5">
                                <p class="text-[11px] uppercase tracking-[0.55px] text-[#85736d]">Timbang Terakhir</p>
                                <p class="mt-2 text-[14px] font-bold text-[#330e01]">{{ $n['timbang_terakhir_tgl'] }}</p>
                                <p class="text-[11px] text-[#52443e]">{{ $n['timbang_terakhir_item'] }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Riwayat setoran --}}
                    <div>
                        <div class="mb-2.5 flex items-center justify-between">
                            <p class="flex items-center gap-1.5 text-[12px] font-bold uppercase tracking-[0.6px] text-[#855226]">🕓 Riwayat Setoran Terakhir</p>
                            <span class="text-[12px] text-[#855226]">Lihat Semua Setoran →</span>
                        </div>
                        <div class="overflow-hidden rounded-xl border border-[rgba(215,194,187,0.3)]">
                            <table class="w-full text-left">
                                <thead class="bg-[rgba(250,243,224,0.7)]">
                                    <tr class="text-[12px] font-bold uppercase tracking-[0.6px] text-[#52443e]">
                                        <th class="px-3 py-2.5">Tanggal</th>
                                        <th class="px-3 py-2.5">Kategori & Komoditas</th>
                                        <th class="px-3 py-2.5 text-right">Berat</th>
                                        <th class="px-3 py-2.5 text-right">Subtotal Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($n['riwayat'] as $r)
                                        <tr class="border-t border-[rgba(215,194,187,0.2)] bg-white">
                                            <td class="px-3 py-2.5 font-mono text-[11px] text-[#52443e]">{{ $r['tgl'] }}</td>
                                            <td class="px-3 py-2.5">
                                                <span class="flex items-center gap-1.5 text-[12px] font-medium text-[#330e01]">
                                                    <span class="size-2 rounded-full" style="background-color: {{ $r['warna'] }}"></span>
                                                    {{ $r['item'] }}
                                                </span>
                                            </td>
                                            <td class="px-3 py-2.5 text-right font-mono text-[12px] text-[#330e01]">{{ number_format($r['berat'], 1) }} Kg</td>
                                            <td class="px-3 py-2.5 text-right font-mono text-[12px] font-bold text-[#330e01]">+ Rp {{ number_format($r['subtotal'], 0, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-t border-[rgba(215,194,187,0.2)] bg-white">
                                            <td colspan="4" class="px-3 py-4 text-center text-[12px] text-[#85736d]">Belum ada riwayat setoran.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Footer --}}
                <div class="flex items-center justify-between border-t border-[rgba(232,226,208,0.8)] bg-[rgba(250,243,224,0.6)] px-6 py-4">
                    <button type="button" class="flex items-center gap-2 rounded-lg border border-[#d7c2bb] bg-white px-4 py-2 text-[12px] text-[#330e01] shadow-sm">
                        🖨️ Cetak data nasabah
                    </button>
                    <div class="flex items-center gap-2.5">
                        <button type="button" onclick="document.getElementById('modal-detail-nasabah-{{ $n['no_nasabah'] }}').classList.add('hidden')"
                                class="rounded-lg px-4 py-2 text-[12px] text-[#52443e]">
                            Tutup
                        </button>
                        <button type="button"
                                onclick="document.getElementById('modal-detail-nasabah-{{ $n['no_nasabah'] }}').classList.add('hidden'); document.getElementById('modal-edit-nasabah-{{ $n['no_nasabah'] }}').classList.remove('hidden')"
                                class="flex items-center gap-1.5 rounded-lg bg-[#330e01] px-4 py-2 text-[12px] font-semibold text-white shadow-sm">
                            ✏️ Edit Data Nasabah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
