@extends('layouts.app')

@section('content')
<script src="{!! asset('js/showFilm.js') !!}"></script>
<link href="{!! asset('css/filmList.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div class="container">
    <div class="row">
        <a class="btn btn-primary" href="{{ url('/films/create') }}">Create a film</a>
        <br>    
      
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Film Details</div>
                <div class="panel-body filmContainer" href="{{ $apiURL }}">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

