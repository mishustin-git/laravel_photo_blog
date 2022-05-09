<!DOCTYPE html>
<html lang="en">
@include('head')
<body>
    <div class="wrapper">
        @include('header')
        <main class="main">
            <section class="intro-sections">
                <div class="intro-slider">
                    <div class="swiper js-intro-slider ">
                        <div class="swiper-wrapper">
                            @foreach($slider_images as $slider_image)
                                <div class="swiper-slide" style="background-image: url('{{$slider_image['image_url']}}');"></div>
                            @endforeach
                            
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="intro">
                        <div class="intro__wrap">
                            <div class="intro__title">
                                
                                <h1 class="main-title">jessica bennet</h1>
                            </div>
                            <span class="intro__text">photographer, new york</span>
                            <button type="button" class="btn  primary">view all gallery</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        
        <div class="svg-sprite">
            <div class="overlay js-overlay"></div>
            <div class="popup" data-popup="some-popup">
              <button type="button" class="popup__close js-popup-close"></button>
              <div class="popup__wrap">

              </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>

</html>