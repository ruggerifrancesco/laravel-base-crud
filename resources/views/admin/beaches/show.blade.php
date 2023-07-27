@extends('layout.admin')

@section('title', 'Beach Card')

@section('admin-content')
<main>
    <div class="container">
        <div class="row">

            <div class="card text-white bg-dark p-0 mb-3">
                <div class="card-header"></div>
                <div class="row g-0">
                  <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="card-title">{{ $beach->name }}</h4>
                            <h6 class="card-subtitle">{{ $beach->city }}</h6>
                        </div>
                        <ul>
                            <li>
                                Opening: {{ $beach->opening_date }}
                            </li>
                            <li>
                                Closing: {{ $beach->closing_date }}
                            </li>
                        </ul>
                    </div>
                      <p class="card-text mt-3">
                        {{ $beach->description }}
                      </p>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <span>Umbrellas: </span>
                            {{ $beach->n_umbrellas }}
                        </li>
                        <li class="list-group-item">
                            <span>Seats: </span>
                            {{ $beach->n_seats }}
                        </li>
                        <li class="list-group-item">
                            <span>Price per Day: </span>
                            ${{ $beach->umbrellas_day_price  }}
                        </li>
                        <li class="list-group-item">
                            <span>Volley:</span>
                            {{ $beach->has_volley ? 'YES' : 'NO' }}
                        </li>
                        <li class="list-group-item">
                            <span>Football:</span>
                            {{ $beach->has_football ? 'YES' : 'NO' }}
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-footer d-flex gap-1 justify-content-center">
                    <a href="" class="btn btn-info">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <form action="" method="post">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
