@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah Baru')

@section('content')
<div style="max-width: 760px; margin: 0 auto;">
    <div style="margin-bottom: 1.25rem;">
        <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm">
            Kembali ke Daftar Mata Kuliah
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <div>
                <h1 class="card-title">Tambah Mata Kuliah Baru</h1>
                <p class="card-subtitle">Buat mata kuliah baru yang akan Anda ampu pada semester aktif ini.</p>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1.25rem;">
                     <!-- TODO 6: Buat input untuk data mata kuliah. -->
                     {{-- Hint:
                     - Buat field untuk kode MK, nama MK, SKS, dan semester.
                     - Gunakan jenis elemen form yang sesuai dengan tiap data.
                     - Sesuaikan atribut name dengan nama field yang dibaca controller.
                     - Gunakan old() agar isian tidak hilang setelah validasi gagal.
                     - Tampilkan pesan error validasi menggunakan directive Blade.
                     - Pola umum input teks: <input type="text" name="nama_field"> --}}
                    <form action="{{ route('courses.store') }}" method="POST">
    @csrf
    
    <div>
        <label for="kode_mk">Kode Mata Kuliah</label>
        <input type="text" name="kode_mk" id="kode_mk" value="{{ old('kode_mk') }}" required>
        @error('kode_mk')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="nama_mk">Nama Mata Kuliah</label>
        <input type="text" name="nama_mk" id="nama_mk" value="{{ old('nama_mk') }}" required>
        @error('nama_mk')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="sks">SKS</label>
        <input type="number" name="sks" id="sks" min="1" max="6" value="{{ old('sks') }}" required>
        @error('sks')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="semester">Semester</label>
        <input type="text" name="semester" id="semester" value="{{ old('semester') }}" required>
        @error('semester')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit">Simpan</button>
</form>
                <!-- Dosen Pengampu (Otomatis akun Dosen yang login) -->
                <div class="form-group">
                    <label class="form-label">
                        Dosen Pengampu Kelas
                    </label>
                    <div style="padding: 0.625rem 0.875rem; background-color: var(--slate-50); border: 1px solid var(--slate-200); border-radius: 6px; font-size: 0.875rem; color: var(--slate-800); font-weight: 600;">
                        {{ Auth::user()->name }} ({{ Auth::user()->nomor_induk ?: Auth::user()->email }})
                    </div>
                    <div class="form-help">Mata kuliah ini akan otomatis tercatat di bawah akun Dosen Anda.</div>
                </div>

                <!-- Deskripsi / Silabus -->
                <div class="form-group">
                    <label for="deskripsi" class="form-label">
                        Silabus / Deskripsi Mata Kuliah
                    </label>
                    <textarea 
                        name="deskripsi" 
                        id="deskripsi" 
                        rows="4" 
                        class="form-control @error('deskripsi') is-invalid @enderror" 
                        placeholder="Ringkasan capaian pembelajaran, silabus, dan materi yang akan dipelajari..."
                    >{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 1.5rem; padding-top: 1.25rem; border-top: 1px solid var(--slate-200);">
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Mata Kuliah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
