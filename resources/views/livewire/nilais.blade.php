<div>
    <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
        <div class="grid grid-cols-12">
            <div class="col-span-6 p-4"> <button wire:click="openModal()" class="px-4 py-1 text-sm rounded text-blue-600 font-semibold border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none">
                
                Tambah
            </button>
                @if ($isModal)
                    @include('livewire.createnilai')
                @endif
            </div>
        </div>
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th>No</th>
                        <th>Nama Mahasiswa</th>
                        <th>Matakuliah</th>
                        <th>Nilai</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 text-center">
                    @foreach($nilais as $item) 
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->mahasiswa->nama}}</td>
                        <td>{{$item->matakuliah->matakuliah}}</td>
                        <td>{{$item->nilai}}</td>
                        <td>
                            <button wire:click="edit({{ $item->id }})" class="btn btn-xs px-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold  rounded">Edit</button>
                            <button wire:click="delete({{ $item->id }})" class="btn btn-xs px-1 text-sm bg-red-500 hover:bg-red-700 text-white font-bold  rounded">Hapus</button>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
