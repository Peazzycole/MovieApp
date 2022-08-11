@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class=" uppercase tracking-wider text-orange-500 text-lg font-semibold">
                Popular Movies
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
                @foreach ($popularMovies as $popular)
                    <div class="mt-8">
                        <a href="movie/{{ $popular['id'] }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $popular['poster_path'] }}" alt="poster"
                                class="hover:opacity-75 transition duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg mt-2 hover:text-gray-300">{{ $popular['title'] }}</a>
                            <div class="flex items-center text-gray-300 text-sm mt-1">
                                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <path
                                            d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                            data-name="star" />
                                    </g>
                                </svg>
                                <span class="ml-1">{{ $popular['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($popular['release_date'])->format('M d, Y') }}</span>
                            </div>

                            <div class="text-gray-400 ">
                                @foreach ($popular['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }} @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- Now playing --}}
        <div class="top-rated-movies py-24">
            <h2 class=" uppercase tracking-wider text-orange-500 text-lg font-semibold">
                Top Rated
            </h2>
            <div class="grid grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 ">
                @foreach ($topMovies as $top)
                    <div class="mt-8">
                        <a href="movie/{{ $popular['id'] }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $top['poster_path'] }}" alt="newMovies"
                                class="hover:opacity-75 transition duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="" class="text-lg mt-2 hover:text-gray-300">{{ $top['title'] }}</a>
                            <div class="flex items-center text-gray-300 text-sm mt-1">
                                <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                                    <g data-name="Layer 2">
                                        <path
                                            d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                            data-name="star" />
                                    </g>
                                </svg>
                                <span class="ml-1">{{ $top['vote_average'] * 10 . '%' }}</span>
                                <span class="mx-2">|</span>
                                <span>{{ \Carbon\Carbon::parse($top['release_date'])->format('M d, Y') }}</span>
                            </div>

                            <div class="text-gray-400 ">
                                @foreach ($popular['genre_ids'] as $genre)
                                    {{ $genres->get($genre) }} @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection
