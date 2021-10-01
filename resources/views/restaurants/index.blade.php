@extends('layouts.main')

@section('title', '一覧画面')

@section('content')
    @if (!empty($restaurants))
        <ul>
            @foreach ($restaurants as $restaurant)
                <li class="list-unstyled border mb-5 pl-3 shadow">
                    <a href="{{ route('restaurants.show', $restaurant) }}">{{ $restaurant->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
