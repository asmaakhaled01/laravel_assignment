$( document ).ready(function() {
    var showFilmtUrl = $(".filmContainer").attr('href');
    $.get( showFilmtUrl, function( data ) {
        if(data && data.status )
            $( ".filmContainer" ).html( formateFilmData(data.data) );
    });
    
});


function formateFilmData(filmData){
    var formatedFilmData = "" ;
    formatedFilmData += "<h1>"+filmData.film.name+" <h1/>" ;
    formatedFilmData += "<h3>"+filmData.film.slug+" <h3/>" ;
    formatedFilmData += '<img src="http://'+location.host+'/films_images/'+filmData.film.photo_path+'" class="img-responsive img-gallery" alt="'+filmData.film.name+'">'; 
    formatedFilmData += "<div>"+filmData.film.description+" <div/>" ;
    formatedFilmData += "<div> released in "+filmData.film.realease_date+" <div/>" ;
    formatedFilmData += "<div> rating "+filmData.film.rating+" <div/>" ;
    formatedFilmData += "<div> country "+filmData.film.country+" <div/>" ;
    formatedFilmData += "<div> ticket price "+filmData.film.ticket_price+" <div/>" ;
    
    formatedFilmData += "<br /> <h3>Genres:<h3/>" ;
    $.each( filmData.film.genres, function( index, value ){
        formatedFilmData += "<div style='margin-left:5em'> * "+value+"<div/> <br />" ;
    });
   
    console.log(filmData.comments);
    return formatedFilmData;
}