@extends('layouts.admin')
@section('title','Edit Category')
@section('content')
<div class="card mb-4">
  <div class="card-header d-flex align-items-center gap-2">
    <i class="bi bi-tags fs-4 text-primary"></i>
    <span class="fw-semibold">Edit Category</span>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('admin.categories.update', $category) }}" class="row g-3" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input class="form-control" name="name" required maxlength="100" value="{{ $category->name }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Slug (optional)</label>
        <input class="form-control" name="slug" maxlength="120" value="{{ $category->slug }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Icon Image (optional)</label>
        <input class="form-control" type="file" name="icon" accept="image/*">
        @if($category->icon)
          <div class="mt-2"><img src="{{ asset('storage/'.$category->icon) }}" alt="Icon" style="height:40px;"></div>
        @endif
      </div>
      <div class="col-md-6 d-flex align-items-center">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="active" name="is_active" value="1" {{ $category->is_active ? 'checked' : '' }}>
          <label class="form-check-label" for="active">Active</label>
        </div>
      </div>
      <div class="col-12 d-flex gap-2">
        <button class="btn btn-primary" type="submit"><i class="bi bi-save"></i> Save</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.categories.index') }}">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection


