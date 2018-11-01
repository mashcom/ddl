@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
                <h1 class="text-center">Licences</h1>
                @if ($errors->any())
                    <div class="alert alert-danger font-weight-bold">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success font-weight-bold">
                        {{  session('success') }}
                    </div>
                @endif
                <form class="card p-2" action="" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Enter search term here!">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>National ID</th>
                            <th>Date of Birth</th>
                            <th>Licence No</th>
                            <th>Date of Issue</th>
                            <th>Gender</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($licences as $licence)
                            <tr>
                                <td>{{$licence->id}}</td>
                                <td>{{$licence->name}}</td>
                                <td>{{$licence->national_id}}</td>
                                <td>{{$licence->dob}}</td>
                                <td>{{$licence->licence_no}}</td>
                                <td>{{$licence->date_of_issue}}</td>
                                <td>{{$licence->gender}}</td>
                                <td>

                                    <a href="{{url('licence/delete',['id'=>$licence->id])}}"
                                       class="font-weight-bold btn btn-sm btn-outline-danger">Delete</a>
                                    <a href="{{url("licence/$licence->id/edit")}}"
                                       class="font-weight-bold btn btn-sm btn-outline-secondary">Update</a>
                                    <a href="{{url('licence',['id'=>$licence->id])}}"
                                       class="font-weight-bold btn btn-sm btn-outline-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $licences->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
