@extends("site.layouts.app")
@section("title")
    Services
@endsection
@section("content")
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(site/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Services</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url(route("homepage")) }}">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="section-heading text-center mb-100">
                        <div class="line"></div>
                        <p>Jetez un œil à</p>
                        <h2>Nos services</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <i class="icon-profits"></i>
                        </div>
                        <div class="text">
                            <h5>Tous les prêts</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <i class="icon-money-1"></i>
                        </div>
                        <div class="text">
                            <h5>Réponse simple et rapide</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <i class="icon-coin"></i>
                        </div>
                        <div class="text">
                            <h5>Pas de papiers supplémentaires</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <i class="icon-smartphone-1"></i>
                        </div>
                        <div class="text">
                            <h5>Services financiers sécurisés</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <i class="icon-diamond"></i>
                        </div>
                        <div class="text">
                            <h5>Sans Frais</h5>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-service-area d-flex mb-100">
                        <div class="icon">
                            <i class="icon-piggy-bank"></i>
                        </div>
                        <div class="text">
                            <h5>Bons investissements</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

