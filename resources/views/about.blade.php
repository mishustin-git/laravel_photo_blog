<!DOCTYPE html>
<html lang="en">
@include('head')
<body>
    <div class="wrapper">
        @include('header')
        <main class="main">
            <section class="parallax-sections" style="background-image: url('images/home3.jpg');background-position: center 17%;background-repeat: no-repeat;background-size: cover;background-attachment: fixed;">
                <div class="container">
                    <div class="parallax">
                        <div class="parallax__wrap">
                            <a href="#" class="main-title">jessica bennet</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="about-sections">
                <div class="container">
                    <h1 class="section-title">
                        {{$title}}
                    </h1>
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">{{$title}}</a></li>
                    </ul>
                    <div class="about">
                        <div class="about__wrap">
                            <div class="about__col">
                                <div class="about__img">
                                    <img src="{{$image_url}}" alt="">
                                </div>
                                <div class="about__btn">
                                    <button class="btn primary">
                                        Get in touch
                                    </button>
                                </div>
                            </div>
                            <div class="about__text">
                                {!! $text !!}
                            </div>                
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