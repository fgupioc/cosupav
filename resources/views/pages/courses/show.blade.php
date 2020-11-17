@extends('layouts.app')
@section('content')
    <div class="main-section">
        <div class="container-fluid curso-info">
            <div class="row">
                <div class="col-12">
                    <p>
                        <span class="curso-lecciones"><i class="fa fa-list" aria-hidden="true"></i> 30 Lecciones</span>
                        <span class="curso-duracion"><i class="fa fa-hourglass-half" aria-hidden="true"></i> Duración: 8 horas</span>
                        <span class="curso-tech"><i class="fa fa-university" aria-hidden="true"></i> PHP 7</span>
                        <span class="curso-status">
                            <i class="fa fa-signal" aria-hidden="true"></i> Tu progreso:
                            <span class="wpcomplete-progress-percentage oop">100%</span>
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid mb-5 px-5 course-detail">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12">
                            <p>PHP es generalmente conocido por ser un lenguaje de código abierto que nos permite generar páginas web dinámicas en HTML
                                ¿Pero sabías que a partir de la versión 5, PHP adquirió una tras otra todas las características de un lenguaje de <strong>programación orientada a
                                    objetos</strong>?</p>
                            <p>PHP soporta la creación de clases, objetos, herencia, interfaces, clases abstractas, y muchos otros conceptos que quizás te resulten abrumadores o
                                complicados en este momento. Pero si me sigues a lo largo de las siguientes lecciones, te prometo que pasarán a ser conceptos familiares que podrás usar cada
                                vez que programes con PHP y sobretodo si estás trabajando con un framework como Laravel. Puesto que Symfony, Laravel y todos los principales frameworks de PHP
                                hacen uso extenso de todas estas características de la programación orientada a objetos.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="wpc-curso-progress">
                                <!--<div class="curso-progress"><h4>Ya completaste este curso ¡Buen trabajo!</h4>-->
                                <div class="curso-progress"><h4>Has completado 27 de 40 lecciones ¡Te falta poco!</h4>
                                    <div class="wpc-bar-progress wpc-rounded oop" data-progress="100">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <h2 class="title">Contenido del curso</h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <h4><span class="text-danger">Parte 1: Programación orientada a objetos desde cero </span></h4>
                                                <span class="">6 clases • <span>19 min</span></span>
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ol class="list-group">
                                                @for($i=1; $i<=8 ; $i++)
                                                    @if($i == 1)
                                                        <li class="list-group-item lesson-completed">
                                                            {{ $i  }}
                                                            <span class="text"> Design a nice theme <i class="fa fa-check" aria-hidden="true"></i></span>
                                                            <div class="tools">
                                                                <span> <span>25:12</span> <i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    <li class="list-group-item">
                                                        {{ $i  }}
                                                        <span class="text"> Design a nice theme</span>
                                                        <div class="tools">
                                                            <span> <span>25:12</span> <i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                        </div>
                                                    </li>
                                                @endfor
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <h4><span class="text-danger">Parte 2: Lorem ipsum dolor sit amet.</span></h4>
                                                <span class="">6 clases • <span>19 min</span></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ol class="list-group">
                                                @for($i=1; $i<=4 ; $i++)
                                                    @if($i == 1)
                                                        <li class="list-group-item lesson-completed">
                                                            {{ $i  }}
                                                            <span class="text"> Lorem ipsum dolor sit. <i class="fa fa-check" aria-hidden="true"></i></span>
                                                            <div class="tools">
                                                                <span> <span>25:12</span> <i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    <li class="list-group-item">
                                                        {{ $i  }}
                                                        <span class="text"> Design a nice theme</span>
                                                        <div class="tools">
                                                            <span> <span>25:12</span> <i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                        </div>
                                                    </li>
                                                @endfor
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <h4><span class="text-danger">Parte 3: Lorem ipsum dolor sit amet, consectetur adipisicing.</span></h4>
                                                <span class="">6 clases • <span>19 min</span></span>
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ol class="list-group">
                                                @for($i=1; $i<=6 ; $i++)
                                                    @if($i == 1)
                                                        <li class="list-group-item lesson-completed">
                                                            {{ $i  }}
                                                            <span class="text"> Lorem ipsum dolor sit. <i class="fa fa-check" aria-hidden="true"></i></span>
                                                            <div class="tools">
                                                                <span> <span>25:12</span> <i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                            </div>
                                                        </li>
                                                    @endif
                                                    <li class="list-group-item">
                                                        {{ $i  }}
                                                        <span class="text"> Design a nice theme</span>
                                                        <div class="tools">
                                                            <span> <span>25:12</span> <i class="fa fa-youtube-play" aria-hidden="true"></i></span>
                                                        </div>
                                                    </li>
                                                @endfor
                                            </ol>
                                        </div>
                                    </div>
                                </div>
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
