@if($message = Session::get('success'))
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <i class="fa fa-circle-check"></i> {{ $message }}
    </div>        
@endif

@if(Session::has('info'))
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="fa fa-circle-info"></i> {{ Session::get('info')}}
		</div>
@endif