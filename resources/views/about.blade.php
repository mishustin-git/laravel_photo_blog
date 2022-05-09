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
                        About Me
                    </h1>
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About Me</a></li>
                    </ul>
                    <div class="about">
                        <div class="about__wrap">
                            <div class="about__col">
                                <div class="about__img">
                                    <img src="images/about.jpg" alt="">
                                </div>
                                <div class="about__btn">
                                    <button class="btn primary">
                                        Get in touch
                                    </button>
                                </div>
                            </div>
                            <div class="about__text">
                                    <p>I strive for making high quality photos available to everyone from designers and CG artists to average viewers. I truly believe that great works of photography are based on certain skills and techniques. There are a lot of factors that make an ordinary photo an outstanding one. But nowadays even ordinary photos are not available for wide usage without paying a certain fee.</p>
                                    <div>
                                        <p>Awards:</p>
                                      </div>
                                      <div class="">
                                        <ul class="">
                                          <li>2015 – MAGNUM 30 under 30, Winner</li>
                                          <li>2014 – The Other Hundred, 1st Prize</li>
                                          <li>2014 – American Photography 30, Selected Winner</li>
                                          <li>2013 – Leica Oskar Barnack Award, Winner Newcomer</li>
                                          <li>2012 – PDN Photo Annual - Student Work, Winner</li>
                                          <li>2012 – AOP Student Awards, Finalist</li>
                                        </ul>
                                      </div>
                                    <p>However, there are some photographers and artists, both enthusiastic and professional, who believe that creativity should not be restricted by money or law. I am one of them, and I am glad to offer you my photos and a lot of other works of my portfolio without any charge. It means you can always get my latest photos taken all around the world without paying a cent.</p>
                                    <p>My work has appeared in printed and online magazines – National Geographic Magazine, The New York Times, GEO Germany, GEO France, Bloomberg Businessweek, Neu Zurcher Zeitung, Leica Fotografie International, Leica M Magazine, NEON, Marie Claire Italy, FOTO8, Reader’s Digest, National Geographic Traveler.</p>
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