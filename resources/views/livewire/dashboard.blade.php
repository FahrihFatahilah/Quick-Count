<div>
    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Dashboard</h1>

      </div>

      <section class="section">
        <div class="row">
            <!-- Left Column: Pie Chart -->
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Votes Distribution</h5>
                        </div>
                        <canvas id="pieChart" style="max-height: 400px; display: block; width: 100%; height: 400px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- Right Column: Last Incoming Votes -->
            <div class="col-12 col-lg-6" >
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5>Suara Masuk Terakhir</h5>
                        </div>
                        <!-- Make the table scrollable on small screens -->
                        <div class="table-responsive">
                            <table class="table datatable datatable-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Candidate Number</th>
                                        <th scope="col">Candidate Name</th>
                                        <th scope="col">TPS Name</th>
                                        <th scope="col">Total Votes</th>
                                        <th scope="col">Jam Masuk Suara</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voteList as $item)
                                        <tr>
                                            <th scope="row">{{ $item->candidate->number ?? 'No candidate found' }}</th>
                                            <td>{{ $item->candidate->name ?? 'No candidate found' }}</td>
                                            <td>{{ $item->tps->location_name ?? 'No TPS found' }}</td>
                                            <td>{{ $item->vote_count }}</td>
                                            <td>{{ $item->created_at }}</td>
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

  <script wire:poll="refreshChart" >
    document.addEventListener("DOMContentLoaded", () => {
        // Function to update or create the chart
        function updateChart(voteData) {
            const labels = voteData.map(item => item.candidate.name);
            const data = voteData.map(item => item.total_votes);

            console.log('Updated Data:', data);

            const ctx = document.querySelector('#pieChart');

            // Check if the chart is already created
            if (window.myChart) {
                // If chart exists, update the data and re-render
                window.myChart.data.labels = labels;
                window.myChart.data.datasets[0].data = data;
                window.myChart.update();
            } else {
                // If no chart exists, create a new one
                window.myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Vote Distribution',
                            data: data,
                            backgroundColor: [
                                'rgb(255, 99, 132)',
                                'rgb(54, 162, 235)',
                                'rgb(255, 205, 86)',
                                'rgb(75, 192, 192)',
                                'rgb(153, 102, 255)',
                                'rgb(255, 159, 64)',
                            ],
                            hoverOffset: 4
                        }]
                    }
                });
            }
        }

        // Initialize the chart with the initial data
        const voteData = @json($voteData);
        updateChart(voteData);

        // Listen for chart data updates from Livewire
        Livewire.on('chartDataUpdated', (updatedData) => {
            updateChart(updatedData);
        });
    });
  </script>
