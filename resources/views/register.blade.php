@extends('template')

@section('content')
<div class="container mt-5">
    <h3>Form Registrasi Iuran Warga</h3>
    <form action="{{ route('register.dues') }}" method="POST">
        @csrf

        <!-- USER DATA -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="nohp" class="form-label">Nomor HP</label>
            <input type="text" class="form-control" id="nohp" name="nohp" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
        </div>

        <div class="mb-3">
            <label for="level" class="form-label">Level</label>
            <select class="form-select" id="level" name="level" required>
                <option value="warga">Warga</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <!-- DUES MEMBER CATEGORY -->
        <div class="mb-3">
            <label for="dues_category" class="form-label">Kategori Iuran</label>
            <select class="form-select" id="dues_category" name="idduescategory" required>
                @foreach($duesCategories as $category)
                    <option value="{{ $category->id }}">
                        {{ ucfirst($category->period) }} - Rp {{ number_format($category->nominal, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Daftar</button>
    </form>
</div>
@endsection
