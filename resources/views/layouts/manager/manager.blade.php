<span class="text-blue-500 font-bold text-xl">{{ __("Arizalar ro'yhati!") }}</span>

<div class="mt-5">
    @foreach ($applications as $application)
        <div class="rounded-xl border p-5 mt-6 shadow-md w-9/12 bg-white">
            <div class="flex w-full items-center justify-between border-b pb-3">
                <div class="flex items-center space-x-3">
                    <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]"></div>
                        <div class="text-lg font-bold text-slate-700">{{ $application->user->name }}</div>
                    </div>
                    <div class="flex items-center space-x-8">
                        <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold"># {{ $application->id }}</button>
                        <div class="text-xs text-neutral-500">{{ $application->created_at }}</div>
                    </div>
            </div>

                <div class="mt-4 mb-6">
                    <div class="mb-3 text-xl font-bold">{{ $application->subject }}</div>
                    <div class="text-sm text-neutral-600">{{ $application->message }}</div>
                </div>

            <div>
                <div class="flex items-center justify-between text-slate-500">
                    <div class="flex space-x-4 md:space-x-8">
                        <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                            <span>{{ $application->user->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $applications->links()}}
</div>
