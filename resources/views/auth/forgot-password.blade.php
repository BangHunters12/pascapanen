<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #e6f4ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .forgot-card {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .forgot-header {
            background-color: #198754;
            border-top-left-radius: 1.25rem;
            border-top-right-radius: 1.25rem;
            padding: 1.5rem;
            text-align: center;
            color: white;
        }

        .form-label {
            font-weight: 600;
            color: #198754;
        }

        .btn-success {
            background-color: #198754;
            border: none;
        }

        .btn-success:hover {
            background-color: #157347;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-12" style="max-width: 400px;">
        <div class="card forgot-card">
            <div class="forgot-header">
                <h4>Lupa Password</h4>
                <p class="mb-0">
                    {{ __('Lupa kata sandi Anda? Tidak masalah. Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.') }}
                </p>
            </div>

            <div class="card-body p-4">
                <!-- Status Sesi -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Alamat Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" class="form-control rounded-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success rounded-3">
                            {{ __('Kirim Link Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
