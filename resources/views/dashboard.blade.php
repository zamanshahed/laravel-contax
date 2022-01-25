<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <b style="float: right">
            Total Users: <span class="badge bg-primary">{{ count($users) }}</span> 
            Total Files: <span class="badge bg-primary">{{ count($users) }}</span> 
            Total Groups: <span class="badge bg-primary">{{ count($users) }}</span>
        </b>
        <br>
        

    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- starting loop --}}

                        @foreach ($users as $item)
                            <tr>
                                <th scope="row"> {{ $item->name }} </th>
                                <th scope="row"> {{ $item->email }} </th>
                                <th scope="row"> <a href="">{{ $item->name }}</a> </th>
                                <td>
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
