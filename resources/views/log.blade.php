@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12">
                <h1 class="text-center">Access Log</h1>
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
               <!-- <form class="card p-2" action="" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Enter search term here!">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>-->
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Licence</th>

                            <th>Status</th>
                            <th>Created at</th>
                            <th>Details</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            <tr @if($log->status=='success') class="table-success" @else class="table-warning" @endif>
                                <td>{{$log->id}}</td>
                                <td><a href="{{url("licence/$log->user_id")}}"  target="_blank">{{$log->licence_details->licence_no}}</a></td>
                                <td>{{$log->status}}</td>
                                <td>{{$log->created_at}}</td>
                                <td>{{$log->details}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $logs->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
