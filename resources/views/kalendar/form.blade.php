<table class="table table-bordered">
    <tr>
        <td>Tanggal</td>
        <td>
           <div class="row">
                <div class="col-md-6">
                    {{Form::date('tanggal',null,['class'=>'form-control','placeholder'=>'Tanggal Lahir'])}}</td>
                </div>     
          </div> 
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>{{Form::text('keterangan',null,['class'=>'form-control','placeholder'=>'Keterangan'])}}</td>
    </tr>
    <tr>
        <td>
            <button class="btn btn-success" type="submit" aria-hidden="true" ><i class="fas fa-save"></i> Simpan</button>
             <a href="/kalendar" class="btn btn-info" aria-hidden="true"> <i class="fas fa-sign-out-alt"></i>Kembali</a> 
        </td>
        
    </tr>
</table>