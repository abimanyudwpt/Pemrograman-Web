<x-template-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{$title}}
    </h2>
    <div>
        <div class="shadow px-6 py-4 bg-white rounded sm:px-1 sm:py-1">
            <form action="{{(isset($mhs))?route('mahasiswa.update',$mhs->id):route('mahasiswa.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($mhs))
                    @method('PUT')
                @endif
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="nim" class="block text-sm font-medium text-gray-700">
                                    NIM
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="number" name="nim" id="nim" value="{{(isset($mhs))?$mhs->nim:old('nim')}}"
                                        class="@error('nim') border-red-500 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                        placeholder="Masukan NIM">
                                </div>
                                <div class="text-xs text-red-600">@error('nim') {{$message}} @enderror</div>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="nama" class="block text-sm font-medium text-gray-700">
                                    Nama Mahasiswa
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" name="nama" id="nama" value="{{(isset($mhs))?$mhs->nama:old('nama')}}"
                                        class="@error('nama') border-red-500 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md"
                                        placeholder="Masukan Nama Mahasiswa">
                                </div>
                                <div class="text-xs text-red-600">@error('nama') {{$message}} @enderror</div>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="jurusan_id" class="block text-sm font-medium text-gray-700">Jurusan</label>
                                <select name="jurusan_id" id="jurusan_id" 
                                    class="@error('jurusan_id') border-red-500 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="">- Pilih -</option>
                                    @foreach ($jurusan as $item)
                                    <option value="{{$item->id}}">{{$item->jurusan}}</option>
                                    @endforeach
                                </select>
                                <div class="text-xs text-red-600">@error('jurusan_id') {{$message}} @enderror</div>
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <label for="prodi_id" class="block text-sm font-medium text-gray-700">Prodi</label>
                                <select name="prodi_id" id="prodi_id"
                                    class="@error('prodi_id') border-red-500 @enderror shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">
                                    <option value="">- Pilih -</option>
                                    @foreach ($prodi as $item)
                                    <option value="{{$item->id}}">{{$item->prodi}}</option>
                                    @endforeach
                                </select>
                                <div class="text-xs text-red-600">@error('prodi_id') {{$message}} @enderror</div>
                            </div>
                        </div>
                        <div class="text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-template-layout>
