<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Nama Lengkap -->
        <div>
            <x-input-label for="nama_lengkap" value="Nama Lengkap" />
            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" :value="old('nama_lengkap')" required autofocus />
            <x-input-error :messages="$errors->get('nama_lengkap')" class="mt-2" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-input-label for="username" value="Username" />
            <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="mt-4">
            <x-input-label for="gender" value="Jenis Kelamin" />
            <select id="gender" name="gender" required class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Nomor Telepon -->
        <div class="mt-4">
            <x-input-label for="no_telp" value="No Telepon" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-4">
            <x-input-label for="alamat" value="Alamat" />
            <textarea id="alamat" name="alamat" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" value="Konfirmasi Password" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Sudah terdaftar?
            </a>

            <x-primary-button class="ml-4">
                Daftar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
