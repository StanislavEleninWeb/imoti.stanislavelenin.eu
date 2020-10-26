@extends('admin')


@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Preference</h3>

				<table class="table">
					<tr>
						<td>ID</td>
						<td>Title</td>
						<td>Active</td>
						<td>
							<a href="{{ route('admin.preference.create') }}" class="btn btn-success">Create</a>
						</td>
					</tr>
					@foreach($preferences as $itr)
						<tr>
							<td>{{ $itr->id }}</td>
							<td>{{ $itr->title }}</td>
							<td>{{ $itr->active }}</td>
							<td>
								<a href="{{ route('admin.preference.show', $itr->id) }}" class="btn btn-info">Show</a>
								<a href="{{ route('admin.preference.edit', $itr->id) }}" class="btn btn-warning">Edit</a>
								<a href="{{ route('admin.preference.destroy', $itr->id) }}" onclick="event.preventDefault();document.getElementById('admin.preference.destroy_{{ $itr->id }}').submit();" class="btn btn-danger">Delete</a>
								<form id="admin.preference.destroy_{{ $itr->id }}" action="{{ route('admin.preference.destroy', $itr->id) }}" method="POST">
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