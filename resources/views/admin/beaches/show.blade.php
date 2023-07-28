@extends('layout.admin')

@section('title', 'Beach Card')

@section('admin-content')
<main>
    <div class="container">
        <div class="row">

            <div class="card text-white bg-dark p-0 mb-3">
                <div class="row g-0">
                  <div class="col-md-4 show-thumb-container">
                    <img src="{{ $beach->thumb }}" class="show-thumb" alt="{{ $beach->name }}">
                    <div class="card-titles">
                        <h3 class="card-title">{{ $beach->name }}</h3>
                        <h5 class="card-subtitle">{{ $beach->city }}</h5>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="card-header d-flex justify-content-end">
                        ID: {{ $beach->id }}
                    </div>
                    <div class="card-body px-5">

                        {{-- Text Related Section --}}
                        <section class="description px-5">

                            <p class="card-text my-4">
                                {{ $beach->description }}
                            </p>
                            <figure>
                                <blockquote class="blockquote">
                                  <p>A well-known quote, contained in a blockquote element.</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                  Someone famous in <cite title="Source Title">Source Title</cite>
                                </figcaption>
                            </figure>
                        </section>

                        <hr class="custom-divider">

                        <section class="show-data px-5">

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item show-item">
                                    <ul class="list-unstyled w-100">
                                        <li class="d-flex justify-content-between align-items-start">
                                            Opening Date:
                                            <span class="badge bg-info rounded-pill">
                                                {{ $beach->opening_date }}
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-start">
                                            Closing Date:
                                            <span class="badge bg-info rounded-pill">
                                                {{ $beach->closing_date }}
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="list-group-item show-item">
                                    <ul class="list-unstyled w-100">
                                        <li class="d-flex justify-content-between align-items-start">
                                            Umbrellas:
                                            <span class="badge bg-info rounded-pill">
                                                {{ $beach->n_umbrellas }}
                                            </span>
                                        </li>
                                        <li class="d-flex justify-content-between align-items-start">
                                            Seats:
                                            <span class="badge bg-info rounded-pill">
                                                {{ $beach->n_seats }}
                                            </span>
                                        </li>
                                    </ul>
                                </li>
                                <li class="list-group-item show-item">
                                    Price:
                                    <span class="badge bg-warning rounded-pill">
                                        ${{ $beach->umbrellas_day_price  }}
                                    </span>
                                </li>
                                <li class="list-group-item show-item">
                                    Volley:
                                    @if ($beach->has_volley)
                                    <span class="badge rounded-pill bg-success text-white">YES</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger text-white">NO</span>
                                    @endif
                                </li>
                                <li class="list-group-item show-item">
                                    Football:
                                    @if ($beach->has_football)
                                    <span class="badge rounded-pill bg-success text-white">YES</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger text-white">NO</span>
                                    @endif
                                </li>
                            </ul>
                        </section>

                    </div>
                  </div>
                </div>
                <div class="card-footer d-flex gap-1 justify-content-end">
                    <a href="{{ route('admin.beaches.edit', $beach->id) }}" class="btn btn-info">
                        <i class="fa-solid fa-pen"></i>
                    </a>
                    <form action="{{ route('admin.beaches.destroy', $beach->id) }}" method="post" class="form-delete">
                    @csrf
                    @method('DELETE')
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

@section('custom-script-tail')
<script>
    const deleteForm = document.querySelectorAll('form.form-delete');
        deleteForm.forEach(formElement => {
            formElement.addEventListener('submit', function(event) {
                event.preventDefault();
                const userConfirm = window.confirm('Are you sure you want to delete this beach?');
                if(userConfirm){
                    this.submit();
                }
            })
        });
</script>
@endsection
