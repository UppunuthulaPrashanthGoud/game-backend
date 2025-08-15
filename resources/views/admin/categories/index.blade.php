@extends('layouts.admin')
@section('title','Categories')
@section('content')
<div class="card mb-4">
  <div class="card-header d-flex align-items-center gap-2">
    <i class="bi bi-tags fs-4 text-primary"></i>
    <span class="fw-semibold">Categories</span>
    <a class="btn btn-primary ms-auto" href="{{ route('admin.categories.create') }}"><i class="bi bi-plus-lg"></i> New Category</a>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0 align-middle">
        <thead class="table-light sticky-top">
          <tr><th>Name</th><th>Slug</th><th>Active</th><th class="text-end">Actions</th></tr>
        </thead>
        <tbody>
        @foreach($categories as $c)
          <tr>
            <td>{{ $c->name }}</td>
            <td>{{ $c->slug }}</td>
            <td>
              <span class="badge {{ $c->is_active ? 'bg-success' : 'bg-secondary' }}">{{ $c->is_active ? 'Active' : 'Inactive' }}</span>
            </td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.categories.edit', $c) }}" title="Edit"><i class="bi bi-pencil"></i></a>
              <form class="d-inline" action="{{ route('admin.categories.destroy', $c) }}" method="post" onsubmit="return confirm('Delete this category?');">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="mt-3">{{ $categories->links() }}</div>
@endsection


