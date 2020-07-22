
<table class="table table-bordered">

    <tr>
        <td>ID Perusahaan</td>
        <td> 
            <div class="row">
                <div class="col-md-4">
                    {{Form::text('id',null,['class'=>'form-control','placeholder'=>'ID','readOnly'=>''])}}
                </div>        
            </div>        
            {{-- <div class="row">
                <div class="col-md-4">
                    @if()
                        {{Form::text('id',null,['class'=>'form-control','placeholder'=>'ID','readOnly'=>''])}}
                    @else 
                    
                    @endif
                    
                </div>
            </div> --}}
        </td>
    </tr>
    <tr>
        <td>Nama Perusahaan</td>
        <td>
            <div class="row">
                <div class="col-md-6">
                    {{Form::text('nama_perusahaan',null,['class'=>'form-control','placeholder'=>'Nama Perusahaan'])}}
                </div>   
            </div>       
        </td>
    </tr>
    <tr>
        <td>Tanggal Berdiri</td>
        <td> 
          <div class="row">
            <div class="col-md-4">
                {{Form::date('tanggal_lahir',null,['class'=>'form-control','placeholder'=>'Tanggal Berdiri'])}}</td>
            </div>  
          </div>           
    </tr>
    <tr>
        <td>No Telp</td>
        <td>
            <div class="row">
                <div class="col-md-4">
                    {{Form::text('no_telpon',null,['class'=>'form-control','placeholder'=>'Nomor Telp'])}}
                </div>    
            </div>        
        </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>
            <div class="row">
                <div class="col-md-4">
                    {{Form::email('email',null,['class'=>'form-control','placeholder'=>'Email'])}}
                </div>    
            </div>  
        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>{{Form::textarea('alamat_perusahaan',null,['class'=>'form-control','placeholder'=>'Alamat','rows'=>'2'])}}</td>
    </tr>
    <tr>
        <td>Deskripsi Perusahaan</td>
        <td>{{Form::textarea('deskripsi_perusahaan',null,['class'=>'form-control','placeholder'=>'Deskripsi Perusahaan','rows'=>'2'])}}</td>
    </tr>
    <tr>
        <td>Jenis Perusahaan</td>
        <td>
            <div class="row">
                <div class="col-md-4">
                    {{Form::select('jenis_perusahaan',[
                        'Perusahaan Ekstraktif'=>'Perusahaan Ekstraktif',
                        'Perusahaan Agraris' =>'Perusahaan Agraris',
                        'Perusahaan Dagang'=>'Perusahaan Dagang',
                        'Perusahaan Jasa'=>'Perusahaan Jasa',
                        'Perusahaan Kuliner'=>'Perusahaan Kuliner',
                        'Perusahaan Fashion'=>'Perusahaan Fashion',
                        'Perusahaan Life Style'=>'Perusahaan Life Style' 
                        ],null,['class'=>'form-control'])}}
                </div>
            </div>
        </td>   
    </tr>
    <tr>
        <td>Bentuk Perusahaan Perusahaan</td>
        <td>
            <div class="row">
                <div class="col-md-4">
                    {{Form::select('bentuk_perusahaan',[
                        'Perusahaan Perseorangan'=>'Perusahaan Perseorangan',
                        'Persekutuan Komanditer (CV)' =>'Persekutuan Komanditer (CV)',
                        'Perseroan Terbatas (PT)'=>'Perseroan Terbatas (PT)',
                        'Badan Usaha Milik Negara (BUMN)'=>'Badan Usaha Milik Negara (BUMN)',
                        'Yayasan'=>'Yayasan',
                        'Koperasi'=>'Koperasi'
                        ],null,['class'=>'form-control'])}}
                </div>
            </div>
        </td>   
    </tr>
    <tr>
        <td>Logo Perusahaan</td>   
        <td>
            @if (isset($setting->logo))
            <img src="{{asset('uploads/'.$setting->logo.'')}}" alt="" width="200">
    
            @else
            
            <img src="{{asset('uploads/default_logo.jpg')}}" alt="" width="200">
            
            @endif

        </td>               
    </tr>
    <tr>
        <td>Pilih File</td>
        <td>{{Form::file('logo')}}</td>
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

