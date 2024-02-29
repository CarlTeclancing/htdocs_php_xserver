@extends("site.layouts.app")
@section("title")
    Accueil
@endsection
@section("content")
    <div class="hero-area">
        <div class="hero-slideshow owl-carousel">

            <div class="single-slide bg-img">

                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(site/img/bg-img/1.jpg);"></div>

                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Obtenez votre <span>prêt</span> maintenant</h2>
                                <p data-animation="fadeInUp" data-delay="500ms">Inscrivez-vous a l'aide de vos informations Bancaires afin obtenir un crédit sans aucun frais</p>
                                <a href="{{ url(route("register")) }}" class="btn credit-btn mt-50" data-animation="fadeInUp" data-delay="700ms">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide-du-indicator"></div>
            </div>

            <div class="single-slide bg-img">

                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(site/img/bg-img/5.jpg);"></div>

                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h2 data-animation="fadeInDown" data-delay="300ms">Obtenez votre <span>prêt</span> maintenant</h2>
                                <p data-animation="fadeInDown" data-delay="500ms">Inscrivez-vous a l'aide de vos informations Bancaires afin obtenir  un crédit sans aucun frais</p>
                                <a href="{{ url(route("register")) }}" class="btn credit-btn mt-50" data-animation="fadeInDown" data-delay="700ms">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide-du-indicator"></div>
            </div>

            <div class="single-slide bg-img">

                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(site/img/bg-img/1.jpg);"></div>

                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h2 data-animation="fadeInUp" data-delay="300ms">obtenez votre <span>prêt</span> maintenant</h2>
                                <p data-animation="fadeInUp" data-delay="500ms">Inscrivez-vous a l'aide de vos informations Bancaires afin obtenir  un crédit sans aucun frais</p>
                                <a href="{{ url(route("register")) }}" class="btn credit-btn mt-50" data-animation="fadeInUp" data-delay="700ms">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide-du-indicator"></div>
            </div>

            <div class="single-slide bg-img">

                <div class="slide-bg-img bg-img bg-overlay" style="background-image: url(site/img/bg-img/5.jpg);"></div>

                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <div class="col-12 col-lg-9">
                            <div class="welcome-text text-center">
                                <h2 data-animation="fadeInDown" data-delay="300ms">obtenez votre <span>prêt</span> maintenant</h2>
                                <p data-animation="fadeInDown" data-delay="500ms">Inscrivez-vous a l'aide de vos informations Bancaires afin obtenir  un crédit sans aucun frais</p>
                                <a href="{{ url(route("register")) }}" class="btn credit-btn mt-50" data-animation="fadeInDown" data-delay="700ms">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide-du-indicator"></div>
            </div>
        </div>
    </div>
@endsection

