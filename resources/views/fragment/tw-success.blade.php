@if($message = Session::get('success'))
    {{-- <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <i class="fa fa-circle-check"></i> {{ $message }}
    </div> --}}

    <div id="alert-additional-content-3" class="tw-p-4 tw-mb-4 tw-text-green-800 tw-border tw-border-green-300 tw-rounded-lg tw-bg-green-50" role="alert">
        <div class="tw-flex tw-items-center">
          <i class="fa fa-circle-check tw-text-green-800 tw-text-2xl"></i>
          <span class="tw-sr-only">Muy bien!</span>
          <h3 class="tw-text-lg tw-font-bold tw-text-green-800">{{ $message }}</h3>
        </div>
      </div>
@endif

@if(Session::has('info'))
		<div class="alert alert-info">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<i class="fa fa-circle-info"></i> {{ Session::get('info')}}
		</div>
@endif