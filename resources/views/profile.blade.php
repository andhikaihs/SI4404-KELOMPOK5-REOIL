@extends('templates/layout')

@section('title', 'Profile')

@section('content')
<main id="main">
    <section class="hero-section inner-page">
      <div class="wave">
        <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#F8F9FA">
              <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
            </g>
          </g>
        </svg>
      </div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <div class="row justify-content-center">
              <div class="col-md-7 text-center hero-text">
                <h1 data-aos="fade-up" data-aos-delay="">Profile</h1>
                <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Data diri anda.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card" style="border-radius: 15px;" data-aos="fade-up">
              <div class="card-body p-5">
                <form action="/profile/update/{{ $user->id }}" method="POST">
                  @csrf
                  <div class="row">
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="mb-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" disabled>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                      <label for="password_confirmation" class="form-label">Ketik Ulang Password</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="d-grid gap-1 col-6 mx-auto">
                      <button class="btn btn-primary mt-4" type="submit" name="submit">Ubah</button>
                    </div>
                </form>
                <div class="d-grid gap-1 col-6 mx-auto">
                  <button class="btn btn-danger mt-4" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete Akun</button>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                  <ul style="list-style: none;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Anda yakin untuk menghapus akun?
          semua histori dan poin akan hilang
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" onclick="window.location='/profile/delete/{{ $user->id }}'">Delete</button>
        </div>
      </div>
    </div>
  </div>
@endsection