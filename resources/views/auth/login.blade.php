@extends('layouts.app')

@section('content')
<div class="container min-h-screen flex">
  <div class="login">
    <div class="login__left w-50">
      <div class="login__body w-50">
        <h4 class="login__title">Log in</h4>
        <form method="POST" action="{{ route('login') }}" class="login__form">
          @csrf
          <input class="login__email" name="email" type="email" placeholder="E-mail" required />
          <input class="login__password" name="password" type="password" placeholder="Password" required/>
          <button type="submit" class="button button--green self-start">Submit</button>
        </form>
        @if($errors->any())
        <h4 class="login__error">{{$errors->first()}}</h4>
        @endif
        <div class="login__forgot">
          <a href="#">Forgot your password ?</a>
          <a href="{{ route('register') }}">Register</a>
        </div>
      </div>
    </div>
    <div class="login__right w-50 login--blue">
      <div class="login__body">
        <h1 class="login__big-text">
          Create Click <br>
          Worthy Links
        </h1>
        <div class="login__small-text">
          Build and protect your brand <br>
          using powerful and recognizable <br>
          short links.
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
