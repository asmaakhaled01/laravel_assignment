$( document ).ready(function() {

    // onclick save film 
    $('body').on('click', "#createFilmBtn", function() { 
        var form = $('form')[0]; // You need to use standard javascript object here
        var formData = new FormData(form);
        var createFilmtUrl = $("#createFilmBtn").attr('href');
        $.ajax({
            url: createFilmtUrl,
            data: formData,
            type: 'POST',
            contentType: false, 
            processData: false, 
            success: function(result) {
                if(result.status){
                    window.location.replace("http://"+location.host);
                }else{
                    alert("invalid data given");
                }
            }
        });

    });
    
    
    // prevent redirect after form submit
    $('form').submit(function(event) {
    event.preventDefault();
    });
    
    var genresListUrl = $("#genreSelect").attr('href');
    $.get( genresListUrl, function( data ) {
        if(data && data.status )
            $( "#genreSelect" ).html( formateGeneresOptions(data.data) );
    });
    
    function formateGeneresOptions(genersData){
        
        var formatedGeneresOptions = "";
            
        $.each( genersData, function( index, value ){
            formatedGeneresOptions += "<option value="+value.id+">"+value.name+"</option>" ;
        });
        return formatedGeneresOptions;

    }
});


