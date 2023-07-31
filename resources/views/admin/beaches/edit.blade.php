@extends('layout.admin')

@section('title', 'Beaches Edit List')

@section('admin-content')
<div class="container">
    <div class="row">
        <div class="container text-white">

            @if($errors->any())
                <div class="alert alert-warning" role="alert">
                    <ul class="m-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif              

            <form action="{{ route('admin.beaches.update', $beach->id) }}" method="POST" id="editBeachForm">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Name
                            </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $beach->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">
                                City
                            </label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ old('city', $beach->city) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="n_umbrellas" class="form-label">
                                Umbrellas
                            </label>
                            <input type="number" class="form-control" id="n_umbrellas" name="n_umbrellas"
                                value="{{ old('n_umbrellas', $beach->n_umbrellas) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="n_seats" class="form-label">
                                Seats
                            </label>
                            <input type="number" class="form-control" id="n_seats" name="n_seats"
                                value="{{ old('n_seats', $beach->n_seats) }}" required>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="mb-3">
                            <label for="thumb" class="form-label">
                                Image url
                            </label>
                            <input type="text" class="form-control" id="thumb" name="thumb"
                            value="{{ old('thumb', $beach->thumb) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="umbrellas_day_price " class="form-label">
                                Price
                            </label>
                            <input type="text" class="form-control" id="umbrellas_day_price" name="umbrellas_day_price"
                                value="{{ old('umbrellas_day_price', $beach->umbrellas_day_price) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="opening_date" class="form-label">
                                Opening Date
                            </label>
                            <input type="date" class="form-control" id="opening_date" name="opening_date"
                                value="{{ old('opening_date', $beach->opening_date) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="closing_date" class="form-label">
                                Closing Date
                            </label>
                            <input type="date" class="form-control" id="closing_date" name="closing_date"
                                value="{{ old('closing_date', $beach->closing_date) }}" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex gap-4">
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="has_volley">Volley</label>
                        <input class="form-check-input" type="checkbox" role="switch" id="has_volley" name="has_volley"
                            value="0" {{ old('has_volley', $beach->has_volley) ? 'checked' : '' }}>
                    </div>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="has_football">Football</label>
                        <input class="form-check-input" type="checkbox" role="switch" id="has_football" name="has_football"
                            value="0" {{ old('has_football', $beach->has_football) ? 'checked' : '' }}>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>
                    <textarea class="form-control" name="description" id="description" rows="10" required>{{ old('description', $beach->description) }}</textarea>
                </div>


                <button type="submit" class="btn btn-success">
                    Edit beach
                </button>

            </form>
        </div>
    </div>
</div>
@endsection
