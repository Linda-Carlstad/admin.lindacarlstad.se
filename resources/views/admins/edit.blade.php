@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Redigera Admin: {{ $admin->email }}</h2>
        <hr>
    </div>

    <!-- Change password form -->
    <form action="{{ '/admins/' . $admin->id }}" method="post">
        @csrf
        {{ method_field( 'patch' ) }}

        <h3>Ändra lösenord</h3>
        <!-- TODO: Type password and add a show password eye button -->

        <!-- Current password -->
        <div class="form-group row">
            <label for="password">Nuvarande lösenord</label>
            <input
                id="password"
                type="password"
                placeholder="Lösenord"
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                name="password"
                required>

            <div class="input-group-append">
                <button type="button" id="togglePassword" class="btn btn-outline-secondary">👁️</button>
            </div>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password' ) }}</strong>
                </span>
            @endif
        </div>

        <!-- New password -->
        <div class="form-group row">
            <label for="new_password">Nya lösenordet</label>
            <input
                id="new_password"
                type="password"
                placeholder="Lösenord"
                class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}"
                name="new_password"
                required>

            <div class="input-group-append">
                <button type="button" id="toggleNewPassword" class="btn btn-outline-secondary">👁️</button>
            </div>

            @if ($errors->has('new_password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('new_password' ) }}</strong>
                </span>
            @endif
        </div>

        <!-- Repeat new password -->
        <div class="form-group row">
            <label for="new_password_confirmation">Repetera nya lösenordet</label>
            <input
                id="new_password_confirmation"
                type="password"
                placeholder="Lösenord"
                class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}"
                name="new_password_confirmation"
                required>

            <div class="input-group-append">
                <button type="button" id="toggleConfirmPassword" class="btn btn-outline-secondary">👁️</button>
            </div>

            @if ($errors->has('new_password_confirmation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('new_password_confirmation' ) }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route( 'admins.index' ) }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">
                Spara
            </button>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = (inputId, toggleId) => {
                const input = document.getElementById(inputId);
                const toggle = document.getElementById(toggleId);
                toggle.addEventListener("click", () => {
                    input.type = input.type === "password" ? "text" : "password";
                    toggle.textContent = input.type === "password" ? "👁️" : "🙈";
                });
            };

            togglePassword("password", "togglePassword");
            togglePassword("new_password", "toggleNewPassword");
            togglePassword("new_password_confirmation", "toggleConfirmPassword");
        });
    </script>

@endsection
