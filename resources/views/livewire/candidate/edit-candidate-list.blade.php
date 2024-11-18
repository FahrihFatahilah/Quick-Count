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
                        <h5 class="card-title">Create List Candidate</h5>
                    </div>
                    <div class="col-6">
                    </div>
                </div>
                </div>
                <div class="card-body">

                    <form wire:submit.prevent='update'>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Candidate</label>
                        <div class="col-sm-10">
                          <input wire:model="name" type="text" class="form-control">
                          @error('name')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomor Urut Candidate</label>
                        <div class="col-sm-10">
                          <input wire:model="number" type="text" class="form-control">
                          @error('number')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                     <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                        <div class="col-sm-10">
                          <input wire:model="photo" class="form-control" type="file" id="formFile">
                        </div>
                      </div>
                      <div class="row mb-3 mt-10">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-primary float-end">Update Candidate</button>
                        </div>
                      </div>

                    </form><!-- End General Form Elements -->

                  </div>

              </div>
            </div>

          </div>


        </div>
      </section>

    </main><!-- End #main -->
  </div>
