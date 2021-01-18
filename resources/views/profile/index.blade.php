@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <profile :user="{{ Auth::user() }}"></profile>
        </div>
    </div>
</div>

@endsection
