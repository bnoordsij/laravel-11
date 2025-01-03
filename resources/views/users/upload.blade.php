@php /** @var \Spatie\MediaLibrary\MediaCollections\Models\Media $file */ @endphp

@extends('layouts.app')

@section('content')
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-xl mx-auto">
                    <main class="mt-6">
                        <div class="rounded-lg bg-white p-6 shadow">
                            <div class="mb-4">
                                <h1 class="h1 font-bold text-xl">Upload files</h1>
                            </div>
                            <form action="{{ route('user-upload.update', $user) }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="mt-8">
                                    <input type="file" name="file" class="border p-1 rounded shadow" required />
                                </div>

                                <button type="submit" class="btn-primary mt-8 bg-blue-500 hover:bg-blue-300 text-white p-4 rounded">Submit</button>
                            </form>

                            @if ($user->hasMedia())

                                <div class="mt-4">
                                    <h3 class="h3">Files</h3>
                                    @foreach($user->getMedia() as $file)
                                        <div class="w-64">
                                            {!! $file->img('', ['class' => 'w-64'])->toHtml() !!}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </main>

                </div>
            </div>
        </div>
@endsection
