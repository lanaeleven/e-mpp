@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Tambah User</h2>
    <form action="{{ route('mppuser-7f3a2b.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="kode_role" class="form-select" required>
                <option value="">Pilih Role</option>
                @foreach($roles as $k => $v)
                    <option value="{{ $k }}" {{ old('kode_role') == $k ? 'selected' : '' }}>{{ $v }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Rumah Sakit</label>
            <select name="kode_rs" class="form-select" required>
                <option value="">Pilih RS</option>
                @foreach($rsList as $k => $v)
                    <option value="{{ $k }}" {{ old('kode_rs') == $k ? 'selected' : '' }}>{{ $v['namaRs'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mppuser-7f3a2b.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
