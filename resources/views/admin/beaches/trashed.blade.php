@extends('layout.admin')

@section('title', 'Beaches Admin List')

@section('admin-content')
<div class="container">
    <div class="row">
        <table class="table table-dark table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">N. Umbrellas</th>
                    <th scope="col">N. Seats</th>
                    <th scope="col">Day Price</th>
                    <th scope="col">Opening Date</th>
                    <th scope="col">Closing Date</th>
                    <th scope="col" class="text-center">Volley</th>
                    <th scope="col" class="text-center">Football</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($beaches as $beach)
                <tr>
                    <th scope="row" class="text-center">{{ $beach->id }}</th>
                    <td>{{ $beach->name }}</td>
                    <td>{{ $beach->city }}</td>
                    <td>{{ $beach->n_umbrellas }}</td>
                    <td>{{ $beach->n_seats }}</td>
                    <td>${{ $beach->umbrellas_day_price }}</td>
                    <td>{{ $beach->opening_date }}</td>
                    <td>{{ $beach->closing_date }}</td>
                    <td class="text-center">
                        @if ($beach->has_volley)
                        <span class="badge rounded-pill bg-success text-white">YES</span>
                        @else
                        <span class="badge rounded-pill bg-danger text-white">NO</span>
                        @endif
                    </td>
                    <td>
                        @if ($beach->has_football)
                        <span class="badge rounded-pill bg-success text-white">YES</span>
                        @else
                        <span class="badge rounded-pill bg-danger text-white">NO</span>
                        @endif
                    </td>
                    <td class="d-flex gap-1 justify-content-center">
                        <form action="{{ route('admin.beaches.restore', $beach->id) }}" method="post" class="form-restore">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">
                                <i class="fa-solid fa-arrow-rotate-right"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        {!! $beaches->links('admin.partials.pagination') !!}
    </div>
</div>
@endsection

@section('custom-script-tail')
<script>
    const restoreForm = document.querySelectorAll('form.form-restore');
        restoreForm.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                const userConfirm = window.confirm('Are you sure you want to restore this beach?');
                if(userConfirm){
                    this.submit();
                }
            })
        });
</script>
@endsection


