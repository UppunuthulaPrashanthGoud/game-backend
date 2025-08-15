@extends('layouts.admin')
@section('content')
<div class="container py-5">
  <div class="card shadow-sm">
    <div class="card-body">
      <h1 class="mb-4">Contact Us</h1>
      <p>We'd love to hear from you! For questions, feedback, or support, please use the form below or email us at <a href="mailto:info@prmstech.in">info@prmstech.in</a>.</p>
      <form>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Your Name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" rows="4" placeholder="Your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" disabled>Send (Demo Only)</button>
      </form>
      <p class="mt-3 text-muted">We aim to respond to all inquiries within 2 business days.</p>
    </div>
  </div>
</div>
@endsection
