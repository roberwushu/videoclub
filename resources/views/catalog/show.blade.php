@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-sm-4">
	{{-- TODO: Imagen de la película --}}
	<img src="{{$dataPelicula->poster}}" style="height:100%"/>
	</div>
	<div class="col-sm-8">
		<div class="col-sm-12">
			{{-- TODO: Datos de la película --}}
			<h1></h1>
			<h4>Año: {{$dataPelicula->year}}</h4>
			<h4>Director: {{$dataPelicula->director}}</h4>

			<p class="mtop30"><strong>Resumen: </strong>{{$dataPelicula->synopsis}}</p>
			<p class="mtop30"><strong>Estado: </strong>

			@if ($dataPelicula->rented ==1 )
			La pelicula esta alquilada
			@else 
			Pelicula disponible
			@endif

			</p>
		</div>

		<div class="col-sm-12 mtop30">
			<div class="col-sm-4">
				@if ($dataPelicula->rented ==1 )
				<button type="button" class="btn btn-danger">Devolver pelicula</button>
				@else 
				<button type="button" class="btn btn-info">Alquilar pelicula</button>
				@endif
				
			</div>
			<div class="col-sm-4">
				<a href="{{ url('/catalog/edit/' . $id ) }}">
					<button type="button" class="btn btn-warning">Editar pelicula</button>
				</a>
			</div>
			<div class="col-sm-4">
				<a href="{{ url('/catalog') }}">
					<button type="button" class="btn btn-default">Volver al listado</button>
				</a>
			</div>
		</div>

	</div>
</div>
@stop