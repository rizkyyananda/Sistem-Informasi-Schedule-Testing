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
      @if(Auth::user()->level == 'Admin')
      <div class="col-lg-2">
        <a href="{{ route('pengajuan.create') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Pengajuan</a>
      </div>
      @endif
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
                      Nama Partner
                    </th>
                    <th>
                      Nama Costumer
                    </th>
                    <th>
                      Tanggal
                    </th>
                    <th>
                      Waktu
                    </th>
                    <th>
                      PIC
                    </th>
                    <th>
                      No Hp
                    </th>
                    <th>
                      Teknisi
                    </th>
                    <th>
                      Status
                    </th>
                    <th>
                      Tipe Test
                    </th>
                    <th>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody>
                	 @foreach($datas as $data)
                  <tr>
                    <td>{{$data->partner}}</td>
                    <td>{{$data->nama_customer}}</td>
                    <td>{{$data->date}}</td>
                    <td>{{$data->waktu}}</td>
                    <td>{{$data->pic}}</td>
                    <td>{{$data->no_hp}}</td>
                    <td>{{$data->teknisi}}</td>
                    <td>{{$data->status}}</td>
                    <td>{{$data->tipe_test}}</td>
                    <td>
                      @if(Auth::user()->level == 'Admin')
                     <button><a href="{{route('pengajuan.edit', $data->id)}}"><i class="fa fa-edit btn btn-primary"></i></a></button>
                      <form action="{{ route('pengajuan.destroy', $data->id) }}" class="pull-left"  method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button><a onclick="return confirm('Anda yakin ingin menghapus data ini?')"> <i class="fa fa-trash btn btn-danger" ></i></button>
                        </a>
                      </form>
                      @endif
                      <button><a href="{{route('pengajuan.show', $data->id)}}" title="detail"><i class="fa fa-search-plus btn btn-success"></i></a></button>
                    </td>
                  </tr>
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