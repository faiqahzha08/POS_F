@extends('layouts.app')

@section('title', 'Distributor - POS')

@section('content')

<!-- Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

    <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">
            Daftar Distributor
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            Kelola semua distributor yang menyediakan produk
        </p>
    </div>

    <a href="{{ route('distributor.create') }}"
       class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-xl transition">

        <i data-lucide="plus" class="w-4 h-4"></i>

        Tambah Distributor

    </a>

</div>


<!-- Pesan Sukses -->
@if(session('success'))

    <div class="mb-6 px-4 py-3 rounded-xl bg-green-100 border border-green-200 text-green-700 text-sm">
        {{ session('success') }}
    </div>

@endif


<!-- Pesan Error -->
@if(session('error'))

    <div class="mb-6 px-4 py-3 rounded-xl bg-red-100 border border-red-200 text-red-700 text-sm">
        {{ session('error') }}
    </div>

@endif


<!-- Table -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead>

                <tr class="bg-slate-50 border-b border-slate-200">

                    <th class="px-6 py-4 text-left font-semibold text-slate-700">
                        #
                    </th>

                    <th class="px-6 py-4 text-left font-semibold text-slate-700">
                        Nama Perusahaan
                    </th>

                    <th class="px-6 py-4 text-left font-semibold text-slate-700">
                        Nama Distributor
                    </th>

                    <th class="px-6 py-4 text-left font-semibold text-slate-700">
                        No. Telepon
                    </th>

                    <th class="px-6 py-4 text-left font-semibold text-slate-700">
                        Alamat
                    </th>

                    <th class="px-6 py-4 text-right font-semibold text-slate-700">
                        Aksi
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                @forelse($distributors as $index => $distributor)

                    <tr class="hover:bg-slate-50 transition">

                        <!-- Nomor -->
                        <td class="px-6 py-4 text-slate-600">
                            {{ $index + 1 }}
                        </td>


                        <!-- Nama Perusahaan -->
                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-800">
                                {{ $distributor->nama_perusahaan ?? '-' }}
                            </div>

                        </td>


                        <!-- Nama Distributor -->
                        <td class="px-6 py-4 text-slate-700">
                            {{ $distributor->nama ?? '-' }}
                        </td>


                        <!-- Telepon -->
                        <td class="px-6 py-4 text-slate-700">

                            {{ $distributor->telepon ?? $distributor->no_telepon ?? '-' }}

                        </td>


                        <!-- Alamat -->
                        <td class="px-6 py-4 text-slate-700">

                            {{ $distributor->alamat ?? '-' }}

                        </td>


                        <!-- Aksi -->
                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                <!-- Edit -->
                                <a href="{{ route('distributor.edit', $distributor->id) }}"
                                   title="Edit Distributor"
                                   class="p-2 rounded-lg bg-yellow-100 hover:bg-yellow-200 transition">

                                    <i data-lucide="pencil"
                                       class="w-4 h-4 text-yellow-700"></i>

                                </a>


                                <!-- Hapus -->
                                <form action="{{ route('distributor.destroy', $distributor->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus distributor ini?')">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            title="Hapus Distributor"
                                            class="p-2 rounded-lg bg-red-100 hover:bg-red-200 transition">

                                        <i data-lucide="trash-2"
                                           class="w-4 h-4 text-red-700"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="px-6 py-12 text-center text-slate-500">

                            <div class="flex flex-col items-center justify-center">

                                <div class="w-14 h-14 rounded-full bg-slate-100 flex items-center justify-center mb-3">

                                    <i data-lucide="truck"
                                       class="w-7 h-7 text-slate-400"></i>

                                </div>

                                <p class="font-medium text-slate-600">
                                    Belum ada distributor
                                </p>

                                <p class="text-sm text-slate-400 mt-1">
                                    Silakan tambahkan distributor baru.
                                </p>

                                <a href="{{ route('distributor.create') }}"
                                   class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm rounded-xl transition">

                                    <i data-lucide="plus" class="w-4 h-4"></i>

                                    Tambah Distributor

                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection