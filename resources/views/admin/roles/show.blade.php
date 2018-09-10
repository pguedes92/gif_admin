@extends('admin.layouts.master')

@section('admin-content')
     <h1>Categories <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Add New</a> </h1>
     <table id="posts-datatable" class="table table-striped table-bordered gif-datatable">
          <thead>
               <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Creatd At</th>
                    <th>Edit</th>
                    <th>Delete</th>
               </tr>
          </thead>

          <tbody>
              @foreach ($roles as $role)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $role->name }}</td>
                  <td>{{ $role->created_at }}</td>
                  <td><a href="{{ route('admin.roles.edit', $role->id) }}"><span class="far fa-edit"></span></a></td>
                  <td>
                    <form id="delete-form-{{ $role->id }}" method="post" action="{{ route('admin.roles.destroy', $role->id) }}" style="display: none">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                    </form> 
                    <a href="" onclick="
                      if(confirm('Are you sure, You Want to delete this?'))
                      {
                      event.preventDefault();
                      document.getElementById('delete-form-{{ $role->id }}').submit();
                      }
                      else{
                      event.preventDefault();
                      }" ><span class="far fa-trash-alt"></span></a>
                  </td>
                </tr>
               @endforeach
          </tbody>
     </table>
@endsection
