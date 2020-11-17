@extends('layouts.app')
@section('style')
    <style>
        .container__blog {
            max-width: 1000px;
            width: 100%;
            margin: auto;
        }
        .blog__image img{
            width: 100%;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div class="main-section">
        <div class="container my-4 px-5">
            <div class="container__blog">
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="blog">
                                    <div class="blog__image">
                                        <img src="https://e.rpp-noticias.io/normal/2020/11/14/283428_1022552.jpg">
                                    </div>
                                    <div class="blog__description">
                                        <div class="blog__title">
                                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing.</h3>
                                        </div>
                                        <div class="blog__subtitle"></div>
                                        <div class="blog__abstract">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ea excepturi fugit nam obcaecati perspiciatis reprehenderit saepe totam ut vitae?</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
