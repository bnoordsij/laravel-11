@extends('layouts.app')

@section('content')
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow">
                                left
                            </div>
                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow">
                                Right
                            </div>
                        </div>
                    </main>

                </div>
            </div>
        </div>
@endsection
