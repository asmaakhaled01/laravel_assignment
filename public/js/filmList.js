
$( document ).ready(function() {
    var filmListUrl = $(".filmsContainer").attr('href');
    $.get( filmListUrl, function( data ) {
        if(data && data.status )
            $( ".filmsContainer" ).html( formateFilmList(data.data) );
            includeGalarySliderJs();
    });
    
});

function formateFilmList(films){
    var filmListWithSlider = '<div class="gallery"> <div class="container"> <div class="row col-xs-10">';


    $.each( films, function( index, value ){
    filmName = value.name;
    filmSlug = value.slug;
    filmPhoto = value.photo_path;
    filmListWithSlider += '<div class="col-xs-3   gallery-item"> <a href="films/'+filmSlug+'">'+filmName+' </a> \n\
                            <a href="#galleryImg1" class="link-gallery" data-toggle="modal" data-target="#modalGallery"> \n\
                            <img src="films_images/'+filmPhoto+'" class="img-responsive img-gallery" alt="'+filmName+'"> </a> </div> <!-- /.col -->';
    });
    filmListWithSlider += '</div> <!--/.row --> </div> <!-- /.container --> </div> <!-- /.gallery --> <div class="modal fade" id="modalGallery" tabindex="-1" role="dialog" aria-labelledby="modalGalleryLabel" aria-hidden="true"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> <h4 class="modal-title" id="modalGalleryLabel">Gallery</h4> </div> <!-- /.modal-header --> <div class="modal-body"> <div id="carouselGallery" class="carousel slide" data-ride="carousel" data-interval="false"> <div class="carousel-inner"> </div> <!-- /.carousel-inner --> </div> <!-- /.carousel --> </div> <!-- /.modal-body --> <div class="modal-footer"> <ul class="pagination"> </ul> </div> <!-- /.modal-footer --> </div> <!-- /.modal-content --> </div> <!-- /.modal-dialog --> </div> <!-- /.modal -->';
    return filmListWithSlider;
}

function includeGalarySliderJs(){
    $(document).ready(function(){
        $('.link-gallery').click(function(){
                    var galleryId = $(this).attr('data-target');
                    var currentLinkIndex = $(this).index('a[data-target="'+ galleryId +'"]');

                    createGallery(galleryId, currentLinkIndex);
                    createPagination(galleryId, currentLinkIndex);

                    $(galleryId).on('hidden.bs.modal', function (){
                            destroyGallry(galleryId);
                            destroyPagination(galleryId);
                    });

                    $(galleryId +' .carousel').on('slid.bs.carousel', function (){
                            var currentSlide = $(galleryId +' .carousel .item.active');
                            var currentSlideIndex = currentSlide.index(galleryId +' .carousel .item');

                            setTitle(galleryId, currentSlideIndex);
                            setPagination(++currentSlideIndex, true);
                    })
            });

            function createGallery(galleryId, currentSlideIndex){
                    var galleryBox = $(galleryId + ' .carousel-inner');

                    $('a[data-target="'+ galleryId +'"]').each(function(){
                            var img = $(this).html();
                            var galleryItem = $('<div class="item">'+ img +'</div>');

                            galleryItem.appendTo(galleryBox);
                    });

                    galleryBox.children('.item').eq(currentSlideIndex).addClass('active');
                    setTitle(galleryId, currentSlideIndex);
            }

            function destroyGallry(galleryId){
                    $(galleryId + ' .carousel-inner').html("");
            }

            function createPagination(galleryId, currentSlideIndex){
                    var pagination = $(galleryId + ' .pagination');
                    var carouselId = $(galleryId).find('.carousel').attr('id');
                    var prevLink = $('<li><a href="#'+ carouselId +'" data-slide="prev">«</a></li>');
                    var nextLink = $('<li><a href="#'+ carouselId +'" data-slide="next">»</a></li>');

                    prevLink.appendTo(pagination);
                    nextLink.appendTo(pagination);

                    $('a[data-target="'+ galleryId +'"]').each(function(){
                            var linkIndex = $(this).index('a[data-target="'+ galleryId +'"]');
                            var paginationLink = $('<li><a data-target="#carouselGallery" data-slide-to="'+ linkIndex +'">'+ (linkIndex+1) +'</a></li>');

                            paginationLink.insertBefore('.pagination li:last-child');
                    });

                    setPagination(++currentSlideIndex);
            }

            function setPagination(currentSlideIndex, reset = false){
                    if (reset){
                            $('.pagination li').removeClass('active');
                    }

                    $('.pagination li').eq(currentSlideIndex).addClass('active');
            }

            function destroyPagination(galleryId){
                    $(galleryId + ' .pagination').html("");
            }

            function setTitle(galleryId, currentSlideIndex){
                    var imgAlt = $(galleryId + ' .item').eq(currentSlideIndex).find('img').attr('alt');

                    $('.modal-title').text(imgAlt);
            }
    });
}



