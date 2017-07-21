@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-custom">
                <div class="panel-heading panel-heading-custom"><i class="fa fa-desktop"></i> Dashboard</div>
                <div class="panel-body">
                    <center>
                    Silahkan pilih menu yang diinginkan :
                    <br>
                    <a class="btn btn-primary btn-xs" href="{{route('fitrah.index')}}">Zakat Fitrah</a>
                    <a class="btn btn-primary btn-xs" href="{{route('mal.index')}}">Zakat Mal</a>
                    <a class="btn btn-primary btn-xs" href="{{route('berbagi.index')}}">Infaq dan Sodaqoh</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
