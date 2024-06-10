<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - E-Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg max-w-5xl w-full flex">
        <!-- Left Side: Welcome Message and Image -->
        <div class="w-1/2" style="background-color: #E1FFFD; padding: 2rem;">
    <h2 class="text-2xl font-bold text-center mb-4">Welcome to E-Sertifikat!</h2>
    <p class="text-center mb-4">Untuk bergabung di kegiatan, silahkan login menggunakan email yang terdaftar terlebih dahulu</p>
    <img src="{{ asset('img/gambarlogo.png') }}" alt="Welcome Image" class="mx-auto mb-4 w-12 h-auto">
</div>

        <!-- Right Side: Logo and Login Form -->
        <div class="w-1/2 p-8 flex flex-col justify-center">
            <div class="text-center mb-8">
                <img src="{{ asset('img/logoe-sertifikat.png') }}" alt="Logo" class="mx-auto mb-4 w-20 h-auto">
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-md"/>
                    <x-input id="email" class="block mt-1 w-full p-2 text-md border rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="border-color: #9ACFCB;" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" class="text-md"/>
                    <x-input id="password" class="block mt-1 w-full p-2 text-md border rounded-md" type="password" name="password" required autocomplete="current-password" style="border-color: #9ACFCB;" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-md text-gray-600 hover:text-gray-900 ml-auto" href="{{ route('password.request') }}"> <!-- Forgot password link moved to the right -->
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div>
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 text-md rounded focus:outline-none focus:shadow-outline" style="background-color: #76B5C5;">
                        {{ __('Log in') }}
                    </button>
                </div>
                <div class="flex items-center justify-center mt-4">
                    <p class="text-md text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700">Buat akun</a></p> <!-- Register link remains below the button -->
                </div>
            </form>
        </div>
    </div>
</body>
</html>
