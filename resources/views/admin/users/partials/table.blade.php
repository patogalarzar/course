						<table class="table table-striped">
							<tr>
								<th>#</th>
								<th>Name</th>
								<th class="hidden-xs">Email</th>
								<th>Actions</th>
							</tr>
							@foreach ($users as $user)
							<tr data-id="{{ $user->id }}">
								<td>{{ $user->id }}</td>
								<td>{{ $user->full_name }}</td>
								<td class="hidden-xs">{{ $user->email }}</td>
								<td>
									<a href="{{ route('admin.users.edit', $user) }}">Edit</a>
									<a href="#!" class="btn-delete">Delete</a>
								</td>
							</tr>
							@endforeach
						</table>