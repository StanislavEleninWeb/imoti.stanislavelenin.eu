@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Create Preference</h3>

				@include('layouts.error.form')
				<form action="{{ route('admin.preference.store') }}" method="POST">
					@csrf

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" value="{{ old('title') }}" required="" minlength="2" maxlength="191" class="form-control">
					</div>

					<div class="form-group">
						<label for="type">Type</label>
						<select name="type" required="" class="form-control">
							<option></option>
							<option value="string" @if(old('type') == 'string') selected="" @endif>String</option>
							<option value="int" @if(old('type') == 'int') selected="" @endif>Integer</option>
							<option value="float" @if(old('type') == 'float') selected="" @endif>Float</option>
							<option value="bool" @if(old('type') == 'bool') selected="" @endif>Boolean</option>
						</select>
					</div>

					<div class="form-group">
						<label>
							<input type="checkbox" name="active" @if(old('active')) checked="" @endif >
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