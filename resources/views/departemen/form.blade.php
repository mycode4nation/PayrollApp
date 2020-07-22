<table class="table table-bordered">
    <tr>
        <td>Kode Departemen</td>
        <td>{{Form::text('kode_departemen',null,['class'=>'form-control','placeholder'=>'Kode Departemen'])}}</td>
    </tr>
    <tr>
        <td>Nama Departemen</td>
        <td>{{Form::text('nama_departemen',null,['class'=>'form-control','placeholder'=>'Nama Departemen'])}}</td>
    </tr>
    <tr>
        <td>
            <button class="btn btn-success" type="submit" aria-hidden="true" ><i class="fas fa-save"></i> Simpan</button>
             <a href="/departemen" class="btn btn-info" aria-hidden="true"> <i class="fas fa-sign-out-alt"></i>Kembali</a> 
        </td>
        
    </tr>
</table>