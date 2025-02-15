@php /** @var \App\Models\Conversation $conversation */ @endphp

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($conversation?->messages ?? [] as $message)
                    <div>
                        {{ $message->text }}
                    </div>
                @endforeach

                <form action="{{ route('conversations.save', $conversation) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('POST') }}

                    @if ($conversation)
                        <input type="hidden" name="recipient_id" value="{{ $conversation->recipient->id }}" />
                    @else
                        <select name="recipient_id">
                            @foreach($users as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    @endif

                    <div>
                        <input type="text" name="text" autofocus />

                        <button type="submit" class="btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
