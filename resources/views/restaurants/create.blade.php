@extends('layouts.main')

@section('title', '登録画面')

@section('content')
    <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="visually-hidden">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="name_kana" class="visually-hidden">Name Kana</label>
            <input class="form-control" type="text" name="name_kana" value="{{ old('name_kana') }}">
        </div>
        <div class="form-group">
            <label for="address" class="visually-hidden">Address</label>
            <input class="form-control" type="text" name="address" value="{{ old('address') }}">
        </div>
        <div class="form-group">
            <label for="category" class="visually-hidden">Category</label>
            <select class="form-control" name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if (old('category') == $category->id) selected  @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="opentime" class="visually-hidden">Opentime</label>
            <input class="form-control" type="text" name="opentime" value="{{ old('opentime') }}">
        </div>
        <div class="form-group">
            <label for="holiday" class="visually-hidden">Holiday</label>
            <input class="form-control" type="text" name="holiday" value="{{ old('holiday') }}">
        </div>
        <div class="form-group">
            <label for="note" class="visually-hidden">Note</label>
            <input class="form-control" type="text" name="note" value="{{ old('note') }}">
        </div>
        <div class="form-group">
            <label for="pr_short" class="visually-hidden">Pr(Short)</label>
            <input class="form-control" type="text" name="pr_short" value="{{ old('pr_short') }}">
        </div>
        <div class="form-group">
            <label for="pr_long" class="visually-hidden">Pr(Long)</label>
            <input class="form-control" type="text" name="pr_long" value="{{ old('pr_long') }}">
        </div>
        <div class="form-group">
            <label for="image" class="visually-hidden">Image</label>
            <input type="file" name="image" id="image" class="form-control" placeholder="Image"
                onchange="previewImage(this);" value="{{ old('image') }}">
            <img id="preview" style="max-width:200px;">
        </div>
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
        <div id="map" style="height: 30vh"></div>
        <input type="submit" value="登録" class="btn btn-success">
        <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">戻る</a>
    </form>
@endsection

@section('script')
    @include('partial.map')
    <script>
        const lat = document.getElementById('latitude');
        const lng = document.getElementById('longitude');
        let clicked;
        map.on('click', function(e) {
            if (clicked !== true) {
                clicked = true;
                const marker = L.marker([e.latlng['lat'], e.latlng['lng']], {
                    draggable: true
                }).addTo(map);
                lat.value = e.latlng['lat'];
                lng.value = e.latlng['lng'];
                marker.on('dragend', function(e) {
                    // 座標は、e.target.getLatLng()で取得
                    lat.value = e.target.getLatLng()['lat'];
                    lng.value = e.target.getLatLng()['lng'];
                });
            }
        });
    </script>
    <script>
        function previewImage(obj) {
            var fileReader = new FileReader();
            fileReader.onload = (function() {
                document.getElementById('preview').src = fileReader.result;
            });
            fileReader.readAsDataURL(obj.files[0]);
        }
    </script>
@endsection
