@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Create source</h3>

				@include('layouts.error.form')
				<form action="{{ route('admin.source.store') }}" method="POST">
					@csrf

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" name="title" value="{{ old('title') }}" minlength="2" maxlength="191" required="" class="form-control @error('title') is-invalid @enderror">
					</div>

					<div class="form-group">
						<label for="base_url">Base url</label>
						<input type="url" name="base_url" value="{{ old('base_url') }}" minlength="2" maxlength="191" required="" class="form-control @error('base_url') is-invalid @enderror">
					</div>

					<div class="form-group">
						<label for="class_generate_base_url">Class generate base url</label>
						<input type="text" name="class_generate_base_url" value="{{ old('class_generate_base_url') }}" minlength="2" maxlength="191" required="" class="form-control @error('class_generate_base_url') is-invalid @enderror">
					</div>

					<div class="form-group">
						<label for="class_generate_link_url">Class generate link url</label>
						<input type="text" name="class_generate_link_url" value="{{ old('class_generate_link_url') }}" minlength="2" maxlength="191" required="" class="form-control @error('class_generate_link_url') is-invalid @enderror">
					</div>

					<div class="form-group">
						<label for="class_url_analyze">Class url analyze</label>
						<input type="text" name="class_url_analyze" value="{{ old('class_url_analyze') }}" minlength="2" maxlength="191" required="" class="form-control @error('class_url_analyze') is-invalid @enderror">
					</div>

					<div class="form-group">
						<label for="class_content_analyze">Class content analyze</label>
						<input type="text" name="class_content_analyze" value="{{ old('class_content_analyze') }}" minlength="2" maxlength="191" required="" class="form-control @error('class_content_analyze') is-invalid @enderror">
					</div>

					<div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
						<a href="{{ route('admin.source.index') }}" class="btn">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection