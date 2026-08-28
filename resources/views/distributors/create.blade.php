@extends('layouts.app')

@section('title', 'Tambah Distributor - POS')

@section('content')

<div class="mb-8">

    <a href="{{ route('distributor.index') }}"
       class="inline-flex items-center gap-2 text-sm text-slate-500 hover:text-indigo-600 mb-4">
        ← Kembali
    </a>

    <h1 class="text-2xl sm:text-3xl font-bold text-slate-900">
        Tambah Distributor
    </h1>

    <p class="mt-1 text-sm text-slate-500">
        Tambahkan distributor baru
    </p>

</div>

<div class="max-w-xl">

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">

        <form action="{{ route('distributor.store') }}"
              method="POST"
              class="space-y-5">

            @csrf

            {{-- Nama Perusahaan --}}
            <div>

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Nama Perusahaan
                </label>

                <input type="text"
                       name="nama_perusahaan"
                       value="{{ old('nama_perusahaan') }}"
                       required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="Contoh: PT Sumber Makmur">

                @error('nama_perusahaan')
                    <p class="mt-1 text-xs text-rose-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Nama Distributor --}}
            <div>

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Nama Distributor
                </label>

                <input type="text"
                       name="nama"
                       value="{{ old('nama') }}"
                       required
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="Nama PIC / distributor">

                @error('nama')
                    <p class="mt-1 text-xs text-rose-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- Alamat --}}
            <div>

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Alamat
                </label>

                <textarea name="alamat"
                          rows="3"
                          class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                          placeholder="Alamat perusahaan">{{ old('alamat') }}</textarea>

            </div>


            {{-- Telepon --}}
            <div>

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Nomor Telepon
                </label>

                <input type="text"
                       name="telepon"
                       value="{{ old('telepon') }}"
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="08xxxxxxxxxx">

            </div>


            {{-- Email --}}
            <div>

                <label class="block text-sm font-medium text-slate-700 mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2.5 rounded-xl border border-slate-200 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100"
                       placeholder="email@contoh.com">

            </div>


            <div class="flex justify-end gap-3 pt-2">

                <a href="{{ route('distributor.index') }}"
                   class="px-5 py-2.5 rounded-xl border border-slate-200 text-sm font-medium text-slate-600 hover:bg-slate-50">
                    Batal
                </a>

                <button type="submit"
                        class="px-5 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium">
                    Simpan Distributor
                </button>

            </div>

        </form>

    </div>

</div>

@endsection