@extends("site.layouts.app")
@section("title")
    A Propos
@endsection
@section("content")
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(site/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>About us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url(route("homepage")) }}">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">A Propos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-area section-padding-100-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <div class="about-content mb-100">

                        <div class="section-heading">
                            <div class="line"></div>
                            <p>Jetez un œil</p>
                            <h2>Au sujet de notre compagnie</h2>
                        </div>
                        <h6 class="mb-4">Nous sommes spécialisés dans l'accompagnement financier rapide de vos projets
                            personnels ou professionnels sans de longues procédures sans aucun frais imposées très
                            souvent par les banques vous pouvez nous contacter par whatsapp sur le
                            <a style="color:#1559db;" target="_blank" href="https://wa.me/+529842476546">+52 984 247
                                6546</a> pour d'ample renseignement.</h6>
                        <a href="{{ url(route("register")) }}" class="btn credit-btn mt-50">S'inscrire</a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="about-thumbnail mb-100">
                        <img src="site/img/bg-img/14.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

