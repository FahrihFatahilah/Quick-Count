<div>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Votes</h1>
            <nav>

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
                                        <a href="" class="btn btn-primary float-end">Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div wire:poll.5s>
                                <div class="row">
                                    @foreach ($voteData as $data)
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <img
                                                src="{{ $data->candidate->image_url ?? asset('/assets/img/placeholder.webp') }}"
                                                class="card-img-top"
                                                alt="{{ $data->candidate->image_url }}"
                                                onerror="this.src='{{ asset('/assets/img/placeholder.webp') }}';"
                                            >
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $data->candidate->name ?? 'No Candidate Found' }}</h5>
                                                    <p>Total Votes: <strong>{{
                                                    Number::format($data->total_votes)  }}</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Card Title with Search and Add Button -->
                            <div class="card-title">
                                <div class="row">
                                    <!-- Search Input -->
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Search" wire:model.live.debounce.300ms="search">
                                    </div>
                                    <!-- Add New Button -->
                                    <div class="col-12 col-sm-6 text-sm-end mt-2 mt-sm-0">
                                        <a href="" class="btn btn-primary">Add New</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Polling Every 5 Seconds for Real-Time Updates -->
                            <div wire:poll.5s>
                                <!-- Make the table scrollable on small screens -->
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Candidate Number</th>
                                                <th scope="col">Candidate Name</th>
                                                <th scope="col">TPS Name</th>
                                                <th scope="col">Total Votes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Loop through the Vote List -->
                                            @foreach ($voteList as $item)
                                                <tr>
                                                    <th scope="row">{{ $item->candidate->number ?? 'No candidate found' }}</th>
                                                    <td>{{ $item->candidate->name ?? 'No candidate found' }}</td>
                                                    <td>{{ $item->tps->location_name ?? 'No TPS found' }}</td>
                                                    <td>{{ $item->vote_count }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End of Polling Table -->
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </main><!-- End #main -->
</div>
