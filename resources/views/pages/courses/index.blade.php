@extends('layouts.app')
@section('style')
    <style>
        .caja {
            display: grid;
            grid-template-columns: 100%;
            grid-template-rows: 210px 210px 80px;
            grid-template-areas: "image" "description" "tools";
            font-family: roboto;
            border-radius: 18px;
            background: white;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.9);
            text-align: center;
            transition: 0.5s all;
            cursor: pointer;
        }

        .caja--image {
            grid-area: image;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            text-align: center;
            color: white;
        }

        .caja--description {
            grid-area: description;
            padding: 25px;
        }

        .caja--description .date {
            color: rgb(255, 7, 110);
            font-size: 13px;
        }

        .caja--description p {
            color: grey;
            font-size: 15px;
            font-weight: 300;
        }

        .caja--description h2 {
            margin-top: 0;
            color: black;
            font-size: 28px;
            font-weight: 300;
        }

        .caja--tools {
            grid-area: tools;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            background: rgb(255, 7, 110);
        }

        .caja--tools .stat {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            color: white;
        }

        .caja--tools .stat .type {
            font-size: 11px;
            font-weight: 300;
            text-transform: uppercase;
        }

        .caja--tools .stat .value {
            font-size: 22px;
            font-weight: 500;
        }

        .stat-border {
            border-left: 1px solid rgb(172, 26, 87);
            border-right: 1px solid rgb(172, 26, 87);
        }

        .caja:hover {
            transform: scale(1.05);
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.6);
        }
    </style>
@endsection
@section('content')
    <div class="main-section">
        <div class="container mt-2">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-4 my-4">
                        <a href="{{ route('courses.detail', $course->slug) }}">
                        <div class="caja">
                            <div class="caja--image" style=" background-image: url('{{ $course->showLogo }}');"></div>
                            <div class="caja--description">
                                <h2>{{ $course->title }}</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto deserunt dolores excepturi omnis quam quod tempora? Animi culpa deleniti dolore id libero magnam, obcaecati perferendis quidem, rem, temporibus voluptas?</p>
                            </div>
                            <div class="caja--tools">
                                <div class="stat">
                                    <div class="value">4 <sub>m</sub></div>
                                    <div class="type">read</div>
                                </div>
                                <div class="stat stat-border">
                                    <div class="value">3847</div>
                                    <div class="type">views</div>
                                </div>
                                <div class="stat">
                                    <div class="value">32</div>
                                    <div class="type">comments</div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
