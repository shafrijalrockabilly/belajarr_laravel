<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
          </button>
        <table class="table table-dark table-striped mt-4">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($siswa as $data)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->id_kelas}}</td>
                <td>{{ $data->jk }}</td>
                <td>{{ $data->alamat }}</td>
                <td>
                    <a href="#" data-bs-target="#formModalEdit{{ $data->id }}" data-bs-toggle="modal" class="btn btn-warning">Edit</a>
                    <a href="#" data-bs-target="#formModalHapus{{ $data->id }}" data-bs-toggle="modal" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>

{{-- Modal Tambah Data --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="tambah-siswa" method="POST">
                @csrf
                <div class="mb-4">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" id="nama" aria-describedby="">
                </div>
                <div class="mb-4">
                    <select for="id_kelas" class="form-select" name="id_kelas" aria-label="Default select example">
                        <option selected>Kelas</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select for="jk" class="form-select" name="jk">
                      <option selected>Pilih Jenis Kelamin</option>
                      <option value="L" >Laki - laki</option>
                      <option value="P" >Perempuan</option>
                    </select>
                  </div>
                <div class="mb-4">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="Alamat" id=""></textarea>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="sumbit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  {{-- Edn Modal Data --}}

  {{--Modal Edit Data--}}
  @foreach ( $siswa as $item )
  <div class="modal fade" id="formModalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="edit-siswa" method="POST">
                  @csrf
                  <input type="hidden" class="form-control" id="id" name="id" value="{{ $item->id }}">
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{ $item->nama }}">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Kelas</label>
                    <select for="id_kelas" class="form-select" name="id_kelas">
                      <option selected>Pilih Kelas</option>
                      <option value="10" {{ $item->id_kelas == 1 ? 'selected' : ''}}>10</option>
                      <option value="11" {{ $item->id_kelas == 2 ? 'selected' : ''}}>11</option>
                      <option value="12" {{ $item->id_kelas == 3 ? 'selected' : ''}}>12</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select for="jk" class="form-select" name="jk">
                      <option selected>Pilih Jenis Kelamin</option>
                      <option value="L" {{ $item->jk == 'L' ? 'selected' : ''}}>Laki - laki</option>
                      <option value="P" {{ $item->jk == 'P' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat">{{ $item->alamat }}</textarea>
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  {{-- End Modal Edit--}}

  {{-- Modal Hapus--}}
  @foreach ( $siswa as $item )
  <div class="modal fade" id="formModalHapus{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus Data</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="hapus-siswa" method="POST">
                  @csrf
                  <input type="hidden" class="form-control" id="id" name="id" value="{{ $item->id }}">
              <p>Yakin hapus {{ $item->nama }}?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Hapus</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  @endforeach
  {{-- End Modal Hapus--}}
  <figcaption align="center" class="blockquote-footer mt-4">
    Made by Someone Handsome in <cite title="Source Title">Cirebon</cite>
  </figcaption>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
