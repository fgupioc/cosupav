@extends('layouts.app')
@section('content')
    <div class="main-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="banner">
                        <h1>{{ title($course->title) }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 px-5 course-detail">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12">
                            {!! $course->description !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wpc-curso-progress">
                                <!--<div class="curso-progress"><h4>Ya completaste este curso ¡Buen trabajo!</h4>-->
                                <div class="curso-progress"><h4>Has completado {{ $completed->count() }} de {{ $allLessons->count() }} lecciones ¡Te falta poco!</h4>
                                    <div class="wpc-bar-progress wpc-rounded oop" data-progress="100">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentage}}%">{{$percentage}}% </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <h2 class="title">Contenido del curso {{ $course->totalTimeSection }}</h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                @foreach($course->sections as $section)
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <h4><span class="text-danger">{{ $section->title }}</span></h4>
                                                <span class="">{{ $section->lessons()->where('condition', 'Publish')->count() }} clases • <span> {{ $section->totalTimeLesson->total }} min</span></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse @if ($loop->first) show @endif " aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ol class="list-group">
                                                @foreach($section->lessons()->where('condition', 'Publish')->orderBy('order', 'asc')->get() as $key => $lesson)
                                                    <li class="list-group-item @if($lesson->completed) lesson-completed @endif">
                                                        {{ $key+1  }}
                                                        <span class="text">{{ $lesson->title }} {{ $lesson->order }}</span>
                                                        <div class="tools">
                                                            <span> <span>{{ $lesson->duration }}</span> <i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777"></rect>
                        <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                    </svg>
                    <h2>Heading</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
                    <p><a class="btn btn-secondary" href="#" role="button">View details »</a></p>

                </div>
            </div>
        </div>
    </div>
@endsection
