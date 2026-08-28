@extends('layouts.app')

@section('title', 'Penjualan - POS')

@section('content')

    <!-- HEADER -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

        <div>
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 tracking-tight">
                Data Penjualan
            </h1>

            <p class="mt-1 text-sm text-slate-500">
                Riwayat transaksi penjualan
            </p>
        </div>

        <a href="{{ route('penjualan.create') }}"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-xl transition shadow-sm shadow-indigo-200">

            <i data-lucide="plus" class="w-4 h-4"></i>

            Transaksi Baru

        </a>

    </div>


    <!-- SUMMARY CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-8">

        <!-- TOTAL TRANSAKSI -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 card-hover">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-indigo-100 flex items-center justify-center">

                    <i data-lucide="shopping-cart"
                       class="w-5 h-5 text-indigo-600"></i>

                </div>

                <div>

                    <p class="text-xs text-slate-500 font-medium">
                        Total Transaksi
                    </p>

                    <p class="text-xl font-bold text-slate-900">
                        {{ $totalTransaksi ?? 0 }}
                    </p>

                </div>

            </div>

        </div>


        <!-- TOTAL OMZET -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 card-hover">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-emerald-100 flex items-center justify-center">

                    <i data-lucide="banknote"
                       class="w-5 h-5 text-emerald-600"></i>

                </div>

                <div>

                    <p class="text-xs text-slate-500 font-medium">
                        Total Omzet
                    </p>

                    <p class="text-xl font-bold text-slate-900">
                        Rp {{ number_format($totalOmzet ?? 0, 0, ',', '.') }}
                    </p>

                </div>

            </div>

        </div>


        <!-- HARI INI -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 card-hover">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center">

                    <i data-lucide="calendar-days"
                       class="w-5 h-5 text-amber-600"></i>

                </div>

                <div>

                    <p class="text-xs text-slate-500 font-medium">
                        Hari Ini
                    </p>

                    <p class="text-xl font-bold text-slate-900">
                        {{ $hariIni ?? 0 }}
                    </p>

                </div>

            </div>

        </div>

    </div>


    <!-- TABLE -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <!-- TABLE HEADER -->
                <thead>

                    <tr class="bg-slate-50 border-b border-slate-200">

                        <th class="text-left px-6 py-3.5 font-semibold text-slate-600 w-12">
                            #
                        </th>

                        <th class="text-left px-6 py-3.5 font-semibold text-slate-600">
                            No. Transaksi
                        </th>

                        <th class="text-left px-6 py-3.5 font-semibold text-slate-600">
                            Tanggal
                        </th>

                        <th class="text-left px-6 py-3.5 font-semibold text-slate-600">
                            Kasir
                        </th>

                        <th class="text-right px-6 py-3.5 font-semibold text-slate-600">
                            Total
                        </th>

                        <th class="text-right px-6 py-3.5 font-semibold text-slate-600">
                            Aksi
                        </th>

                    </tr>

                </thead>


                <!-- TABLE BODY -->
                <tbody class="divide-y divide-slate-100">

                    @forelse($penjualans ?? [] as $index => $penjualan)

                        <tr class="hover:bg-slate-50/80 transition">

                            <!-- NOMOR -->
                            <td class="px-6 py-4 text-slate-500">

                                {{ $penjualans->firstItem() + $index }}

                            </td>


                            <!-- NO TRANSAKSI -->
                            <td class="px-6 py-4 font-medium text-slate-800">

                                {{ $penjualan->kode ?? '#'.$penjualan->id }}

                            </td>


                            <!-- TANGGAL -->
                            <td class="px-6 py-4 text-slate-600">

                                {{ $penjualan->created_at?->format('d M Y H:i') ?? '-' }}

                            </td>


                            <!-- KASIR -->
                            <td class="px-6 py-4 text-slate-600">

                                {{ $penjualan->user->name ?? '-' }}

                            </td>


                            <!-- TOTAL -->
                            <td class="px-6 py-4 text-right font-semibold text-slate-800">

                                Rp {{ number_format(
                                    $penjualan->total ?? 0,
                                    0,
                                    ',',
                                    '.'
                                ) }}

                            </td>


                            <!-- AKSI -->
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-end gap-2">

                                    <!-- DETAIL -->
                                    <a href="{{ route('penjualan.show', $penjualan->id) }}"
                                       class="p-2 rounded-lg text-slate-500 hover:bg-indigo-50 hover:text-indigo-600 transition"
                                       title="Detail">

                                        <i data-lucide="eye"
                                           class="w-4 h-4"></i>

                                    </a>


                                    <!-- DELETE -->
                                    <form action="{{ route('penjualan.destroy', $penjualan->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus transaksi ini?')">

                                        @csrf

                                        @method('DELETE')

                                        <button type="submit"
                                                class="p-2 rounded-lg text-slate-500 hover:bg-rose-50 hover:text-rose-600 transition"
                                                title="Hapus">

                                            <i data-lucide="trash-2"
                                               class="w-4 h-4"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <!-- DATA KOSONG -->
                        <tr>

                            <td colspan="6"
                                class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center mb-3">

                                        <i data-lucide="receipt"
                                           class="w-7 h-7 text-slate-400"></i>

                                    </div>

                                    <p class="text-sm font-medium text-slate-600">
                                        Belum ada transaksi
                                    </p>

                                    <p class="text-xs text-slate-400 mt-1">
                                        Buat transaksi penjualan pertama
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <!-- PAGINATION -->
        @if(isset($penjualans) && method_exists($penjualans, 'hasPages') && $penjualans->hasPages())

            <div class="px-6 py-5 border-t border-slate-100">

                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">


                    <!-- PAGINATION INFO -->
                    <div class="text-sm text-slate-500">

                        Menampilkan

                        <span class="font-semibold text-slate-700">
                            {{ $penjualans->firstItem() }}
                        </span>

                        sampai

                        <span class="font-semibold text-slate-700">
                            {{ $penjualans->lastItem() }}
                        </span>

                        dari

                        <span class="font-semibold text-slate-700">
                            {{ $penjualans->total() }}
                        </span>

                        transaksi

                    </div>


                    <!-- PAGINATION BUTTONS -->
                    <div class="flex items-center gap-1 flex-wrap justify-center">


                        <!-- PREVIOUS -->
                        @if($penjualans->onFirstPage())

                            <span class="pagination-btn disabled">

                                <i data-lucide="chevron-left"
                                   class="w-4 h-4"></i>

                                <span class="hidden sm:inline">
                                    Previous
                                </span>

                            </span>

                        @else

                            <a href="{{ $penjualans->previousPageUrl() }}"
                               class="pagination-btn">

                                <i data-lucide="chevron-left"
                                   class="w-4 h-4"></i>

                                <span class="hidden sm:inline">
                                    Previous
                                </span>

                            </a>

                        @endif


                        <!-- NOMOR HALAMAN -->
                        @foreach($penjualans->getUrlRange(1, $penjualans->lastPage()) as $page => $url)

                            @if($page == $penjualans->currentPage())

                                <span class="pagination-number active">

                                    {{ $page }}

                                </span>

                            @else

                                <a href="{{ $url }}"
                                   class="pagination-number">

                                    {{ $page }}

                                </a>

                            @endif

                        @endforeach


                        <!-- NEXT -->
                        @if($penjualans->hasMorePages())

                            <a href="{{ $penjualans->nextPageUrl() }}"
                               class="pagination-btn">

                                <span class="hidden sm:inline">
                                    Next
                                </span>

                                <i data-lucide="chevron-right"
                                   class="w-4 h-4"></i>

                            </a>

                        @else

                            <span class="pagination-btn disabled">

                                <span class="hidden sm:inline">
                                    Next
                                </span>

                                <i data-lucide="chevron-right"
                                   class="w-4 h-4"></i>

                            </span>

                        @endif

                    </div>

                </div>

            </div>

        @endif

    </div>


    <!-- PAGINATION CSS -->
    <style>

        /* ========================================
           PAGINATION BUTTON
        ======================================== */

        .pagination-btn {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 6px;

            height: 38px;

            padding: 0 13px;

            border-radius: 10px;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            color: #475569;

            font-size: 13px;

            font-weight: 500;

            text-decoration: none;

            transition: all 0.2s ease;

        }


        .pagination-btn:hover {

            background: #eef2ff;

            border-color: #c7d2fe;

            color: #4f46e5;

        }


        /* ========================================
           DISABLED BUTTON
        ======================================== */

        .pagination-btn.disabled {

            background: #f8fafc;

            border-color: #f1f5f9;

            color: #cbd5e1;

            cursor: not-allowed;

        }


        /* ========================================
           PAGINATION NUMBER
        ======================================== */

        .pagination-number {

            width: 38px;

            height: 38px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            border-radius: 10px;

            background: #ffffff;

            border: 1px solid #e2e8f0;

            color: #475569;

            font-size: 13px;

            font-weight: 500;

            text-decoration: none;

            transition: all 0.2s ease;

        }


        .pagination-number:hover {

            background: #eef2ff;

            border-color: #c7d2fe;

            color: #4f46e5;

        }


        /* ========================================
           ACTIVE PAGE
        ======================================== */

        .pagination-number.active {

            background: linear-gradient(
                135deg,
                #6366f1,
                #8b5cf6
            );

            border-color: transparent;

            color: #ffffff;

            box-shadow:
                0 4px 10px rgba(99, 102, 241, 0.25);

        }


        /* ========================================
           MOBILE
        ======================================== */

        @media (max-width: 640px) {

            .pagination-number {

                width: 34px;

                height: 34px;

            }

            .pagination-btn {

                height: 34px;

                padding: 0 10px;

            }

        }

    </style>

@endsection