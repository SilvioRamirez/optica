@if (session()->has('swal_msg'))
    <script>
        notification = @json(session()->pull("swal_msg"));
        swal(notification.title, notification.message, notification.type);
       @php 
          session()->forget('swal_msg'); 
       @endphp    </script>
@endif