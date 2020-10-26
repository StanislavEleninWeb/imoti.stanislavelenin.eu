@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Create Preference</h3>

				@include('layouts.error.form')
				<form action="{{ route('admin.preference.update', $preference->id) }}" method="POST">
					@csrf
					@method('PATCH')

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" value="{{ $preference->title }}" required="" minlength="2" maxlength="191" class="form-control">
					</div>

					<div class="form-group">
						<label for="type">Type</label>
						<select name="type" required="" class="form-control">
							<option></option>
							<option value="string" @if($preference->type == 'string') selected="" @endif>String</option>
							<option value="int" @if($preference->type == 'int') selected="" @endif>Integer</option>
							<option value="float" @if($preference->type == 'float') selected="" @endif>Float</option>
							<option value="bool" @if($preference->type == 'bool') selected="" @endif>Boolean</option>
						</select>
					</div>

					<div class="form-group">
						<label>
							<input type="checkbox" name="active" @if($preference->active == 1) checked="" @endif >
							Active
						</label>
					</div>

					<div class="form-group">
						<button class="btn btn-success">Submit</button>
						<a href="{{ route('admin.preference.index') }}" class="btn btn-default">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection