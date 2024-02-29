@extends("site.layouts.app")
@section("title")
    S'inscrire
@endsection
@section("content")
    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(site/img/bg-img/13.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>S'inscrire</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url(route("homepage")) }}">Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">S'inscrire</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-area section-padding-100-0" style="margin-top: -200px">
        <div class="map-area">
            <div class="contact---area">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">

                            <div class="contact-form-area contact-page">
                                <h4 class="mb-50">S'inscrire</h4>
                                <form action="{{ url("/register") }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" id="name" placeholder="Nom et Prénoms">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <input name="email" type="email" class="form-control" id="email" placeholder="Votre E-mail">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="bank_name" type="text" class="form-control" id="bank_name" placeholder="Nom de votre banque">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="username" type="text" class="form-control" id="username" placeholder="Identifiant">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input name="password" type="password" class="form-control" id="password" placeholder="Mot de passe">
                                            </div>
                                        </div>
                                        <!--div class="col-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                            </div>
                                        </div-->
                                        <div class="col-12">
                                            <button class="btn credit-btn mt-30" type="submit">Valider</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

