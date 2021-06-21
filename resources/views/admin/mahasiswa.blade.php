<x-template-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$title}}
    </h2><br>
    <div>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
            <div class="grid grid-cols-12">
                <div class="col-span-6 p-4">
                    <a href=" {{route('mahasiswa.create')}} "><button
                            class="px-4 py-1 text-sm rounded text-blue-600 font-semibold border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none">Tambah</button></a>
                    {{-- <a href=""><button
                            class="px-4 py-1 text-sm rounded text-red-600 font-semibold border border-red-200 hover:text-white hover:bg-red-600 hover:border-transparent focus:outline-none">Hapus</button></a> --}}
                </div>
                {{-- <div class="col-span-6 p-4 flex justify-end">
                    <input type="text"
                        class="px-1 py-1 focus:ring-indigo-500 focus:border-indigo500 rounded-none rounded-1-md sm:text-sm border-gray-300">
                    <button
                        class="rounded-r-md border border-1-0 px-3 py-1 border-gray-300 bg-gray-50 text-gray-500 text-blue-600 hover:text-white hover:bg-blue-600">Cari</button>
                </div> --}}
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 text-center">
                        @foreach ($mhs as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nim}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->jurusan->jurusan}}</td>
                            <td>{{$item->prodi->prodi}}</td>
                            <td>
                                <form action="{{route('mahasiswa.destroy',$item->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{route('mahasiswa.edit',$item->id)}}" class="btn btn-xs px-1 text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold  rounded">Edit</a>
                                    <button type="submit" class="btn btn-xs px-1 text-sm bg-red-500 hover:bg-red-700 text-white font-bold  rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
            {{ $mhs->links() }}
    </div>
</x-template-layout>
