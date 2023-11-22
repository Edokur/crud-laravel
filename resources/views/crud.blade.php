<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Map Box
                    <div id='map' style='width: 400px; height: 300px;'></div>
                </div>
            </div>
        </div> --}}
        

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Tabel
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Nama Ayah</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->jenis_kelamin}}</td>
                                    <td>{{ $post->nama_ayah}}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ url('destroy-crud', $post->id) }}" method="POST">
                                            <a href="{{ url('add-edit', $post->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger text-dark">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Form
                    </div>
                    <div class="card-body">
                        <form action="{{ url('add-crud') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control mt-1" placeholder="Nama" name="name">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Name">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="role">
                                    <option value="">-- pilih --</option>
                                    <option value="Pria">Pria</option>
                                    <option value="Wanita">Wanita</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label for="Name">Status</label>
                                    <select class="form-control mt-1" name="role" id="role">
                                    <option value="">-- pilih --</option>
                                    <option value="father">Ayah</option>
                                    <option value="mother">Ibu</option>
                                    <option value="brother">Saudara Laki-laki</option>
                                    <option value="sister">Saudara Perempuan</option>
                                    <option value="husband">Suami</option>
                                    <option value="wife">Istri</option>
                                    <option value="son">Anak Laki-laki</option>
                                    <option value="daughter">Anak Perempuan</option>
                                    </select>
                                    @error('role')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <label for="name">Nama Ayah</label>
                                    <input type="text" class="form-control mt-1" placeholder="Nama" name="nama_ayah">
                                    @error('nama_ayah')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-dark text-dark" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Query untuk mendapatkan semua anak Budi
                    </div>
                    <div class="card-body">
                        @foreach ($query_A as $query)
                            <td>{{ $query->name }},</td>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Query untuk mendapatkan cucu dari budi
                    </div>
                    <div class="card-body">
                        @foreach ($query_B as $query)
                            <td>{{ $query->name }},</td>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Query untuk mendapatkan cucu perempuan dari budi
                    </div>
                    <div class="card-body">
                        @foreach ($query_C as $query)
                            <td>{{ $query->name }},</td>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Query untuk mendapatkan bibi dari Farah
                    </div>
                    <div class="card-body">
                        @foreach ($query_D as $query)
                            <td>{{ $query->name }},</td>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        Query untuk mendapatkan sepupu laki-laki dari Hani
                    </div>
                    <div class="card-body">
                        @foreach ($query_E as $query)
                            <td>{{ $query->name }},</td>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    

    @push('scripts')
    <script>

    </script>
    @endpush
</x-app-layout>



