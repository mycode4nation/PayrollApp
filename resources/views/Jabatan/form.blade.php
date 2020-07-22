<table class="table table-bordered">
    <tr>
        <td>Kode Jabatan</td>
        <td>{{Form::text('kode_jabatan',null,['class'=>'form-control','placeholder'=>'Kode Jabatan'])}}</td>
    </tr>
    <tr>
        <td>Nama Jabatan</td>
        <td>{{Form::text('nama_jabatan',null,['class'=>'form-control','placeholder'=>'Nama Jabatan'])}}</td>
    </tr>
    <tr>
        <td>Tunjangan Jabatan</td>
        <td>{{Form::text('tunjangan_jabatan',null,['class'=>'form-control','id'=>'rupiah','placeholder'=>'Tunjangan Jabatan'])}}</td>
    </tr>
    <tr>
        <td>
            <button class="btn btn-success" type="submit" aria-hidden="true" ><i class="fas fa-save"></i> Simpan</button>
             <a href="/jabatan" class="btn btn-info" aria-hidden="true"> <i class="fas fa-sign-out-alt"></i>Kembali</a> 
        </td>
        
    </tr>
</table>