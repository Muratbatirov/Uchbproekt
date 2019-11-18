@extends('layouts.app')

  @section('content')
  <div class="container">
    <div class="jumbotron">
  <h1 class="display-4">Hello, world!</h1>
  <p class="lead">Это простой пример блока с компонентом в стиле jumbotron для привлечения дополнительного внимания к содержанию или информации.</p>
  <hr class="my-4">
  <p>Использются служебные классы для типографики и расстояния содержимого в контейнере большего размера.</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Learn more</a>
  </p>
</div>
   </div>
   <nav class="navbar navbar-default">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" data-label-expanded="Close" aria-expanded="false">
    <span class="navbar-toggle-label">Menu</span>
    <span class="sr-only">(toggle)</span>

    <span class="navbar-toggle-icon">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </span>
  </button>
</nav>
@endsection