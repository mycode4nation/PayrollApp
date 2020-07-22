<table class="table table-bordered">
    <tr>
        <td width="300">Kode Komponen</td>
        <td>
            @if (isset($komponen_gaji))
            {{Form::text('kode_komponen',null,['class'=>'form-control','placeholder'=>'Kode','readOnly'=>''])}}</td>                        

            @else
            {{Form::text('kode_komponen',null,['class'=>'form-control','placeholder'=>'Kode'])}}</td>
      
            @endif
    </tr>
    <tr>
        <td>Komponen Gaji</td>
        <td>{{Form::text('nama_komponen',null,['class'=>'form-control','placeholder'=>'Nama Komponen Gaji'])}}</td>
    </tr>
    <tr>
        <td>Jenis</td>
        <td>{{Form::select('jenis',['Tunjangan'=>'Tunjangan','Potongan'=>'Potongan'],null,['class'=>'form-control','placeholder'=>'Jenis'])}}</td>
    </tr>

    <tr>
        <td>Nominal</td>
        <td>{{Form::text('nilai',null,['class'=>'form-control','id'=>'rupiah','placeholder'=>'Nilai'])}}</td>
    </tr>
    <tr>
        <td>
            <button class="btn btn-success" type="submit" aria-hidden="true" ><i class="fas fa-save"></i> Simpan</button>
             <a href="/komponen_gaji" class="btn btn-info" aria-hidden="true"> <i class="fas fa-sign-out-alt"></i>Kembali</a> 
        </td>
        
    </tr>
</table>