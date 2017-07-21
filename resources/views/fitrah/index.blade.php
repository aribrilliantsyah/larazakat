@extends('layouts.app')

@section('create')
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{url('/home')}}">Dashboard</a></li>
				<li class="active">Zakat Fitrah</li>
			</ul>
				<div class="panel panel-custom">
					<div class="panel-heading panel-heading-custom">
						<h2 class="panel-title panel-title-custom"><i class="fa fa-users"></i> Info Data Zakat Fitrah</h2>
					</div>
					<div class="panel-body">
					<b>
						Ketetapan Zakat Fitrah
					</b>
					</br>
					Beras : 2.7 kg </br>
					Uang  : Rp.32.400,00</br></br>
				  <b>
	              Hasil Perhitugan :
	              </b>
	              </br>
	              Total Muzaki beras   :
	              {{$beras}}
	              </br>
	              Jumlah Perolehan Beras :
	              {{$hasilb}}.Kg
	              </br>
	              Total Muzaki uang  :         
	              {{$uang}}
	              </br>
	              Jumlah Perolehan Uang : 
	              Rp.{{$c}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-custom">
					<div class="panel-heading panel-heading-custom">
						<h2 class="panel-title panel-title-custom"><i class="fa fa-plus-circle"></i> <i class="fa fa-users"></i> Tambah Data Zakat Fitrah</h2>
					</div>

					<div class="panel-body">
						{!! Form::open(['url' => route('fitrah.store'),
						'method' => 'post', 'class'=>'form-horizontal']) !!}
						@include('fitrah._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-custom">
				<div class="panel-heading panel-heading-custom">
					<h2 class="panel-title panel-title-custom"><i class="fa fa-users"></i> Data Zakat</h2>
				</div>
				<div class="panel-body">
	              {!! $html->table(['class'=>'table-striped'])!!}
	              

				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection



