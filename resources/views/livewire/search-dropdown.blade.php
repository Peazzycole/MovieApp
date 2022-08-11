<div>
    <div class="flex items-center text-sm justify-between relative mt-2 md:mt-0">
        <input wire:model.debounce.500ms="search" type="text"
            class="bg-gray-800 rounded-full w-64 ml-2 px-4 py-1 pl-6 focus:outline-none focus:shadow-outline"
            placeholder="Search" />
        <button class="absolute left-0 mr-1 ml-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 opacity-70 text-gray-300 duration-200 hover:scale-110"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <circle cx="10" cy="10" r="7" />
                <line x1="21" y1="21" x2="15" y2="15" />
            </svg>
        </button>
        <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    </div>
    @if (strlen($search) >= 2)

        <div class="absolute bg-gray-800 rounded w-64 mt-4">
            @if ($searchResults->count() > 0)
                <ul>
                    @foreach ($searchResults as $result)
                        <li class="border-b border-gray-700">
                            <a href="movie/{{ $result['id'] }}"
                                class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                                @if ($result['poster_path'])
                                    <img class="w-8"
                                        src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}"
                                        alt="poster">
                                @else
                                    <img class="w-8" src="https://via.placeholder.com/50x75" alt="poster">
                                @endif

                                <span class="ml-4">{{ $result['title'] }}</span>
                            </a>
                        </li>
                    @endforeach

                </ul>
            @else
                <div class="px-3 py-3">No results for "{{ $search }}"</div>
            @endif
        </div>
    @endif

</div>
