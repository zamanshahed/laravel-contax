<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload File') }}
        </h2>




    </x-slot>

    <div class="container" style="margin-top: 40px; width: 500px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 style="text-align: center">
                            Upload File
                        </h3>
                    </div>
                    <div class="card-body">
                        {{-- form input starts --}}
                        <form action="{{route('file.process')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name </label>
                                <input type="text" class="form-control" name="name" placeholder="Enter a name">                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Choose a File to upload</label>
                                <input type="file" name="target_file" class="form-control" >
                            </div>                            
                            <button type="submit" class="btn btn-outline-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
