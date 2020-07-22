
@if(session('lembur')!=null)

<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon far fa-check"></i>Peringatan</h5>
    {{session('lembur')}}
</div>
    
@endif