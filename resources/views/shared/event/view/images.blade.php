<div id="event-img-carousel" class="carousel slide my-100" data-ride="carousel">
    <div class="carousel-inner " style = "height: 240px !important;">
        <?php
            $count = 0;
        ?>
        @foreach($event->images as $image)
            <?php
                $carouselItemClass = 'carousel-item'. ($count++ == 0? ' active': '');
            ?>
            <div class ="{{$carouselItemClass}}" >
                <img class="img-responsive mx-auto d-block" style = "height:240px;" src = "{{asset('storage/uploads/' . $image->name)}}" style = "height = 100%;">
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
