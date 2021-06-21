<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Mahasiswa;

class Mahasiswas extends Component
{
    public $mahasiswas;
    public function render()
    {
        $this->mahasiswas = Mahasiswa::orderBy('created_at', 'DESC')->get();
        return view('livewire.mahasiswas');
    }
}