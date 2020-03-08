@extends('layouts.app')

@section('content')
<div class="container min-h-screen flex">
  <div class="register">
    <div class="register__left w-50 register--blue">
      <div class="register__body">
        <img class="register__img w-50" src="{{ asset('/images/undraw_link_shortener.svg') }}" alt="">
        <h2 class="register__text-right">Simple shortlink</h2>
      </div>
    </div>
    <div class="register__right w-50">
      <div class="register__body w-50">
        <h4 class="register__title">{{ __('Register') }}</h4>
        <form method="POST" action="{{ route('register') }}" class="register__form">
          @csrf
          <input class="register__name" name="name" type="text" value="{{ old('name') }}" placeholder="Name" required/>
          <input class="register__email" name="email" type="email" value="{{ old('email') }}" placeholder="E-mail" required />
          <input class="register__password" name="password" type="password" value="{{ old('password') }}" placeholder="Password" required/>
          <input class="register__password_confirmation" name="password_confirmation" type="password" placeholder="Password_confirmation" required />
          <button type="submit" class="button button--green self-start">Submit</button>
        </form>
        <div class="register__login">
          Already have account? <a href="{{ route('login') }}">Login here!</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
