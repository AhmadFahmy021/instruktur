<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 | Akses Ditolak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-6xl font-bold text-red-500">403</h1>
        <p class="text-lg text-gray-700 mt-4">Anda tidak memiliki izin untuk mengakses halaman ini.</p>

        <div class="mt-6 flex justify-center space-x-4">
            @if (Auth::user()->role == '1')
                <!-- Tombol Kembali ke Dashboard -->
                <a href="{{ route('filament.admin.pages.dashboard') }}"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Kembali ke Dashboard
                </a>

                <!-- Tombol Logout -->
                <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            @elseif (Auth::user()->role == '2')
                <!-- Tombol Kembali ke Dashboard -->
                <a href="{{ route('filament.admin.pages.dashboard') }}"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Kembali ke Dashboard
                </a>

                <!-- Tombol Logout -->
                <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            @endif
        </div>
    </div>
</body>
</html>
