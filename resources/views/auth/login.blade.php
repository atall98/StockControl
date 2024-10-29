<x-guest-layout>
    <!-- Statut de session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <h1 class="title">Connexion</h1>

        <form method="POST" action="{{ route('login') }}" class="form">
            @csrf

            <!-- Adresse email -->
            <div class="input-group">
                <x-input-label for="email" :value="__('Email')" class="input-label" />
                <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="error-message" />
            </div>

            <!-- Mot de passe -->
            <div class="input-group mt-4">
                <x-input-label for="password" :value="__('Password')" class="input-label" />
                <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="error-message" />
            </div>

            <!-- Se souvenir de moi -->
            <div class="remember-me block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="actions flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="forgot-password underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="login-button ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>

    <style>
        /* Styles globaux */
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #e0f7fa, #e3f2fd);
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 400px;
            width: 100%;
            background: #ffffff;
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        .title {
            font-size: 2em;
            color: #00796b;
            margin-bottom: 1em;
        }

        .form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }

        .input-group {
            margin-bottom: 1.5em;
        }

        .input-label {
            display: block;
            margin-bottom: 0.5em;
            color: #555;
        }

        .input-field {
            padding: 0.75em;
            border: 2px solid #b2dfdb;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            border-color: #00796b;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 121, 107, 0.3);
        }

        .error-message {
            color: #e57373;
            font-size: 0.875em;
            margin-top: 0.5em;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 1em;
            font-size: 0.875em;
        }

        .login-button {
            background: #00796b;
            color: white;
            padding: 0.75em 1.5em;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .login-button:hover {
            background: #004d40;
            transform: translateY(-2px);
        }

        .forgot-password {
            margin-top: 1em;
            font-size: 0.875em;
            color: #00796b;
            text-decoration: none;
            transition: color 0.3s;
        }

        .forgot-password:hover {
            color: #004d40;
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</x-guest-layout>
