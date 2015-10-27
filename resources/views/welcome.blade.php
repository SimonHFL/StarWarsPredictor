@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<div class="form-group">

					{!! Form::open(array('route' => 'checkCvr')) !!}

						{!! Form::label('Have you seen any star wars movies') !!}
						{!! Form::select('seenSW', [0=>'no', 1=>'yes'], ['class' => 'form-control', 'placeholder' => 'Company name...']) !!}
					<br/>
						{!! Form::label('Are you a Star Treck fan') !!}
						{!! Form::select('isStarTrekFan', [0=>'no', 1=>'yes'], ['class' => 'form-control', 'placeholder' => 'Company name...']) !!}
					<br/>
						{!! Form::label('Gender') !!}
						{!! Form::select('gender', [0 => 'Male', 1 => 'Female'], ['class' => 'form-control']) !!}
					<br/>
						{!! Form::label('Age') !!}
						{!! Form::select('age', $groups['ageGroups'], ['class' => 'form-control']) !!}
					<br/>
						{!! Form::label('Income') !!}
						{!! Form::select('income', $groups['incomeGroups'], ['class' => 'form-control']) !!}
					<br/>
						{!! Form::label('Education') !!}
						{!! Form::select('education', $groups['educationGroups'], ['class' => 'form-control']) !!}
					<br/>
						{!! Form::label('Location') !!}
						{!! Form::select('location', $groups['locationGroups'], ['class' => 'form-control']) !!}
					<span class="input-group-btn">
						{!! Form::submit('Go!', ['class'=> 'btn btn-primary']) !!}
					</span>

					{!! Form::close() !!}
				</div>

				@if(isset($status))

					<p style="font-weight: bold">Probability of being a star wars fan: {{$probabilityPercentage}}</p>

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
