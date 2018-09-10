@extends('admin.layouts.master')

@section('admin-content')
     <h1>Add New Role</h1>

     <form role="form" action="{{ route('admin.roles.store') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          
          @include('includes.messages')
          
          <div class="form-group">
               <label for="name">Name</label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
          </div>
          
          <div class="form-group">
               <button type="submit" class="btn btn-primary">Submit</button>
               <a href="{{ route('admin.roles.index') }}" class="btn btn-warning">Back</a>
					</div>

					<div class="form-group">
						<div class="row">
						<div class="col-lg-2">
						<label for="name">Blog Permissions</label>
						@foreach ($permissions as $permission)
						@if ($permission->for == 'blog')
						<div class="checkbox">
						<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
						</div>
						@endif
						@endforeach
						</div>
						<div class="col-lg-2">
						<label for="name">User Permissions</label>
						@foreach ($permissions as $permission)
						@if ($permission->for == 'users')
						<div class="checkbox">
						<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
						</div>
						@endif
						@endforeach
						</div>

						<div class="col-lg-2">
						<label for="name">Tags Permissions</label>
						@foreach ($permissions as $permission)
						@if ($permission->for == 'tags')
						<div class="checkbox">
						<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
						</div>
						@endif
						@endforeach
						</div>

						<div class="col-lg-2">
						<label for="name">Categories Permissions</label>
						@foreach ($permissions as $permission)
						@if ($permission->for == 'categories')
						<div class="checkbox">
						<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
						</div>
						@endif
						@endforeach
						</div>

						<div class="col-lg-2">
							<label for="name">Portfolio Permissions</label>
							@foreach ($permissions as $permission)
								@if ($permission->for == 'portfolio')
									<div class="checkbox">
										<label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
									</div>
								@endif
							@endforeach
							</div>
						</div>
					</div>
     </form>
@endsection