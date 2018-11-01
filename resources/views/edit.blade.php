@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center mb-5">Edit Licence</h3>
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-lg-3">
                    <img id="blah" src="{{asset("images/$licence->image")}}" alt="member image" style="width: 100%"/>
                </div>
                <div class="col-lg-9 well bs-component">
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
                    <form class="needs-validation form-horizontal" method="post"
                          action="{{ url("licence/$licence->id") }}"
                          enctype="multipart/form-data">
                        <fieldset>
                            {{ csrf_field() }}
                            {{method_field('PATCH')}}

                            <div class="row">

                                <br><br>
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Licence No</label>
                                    <input class="form-control" name="licence_no" value="{{$licence->licence_no}}" placeholder="Licence No"
                                           required="" autofocus="" type="text"
                                    >

                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="firstName">Fullname</label>
                                    <input class="form-control" name="name" value="{{$licence->name}}" placeholder="Fullname"
                                           required="" autofocus="" type="text"
                                    >
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="firstName">Email</label>
                                    <input class="form-control" name="email" value="{{$licence->email}}"
                                           placeholder="Email Address"
                                           required="" type="email"
                                    >
                                </div>

                                <div class="col-md-6 mb-3" style="display: nodne !important;">
                                    <br/>
                                    <label for="firstName">Date of Birth</label>
                                    <div style="width: 100% !important;">
                                        <input class="form-control" name="dob" placeholder="dd-mm-yyyy"
                                               value="{{$licence->dob}}" required=""
                                               type="date">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3" style="display: nodne !important;">
                                    <br/>
                                    <label for="firstName">Date of Issue</label>
                                    <div style="width: 100% !important;">
                                        <input class="form-control" name="date_of_issue" placeholder="dd-mm-yyyy"
                                               value="{{$licence->date_of_issue}}" required=""
                                               type="date">
                                    </div>
                                </div>



                                <div class="col-md-6 mb-3">
                                    <br>
                                    <label for="firstName">Gender</label>
                                    <select class="form-control" name="gender" required="" type="text">
                                        <option></option>
                                        <option @if($licence->gender=='Male') {{'selected'}} @endif>Male</option>
                                        <option @if($licence->gender=='Female') {{'selected'}} @endif>Female</option>
                                    </select>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <br>
                                    <label for="firstName">National ID <label class="label label-success">Format
                                            67-2001643-H-09</label></label>
                                    <input class="form-control" name="national_id" placeholder="National ID Number"
                                           value="{{$licence->national_id}}" type="text">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <br>
                                    <label for="firstName">Select ID Photo</label>
                                    <input type="file" src="{{asset('images/'.$licence->image)}}" alt="" name="image" onchange="readURL(this);">

                                </div>
                                <div class="col-lg-12">
                                    <hr class="mb-4">
                                </div>

                                <div class="col-lg-12 mb-3 row">

                                    <div class="custom-control custom-checkbox col-lg-2">
                                        <input type="checkbox" class="custom-control-input" id="class1" name="class1" @if($licence_class['class1'])  checked @endif>
                                        <label class="custom-control-label" for="class1">Class 1</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-2">
                                        <input type="checkbox" class="custom-control-input" id="class2" name="class2"  @if($licence_class['class2'])  checked @endif>
                                        <label class="custom-control-label" for="class2">Class 2</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-2">
                                        <input type="checkbox" class="custom-control-input" id="class3" name="class3"  @if($licence_class['class3'])  checked @endif>
                                        <label class="custom-control-label" for="class3">Class 3</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-2">
                                        <input type="checkbox" class="custom-control-input" id="class4" name="class4"  @if($licence_class['class4'])  checked @endif>
                                        <label class="custom-control-label" for="class4">Class 4</label>
                                    </div>
                                    <div class="custom-control custom-checkbox col-lg-2">
                                        <input type="checkbox" class="custom-control-input" id="class5" name="class5"  @if($licence_class['class5'])  checked @endif>
                                        <label class="custom-control-label" for="class5">Class 5</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <br>
                                <div class="col-lg-12">
                                    <br>

                                    <input type="submit" class="btn btn-primary"
                                           value="Update Record">
                                </div>
                            </div>
                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width('100%')
                        .height('auto');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
