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
            <section class="contact-sections">
                <div class="container">
                    <h1 class="section-title">
                        Contact Me
                    </h1>
                    <ul class="breadcrumbs">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Contact Me</a></li>
                    </ul>
                    <p class="contact__text">
                        You can contact me any way that is convenient for you. I am available 24/7 via fax, email or telephone. You can also use a quick contact form located on this page to ask a question about my services and projects I work on. I would be happy to answer your questions or offer any help.
                    </p>
                    <div class="contact">
                        <div class="contact__wrap">
                            <div class="contact__form">
                                <form action="">
                                    <div class="row more-tablet">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name">
                                                <span class="validation-error">The text field is required</span>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="tel" name="phone">
                                                <span class="validation-error">The telephone field is required</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email">E-mail</label>
                                                <input type="email" name="email">
                                                <span class="validation-error">The email field is required</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="message">Message</label>
                                                <textarea name="message" id="" cols="30" rows="10"></textarea>
                                                <span class="validation-error">The text field is required</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col contact__form-button">
                                            <button class="btn primary">
                                                Send Message
                                            </button>
                                        </div>
                                    </div>
                                </form> 
                            </div>
                            <div class="contact__info">
                                <a href="#" class="contact__info-addr"><i class="fa-solid fa-location-dot"></i> 8901 Marmora Road, Glasgow, D04 89GR</a>
                                <a href="tel:" class="contact__info-tel"><i class="fa-solid fa-phone"></i>1-800-1234-567</a>
                                <a href="mailto:" class="contact__info-mail"><i class="fa-solid fa-envelope"></i>jessica@demolink.org</a>
                                <ul class="contact__info-social">
                                    <li><a href="" class="fa fa-facebook "></a></li>
                                    <li><a href="" class="fa fa-twitter"></a></li>
                                    <li><a href="" class="fa fa-google-plus"></a></li>
                                    <li><a href="" class="fa fa-500px"></a></li>
                                    <li><a href="" class="fa fa-behance"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="map">
                    <div class="map__wrap">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Abf051b7b36f31d858a79d5bdc77417d96900ffaf5bb76b5f96b6d66225f82da2&amp;width=100%&amp;height=400&amp;lang=en_FR&amp;scroll=true"></script>
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