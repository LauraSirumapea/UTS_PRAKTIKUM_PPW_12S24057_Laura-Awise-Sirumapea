
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'del-Lab' }} | Peminjaman Inventaris</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>
        :root {
            --primary: #4C1D95;
            --primary-dark: #3B0764;
            --background: #FAF7F3;
            --text: #49372B;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--background);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        .delLab-navbar {
            background: #3D2852;
            border-bottom: 2px solid #D9B99B;
            padding: 14px 0;
        }

        .delLab-navbar .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .delLab-brand {
            color: white;
            text-decoration: none;
            font-size: 19px;
            font-weight: 700;
            white-space: nowrap;
        }

        .delLab-brand:hover {
            color: #F3E8FF;
        }

        .delLab-menu {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 8px;
            flex-wrap: wrap;
        }

        .delLab-menu a {
            color: #F8F5FC;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            padding: 10px 13px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .delLab-menu a:hover,
        .delLab-menu a.active {
            background: rgba(255, 255, 255, 0.14);
        }

        .delLab-menu i {
            margin-right: 5px;
        }

        .delLab-logout-form {
            display: inline-flex;
            margin: 0;
        }

        .delLab-logout-btn {
            border: 1px solid rgba(255,255,255,.55);
            border-radius: 8px;
            padding: 9px 13px;
            background: transparent;
            color: white;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }

        .delLab-logout-btn:hover {
            background: rgba(255,255,255,.14);
        }

        .delLab-content {
            padding-top: 30px;
            padding-bottom: 45px;
        }

        .delLab-alert {
            max-width: 1200px;
            margin: 0 auto 20px;
            border-radius: 10px;
        }

        @media (max-width: 600px) {
            .delLab-navbar .container {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }

            .delLab-menu {
                justify-content: flex-start;
                width: 100%;
            }

            .delLab-menu a {
                padding: 8px 10px;
            }

            .delLab-content {
                padding-top: 20px;
            }
        }
    </style>
</head>

<body>

    <nav class="delLab-navbar">
        <div class="container">

            <a
                href="{{ Auth::check() ? route('buku.index') : route('login') }}"
                class="delLab-brand"
            >
                📚 DELLAB
            </a>

            <div class="delLab-menu">

                @auth
                    <a
                        href="{{ route('buku.index') }}"
                        class="{{ request()->routeIs('buku.*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-book"></i>
                        Buku
                    </a>

                    <a
                        href="{{ route('kategori.index') }}"
                        class="{{ request()->routeIs('kategori.*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-tags-fill"></i>
                        Kategori
                    </a>

                    <a
                        href="{{ route('peminjaman.index') }}"
                        class="{{ request()->routeIs('peminjaman.*') ? 'active' : '' }}"
                    >
                        <i class="bi bi-journal-arrow-up"></i>
                        Peminjaman
                    </a>

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        class="delLab-logout-form"
                    >
                        @csrf

                        <button type="submit" class="delLab-logout-btn">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>
                @else
                    @if (!request()->routeIs('login'))
                        <a href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                    @endif
                @endauth

            </div>
        </div>
    </nav>

    <main class="delLab-content container-fluid">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show delLab-alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Tutup"
                ></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show delLab-alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Tutup"
                ></button>
            </div>
        @endif

        {{ $slot }}

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>