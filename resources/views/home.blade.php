@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mx-auto w-1/2 justify-center">
            <div class="bg-white shadow-md rounded-lg p-6 w-full">
                <div class="text-lg font-semibold mb-4">{{ __('Dashboard') }}</div>

                <div class="text-base">
                    @if (session('status'))
                        <div class="bg-green-200 text-green-700 border border-green-400 rounded p-4 mb-4" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
@endsection
