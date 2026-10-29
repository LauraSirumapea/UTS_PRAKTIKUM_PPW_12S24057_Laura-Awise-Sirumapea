
<x-layout title="Login Petugas">

<div style="max-width:440px; margin:45px auto; padding:32px;
    background:#FFFCF7; border:1px solid #EAD8C8;
    border-radius:20px; color:#49372B;">

    <div style="text-align:center; margin-bottom:25px;">
        <div style="font-size:38px; color:#4C1D95;">
            <i class="bi bi-book-half"></i>
        </div>
        <h1 style="font-size:27px; font-weight:800; margin:12px 0 8px;">
            SIPUS-Del
        </h1>
        <p style="color:#887568; font-size:14px;">
            Login Petugas Perpustakaan
        </p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                value="{{ old('email') }}"
                placeholder="Masukkan email petugas"
                autocomplete="username"
                required
                autofocus
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                autocomplete="current-password"
                required
            >
        </div>

        <div class="form-check mb-4">
            <input
                type="checkbox"
                id="remember"
                name="remember"
                value="1"
                class="form-check-input"
            >
            <label for="remember" class="form-check-label">
                Ingat saya
            </label>
        </div>

        <button
            type="submit"
            class="btn w-100"
            style="background:#4C1D95; color:white;
                padding:12px; border-radius:10px; font-weight:700;"
        >
            Login
        </button>
    </form>
</div>

</x-layout>
