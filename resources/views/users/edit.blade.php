@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Edit User</h2>
    <form action="{{ route('mppuser-7f3a2b.update', ['mppuser_7f3a2b' => $user->id]) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}">
        </div>
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required value="{{ old('username', $user->username) }}">
        </div>
        <div class="mb-3">
            <label>Password (isi jika ingin ganti)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="kode_role" class="form-select" required>
                <option value="">Pilih Role</option>
                @foreach($roles as $k => $v)
                    <option value="{{ $k }}" {{ (old('kode_role', $user->kode_role) == $k) ? 'selected' : '' }}>{{ $v }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Rumah Sakit</label>
            <select name="kode_rs" class="form-select" required>
                <option value="">Pilih RS</option>
                @foreach($rsList as $k => $v)
                    <option value="{{ $k }}" {{ (old('kode_rs', $user->kode_rs) == $k) ? 'selected' : '' }}>{{ $v['namaRs'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('mppuser-7f3a2b.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
