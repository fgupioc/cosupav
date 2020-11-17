@extends('layouts.app')
@section('content')
    <section class="home" id="home">
        <div class="max-width">
            <div class="home__content">
                <div class="text-1"></div>
                <div class="text-2">El Lugar Perfecto</div>
                <div class="text-3">Para aprender <span class="typing">Engineer</span></div>
                <a href="#">Empieza ya</a>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">Nosotros</h2>
            <div class="about__content">
                <div class="column left">
                    <img src="{{ asset('img/profile-1.jpeg') }}" alt="">
                </div>
                <div class="column right">
                    <div class="text">I'm Franz and I'm a <span class="typing">Engineer</span></div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, vitae ipsam voluptates nemo esse pariatur architecto nisi id iste, illum eligendi, quam quod tempore voluptatum possimus minima cupiditate at sunt assumenda eius error modi
                        excepturi hic. Doloribus quia, sunt autem nulla voluptatem tempore eos amet commodi quam laborum quo maxime dolore sed nam odio voluptatum, et ducimus error alias magni!</p>

                </div>
            </div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Nuestros Servicios</h2>
            <div class="services__content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">Web Design</div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est quo fugit tempora eos temporibus a rem exercitationem aperiam accusamus, distinctio, dicta laborum. Aliquid natus minus exercitationem accusamus, corrupti alias autem.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-chart-line"></i>
                        <div class="text">Advartising</div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est quo fugit tempora eos temporibus a rem exercitationem aperiam accusamus, distinctio, dicta laborum. Aliquid natus minus exercitationem accusamus, corrupti alias autem.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fas fa-code"></i>
                        <div class="text">Apps Design</div>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est quo fugit tempora eos temporibus a rem exercitationem aperiam accusamus, distinctio, dicta laborum. Aliquid natus minus exercitationem accusamus, corrupti alias autem.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
            <h2 class="title">Contactanos</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Ponte en Contacto con nosotros</div>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corporis fuga corrupti. Doloribus quis soluta nesciunt veritatis vitae nobis?</p>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Nombre</div>
                                <div class="sub-title">Horacio Gupioc</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Dirección</div>
                                <div class="sub-title">Surkhet, Nepal</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Correo</div>
                                <div class="sub-title">abc@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Mensaje</div>
                    <form action="#">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" placeholder="Nombres" required>
                            </div>
                            <div class="field email">
                                <input type="email" placeholder="Correo" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" placeholder="Asunto" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" placeholder="Mensaje.." required></textarea>
                        </div>
                        <div class="button">
                            <button type="submit">Envia Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop
