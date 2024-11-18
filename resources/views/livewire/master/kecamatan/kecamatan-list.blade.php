<div>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Votes</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Hotels</a></li>
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
                                        {{-- <input type="text" class="form-control" placeholder="Search" wire:model.live.debounce.300ms="search"> --}}
                                    </div>
                                    <div class="col-6">
                                        <a wire:navigate href="/kecamatan/create" class="btn btn-primary float-end">Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div wire:poll.10s>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Kecamatan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kecamatanList as $item)
                                            <tr>
                                                <td>{{ $item->name ?? 'No candidate found' }}</td>
                                                <td>
                                                    <a wire:navigate href="/kecamatan/{{ $item->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                                    <button
                                                        wire:click="delete({{$item->id}})"
                                                        wire:confirm="Apakah ingin mengapus data candidate?"
                                                        href="#" class="btn btn-sm btn-danger">Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
</div>
