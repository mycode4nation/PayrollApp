
@if(session('message')!=null)

<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="far fa-check-circle"></i></i> Sukses</h5>
    {{session('message')}}
</div>
    
@endif