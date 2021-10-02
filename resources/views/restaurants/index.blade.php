@extends('layouts.main')

@section('title', '一覧画面')

@section('content')
    @if (!empty($restaurants))
        <ul>
            @foreach ($restaurants as $restaurant)
                <li class="list-unstyled border mb-5 pl-3 shadow">
                    @include('partial.restaurant')
                </li>
            @endforeach
        </ul>
    @endif
@endsection
