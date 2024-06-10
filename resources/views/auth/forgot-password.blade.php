<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - E-Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-custom {
            background-color: #E1FFFD;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg max-w-5xl w-full flex">
        <!-- Left Side: Welcome Message and Image -->
        <div class="w-1/2 bg-custom p-8 flex flex-col items-center justify-center">
            <h2 class="text-2xl font-bold text-center mb-4">Welcome to E-Sertifikat!</h2>
            <p class="text-center mb-4">Untuk reset password, silahkan masukkan email yang terdaftar.</p>
            <img src="{{ asset('img/gambarlogo.png') }}" alt="Welcome Image" class="mx-auto mb-4 w-14 h-auto">
        </div>

        <!-- Right Side: Forgot Password Form -->
        <div class="w-1/2 p-8 flex flex-col justify-center">
            <div class="text-center mb-8">
                <img src="{{ asset('img/logoe-sertifikat.png') }}" alt="Logo" class="mx-auto mb-4 w-20 h-auto">
            </div>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="email" value="{{ __('Email') }}" class="text-md"/>
                    <x-input id="email" class="block mt-1 w-full p-2 text-md border rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" style="border-color: #9ACFCB;" />
                </div>

                <div class="mt-4">
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 text-md rounded focus:outline-none focus:shadow-outline" style="background-color: #76B5C5;">
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
