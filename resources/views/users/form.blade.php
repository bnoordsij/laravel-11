@extends('layouts.app')

@section('content')
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-xl mx-auto">
                    <main class="mt-6">
                        <div class="rounded-lg bg-white p-6 shadow">
                            <div class="mb-4">
                                <h1 class="h1 font-bold text-xl">Update user</h1>
                            </div>
                            <form action="{{ route('users.update', $user) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div>
                                    <input name="name" class="border p-1 rounded shadow" value="{{ $user->name }}" />
                                </div>

                                <div class="mt-8">
                                    <input name="email" class="border p-1 rounded shadow" value="{{ $user->email }}" />
                                </div>

                                <button type="submit" class="btn-primary mt-8 bg-blue-500 hover:bg-blue-300 text-white p-4 rounded">Submit</button>
                            </form>
                        </div>
                    </main>

                </div>
            </div>
        </div>
@endsection
