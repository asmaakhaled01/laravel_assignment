@extends('layouts.app')

@section('content')
<script src="{!! asset('js/createFilm.js') !!}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Create Film</div>
                <form enctype="multipart/form-data"method='POST' >
                    name: <input name="name" type="text" /><br>  
                    description: <input name="description" type="text" /><br>
                    slug: <input name="slug" type="text" /><br>
                    realease date: <input name="realease_date" type="text" value="2017-11-30"/> "date value"<br>
                    rating: <input name="rating" type="text" value="5" />"from 1-5"<br>
                    country: <input name="country" type="text" value="usa" /><br>
                    ticket price: <input name="ticket_price" type="text" value="50"/><br>
                    photo: <input name="photo" type="file" /><br>
                    Genres:  <select name="genres" id="genreSelect" href="{{ $listGenresApi }}"></select>
                    <button id="createFilmBtn" href="{{ $apiURL }}" >Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


