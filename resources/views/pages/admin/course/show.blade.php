@extends('layouts.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Actualizar Curso</h3>
        </div>
        <div class="card-body">
            <form accept="{{ route('courses.update', $course->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="title">Titulo del Curso</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Ingrese titulo del curso" value="{{ old('title', $course->title) }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Descripción del curso</label>
                                    <textarea class="textarea" id="description" name="description" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description', $course->description) }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="to_learn">Lo que aprenderás</label>
                                    <textarea class="textarea" id="to_learn" name="to_learn" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('title', $course->to_learn) }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="requirements">Requisitos</label>
                                    <textarea class="textarea" id="requirements" name="requirements" placeholder="Place some text here"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('title', $course->requirements) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label class="col-form-label" for="title">Imagen de portada del curso</label>
                            <div class="div" style="cursor: pointer">
                                <img src="{{ asset($course->showLogo) }}" id="output" style="width: 100%; object-fit: cover" onclick="$('#file').click()">
                            </div>
                            <div class="custom-file" style="display: none">
                                <input type="file" name="file" class="custom-file-input" id="file">
                                <label class="custom-file-label" for="file">Seleccione una imagen</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $('#description').summernote(
                {
                    height: 200,
                    focus: true
                });

            $('#to_learn').summernote(
                {
                    height: 100,
                    focus: true
                });

            $('#requirements').summernote(
                {
                    height: 100,
                    focus: true
                });
            $('input[name="file"]').change(function (e){
               loadFile(e)
            });
        });

        const loadFile = function(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
@endsection
