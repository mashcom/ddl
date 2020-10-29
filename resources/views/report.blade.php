@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Quick Report</h1>
        <div class="row justify-content-center">

            <div class="col-lg-6">
                <h3 class="font-weight-bold">Gender</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>Gender</th>
                            <th>Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($gender as $g)
                            <tr>
                                <td>{{$g->gender}}</td>
                                <td>{{$g->total}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-6">
                <h3 class="font-weight-bold">Mode of Study</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>Mode</th>
                            <th>Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($modes as $mode)
                            <tr>
                                <td>{{$mode->mode}}</td>
                                <td>{{$mode->total}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-12">
                <h3 class="font-weight-bold">Programmes</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead class="table-dark">
                        <tr>
                            <th>Programmes</th>
                            <th>Count</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{$course->course}}</td>
                                <td>{{$course->total}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
