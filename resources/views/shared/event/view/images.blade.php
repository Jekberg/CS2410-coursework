
<?php
    $height = 'height: 180px;'
?>
@if ($event->images->count() == 0)
    <div class = "mx-auto pt-5" style = "{{$height}}">
        <span>
            <h2 style = "opacity: 0.5"><b>No image...</b></h2>
        </span>
    </div>
@else
    <div id="event-img-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner " style = "{{$height}}">
            <?php
                $count = 0;
            ?>
            @foreach($event->images as $image)
                <?php
                    $carouselItemClass = 'carousel-item'. ($count++ == 0? ' active': '');
                ?>
                <div class ="{{$carouselItemClass}}" >
                    <img class="img-responsive mx-auto d-block" style = "{{$height}}" src = "{{asset('storage/uploads/' . $image->name)}}" style = "height = 100%;">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#event-img-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#event-img-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endif
