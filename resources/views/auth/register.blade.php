<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - E-Sertifikat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg max-w-5xl w-full flex">
        <!-- Left Side: Welcome Message and Image -->
        <div class="w-1/2" style="background-color: #E1FFFD; padding: 2rem;">
        <h2 class="text-2xl font-bold text-center mb-4">Welcome to E-Sertifikat!</h2>
        <p class="text-center mb-4">Silahkan isi formulir untuk membuat akun baru</p>
        <img src="{{ asset('img/gambarlogo.png') }}" alt="Welcome Image" class="mx-auto mb-4 w-14 h-auto">
</div>



        <!-- Right Side: Logo and Registration Form -->
        <div class="w-1/2 p-8 flex flex-col justify-center">
            <div class="text-center mb-8">
                <img src="{{ asset('img/logoe-sertifikat.png') }}" alt="Logo" class="mx-auto mb-4 w-20 h-auto">
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full p-2 text-md border rounded-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full p-2 text-md border rounded-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full p-2 text-md border rounded-md" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div>
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full p-2 text-md border rounded-md" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <a class="text-md text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 text-md rounded focus:outline-none focus:shadow-outline" style="background-color: #76B5C5;">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
