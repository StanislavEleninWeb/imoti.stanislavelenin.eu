@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>User Preference Show</h3>

				<table>
					<tr>
						<td>ID</td>
						<td>{{ $userPreference->id }}</td>
					</tr>
					<tr>
						<td>User</td>
						<td>{{ $user->name }}</td>
					</tr>
					<tr>
						<td>Preference</td>
						<td>{{ $preference->title }}</td>
					</tr>
					<tr>
						<td>Value</td>
						<td>{{ $userPreference->value }}</td>
					</tr>
					<tr>
						<td>Created at</td>
						<td>{{ $userPreference->created_at }}</td>
					</tr>
					<tr>
						<td>Updated at</td>
						<td>{{ $userPreference->updated_at }}</td>
					</tr>
					<tr>
						<td>
							<a href="{{ route('admin.user.preference.edit', 1) }}" class="btn btn-warning">Edit</a>
						</td>
						<td>
							<a href="{{ route('admin.user.preference.index') }}" class="btn btn-default">Back</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
@endsection