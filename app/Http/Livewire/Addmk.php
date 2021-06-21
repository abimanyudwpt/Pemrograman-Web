<?php

namespace App\Http\Livewire;

use App\Models\Matakuliah;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Addmk extends Component
{
    use WithPagination;
    public $matakuliahs, $kode, $matakuliah, $sks;
    public $isModal;
    public function render()
    {
        $this->matakuliahs = Matakuliah::orderBy('id', 'DESC')->get();
        return view('livewire.addmk');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }
    public function resetFields()
    {
        $this->kode = '';
        $this->matakuliah = '';
        $this->sks = '';
    }
    public function openModal()
    {
        $this->isModal = true;
    }
    public function closeModal()
    {
        $this->isModal = false;
    }

    public function store()
    {
        $this->validate([
            'kode' => 'required',
            'matakuliah' => 'required',
            'sks' => 'required'
        ]);
        Matakuliah::updateOrCreate(
            ['id' => $this->id],
            [
                'kode' => $this->kode,
                'matakuliah' => $this->matakuliah,
                'sks' => $this->sks
            ]
        );
        session()->flash('message', $this->id ? $this->kode . 'Diperbarui' : $this->kode . 'Ditambahkan');
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $matakuliahs = Matakuliah::find($id);
        $this->id = $id;
        $this->kode =  $matakuliahs->kode;
        $this->matakuliah = $matakuliahs->matakuliah;
        $this->sks = $matakuliahs->sks;

        $this->openModal();
    }

    public function delete($id)
    {
        $matakuliahs = Matakuliah::find($id);
        $matakuliahs->delete();
        session()->flash('message', $matakuliahs->kode . 'Dihapus');
    }
}