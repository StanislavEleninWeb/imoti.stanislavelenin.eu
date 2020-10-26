@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>User Preference</h3>

				<table class="table">
					<tr>
						<td>ID</td>
						<td>Preference</td>
						<td>Value</td>
						<td>
							<a href="{{ route('admin.user.preference.create') }}" class="btn btn-success">Create</a>
						</td>
					</tr>
					@foreach($preferences as $itr)
					<tr>
						<td>{{ $itr->id }}</td>
						<td>{{ $itr->title }}</td>
						<td>{{ $itr->pivot->value }}</td>
						<td>
							<a href="{{ route('admin.user.preference.show', $itr->id) }}" class="btn btn-info">Show</a>
							<a href="{{ route('admin.user.preference.edit', $itr->id) }}" class="btn btn-warning">Edit</a>
							<a href="{{ route('admin.user.preference.destroy', $itr->id) }}" class="btn btn-danger" onclick="event.PreventDefault();">Delete</a>
							<form id="admin.user.preference.destroy_{{ $itr->id }}" method="POST" action="{{ route('admin.user.preference.destroy', $itr->id) }}">
								@csrf
							</form>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection