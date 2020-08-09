<div class="modal fade" id="modalcetaknama">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Cetak Pegawai Berdasarkan Nama Satuan Kerja</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="{{route('satuannamaCetak')}}" target="_blank">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Pilih Nama Satuan Kerja</label>
                        <select name="nama" id="nama" class="form-control">
                            @foreach($data as $d)
                            <option value="{{$d->id}}">{{$d->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
