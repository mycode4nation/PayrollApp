<table class="table table-bordered">
    <tr>
        <td>Nama Karyawan</td>
        <td>{{Form::text('nama',null,['list'=>'karyawan','class'=>'form-control','placeholder'=>'Nama Karyawan'])}}</td>
    </tr>
    <tr>
        <td>Tanggal Hadir</td>
        <td> 
            <div class="row">
                <div class="col-md-6">
                    {{Form::date('tanggal_masuk',null,['class'=>'form-control','placeholder'=>'Tanggal Masuk'])}}
                </div>
                <div class="col-md-4">
                    {{Form::text('jam_masuk',null,['class'=>'form-control','placeholder'=>"ex 08:00"])}}
                </div>
            </div> 
        </td>
    </tr>
    <tr>
        <td>Tanggal Pulang</td>
        <td> 
            <div class="row">
                <div class="col-md-6">
                    {{Form::date('tanggal_pulang',null,['class'=>'form-control','placeholder'=>'Tanggal Pulang'])}}
                </div>
                <div class="col-md-4">
                    {{Form::text('jam_pulang',null,['class'=>'form-control','placeholder'=>"ex 08:00"])}}
                </div>
            </div> 
        </td>
    </tr>
    <tr>
        <td>Status Kehadiran</td>
        <td>{{Form::select('kode_status_kehadiran',$statuskehadiran,null,['class'=>'form-control','placeholder'=>'-'])}}</td>
    </tr>
    <tr>
        <td>
            <button class="btn btn-success" type="submit" aria-hidden="true" ><i class="fas fa-save"></i> Simpan</button>
             <a href="/kehadiran" class="btn btn-info" aria-hidden="true"> <i class="fas fa-sign-out-alt"></i>Kembali</a> 
        </td>
        
    </tr>
</table>

<datalist id="karyawan">
    @foreach ($nama_karyawan as $r)
        <option value="{{$r->nama}}">
    @endforeach
    
</datalist>