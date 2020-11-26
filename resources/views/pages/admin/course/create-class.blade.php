@extends('layouts.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Registrar clases al curso : {{ $course->title }}</h3>
        </div>
        <div class="card-body">
            <form accept="{{ route('courses.storeClass', $course->slug) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label class="col-form-label" for="section_id">Seleccione la seccion</label>
                        <div class="input-group mb-3">
                            <select class="form-control" name="section_id">
                                <option>Seleccione</option>
                                @foreach($sections as $section)
                                    <option value="{{ $section->id  }}" {{ old('section_id') == $section->id ? 'selected' : '' }}> {{ $section->title }} </option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalNuevaSeccion"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="form-group">
                            <label class="col-form-label" for="title">Titulo de la clase</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Ingrese titulo del curso" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="subtitle">Subtitulo</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Ingrese titulo del curso" value="{{ old('subtitle') }}">
                        </div>
                    </div>
                    <div class=" col-12 col-md-2">
                        <div class="form-group">
                            <label class="col-form-label" for="duration">Duración</label>
                            <input type="text" class="form-control" name="duration" id="duration" placeholder="00:00" value="{{ old('duration') }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="form-group">
                            <label class="col-form-label" for="url">url</label>
                            <input type="text" class="form-control" name="url" id="url" placeholder="Ingrese la url del video" value="{{ old('url') }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label" for="description">Descripción</label>
                            <textarea class="textarea" id="description" name="description" placeholder="Place some text here"
                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="{{ old('description') }}"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th style="display: none"></th>
                    <th>Sección</th>
                    <th>Clase</th>
                    <th>Dureciòn</th>
                    <th>Opciòn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lessons as $lesson)
                    <tr class="text-center">
                        <td style="display:none;">{{ $lesson->id }}</td>
                        <td>{{ $lesson->section->title }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>{{ $lesson->duration }}</td>
                        <td>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('modals')
    <div class="modal fade" id="modalNuevaSeccion" tabindex="-1" role="dialog" aria-labelledby="modalNuevaSeccionTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevaSeccionTitle">Nueva Secciòn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('section.store', $course->slug) }}" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label">Titulo de la clase</label>
                                    <input type="text" class="form-control" name="title" placeholder="Ingrese titulo del curso">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label">Descripción</label>
                                    <textarea class="textarea" name="description" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Cancelar</button>
                    <button type="button" name="save" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('textarea[name="description"]').summernote(
                {
                    height: 100,
                    focus: true
                });
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "columnDefs": [
                    {
                        "targets": [0],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "order": [[0, "desc"]]
            });

            const modal = $("#modalNuevaSeccion");
            const form = modal.find('form');
            const inputSelect = $('select[name="section_id"]');

            $('button[name="save"]').click(function () {
                const data = form.serialize();
                const url = form.attr("action");
                const method = form.attr("method");
                $.ajax({
                    headers: {'X-CSRF-TOKEN': token},
                    url: url,
                    type: method,
                    data: data,
                    dataType: 'JSON',
                    beforeSend: function () {
                    },
                    success: function (res) {
                       if(res.status) {
                           console.log(res.section)
                           inputSelect.prepend($('<option>', {
                               value: res.section.id,
                               text: res.section.title,
                           }));
                           inputSelect.val(res.section.id);
                           modal.modal('hide');
                       }
                    },
                    error: function (err) {

                    }
                });
            });



        });
    </script>
@endsection
