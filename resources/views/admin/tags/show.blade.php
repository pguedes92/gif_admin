@extends('admin.layouts.master')

@section('admin-content')
     <h1>Tags <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">Add New</a> </h1>
     <table id="posts-datatable" class="table table-striped table-bordered gif-datatable">
          <thead>
               <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Creatd At</th>
                    <th>Edit</th>
                    <th>Delete</th>
               </tr>
          </thead>

          <tbody>
              @foreach ($tags as $tag)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $tag->name }}</td>
                  <td>{{ $tag->slug }}</td>
                  <td>{{ $tag->created_at }}</td>
                    <td><a href="{{ route('admin.tags.edit', $tag->id) }}"><span class="far fa-edit"></span></a></td>
                    <td>
                      <form id="delete-form-{{ $tag->id }}" method="post" action="{{ route('admin.tags.destroy',$tag->id) }}" style="display: none">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                      </form>
                      <a href="" onclick="
                      if(confirm('Are you sure, You Want to delete this?'))
                          {
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $tag->id }}').submit();
                          }
                          else{
                            event.preventDefault();
                          }" ><span class="far fa-trash-alt"></span></a>
                    </td>
                  </tr>
                </tr>
              @endforeach
              </tbody>
     </table>
@endsection
