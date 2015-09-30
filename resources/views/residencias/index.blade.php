@extends('layout')

@section('title')
Residencias
@stop

@section('body')

<div id="tb_res">
    <div id="tb_res_act">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Lista de residencias</span>
                        <span>
                            <select id="estado_residencias">
                                <option value="todos" <?php if(!Request::has('e') || Request::input('e') == 'todos'){ echo 'selected="selected"'; } ?>>Todos</option>
                                <option value="activos" <?php if(Request::input('e') == 'activos'){ echo 'selected="selected"'; } ?>>Activos</option>
                                <option value="inactivos" <?php if(Request::input('e') == 'inactivos'){ echo 'selected="selected"'; } ?>>Inactivos</option>
                            </select>
                        </span>
                        <a href="#modal_registro_1" class="btn btn-default btn-sm" style="margin-left: 770px;" data-toggle="modal">
                            <i class="fa fa-pencil-square-o"></i> Nuevo
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="datatable_residencias">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Dirección</th>
                                        <th>Urbanizacion</th>
                                        <th>N° Habitaciones</th>
                                        <th>Dueño</th>
                                        <th>Estado</th>
                                        <th>Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($residencias as $residencia)
                                    <tr class="gradeA">
                                        <td>{{ $residencia->descripcion }}</td>
                                        <td>{{ $residencia->direccion }}</td>
                                        <td>{{ $residencia->urbanizacion->descripcion }}</td>
                                        <td>{{ $residencia->canthabitaciones }}</td>
                                        <td>{{ $residencia->dueño->persona->nombre_completo }}</td>
                                        @if($residencia->estado == 1)
                                        <td><span style="color: #006699;">Activo</span></td>
                                        @else
                                        <td><span style="color: #b94a48;">Inactivo</span></td>
                                        @endif
                                        <td>
                                            @if($residencia->estado == 1)
                                            <!--<a href="#" onclick="editar_residencia('{{ $residencia->id_residencia }}');" class="btn btn-default btn-sm" title="Editar">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>-->
                                            <a href="#" onclick="inactivar_residencia('{{ $residencia->id_residencia }}');" class="btn btn-danger btn-sm" title="Volver inactivo">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                            @else
                                            <!--<button class="btn btn-default btn-sm disabled" title="Editar">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </button>-->
                                            <button class="btn btn-danger btn-sm disabled" title="Eliminar">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_registro_1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    <button type="button" class="btn btn-primary btn-circle btn-lg" style="line-height: 2px; font-size: 8px; margin-left: 15.5%; margin-right: 10%"><p style="font-weight: bold;">Paso</p>1</button>
                    <button type="button" class="btn btn-default btn-circle btn-lg" style="line-height: 2px; font-size: 8px; margin-left: 10%; margin-right: 10%"><p style="font-weight: bold;">Paso</p>2</button>
                    <button type="button" class="btn btn-default btn-circle btn-lg" style="line-height: 2px; font-size: 8px; margin-left: 10%; margin-right: 10%"><p style="font-weight: bold;">Paso</p>3</button>
                </h4>
                <div>
                    <p class="" style="float:left; margin-left: 16.5%; margin-right: 10%; font-weight: bold">Dueño</p>
                    <p class="text-primary" style="float:left; margin-left: 9%; margin-right: 10%; font-weight: bold">Residencia</p>
                    <p class="text-primary" style="float:left; margin-left: 9.5%; margin-right: 10%; font-weight: bold">Pago</p>
                </div>
                <p></p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div style="float:left; width:20%; opacity:0.0">.</div>
                        <div style="float:left; width:60%">
                            <h4 align="center">
                                Registro Dueño
                            </h4>
                        </div>
                        <div style="float:left; width:20%">
                            <a href="#modal_buscar_personas" class="btn btn-primary btn-sm" data-toggle="modal" title="Buscar Personas" style="float: right;">Buscar</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                {!! Form::open(['url' => 'residencias/registrar-dueno', 'role' => 'form', 'id' => 'form_cambiante_dueno']) !!}
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            {!! Form::text('nombres', '', ['id' => 'txt_nombre_persona', 'placeholder' => 'Nombres', 'class' => 'form-control', 'required']) !!}
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            {!! Form::text('materno', '', ['id' => 'txt_materno_persona', 'placeholder' => 'Ap. Materno', 'class' => 'form-control input-md', 'required']) !!}
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                            {!! Form::select('tipodocumento', ['...' => 'Tipo de Documento', '0' => 'D.N.I.', '1' => 'C.E.'], '', ['class' => 'form-control', 'id' => 'sel_tipodocumento']) !!}
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            {!! Form::date('fechanacimiento', 'Fecha de Nacimiento', ['class' => 'form-control', 'required', 'id' => 'txt_fechanacimiento']) !!}
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                            {!! Form::number('cel', '', ['placeholder' => 'Teléfono/Celular', 'required', 'class' => 'form-control', 'id' => 'txt_cel']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Datos de Usuario</label>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                                {!! Form::password('contrasena', ['placeholder' => 'Contraseña', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            {!! Form::text('paterno', '', ['id' => 'txt_paterno_persona', 'placeholder' => 'Ap. Paterno', 'class' => 'form-control', 'required']) !!}
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-heart-empty"></i></span>
                                            <select name="sexo" class="form-control">
                                                <option>Sexo:</option>
                                                <option value="1">Masculino</option>
                                                <option value="2">Femenino</option>
                                            </select>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                                            {!! Form::number('nrodocumento', '', ['class' => 'form-control', 'required', 'placeholder' => 'N° Documento', 'id' => 'txt_nrodocumento']) !!}
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            {!! Form::email('correo', '', ['placeholder' => 'Email', 'required', 'class' => 'form-control', 'id' => 'txt_email']) !!}
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            {!! Form::number('nroafiliacion', '', ['placeholder' => 'N° Afiliación', 'required', 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label></label>
                                            <div class="form-group input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
                                                {!! Form::password('conf_contrasena', ['placeholder' => 'Repetir Contraseña', 'class' => 'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Cancelar', ['class' => 'btn btn-default', 'type' => 'reset', 'id' => 'btn_cancelar_reg_dueno']) !!}
                    {!! Form::button('Aceptar', ['class' => 'btn btn-primary', 'id' => 'btn_aceptar']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<div id="modal_registro_1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
                <h4 class="modal-title">
                    <span>Registrar dueño</span>
                    <a href="#modal_buscar_personas" class="btn btn-primary btn-sm" data-toggle="modal" title="Buscar Personas" style="margin-left: 300px;">
                        <i class="fa fa-search"></i>
                    </a>
                </h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'residencias/registrar-dueno', 'class' => 'form-horizontal', 'id' => 'form_cambiante_dueno']) !!}
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="nombre">Nombre</label>
                            <div class="col-md-5">
                                {!! Form::text('nombre', '', ['id' => 'txt_nombre_persona', 'placeholder' => 'Nombre', 'class' => 'form-control input-md', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="paterno">Ap. Paterno</label>
                            <div class="col-md-5">
                                {!! Form::text('paterno', '', ['id' => 'txt_paterno_persona', 'placeholder' => 'Ap. Paterno', 'class' => 'form-control input-md', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="materno">Ap. Materno</label>
                            <div class="col-md-5">
                                {!! Form::text('materno', '', ['id' => 'txt_materno_persona', 'placeholder' => 'Ap. Materno', 'class' => 'form-control input-md', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sexo">Sexo</label>
                            <div class="col-md-5">
                                <div class="radio">
                                    <label for="sexo-0">
                                        {!! Form::radio('sexo', '1', false, ['required', 'id' => 'rd_sexo_masculino']) !!}
                                        Masculino
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="sexo-1">
                                        {!! Form::radio('sexo', '2', false, ['required', 'id' => 'rd_sexo_femenino']) !!}
                                        Femenino
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="tipodocumento">Tipo Documento</label>
                            <div class="col-md-5">
                                {!! Form::select('tipodocumento', ['0' => 'D.N.I.', '1' => 'C.E.'], '', ['class' => 'form-control', 'id' => 'sel_tipodocumento']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="nrodocumento">N° Documento</label>
                            <div class="col-md-5">
                                {!! Form::number('nrodocumento', '', ['class' => 'form-control input-md', 'required', 'placeholder' => 'N° Documento', 'id' => 'txt_nrodocumento']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="fechanacimiento">Fecha Nacimiento</label>
                            <div class="col-md-5">
                                {!! Form::date('fechanacimiento', 'Fecha de Nacimiento', ['class' => 'form-control input-md0', 'required', 'id' => 'txt_fechanacimiento']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email">Email</label>
                            <div class="col-md-5">
                                {!! Form::email('email', '', ['placeholder' => 'Escribe tu email', 'required', 'class' => 'form-control input-md', 'id' => 'txt_email']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="cel">Teléfono/Celular</label>
                            <div class="col-md-5">
                                {!! Form::number('cel', '', ['placeholder' => 'Teléfono/Celular', 'required', 'class' => 'form-control input-md', 'id' => 'txt_cel']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="nroafiliacion">N° Afiliación</label>
                            <div class="col-md-5">
                                {!! Form::number('nroafiliacion', '', ['placeholder' => 'N° Afiliación', 'required', 'class' => 'form-control input-md']) !!}
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="">Datos de Usuario</label>
                            <div class="col-md-5">
                                {!! Form::password('contrasena', ['placeholder' => 'Contraseña', 'class' => 'form-control input-md']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for=""></label>
                            <div class="col-md-5">
                                {!! Form::password('conf_contrasena', ['placeholder' => 'Confirmar Contraseña', 'class' => 'form-control input-md']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="cancelar"></label>
                            <div class="col-md-8">
                                <input type="hidden" id="hd_id" value="">
                                {!! Form::button('Cancelar', ['class' => 'btn btn-default', 'type' => 'reset', 'id' => 'btn_cancelar_reg_dueno']) !!}
                                {!! Form::button('Aceptar', ['class' => 'btn btn-primary', 'id' => 'btn_aceptar']) !!}
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
-->

<div id="modal_buscar_personas" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    Buscar persona
                </h4>
            </div>
            <div class="modal-body">
                <div id="div_proveedores">
                    <div id="div_proveedores_act">
                        <div id="div-1" class="body">
                            <br>
                            <table id="data_table_personas" class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nombres y apellidos</th>
                                        <th># Documento</th>
                                        <th>Correo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($personas as $persona)
                                    <tr>
                                        <td>
                                            <a href="#" class="btn btn-default btn-xs" data-toggle="modal" onclick="seleccionar_persona('{{ $persona->id_persona }}', '{{ $persona->dueño }}');">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        </td>
                                        <td>{{{ $persona->nombres }}}</td>
                                        <td>{{{ $persona->paterno }}}</td>
                                        <td>{{{ $persona->correo }}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<div id="modal_residencias_personas" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">
                    Registro de residencias
                </h4>
            </div>
            <div>
                {!! Form::open(['url' => '', 'class' => 'form-horizontal', 'id' => 'form_res_add']) !!}
                    <br>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for=""></label>
                            <div class="col-md-5">
                                <input type="text" placeholder="Nombre" class="form-control input-md" id="txt_nom_res">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="sel_tip_res"></label>
                            <div class="col-md-5">
                                <select name="" id="sel_tip_res" class="form-control">
                                    <option value="no_seleccionado">Seleccionar tipo de residencia</option>
                                    @foreach($tiposResidencia as $tipo)
                                    <option value="">{{ $tipo->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for="sel_urb_res"></label>
                            <div class="col-md-5">
                                <select id="sel_urb_res" class="form-control">
                                    <option value="no_seleccionado">Seleccionar urbanizacion</option>
                                    @foreach($urbanizaciones as $urbanizacion)
                                    <option value="">{{ $urbanizacion->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for=""></label>
                            <div class="col-md-5">
                                <input type="number" id="txt_cathab_res" name="" placeholder="Cant. Habitaciones" min="0" class="form-control input-md">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for=""></label>
                            <div class="col-md-5">
                                <textarea name="" id="" placeholder="Comentario" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label" for=""></label>
                            <div class="col-md-5">
                                {!! Form::file('foto', ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for=""></label>
                            <div class="col-md-8">
                                <input type="button" value="Cancelar" class="btn btn-default">
                                <input type="button" value="Agregar" class="btn btn-primary" id="btn_agregar_residencia_d">
                            </div>
                        </div>
                    </fieldset>
                {!! Form::close() !!}
            </div>
            <div class="modal-body">
                <div id="div_">
                    <div id="div_">
                        <div id="div-1" class="body">
                            <br>
                            <table id="data_table_residencias_d" class="table table-bordered table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Residencia</th>
                                        <th>Urbanizacion</th>
                                        <th>Cant. Hab.</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_res_d"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

@stop

@section('scripts')
{!! HTML::script('js/own/residencias/index.js') !!}
@stop