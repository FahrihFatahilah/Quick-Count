<div>

    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Votes</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a  write:navigate href="/dashboard">Hotels</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Blank</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <div class="card-title">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="Search" wire:model.live.debounce.300ms="search">
                    </div>
                    <div class="col-6">
                        <a wire:navigate href="/candidate/create" class="btn btn-primary float-end">Add Candidate List</a>
                    </div>
                </div>
                </div>
                <div class="row">
                    @foreach ($candidateList as $item)
                    <div class="col-xxl-4 col-md-4">
                        <div class="card card d-flex justify-content-center align-items-center">
                            <img
                            src="{{ $item->photo ? 'data:image/jpeg;base64,' . $item->photo : asset('/assets/img/placeholder.webp') }}"
                            class="card-img-top"
                            alt="{{ $item->name }}"
                            style="width: 320px; height: 320px; object-fit: contain;"
                            onerror="this.src='{{ asset('/assets/img/placeholder.webp') }}';"
                        />
                            <div class="card-body">
                                <h5 class="card-title d-flex align-items-center justify-content-center" >{{ $item->name }}</h5>
                                <p class="d-flex align-items-center justify-content-center">Nomor Urut: {{ $item->number }}</p>

                            </div>
                            <div class="card-body">
                                <button
                                    wire:click="delete({{$item->id}})"
                                    wire:confirm="Apakah ingin mengapus data candidate?"
                                    href="#" class="btn btn-sm btn-danger float-start float-end">Delete
                                </button>
                                <a wire:navigate href="/candidate/{{ $item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


                {{-- <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Candidate Number</th>
                        <th scope="col">Candidate Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidateList as $item)
                        <tr>
                            <th scope="row">{{ $item->number ?? 'No candidate found' }}</th>
                            <td>{{ $item->name ?? 'No candidate found' }}</td>
                            <td>{{ $item->photo ?? 'Photo not found' }}</td>
                            <td>
                                <a wire:navigate href="/candidate/{{ $item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <button
                                    wire:click="delete({{$item->id}})"
                                    wire:confirm="Apakah ingin mengapus data candidate?"
                                    href="#" class="btn btn-sm btn-danger">Delete
                                </button>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>

                  </table> --}}

              </div>
            </div>

          </div>


        </div>
      </section>

    </main><!-- End #main -->
  </div>
