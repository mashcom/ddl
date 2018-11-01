@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-lg-10 well bs-component">

                    <form class="needs-validation form-horizontal" method="post"
                          action="http://localhost/youthgames/youth-accreditation-system/public/member"
                          enctype="multipart/form-data">
                        <fieldset>
                            <input type="hidden" name="_token" value="4fxppzgV5qkRIvrxgS2q7NYq4END1myVLHsxKJ8L">


                            <div class="row">

                                <br><br>
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Licence No</label>
                                    <input class="form-control" name="firstname" value="" placeholder="Licence No"
                                           required="" autofocus="" type="text"
                                           style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Firstname</label>
                                    <input class="form-control" name="firstname" value="" placeholder="Firstname"
                                           required="" autofocus="" type="text"
                                           style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Surname</label>
                                    <input class="form-control" name="surname" placeholder="Surname" value=""
                                           required="" type="text">

                                </div>


                                <div class="col-md-6 mb-3" style="display: nodne !important;">
                                    <br/>
                                    <label for="firstName">Date of Birth</label>
                                    <div style="width: 100% !important;">
                                        <select name="day" id="dobday" class="form-control"
                                                style="width: 32% !important;float: left !important;"></select>
                                        <select name="month" id="dobmonth" class="form-control"
                                                style="width: 32% !important;float: left !important;"></select>
                                        <select name="year" id="dobyear" class="form-control"
                                                style="width: 32% !important;float: left !important;"></select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3" style="display: nodne !important;">
                                    <br/>
                                    <label for="firstName">Date of Issue</label>
                                    <div style="width: 100% !important;">
                                        <select name="day" id="dobday" class="form-control"
                                                style="width: 32% !important;float: left !important;"></select>
                                        <select name="month" id="dobmonth" class="form-control"
                                                style="width: 32% !important;float: left !important;"></select>
                                        <select name="year" id="dobyear" class="form-control"
                                                style="width: 32% !important;float: left !important;"></select>
                                    </div>
                                </div>


                                <div class="col-md-6 mb-3">
                                    <br>
                                    <label for="firstName">Gender</label>
                                    <select class="form-control" name="gender" value="" required="" type="text">
                                        <option></option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <br>
                                    <label for="firstName">National ID <label class="label label-success">Format
                                            67-2001643-H-09</label></label>
                                    <input class="form-control" name="national_id" placeholder="National ID Number"
                                           value="" type="text">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <br>
                                    <label for="firstName">Select ID Photo</label>
                                    <input type="file" src="" alt="" name="image" onchange="readURL(this);">

                                </div>
                            </div>


                            <div class="row">

                                <br>
                                <div class="col-lg-12">
                                    <br>
                                    <div class="alert alert-info">
                                        <p><b>Make sure the input is correct and you have confirmed with the original
                                                document before clicking "Save" button</b></p>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-lg"
                                           value="I Have Confirmed, Save The Record">
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
