@extends('layout.admin')

@section('title', 'Beaches Admin List')

@section('admin-content')
<div class="container">
    <div class="row">
        <table class="table table-dark table-hover table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">City</th>
                <th scope="col">N. Umbrellas</th>
                <th scope="col">N. Seats</th>
                <th scope="col">Day Price</th>
                <th scope="col">Opening Date</th>
                <th scope="col">Closing Date</th>
                <th scope="col">Volley</th>
                <th scope="col">Football</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($beaches as $beach)
                    <tr>
                        <th scope="row">{{ $beach->id }}</th>
                        <td>{{ $beach->name }}</td>
                        <td>{{ $beach->city }}</td>
                        <td>{{ $beach->n_umbrellas }}</td>
                        <td>{{ $beach->n_seats }}</td>
                        <td>${{ $beach->umbrellas_day_price }}</td>
                        <td>{{ $beach->opening_date }}</td>
                        <td>{{ $beach->closing_date }}</td>
                        <td>{{ $beach->has_volley }}</td>
                        <td>{{ $beach->has_football }}</td>
                        <td class="d-flex gap-1">
                            <a href="" class="btn btn-warning">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="" class="btn btn-info">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            <form action="" method="post">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>

    <div class="row">
        {!! $beaches->links() !!}
    </div>
</div>
@endsection
