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
            ['no_nasabah' => 'NS003', 'nama' => 'Budi Santoso', 'id_induk' => 'NIS: 202110928', 'kelas' => 'XII RPL B', 'warna_kelas' => '#e8e2d0', 'telepon' => '0812-3456-7890', 'total_setor' => 7, 'saldo' => 42000, 'status' => 'Aktif', 'avatar_bg' => '#ffdcc3', 'avatar_text' => '#330e01'],
            ['no_nasabah' => 'NS012', 'nama' => 'Siti Aisyah', 'id_induk' => 'NIS: 202311402', 'kelas' => 'X AKL 1', 'warna_kelas' => '#e8e2d0', 'telepon' => '0857-1122-3344', 'total_setor' => 5, 'saldo' => 28500, 'status' => 'Aktif', 'avatar_bg' => '#dde7c4', 'avatar_text' => '#330e01'],
            ['no_nasabah' => 'NS001', 'nama' => 'Pak Hendra Pratama', 'id_induk' => 'NIP: 198504122009031002', 'kelas' => 'Guru BK', 'warna_kelas' => '#ffdcc3', 'telepon' => '0813-9988-7766', 'total_setor' => 12, 'saldo' => 115000, 'status' => 'Aktif', 'avatar_bg' => '#4e220f', 'avatar_text' => '#fff9e8'],
            ['no_nasabah' => 'NS045', 'nama' => 'Rian Pratama', 'id_induk' => 'NIS: 202210811', 'kelas' => 'XI TKJ 2', 'warna_kelas' => '#e8e2d0', 'telepon' => '0878-4455-6677', 'total_setor' => 4, 'saldo' => 18200, 'status' => 'Aktif', 'avatar_bg' => '#e8e2d0', 'avatar_text' => '#330e01'],
            ['no_nasabah' => 'NS078', 'nama' => 'Dewi Sartika', 'id_induk' => 'NIS: 202311540', 'kelas' => 'X DKV 3', 'warna_kelas' => '#e8e2d0', 'telepon' => '0896-3322-1100', 'total_setor' => 1, 'saldo' => 7500, 'status' => 'Aktif', 'avatar_bg' => '#dde7c4', 'avatar_text' => '#330e01'],
            ['no_nasabah' => 'NS099', 'nama' => 'Ahmad Fauzi', 'id_induk' => 'NIS: 202110788', 'kelas' => 'XII TBSM 1', 'warna_kelas' => '#e8e2d0', 'telepon' => '0821-5566-7788', 'total_setor' => 0, 'saldo' => 0, 'status' => 'Baru', 'avatar_bg' => '#e8e2d0', 'avatar_text' => '#52443e'],
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
            <button type="button" class="flex items-center gap-2 rounded-lg bg-[#855226] px-4 py-2 text-[13px] font-semibold tracking-[0.26px] text-[#fff9e8] shadow-sm">
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
                                    <button type="button" title="Lihat">👁️</button>
                                    <button type="button" title="Edit">✏️</button>
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
@endsection