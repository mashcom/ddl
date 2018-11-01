@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <h1 class="text-center">Authentication QR Code</h1>
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
                <div class="text-center">
                    <?php
                    QRCode::text($qr->code)->svg();
                    ?>
                </div>
                <div class="text-center">

                        <button type="button" class="btn btn-primary text-center font-weight-bold" data-toggle="modal"
                                data-target="#exampleModal">
                            Generate New QR Authentication Key
                        </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Generate Key</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Generating a new key will invalidate previously used keys. Are you sure you want to generate a new key?</p>
                                <form method="POST" class="text-center mt-5">
                                    {{csrf_field()}}
                                    <input type="submit" class="btn btn-primary font-weight-bold" value="Generate Key">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
