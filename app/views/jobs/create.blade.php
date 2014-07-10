@extends('layouts.default')

@section('content')
	<h1>Register!</h1>

	{{ Former::open()->action('/jobs')->method('POST') }}

	<fieldset>
		{{ Former::legend('Details')}}
		{{ Former::text('title') }}
		{{ Former::textarea('description') }}
	</fieldset>

	{{ Former::actions()->primary_submit('Sign Up')->inverse_reset('Reset') }}

	{{Former::close()}}
@stop