@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 position-relative" style="background: url('{{ asset('images/welcome.jpg') }}') no-repeat center center fixed; background-size: cover; min-height: 100vh;">
    <div class="overlay"></div> <!-- Overlay div for text readability -->

    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-8">
            <div class="card text-white bg-transparent border-0 text-center">
                <div class="card-body">
                    <h1 class="card-title">{{ __('Welcome') }}</h1>
                    <p class="card-text">{{ __('Welcome to our application!') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
