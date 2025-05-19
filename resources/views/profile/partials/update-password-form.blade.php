@extends('layouts.app')

@section('content')
<div class="container py-5">
    <section>
        <header class="mb-3">
            <h2 class="h5 fw-bold text-dark">
                {{ __('Update Password') }}
            </h2>

            <p class="text-muted small">
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>
        </header>

        <form method="POST" action="{{ route('password.update') }}" class="mt-4">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
                <input
                    type="password"
                    id="update_password_current_password"
                    name="current_password"
                    class="form-control @error('current_password') is-invalid @enderror"
                    autocomplete="current-password"
                >
                @if ($errors->updatePassword->has('current_password'))
                    <div class="invalid-feedback">
                        {{ $errors->updatePassword->first('current_password') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
                <input
                    type="password"
                    id="update_password_password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    autocomplete="new-password"
                >
                @if ($errors->updatePassword->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->updatePassword->first('password') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input
                    type="password"
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    autocomplete="new-password"
                >
                @if ($errors->updatePassword->has('password_confirmation'))
                    <div class="invalid-feedback">
                        {{ $errors->updatePassword->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-primary">
                    {{ __('Save') }}
                </button>

                @if (session('status') === 'password-updated')
                    <div
                        id="password-saved-msg"
                        class="text-success small"
                        role="alert"
                        style="transition: opacity 0.5s;"
                    >
                        {{ __('Saved.') }}
                    </div>
                @endif
            </div>
        </form>
    </section>
</div>

@if (session('status') === 'password-updated')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const msg = document.getElementById('password-saved-msg');
        if (msg) {
            setTimeout(() => {
                msg.style.opacity = '0';
            }, 2000);
        }
    });
</script>
@endif
@endsection
