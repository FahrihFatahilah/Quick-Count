<div>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Votes</h1>

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
                                        <a wire:navigate href="/user/create" class="btn btn-primary float-end">Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div wire:poll.10s>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Hak Akses</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userList as $item)
                                        <tr>
                                            <td>{{ $item->username ?? 'No location found' }}</td>
                                            <td>{{ $item->email ?? 'No kecamatan found' }}</td>
                                            <td>{{ $item->role->name ?? 'No kelurahan found' }}</td>
                                            <td>
                                                <a wire:navigate href="/tps/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                                <button
                                                    wire:click="delete({{ $item->id }})"
                                                    wire:confirm="Apakah ingin menghapus data?"
                                                    class="btn btn-sm btn-danger">Delete
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
