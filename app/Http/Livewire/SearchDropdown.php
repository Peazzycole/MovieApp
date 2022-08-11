<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchDropdown extends Component
{
    public $search = '';  //is available automatically to the view

    public function render()
    {
        $key = config('services.movie.key');
        $searchResults = [];
        if (strlen($this->search) >= 2) {
            $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?api_key=' . $key . '&query=' . $this->search)->json()['results'];
        }

        return view('livewire.search-dropdown', [
            'searchResults' => collect($searchResults)->take(7)
        ]);
    }
}
