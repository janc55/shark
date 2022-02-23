@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Inicio</a>
          <a class="breadcrumb-item" href="{{route('curso.index')}}">Instructores</a>
          <span class="breadcrumb-item">Nuevo Instructor</span>
        </nav>
      </div><!-- br-pageheader -->
      <!-- <div class="br-pagebody"> -->
      <!-- <div class="br-section-wrapper"> -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Nuevo Instructor</h4>
        
            <form action="{{route('instructor.store')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row mg-b-25">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="ins_nombre"  required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Apellidos: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="ins_apellidos"  required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Correo Electrónico: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="email" name="ins_correo" required>
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Celular: </label>
                            <input class="form-control" type="text" name="ins_celular" >
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Sexo: </label>
                        <select class="form-control select" data-placeholder="Sexo" name="ins_sexo">
                            <option label="Sexo"></option>
                            <option>Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <div class="form-layout-footer">
                    <input type="submit" class="btn btn-info" value="Guardar">
                </div><!-- form-layout-footer -->
            </form>
            <!-- </div> -->
            <!-- </div> -->
      </div>
      @include('layouts.footer') 
</div>
@endsection


