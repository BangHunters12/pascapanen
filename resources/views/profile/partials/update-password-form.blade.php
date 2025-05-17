<section>
    <header class="mb-4">
        <h2 class="h5 text-dark">
            {{ __('Update Password') }}
        </h2>
        <p class="text-muted small">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
            >
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="form-control @error('password', 'updatePassword') is-invalid @enderror"
            >
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
            >
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <div class="text-success small" id="passwordSavedMessage">{{ __('Saved.') }}</div>
            @endif
        </div>
    </form>
</section>

<script>
    // Auto hide the saved message after 2 seconds
    document.addEventListener('DOMContentLoaded', function () {
        const msg = document.getElementById('passwordSavedMessage');
        if (msg) {
            setTimeout(() => {
                msg.style.display = 'none';
            }, 2000);
        }
    });
</script>
