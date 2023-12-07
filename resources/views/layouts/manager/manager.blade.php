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

            <div class="flex justify-between">
                <div>
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
                <div>
                    <div class="border m-6 p-6 rounded hover:bg-gray-50 transition cursor-pointer flex flex-col items-center">
                        @if (is_null($application->file_url))
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            No file
                        @else
                            <a href="{{ asset('storage/' . $application->file_url) }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            @if($application->answer()->exists())
                <div>
                    <hr class="border">
                    <h3 class="text-xs font-bold mt-3 text-indigo-500 ">
                        Answer:
                    </h3>
                    <p>
                        {{$application->answer->body}}
                    </p>
                </div>
            @else
                <div class="flex justify-end">
                    <a href="{{ route('answers.create', ['application'=>$application->id ]) }}" type="button" class="bg-green-500 text-white px-3 py-1 rounded font-medium text-sm mx-3 hover:bg-green-600 transition duration-200 each-in-out">
                        Answer
                    </a>
                </div>
            @endif

        </div>
    @endforeach
    {{ $applications->links()}}
</div>
