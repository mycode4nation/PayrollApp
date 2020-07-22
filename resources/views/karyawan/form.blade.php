
<table class="table table-bordered">
    <tr>
        <td>NIK</td>
        <td>
            <div class="row">
                <div class="col-md-4">
                    @if(isset($karyawan))
                    {{Form::text('nik',null,['class'=>'form-control','placeholder'=>'NIK','readOnly'=>''])}}</td>                        

                    @else 

                    {{Form::text('nik',null,['class'=>'form-control','placeholder'=>'NIK'])}}</td>                        
   
                    @endif
                </div>
            </div>
    </tr>
    <tr>
        <td>Nama Karyawan</td>
        <td>{{Form::text('nama',null,['class'=>'form-control','placeholder'=>'Nama Karyawan'])}}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td> 
          <div class="row">
            <div class="col-md-4">
                {{Form::date('tanggal_lahir',null,['class'=>'form-control','placeholder'=>'Tanggal Lahir'])}}</td>
            </div>  
          </div>           
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>
            <div class="row">
                <div class="col-md-4">
                    {{Form::select('jenis_kelamin',['L'=>'Laki-laki','P'=>'Perempuan'],null,['class'=>'form-control'])}}
                </div>
            </div>
        </td>   
    </tr>
    <tr>
        <td>Alamat</td>
        <td>{{Form::textarea('alamat',null,['class'=>'form-control','placeholder'=>'Alamat','rows'=>'2'])}}</td>
    </tr>
    <tr>
        <td>Tanggal Masuk</td>
        <td>
            <div class="row">
                <div class="col-md-4">
                    {{Form::date('tanggal_masuk',null,['class'=>'form-control','placeholder'=>'Tanggal Masuk',])}}</td>
                </div>
            </dvi>
            <td> </td>
           
    </tr>
    <tr>
        <td>Status Kawin</td>
        <td>{{Form::select('kode_status_kawin',$status_kawin,null,['class'=>'form-control'])}}</td>
    </tr>
    <tr>
    <tr>
        <td>Departemen dan Jabatan</td>
            <td>
                <div class="row">
                    <div class="col-md-5">
                        {{Form::select('kode_departemen',$departemen,null,['class'=>'form-control'])}}
                    </div>
                  
        
                    <div class="col-md-5">
                        {{Form::select('kode_jabatan',$jabatan,null,['class'=>'form-control'])}}
                    </div>
                </div>
            </td>
                
    </tr>
    <tr>
        <td>Gaji Pokok</td>
        <td>{{Form::text('gaji_pokok',null,['class'=>'form-control','id'=>'rupiah','placeholder'=>'Gaji Pokok'])}}</td>
    </tr>
        <td>Foto</td>
        <td>{{Form::file('foto')}}</td>
    </tr>
    <tr>
        <td>
            <td> 
               <div class="row">
                    <div class="col-md-5">
                        <button class="btn btn-success" type="submit" aria-hidden="true" ><i class="fas fa-save"></i> Simpan</button>
                        <a href="/karyawan" class="btn btn-info" aria-hidden="true"> <i class="fas fa-sign-out-alt"></i>Kembali</a> 
                    </div>   
               </div> 
            </td>
        </td>
    </tr>
</table>