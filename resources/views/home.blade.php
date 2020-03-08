@extends('layouts.app')

@section('content')
<nav class="navbar container">
    <ul class="navbar__menu">
      <li class="navbar__item">
        <a href="{{ url('/home') }}">Home</a>
      </li>
      <li class="navbar__item" >
        <a href="#">Contact</a>
      </li>
      <li class="navbar__item">
        <a href="#">About</a>
      </li>
    </ul>
    <div class="navbar__menu">
    <form class="navbar__item navbar--right" action="{{ route('logout') }}" method="post" class="hide">
      {{ csrf_field() }}
      <button href="#" type="submit" class="navbar__logout">Log out</button>
    </form>
    </div>
</nav>
<div class="container">
  <form class="form-pemendek" action="{{ route('pendekin') }}" method="post">
    {{ csrf_field() }}
    <input class="form-pemendek__input" name="link" id="link" placeholder="Put your link here" type="url" pattern="https?://.+" autocomplete="off" required />
    <input type="image" alt="conver" class="form-pemendek__search-svg" src="{{asset('images/convert.svg')}}" alt="">
  </form>
  <table class="table">
    <tr class="table__row">
      <!--<th class="table__head"></th>-->
      <th class="table__head">No</th>
      <th class="table__head">Shorted</th>
      <th class="table__head">Url</th>
      <th class="table__head">Visited</th>
    </tr>
    @foreach ($lists as $key => $list)
    <tr class="table__row">
        <!--<td class="table__data"><input type="checkbox" id="select" name="select" value="{{$list->id}}"></td>-->
      <td class="table__data" data-title="No">
        {{ $lists->firstItem() + $key }}
      </td>
      <td class="table__data" data-title="Code">
        <a target="_blank" href="{{ url("/link/" . $list->code)}}">{{ url("/link/" . $list->code)}}</a>
      </td>
      <td class="table__data" data-title="Url">
        {{ $list->url }}
      </td>
      <td class="table__data" data-title="Url">
        {{ $list->visited }} Times
      </td>
    </tr>
    @endforeach
  </table>
  <div class="pagination__outer">
    {{ $lists->links() }}
  </div>
</div>
@endsection
