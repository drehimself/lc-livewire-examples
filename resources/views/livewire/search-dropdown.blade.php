<div class="flex-1 flex items-center justify-center px-2 lg:ml-6 lg:justify-end">
    <div class="max-w-lg w-full lg:max-w-xs">
        <label for="search" class="sr-only">Search for songs</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <input wire:model.debounce.300ms="search"
                id="search"
                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                placeholder="Search for songs..." type="search" autocomplete="off">
            @if (strlen($search) > 2)
                <ul
                    class="absolute z-50 bg-white border border-gray-300 w-full rounded-md mt-2 text-gray-700 text-sm divide-y divide-gray-200">
                    @forelse ($searchResults as $result)
                        <li>
                            <a
                                @if (array_key_exists('trackViewUrl', $result))
                                    href="{{ $result['trackViewUrl'] }}"
                                @else
                                    href="#"
                                @endif
                                class="flex items-center px-4 py-4 hover:bg-gray-200 transition ease-in-out duration-150">
                                <img src="{{ $result['artworkUrl60'] }}"
                                    alt="album art" class="w-10">
                                <div class="ml-4 leading-tight">
                                    <div class="font-semibold">
                                        @if (array_key_exists('trackName', $result))
                                            {{ $result['trackName'] }}
                                        @else
                                            Untitled
                                        @endif
                                    </div>
                                    <div class="text-gray-600">
                                        @if (array_key_exists('artistName', $result))
                                            {{ $result['artistName'] }}
                                        @else
                                            No Artist
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="px-4 py-4">No results found for "{{ $search }}"</li>
                    @endforelse


                </ul>
            @endif
        </div>
    </div>
</div>
