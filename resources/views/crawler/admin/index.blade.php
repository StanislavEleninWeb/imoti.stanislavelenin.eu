@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Crawled</h3>
				<table class="table">
					<tr>
						<td>ID</td>
						<td>uuid</td>
						<td>Created at</td>
						<td>
							<a href="{{ route('admin.crawler.create') }}" class="btn btn-warning">Update</a>
						</td>
					</tr>
					@foreach($entries as $itr)
						<tr>
							<td>{{ $itr->id }}</td>
							<td>{{ $itr->uuid }}</td>
							<td>{{ $itr->created_at }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@endsection