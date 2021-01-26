@extends('layout')

@section('css')
    <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- Select2 -->
  <style>
    .dataTables_filter{
      margin-left:-60px;
    }
    #TablaAlumnos_paginate{
      margin-left:-70px;
    }
  </style>
@stop

@section('title')
	Dashboard
@stop

@section('description')
	Vista General
@stop

@section('container')

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              

              <div class="box-tools pull-right">
               
                <div class="btn-group">
                 
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    @if(count($listaCursos))
                      @foreach ($listaCursos as $curso)
                        @if($loop->first)
                          <?php $clase = 'primero';?>
                        @endif
                        <li onClick="listarAlumnos({{ $curso->id }},'{{ $curso->nombre }}');" class="{{ $clase }}"><a href="#" >{{ $curso->nombre }}</a></li>
                        <?php $clase = '';?>
                      @endforeach
                    @endif  
                  </ul>
                </div>

                 <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
       

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Alumnos mas destacados en</h3>
              
              <select name="ListaCursos2" id="ListaCursos2">
                @if(count($listaCursos))
                  @foreach ($listaCursos as $key => $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                  @endforeach
                @else
                    <option value="">No ha creado cursos</option>
                @endif  
              </select>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <div class="table-responsive">
                <div id="TableroDos"></div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


          <!-- TABLE: LATEST ORDERS -->

        </div>

        <div class="col-md-4">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Cursos con Mayor Cantidad de Alumnos</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" id="TableroTres">
                  <thead>
                  <tr>

                    <th>Curso</th>
                    <th>Cantidad</th>
                  </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Alumnos Recientemente Registrados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @if (count($alumnos))
                  @foreach ($alumnos as $alumno)
                    <li class="item">

                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title">{{ $alumno->nombre }}
                          <span class="label label-warning pull-right" style="font-size: 12px;">{{ $alumno->email }}</span>
                        </a>
                            <span class="product-description">
                              {{ $alumno->apellidos }}
                            </span>
                      </div>
                    </li>
                  @endforeach

                @else
                  <li class="item">
                    <center><span style="font-size: 17px;">No se han registrado Alumnos</span></center>
                  </li>
                @endif
               
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{ route('app.student.page') }}" class="uppercase">Ver Todos los Alumnos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
      </div>

      <div class="col-md-6">
        
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cursos Recientemente Registrados</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @if(count($cursos))
                  @foreach ($cursos as $key => $curso)
                  <li class="item" style="height: 71px;">
                    <div class="product-img">
                      {{ $key + 1}}
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">{{ $curso->nombre }}
                        <span class="label label-warning pull-right" style="font-size: 12px;">{{ $curso->created_at }}</span></a>
                          <span class="product-description">
                            {{ $curso->descripcion }}
                          </span>
                    </div>
                  </li>
                  @endforeach

                @else
                  <li class="item">
                    <center><span style="font-size: 17px;">No se han registrado Cursos</span></center>
                  </li>
                  
                @endif
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{ route('app.course.page') }}" class="uppercase">Ver Todos los Cursos</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
      </div>

        <div class="col-md-12">
           <!-- quick email widget -->
          <!--  -->
      </div>
      <!-- /.row -->
@stop

@section('scripts')
  <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  <script src="{{ asset('js/gestion/dashboard.js') }}"></script>

  <script src="{{ asset('plugins/highcharts/highcharts.js') }}"></script>
  <script src="{{ asset('plugins/highcharts/exporting.js') }}"></script>

  <script>


    $("#TablaAlumnos").DataTable({
        "aoColumns": [
          {"sWidth": "1%","sClass": "center", "bVisible": false},
          {"sWidth": "1%","sClass": "center", "bSortable": false},
          {"sWidth": "98%","sClass": "center", "bSortable": true},
        ],
        "autoWidth" : true,
        "bLengthChange": false,
        "info":false,
        "pageLength": 5
      });
  </script> 

@stop