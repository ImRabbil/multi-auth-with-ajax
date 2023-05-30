<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container mt-3">
                <h2>User Lists</h2>
                <div id="msg">

                </div>
                <a data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-success className"
                    style="float:right">add
                    user</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="showData" >

                        @foreach ($profiles as $profile)
                            <tr>
                                <td>{{ $profile->firstname }}</td>
                                <td>{{ $profile->lastname }}</td>
                                <td>{{ $profile->email }}</td>
                                <td>
                                    <a href="/profile/{{ $profile->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="/profile/{{ $profile->id }}/delete" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal modal-danger fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content px-4">
                <div class="modal-header">
                    <h5 class="modal-title">Add Phone Call Log</h5>
                </div>
                <form id="createForm">
                    @csrf
                    <div class="modal-body">
                        <div class="col-md-12">
                            {{-- <div id="msg"></div> --}}
                            <div class="row">
                                <div class="form-group col-md-12 mb-3">
                                    <label for="room_type" class="mb-2"> First Name:</label>
                                    <input class="form-control" type="text"   name="firstname" >
                                    <span id="firstname-error" class="text-danger" ></span>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="room_type" class="mb-2">Last Name:</label>
                                    <input class="form-control" type="text" name="lastname" >
                                    <span id="lastname-error" class="text-danger" ></span>
                                </div>

                                <div class="form-group col-md-12 mb-3">
                                    <label for="room_type" class="mb-2">Email:</label>
                                    <input class="form-control" type="text"  name="email" >
                                    <span id="email-error" class="text-danger" ></span>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
