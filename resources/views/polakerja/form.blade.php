<table class="table table-bordered">
    
    <tr>
        <td>Pola Kerja</td>
        <td>{{Form::text('pola_kerja',null,['class'=>'form-control','placeholder'=>'Nama Pola Kerja'])}}</td>
    </tr>
    <tr>
        <td>Jam Masuk & Jam Pulang</td>
        <td> <div class="row">
                <div class="col-md-4">
                    {{Form::text('jam_masuk',null,['class'=>'form-control','placeholder'=>'Jam Masuk EX: 08:00'])}}   
                </div>
                <div class="col-md-4">
                    {{Form::text('jam_pulang',null,['class'=>'form-control','placeholder'=>'Jam Pulang EX: 10:00'])}}   
                </div>
            </div>
        </td>    
            {{Form::text('pola_kerja',null,['class'=>'form-control','placeholder'=>'Nama Pola Kerja'])}}</td>
    </tr>
    <tr>
        <td>
            <button class="btn btn-success" type="submit" aria-hidden="true" ><i class="fas fa-save"></i> Simpan</button>
             <a href="/polaKerja" class="btn btn-info" aria-hidden="true"> <i class="fas fa-sign-out-alt"></i>Kembali</a> 
        </td>
        
    </tr>
</table>