@extends('layouts.admin.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de cursos</h3>
            <div class="card-tools">
                <a href="{{ route('courses.create') }}" type="button" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Nuevo Curso
                </a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th style="display: none"></th>
                    <th>Curso</th>
                    <th>Instructor</th>
                    <th>Duración</th>
                    <th>Estado</th>
                    <th>Opción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr class="text-center item" data-slug="{{ $course->slug }}" data-condition="{{ $course->condition }}">
                        <td style="display: none">{{ $course->id }}</td>
                        <td style="text-align: left">{{ $course->title }}</td>
                        <td>
                            franz junior
                        </td>
                        <td>90 min</td>
                        <td>
                            <select class="form-control" name="condition">
                                @foreach(\App\Models\Course::STATUS as $item)
                                    <option value="{{ $item }}" {{ $item == $course->condition ? 'selected' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div class="card-tools">
                                <a href="{{ route('courses.edit', $course->slug) }}" type="button" class="btn btn-sm btn-tool">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('courses.createClass', $course->slug) }}" type="button" class="btn btn-sm btn-tool">
                                    <i class="fas fa-list"></i>
                                </a>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
@section('scripts')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                "order": [[0, "desc"]]
            });

            $('select[name="condition"]').change(function () {
                const $this = $(this);
                const slug = $this.closest('.item').data('slug');
                const value = $this.val();
                const old = $this.closest('.item').data('condition');
                Swal.fire({
                    title: 'Estas segura?',
                    text: "Se cambiarà el estado del curso",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Cambiar!',
                    cancelButtonText: 'Cancelar!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': token},
                            url: `/admin/cursos/${slug}/actualizar-condicion`,
                            type: 'PUT',
                            data: {condition: value},
                            dataType: 'JSON',
                            beforeSend: function () {
                                //$this.find("button").prop("disabled", true);
                                //$this.find("button").html('<i class="fa fa-spinner fa-pulse"></i> enviando...');
                            },
                            success: function (res) {
                                if (res.status) {
                                    Swal.fire(
                                        'Actualozado!',
                                        'Se actualizo la condiciòn',
                                        'success'
                                    )
                                } else {
                                    $this.val(old)
                                }
                            },
                            error: function (err) {
                                $this.val(old)
                            }
                        });
                    } else {
                        $this.val(old)
                    }
                })
            });
        });
    </script>
@endsection
