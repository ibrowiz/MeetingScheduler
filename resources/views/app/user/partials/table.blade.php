<div class="table-responsive">

	<table class="table table-striped table-hover " id = "myTable">

		<thead>
			<tr>
				<th style="width:3px; ">S/N</th>
				<th>LastName</th>
				<th>FirstName</th>
				<th>Username</th>
				<th>Email</th>
				<th style="max-width:120px !important; width: 120px !important; ">Created</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $index => $user)

				<tr>
					<th>{{$index + 1}}</th>
					<td>{{$user->lastname}}</td>
					<td>{{$user->firstname}}</td>
					<td>{{$user->username}}</td>
					<td> {{$user->email}} </td>
					<td>{{$user->created_at->format('Y M d')}}</td>
					<td> <a href="{{ url('user/show', $user->id) }}" class="btn btn-xs btn-info"> Read </a></td>
				</tr>

			@endforeach
		</tbody>
	</table>

</div>