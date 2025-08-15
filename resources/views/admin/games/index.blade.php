@extends('layouts.admin')
@section('title','Games')
@section('content')
<div class="card mb-4">
  <div class="card-header d-flex align-items-center gap-2">
    <i class="bi bi-controller fs-4 text-primary"></i>
    <span class="fw-semibold">Games</span>
    <a class="btn btn-primary ms-auto" href="{{ route('admin.games.create') }}"><i class="bi bi-plus-lg"></i> New Game</a>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-striped mb-0 align-middle">
        <thead class="table-light sticky-top">
          <tr>
            <th>Icon</th>
            <th>Title</th>
            <th>Category</th>
            <th>URL</th>
            <th>VPN</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($games as $g)
          <tr>
            <td>@if($g->icon)<img src="{{ asset('storage/'.$g->icon) }}" alt="Icon" style="height:32px;">@endif</td>
            <td>{{ $g->title }}</td>
            <td>
              @if($g->category && $g->category->icon)
                <img src="{{ asset('storage/'.$g->category->icon) }}" alt="Cat" style="height:20px;vertical-align:middle;"> 
              @endif
              {{ $g->category?->name }}
            </td>
            <td><a href="{{ $g->url }}" target="_blank">Link</a></td>
            <td>{!! $g->requires_vpn ? '<span class="badge bg-warning text-dark">VPN</span>' : '<span class="badge bg-success">No</span>' !!}</td>
            <td>
              <form method="post" action="{{ route('admin.games.toggle', $g) }}">
                @csrf
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="is_active" value="1" onchange="this.form.submit()" {{ $g->is_active ? 'checked' : '' }}>
                </div>
              </form>
            </td>
            <td class="text-end">
              <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.games.edit', $g) }}" title="Edit"><i class="bi bi-pencil"></i></a>
              <form class="d-inline" action="{{ route('admin.games.destroy', $g) }}" method="post" onsubmit="return confirm('Delete this game?');">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" type="submit" title="Delete"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="mt-3">{{ $games->links() }}</div>
@endsection


