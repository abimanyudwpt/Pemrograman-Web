<?php

namespace App\Http\Livewire;

use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Livewire\Component;
use App\Models\Nilai;

class Nilais extends Component
{
    public $nilais, $mahasiswa_id, $matakuliah_id, $nilai, $matakuliah, $mahasiswa;
    public $nilaiId;
    public $isModal = 0;
    public function render()
    {
        $this->mahasiswa = Mahasiswa::all();
        $this->matakuliah = Matakuliah::all();
        $this->nilais = Nilai::all();
        return view('livewire.nilais');
    }
    // public function create()
    // {
    //     $this->mahasiswa = Mahasiswa::all();
    //     $this->matakuliah = Matakuliah::all();
    //     $this->resetFields();
    //     $this->openModal();
    // }
    public function resetFields()
    {
        $this->nilaiId = '';
        $this->mahasiswa_id = '';
        $this->matakuliah_id = '';
        $this->nilai = '';
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
            'mahasiswa_id' => 'required',
            'matakuliah_id' => 'required',
            'nilai' => 'required'
        ]);
        Nilai::updateOrCreate(
            ['id' => $this->nilaiId],
            [
                'mahasiswa_id' => $this->mahasiswa_id,
                'matakuliah_id' => $this->matakuliah_id,
                'nilai' => $this->nilai
            ]
        );
        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $nilais = Nilai::findOrFail($id);
        $this->NilaiId = $id;
        $this->mahasiswa_id =  $nilais->mahasiswa_id;
        $this->matakuliah_id = $nilais->matakuliah_id;
        $this->nilai = $nilais->nilai;

        $this->openModal();
    }

    public function delete($id)
    {
        $nilais = Nilai::find($id);
        $nilais->delete();
        session()->flash('message', $nilais->mahasiswa_id . 'Dihapus');
    }
}