  @section('js')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#table').DataTable({
        "iDisplayLength": 10
      });

    } );
  </script>
  @stop
  @extends('layouts.app')

  @section('content')
  <h2 style="text-align: center">Schedule Testing Global Delivery Order Management</h2>
    <h2 style="text-align: center">Telkom Indonesia</h2>
  <center>
  <img src="{{asset('images/telkom.png')}}" style="height: 250px; width: 250px;">
  </center>
  @endsection
