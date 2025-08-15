@extends('layouts.admin')
@section('title','Edit Game')
@section('content')
<div class="card mb-4">
  <div class="card-header d-flex align-items-center gap-2">
    <i class="bi bi-controller fs-4 text-primary"></i>
    <span class="fw-semibold">Edit Game</span>
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('admin.games.update', $game) }}" class="row g-3" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="col-md-6">
        <label class="form-label">Title</label>
        <input class="form-control" name="title" required maxlength="150" value="{{ $game->title }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Category</label>
        <select class="form-select" name="category_id" required>
          @foreach($categories as $id => $name)
            <option value="{{ $id }}" {{ $game->category_id == $id ? 'selected' : '' }}>{{ $name }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-6">
        <label class="form-label">Game URL</label>
        <input class="form-control" name="url" type="url" required maxlength="500" value="{{ $game->url }}">
      </div>
      <div class="col-md-6">
        <label class="form-label">Icon Image (optional)</label>
        <input class="form-control" type="file" name="icon" accept="image/*">
        @if($game->icon)
          <div class="mt-2"><img src="{{ asset('storage/'.$game->icon) }}" alt="Icon" style="height:40px;"></div>
        @endif
      </div>
      <div class="col-md-3 form-check">
        <input class="form-check-input" type="checkbox" id="vpn" name="requires_vpn" value="1" {{ $game->requires_vpn ? 'checked' : '' }}>
        <label class="form-check-label" for="vpn">Requires VPN</label>
      </div>
      <div class="col-md-3 d-flex align-items-center">
        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="active" name="is_active" value="1" {{ $game->is_active ? 'checked' : '' }}>
          <label class="form-check-label" for="active">Active</label>
        </div>
      </div>
      <div class="col-12 d-flex gap-2">
        <button class="btn btn-primary" type="submit"><i class="bi bi-save"></i> Save</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.games.index') }}">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection


