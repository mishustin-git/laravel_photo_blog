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
            <section class="services-sections">
                <div class="container">
                    <h1 class="section-title">
                        {{$title}}
                    </h1>
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">{{$title}}</a></li>
                    </ul>
                    <div class="services-text">
                        {{$text}}
                    </div>
                    <div class="services-wrap">
                        @foreach ($services as $service)
                        <div class="services">
                            <div class="services__wrap">
                                <div class="services__img">
                                    <img src="{{$service['image_url']}}" alt="">
                                </div>
                                <div class="services__col">
                                    <div class="services__title">{{$service['title']}}</div>
                                    <ul class="services__list">
                                        <li class="services__item">{{$service['item1']}}</li>
                                        <li class="services__item">{{$service['item2']}}</li>
                                        <li class="services__item">{{$service['item3']}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
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