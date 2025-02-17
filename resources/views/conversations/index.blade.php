@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($conversations as $conversation)
                <a class="block mt-4" href="{{ route('conversations.form', $conversation) }}">
                    <div class="card">
                        <div class="card-header">{{ $conversation->recipient->name }}</div>
                    </div>
                </a>
            @endforeach

            <a class="block mt-4" href="{{ route('conversations.form') }}">
                <div class="card">
                    <div class="card-header">{{ __('New conversation') }}</div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
