@extends('layouts.app')

@section('title', 'Edit Distributor - POS')

@section('content')

<div class="mb-8">

    <a href="{{ route('distributor.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 transition">

        <i data-lucide="arrow-left" class="w-4 h-4"></i>

        Kembali
    </a>

    <h1 class="text-2xl sm:text-3xl font-bold text-slate-900 mt-4">
        Edit Distributor
    </h1>

    <p class="text-sm text-slate-500 mt-1">
        Ubah data distributor
    </p>

</div>


<div class="max-w-3xl">

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <form action="{{ route('distributor.update', $distributor->id) }}"
              method="POST">

            @csrf
            @method('PUT')


            {{-- NAMA PERUSAHAAN --}}
            <div class="mb-5">

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Nama Perusahaan
                </label>

                <input
                    type="text"
                    name="nama_perusahaan"
                    value="{{ old('nama_perusahaan', $distributor->nama_perusahaan) }}"
                    required
                    placeholder="Contoh: PT Aep Baplang"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">

                @error('nama_perusahaan')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- NAMA KONTAK --}}
            <div class="mb-5">

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $distributor->nama) }}"
                    required
                    placeholder="Nama kontak distributor"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">

                @error('nama')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- ALAMAT --}}
            <div class="mb-5">

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="3"
                    required
                    placeholder="Alamat distributor"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">{{ old('alamat', $distributor->alamat) }}</textarea>

                @error('alamat')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- TELEPON --}}
            <div class="mb-5">

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Telepon
                </label>

                <input
                    type="text"
                    name="telepon"
                    value="{{ old('telepon', $distributor->telepon) }}"
                    required
                    placeholder="Contoh: 08765432198"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">

                @error('telepon')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- EMAIL --}}
            <div class="mb-6">

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email', $distributor->email) }}"
                    required
                    placeholder="email@gmail.com"
                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100">

                @error('email')
                    <p class="mt-1 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- BUTTON --}}
            <div class="flex justify-end gap-3">

                <a href="{{ route('distributor.index') }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:bg-slate-50 transition">

                    Batal

                </a>

                <button
                    type="submit"
                    class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white transition">

                    Simpan Perubahan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection