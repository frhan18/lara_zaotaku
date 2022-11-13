<?php

namespace App\Http\Livewire\Page\Homepage\Komik;

use App\Models\Comic;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class KomikPopuler extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = Comic::when($this->search, function (Builder $query) {
            $query->where('comic_title', 'like', '%' . $this->search . '%');
        })->inRandomOrder()->paginate(12);
        return view('livewire.page.homepage.komik.komik-populer', compact(['data' => $data]))->extends('layouts.homepage.index')
            ->section('content');;
    }
}
