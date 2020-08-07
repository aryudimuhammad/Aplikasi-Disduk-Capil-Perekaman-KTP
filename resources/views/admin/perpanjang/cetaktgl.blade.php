<div class="modal fade" id="modalcetaktgl">
    <div class="modal-dialog">
        <div class="modal-content animated fadeInUp">
            <div class="modal-header">
                <h1 class="modal-title"><b>Cetak Data Perpanjang Masa Cuti Berdasarkan Tanggal Mulai Cuti</b></h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="get" action="{{route('perpanjangtglCetak')}}" target="_blank">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="start">Dari Tanggal</label>
                        <input type="date" class="form-control" id="start" name="start" value="{{old('start')}}">
                    </div>
                    <div class="form-group">
                        <label for="end">Sampai Tanggal</label>
                        <input type="date" class="form-control" id="end" name="end" value="{{old('end')}}">
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
