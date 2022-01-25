<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (Auth::user()->id === 1)
            @php
            echo"Admin";    
            @endphp    
            
            @endif
            {{ __('Dashboard') }}
        </h2>

        <b style="float: right">
            Total Users: <span class="badge bg-primary">{{ count($users) }}</span> 
            Total Files: <span class="badge bg-primary">{{ count($groups) }}</span> 
            Total Blocked: <span class="badge bg-primary">{{ count($block_list) }}</span>
        </b>
        <br>
        

    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                @if (Auth::user()->id === 1)
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
                                <th scope="row">
                                    <a href="#">
                                        @php
                                            $active = "Active";
                                        
                                            foreach ($block_list as $key) {
                                                if (Auth::user()->id===$block_list->user_id)
                                                    $active = "Blocked";                                                        
                                            }
                                            
                                            echo $active;
                                        
                                        @endphp
                                    </a>
                                </th>
                                <td>
                                    <button type="button" class="btn btn-outline-primary">Edit</button>
                                    <button type="button" class="btn btn-outline-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                <div class="col-md-12" style="font-size: 50px; align-content: center">
                    <h1>
                        @php
                            echo"Hey ".Auth::user()->name.", ";
                        @endphp
                        
                            Welcome Back ! 
                        </h1>
                </div>
                
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
