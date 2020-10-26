@extends('admin')


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Preference</h3>

				<table class="table">
					<tr>
						<td>ID</td>
						<td>{{ $preference->id }}</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>{{ $preference->title }}</td>
					</tr>
					<tr>
						<td>Type</td>
						<td>{{ $preference->type }}</td>
					</tr>
					<tr>
						<td>Created at</td>
						<td>{{ $preference->created_at }}</td>
					</tr>
					<tr>
						<td>Updated at</td>
						<td>{{ $preference->updated_at }}</td>
					</tr>
				</table>
				<a href="{{ route('admin.preference.edit', $preference->id) }}" class="btn btn-warning">Edit</a>
				<a href="{{ route('admin.preference.index') }}" class="btn btn-default">Back</a>
			</div>
		</div>
	</div>
@endsection