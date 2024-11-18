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
                            <h5 class="card-title">Create List Candidate</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form wire:submit.prevent="create">
                        <!-- Input for Kelurahan Name -->
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama TPS</label>
                            <div class="col-sm-10">
                                <input type="text" wire:model="name" class="form-control" id="inputText" placeholder="Nama Tps">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Kecamatan Selection -->
                        <div class="row mb-3">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Nama Kecamatan</label>
                            <div class="col-sm-10">
                                <select id="kecamatan" wire:model="selectedKecamatan" class="form-select" wire:change="loadKelurahan">
                                    <option value="">-- Choose Kecamatan --</option>
                                    @foreach ($kecamatanList as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedKecamatan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Kelurahan Selection -->
                        <div class="row mb-3">
                            <label for="kelurahan" class="col-sm-2 col-form-label">Nama Kelurahan (Select)</label>
                            <div class="col-sm-10">
                                <select id="kelurahan" wire:model="selectedKelurahan" class="form-select" {{ empty($kelurahanList) ? 'disabled' : '' }}>
                                    <option value="">-- Choose Kelurahan --</option>
                                    @foreach ($kelurahanList as $kelurahan)
                                        <option value="{{ $kelurahan->id }}">{{ $kelurahan->name }}</option>
                                    @endforeach
                                </select>
                                @error('selectedKelurahan') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row mb-3 mt-10">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary float-end">Insert Kelurahan</button>
                            </div>
                        </div>

                    </form>
                    <!-- End General Form Elements -->

                  </div>

              </div>
            </div>

          </div>

        </div>
      </section>

    </main><!-- End #main -->
</div>
