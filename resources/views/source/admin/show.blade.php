@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover table-stripped">
					<tr>
						<td>ID</td>
						<td>{{ $source->id }}</td>
					</tr>
					<tr>
						<td>Title</td>
						<td>{{ $source->title }}</td>
					</tr>
					<tr>
						<td>Base url</td>
						<td>{{ $source->base_url }}</td>
					</tr>
					<tr>
						<td>Class generate base url</td>
						<td>{{ $source->class_generate_base_url }}</td>
					</tr>
					<tr>
						<td>Class generate link url</td>
						<td>{{ $source->class_generate_link_url }}</td>
					</tr>
					<tr>
						<td>Class url analyze</td>
						<td>{{ $source->class_url_analyze }}</td>
					</tr>
					<tr>
						<td>Class content analyze</td>
						<td>{{ $source->class_content_analyze }}</td>
					</tr>
					<tr>
						<td>Created at</td>
						<td>{{ $source->created_at }}</td>
					</tr>
					<tr>
						<td>Updated at</td>
						<td>{{ $source->updated_at }}</td>
					</tr>
				</table>
				<a href="{{ route('admin.source.edit', $source->id)}}" class="btn btn-primary">Edit</a>
				<a href="{{ route('admin.source.index') }}" class="btn btn-default">Back</a>
			</div>
		</div>
	</div>
@endsection