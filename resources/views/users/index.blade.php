@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Daftar User</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('mppuser-7f3a2b.create') }}" class="btn btn-primary mb-3">Tambah User</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>RS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $roles[$user->kode_role] ?? '-' }}</td>
                <td>{{ $rsList[$user->kode_rs]['namaRs'] ?? '-' }}</td>
                <td>
                    <a href="{{ route('mppuser-7f3a2b.edit', $user) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('mppuser-7f3a2b.destroy', $user) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus user?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
