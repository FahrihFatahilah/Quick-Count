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
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                              <input type="text"  wire:model="name"  class="form-control">
                              @error('name')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                              <input type="text"  wire:model="username"  class="form-control">
                              @error('username')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email"  wire:model="email"  class="form-control">
                              @error('email')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password"  wire:model="password"  class="form-control">
                              @error('password')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Pilih Hak Akses</label>
                            <div class="col-sm-10">
                                <select id="role" wire:model="role" class="form-select">
                                    <option value="">-- Pilih Akses --</option>
                                        <option value="{{ $roleList->id }}">{{ $roleList->name}}</option>
                                </select>
                                @error('role')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="kecamatan" class="col-sm-2 col-form-label">Pilih Tps</label>
                            <div class="col-sm-10">
                                <select id="tps" wire:model="tps" class="form-select">
                                    <option value="">-- Pilih Tps --</option>
                                    @foreach ($tpsList as $item)
                                        <option value="{{ $item->id }}">{{ $item->location_name . ' Desa ' . $item->kelurahan->name }}</option>
                                    @endforeach
                                </select>
                                @error('tps')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

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
