@extends('layouts.app')
@section('content')

    <div class="text-center">
        <h2>Lägg till Admin</h2>
        <p>Alla fält markerade med <strong>*</strong> är obligatoriska.</p>
        <hr>
    </div>

    <form action="{{ '/admins' }}" method="post">
        @csrf

        <!-- Epost -->
        <div class="form-group row">
            <label for="email">Epost *</label>
            <input
                id="email"
                type="text"
                placeholder="Epost"
                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email"
                value="{{ old( 'email' ) }}"
                required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <!-- Current password -->
        <div class="form-group row">
            <label for="password">Lösenord</label>
            <div class="input-group">
                <input
                    id="password"
                    type="password"
                    placeholder="Lösenord"
                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    name="password"
                    required>

                <div class="input-group-append">
                    <button type="button" id="togglePassword" class="btn btn-outline-secondary far fa-eye"></button>
                </div>
            </div>


            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <!-- Repeat new password -->
        <div class="form-group row">
            <label for="password_confirmation">Repetera lösenordet</label>
            <div class="input-group">
                <input
                    id="password_confirmation"
                    type="password"
                    placeholder="Lösenord"
                    class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                    name="password_confirmation"
                    required>

                <div class="input-group-append">
                    <button type="button" id="toggleConfirmPassword" class="btn btn-outline-secondary far fa-eye"></button>
                </div>
            </div>

            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <a class="btn btn-secondary mr-1" href="{{ route('admins.index') }}">Avbryt</a>
            <button type="submit" class="btn btn-primary ml-0">Spara</button>
        </div>
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = (inputId, toggleId) => {
                const input = document.getElementById(inputId);
                const toggle = document.getElementById(toggleId);
                toggle.addEventListener("click", () => {
                    const is_password = input.type === "password";
                    input.type = is_password ? "text" : "password";
                    toggle.classList.toggle("fa-eye", !is_password);
                    toggle.classList.toggle("fa-eye-slash", is_password);
                });
            };

            togglePassword("password", "togglePassword");
            togglePassword("password_confirmation", "toggleConfirmPassword");
        });
    </script>

@endsection
