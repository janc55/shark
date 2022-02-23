@extends('layouts.app')

@section('content')
<div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="index.html">Inicio</a>
          <a class="breadcrumb-item" href="{{route('curso.index')}}">Categorias</a>
          <span class="breadcrumb-item">Nueva Categoria</span>
        </nav>
      </div><!-- br-pageheader -->
      <!-- <div class="br-pagebody"> -->
      <!-- <div class="br-section-wrapper"> -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Nueva Categoria</h4>
        
            <form action="{{route('categoria.store')}}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="row mg-b-25">
                <div class="col-lg-4">
                    <div class="form-group">
                    <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="cat_nombre"  required>
                    </div>
                </div><!-- col-4 -->
                <div class="col-lg-8">
                    <div class="form-group">
                    <label class="form-control-label">Descripcion: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="cat_descripcion"  required>
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


