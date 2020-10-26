@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Hello, Admin</h3>

				<table class="table table-condensed table-hover">
					<tr>
						<td>ID</td>
						<td>Title</td>
						<td>Base Url</td>
						<td>
							<a href="{{ route('admin.source.create') }}" class="btn btn-success">Create</a>
						</td>
					</tr>

					@foreach($sources as $itr)
						<tr>
							<td>{{ $itr->id }}</td>
							<td>{{ $itr->title }}</td>
							<td>{{ $itr->base_url }}</td>
							<td>
								<a href="{{ route('admin.source.show', $itr->id) }}" class="btn btn-info">Show</a>
								<a href="{{ route('admin.source.edit', $itr->id) }}" class="btn btn-warning">Edit</a>
								<a href="{{ route('admin.source.destroy', $itr->id) }}" onclick="event.preventDefault();document.getElementById('admin_source_destroy_{{ $itr->id }}').submit();" class="btn btn-danger">Delete</a>

								<form id="admin_source_destroy_{{ $itr->id }}" action="{{ route('admin.source.destroy', $itr->id) }}" method="POST">
									@csrf
									@method('DELETE')
								</form>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection