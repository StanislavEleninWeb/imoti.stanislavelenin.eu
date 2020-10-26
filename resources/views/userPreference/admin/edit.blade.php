@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>User Preference Create</h3>
				@include('layouts.error.form')
				<form action="{{ route('admin.user.preference.store') }}" method="POST">
					@csrf

					<div class="form-group">
						<label for="preference_id">Preference</label>
						<select name="preference_id" required="" class="form-control">
							<option></option>
							@foreach($preferences as $itr)
								<option value="{{ $itr->id }}" @if($itr->id == $userPreference->preference_id) selected @endif>{{ $itr->title }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Value</label>
						<input type="text" name="value" value="{{ $userPreference->value }}" required="" minlength="1" maxlength="191" class="form-control">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success">Submit</button>
						<a href="{{ route('admin.user.preference.index') }}" class="btn btn-default">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection