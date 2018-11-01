@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
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
                <div class="row licence-plate">
                    <div class="col-lg-12 mb-5 mt-5">

                        <div>
                        <h1 class="text-center font-weight-bold" style="font-family: Impact,Arial"> <img src="{{asset('coatn.png')}}" class="text-center"/>ZIMBABWE DRIVERS LICENCE</h1>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3">
                        <img src="{{asset('images/'.$licence->image)}}" class="bg-dark mb-3" style="border-radius: 10px;" width="250px" height="250px"/>
                        <h2 class="font-weight-bold text-center">{{$licence->licence_no}}</h2>
                    </div>
                    <div class="col">
                        <table class="table ">
                            <tr class="text-center font-weight-bold">
                                <td @if($licence_class['class1']) style="background: #ab8934" @endif>1</td>
                                <td @if($licence_class['class2']) style="background: #ab8934" @endif>2</td>
                                <td @if($licence_class['class3']) style="background: #ab8934" @endif>3</td>
                                <td @if($licence_class['class4']) style="background: #ab8934" @endif>4</td>
                                <td @if($licence_class['class5']) style="background: #ab8934" @endif>5</td>
                            </tr>
                        </table>
                        <table class="table table-striped">
                            <tr>
                                <td>Name: <span class="font-weight-bold text-dark">{{$licence->name}}</span></td>
                            </tr>
                            <tr>
                                <td>Date of Birth: <span class="font-weight-bold text-dark">{{$licence->dob}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Date of Issue: <span
                                            class="font-weight-bold text-dark">{{$licence->date_of_issue}}</span></td>
                            </tr>

                            <tr>
                                <td>National ID No: <span
                                            class="font-weight-bold text-dark">{{$licence->national_id}}</span></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
