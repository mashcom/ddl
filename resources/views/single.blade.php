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
                <div class="row licence-plate shadow-lg" style="background: #fff !important;text-transform: capitalize !important;">
                    <div class="col-lg-12 mb-5 mt-5">

                        <table>
                            <tr>
                                <td>
                                    <img width="200"src="{{asset('coatn.png')}}" class="text-center"/>
                                </td>
                                <td class="bg-primary text-white" style="background-color:#0d30a4!important;">
                                    <div class="text-center ">
                                        <h4>MINISTRY OF HIGHER AND TERTIARY EDUCATION, SCIENCE AND TECHNOLOGY
                                            DEVELOPMENT</h4>
                                        <h1 class="font-weight-bold" style="font-family: Impact,Arial">
                                            GWERU POLYTECHNIC</h1>
                                        <h5>P.O BOX 137 GWERU TEL: (054) 2233117</h5>
                                        <h3 class="font-weight-bold">STUDENT IDENTIY CARD 2020</h3>
                                    </div>
                                </td>
                                <td>
                                    <img width="200" src="{{asset('logo.jpg')}}" class="text-center"/>
                                </td>
                            </tr>
                        </table>


                    </div>
                    <div class="col-lg-3 col-md-3">
                        <img src="{{asset('images/'.$licence->image)}}" class="bg-dark mb-3"
                             style="border-radius: 10px;" width="190px" height="190px"/>
                        <h6>National ID No: <span
                                    class="font-weight-bold text-dark">{{$licence->national_id}}</span></h6>

                    </div>
                    <div class="col">
                        <table class="table table-striped">
                            <tr>
                                <td>Name: <span class="font-weight-bold text-dark">{{$licence->name}}</span></td>
                            </tr>
                            <tr>
                                <td>Course: <span class="font-weight-bold text-dark">{{$licence->course}}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Mode of Study: <span
                                            class="font-weight-bold text-dark">{{$licence->mode}}</span></td>
                            </tr>
                            <tr>
                                <td>Student No: <span
                                            class="font-weight-bold text-dark">{{$licence->licence_no}}</span></td>
                            </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
