@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">


				<div class="form-group">

					{!! Form::open(array('route' => 'checkCvr')) !!}

					<div class="input-group">

						{!! Form::text('cvr', null, ['class' => 'form-control', 'placeholder' => 'Company name...']) !!}

					<span class="input-group-btn">
						{!! Form::submit('Go!', ['class'=> 'btn btn-primary']) !!}
					</span>
					</div>
					{!! Form::close() !!}
				</div>

				@if(isset($status))


					<p style="font-weight: bold; font-size: 2em">{{$cvr}}:</p>
					@if($status)

						<img src='/thumbsUp.png' />
					@else
						<img src='/thumbsDown.png' />
					@endif

				@endif

			</div>
		</div>
	</div>
@endsection
