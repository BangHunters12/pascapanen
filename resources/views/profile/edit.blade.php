@extends('layouts.app') {{-- layout Bootstrap yang kamu punya --}}

@section('title', __('Profile'))

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-semibold text-xl text-dark">
        {{ __('Profile') }}
    </h2>

    <div class="row g-4">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <div class="col-12 col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
