@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Inicio</a>
          <a class="breadcrumb-item" href="{{route('curso.index')}}">Cursos</a>
          <span class="breadcrumb-item">Nuevo curso</span>
        </nav>
      </div><!-- br-pageheader -->
      <!-- <div class="br-pagebody"> -->
      <!-- <div class="br-section-wrapper"> -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Nuevo curso</h4>
        
            <form action="{{route('curso.store')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                    <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="cur_nombre" placeholder="Nombre del curso" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-8">
                    <div class="form-group">
                    <label class="form-control-label">Descripcion: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="cur_descripcion" placeholder="Ingresa la descripcion del curso" required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Fecha de inicio: </label>
                    <input class="form-control" type="date" name="fecha_inicio" >
                    </div>
                </div><!-- col-8 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Categoria: <span class="tx-danger">*</span></label>
                    <select class="form-control select" data-placeholder="Choose country" name="categoria">
                        <option label="Elige una categoria"></option>
                        @foreach ($lista_categoria as $categoria)
                            <option value="{{$categoria->id}}">{{$categoria->cat_nombre}} </option>
                        @endforeach
                    </select>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                    <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Instructor: <span class="tx-danger">*</span></label>
                    <select class="form-control select" name="instructor">
                        <option label="Elige un instructor"></option>
                        @foreach ($lista_instructor as $instructor)
                            <option value="{{$instructor->id}}">{{$instructor->ins_nombre}} {{$instructor->ins_apellidos}} </option>
                        @endforeach
                    </select>
                    </div>
                </div><!-- col-4 -->
                </div><!-- row -->

                <div class="form-layout-footer">
                <input type="submit" class="btn btn-info" value="Guardar">
                <button class="btn btn-info">Submit Form</button>
                <button class="btn btn-secondary">Cancel</button>
                </div><!-- form-layout-footer -->
            </form>
            <!-- </div> -->
            <!-- </div> -->
      </div>
</div>
@endsection

