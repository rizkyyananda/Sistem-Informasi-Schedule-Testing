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
    <div class="row">
      <div class="col-lg-12">
        @if (Session::has('message'))
        <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
        @endif
      </div>
    </div>
    <div class="row" style="margin-top: 20px;">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <h4 class="card-title">Data Pengajuan</h4>
            
            <div class="table-responsive">
              <table id="table" class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Nama Costumer
                    </th>
                    <th>
                      Partner
                    </th>
                    <th>
                      Teknisi
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                	 @foreach($datas as $data)
                	 @if($data->status =='Approved')
                  <tr>
                    <td>{{$data->nama_customer}}</td>
                    <td>{{$data->partner}}</td>
                    <td>{{$data->teknisi}}</td>
                    <td>{{$data->status}}</td>
                    <td>
                      <button><a href="{{route('tracking.show', $data->id)}}" title="detail"><i class="fa fa-search-plus btn btn-success"></i></a></button>

                    </td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- {!! $datas->links() !!} --}}
          </div>
        </div>
      </div>
    </div>
    @endsection