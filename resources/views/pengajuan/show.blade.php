        @section('js')
            <script type="text/javascript">
                function readURL() {
                    var input = this;
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $(input).prev().attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $(function () {
                    $(".uploads").change(readURL)
                    $("#f").submit(function(){
                        // do ajax submit or just classic form submit
                      //  alert("fake subminting")
                        return false
                    })
                })

            </script>
        @stop

        @extends('layouts.app')

        @section('content')


            {{ csrf_field() }}
            {{ method_field('put') }}
      <div class="row">
          <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                  <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Detail Schetes</h4>
              							  <table class="col-md-12"> 
              							  <tr>
              							    <td width="150px;">Nama Customer</td>
              							     <td>:</td>
              							    <td>{{ $data->nama_customer}}</td>
              							  </tr>
              							  <tr>
              							    <td>Alamat</td>
              							    <td>:</td>
              							    <td>{{ $data->alamat }}</td>
              							  </tr>
              							  <tr>
              							    <td>Date</td>
              							    <td>:</td>
              							    <td>{{ $data->date }}</td>
              							  </tr>
              							  <tr>
              							    <td>Waktu</td>
              							    <td>:</td>
              							    <td>{{ $data->waktu }}</td>
              							  </tr>
              							  <tr>
              							    <td>PIC</td>
              							    <td>:</td>
              							    <td>{{ $data->pic }}</td>
              							  </tr>
                              <tr>
                                <td>Partner</td>
                                <td>:</td>
                                <td>{{ $data->partner }}</td>
                              </tr>
                              <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td>{{ $data->no_hp }}</td>
                              </tr>
                               <tr>
                                <td>Teknisi</td>
                                <td>:</td>
                                <td>{{ $data->teknisi }}</td>
                              </tr>
                              <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>{{ $data->status }}</td>
                              </tr>
                              <tr>
                                <td>Gambar</td>
                                <td>:</td>
                                <td>
                                  <a href="{{asset('images/user/'.$data->gambar) }}">{{$data->gambar}}</a></td>
                              </tr>
                            </table>
                            @if($data->status != 'Approved')
                              <form method="post" action="{{ route('pengajuan.update', $data->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                              <input id="nama_customer" type="hidden" class="form-control" name="nama_customer" value="{{ $data->nama_customer }}" required>
                              <input id="partner" type="hidden" class="form-control" name="nama_partner" value="{{ $data->partner }}" required>
                              <input id="nama_customer" type="hidden" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                              <input id="date" type="hidden" class="form-control" name="date" value="{{$data->date}}"required>
                              <input id="waktu" type="hidden" class="form-control" name="waktu" value="{{$data->waktu}}" required>
                              <input id="pic" type="hidden" class="form-control" name="pic" value="{{$data->pic }}" required>
                              <input id="no_hp" type="hidden" class="form-control" name="no_hp" value="{{ $data->no_hp }}" required>
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <br>
                              <div class="form-group">
                                <label for="email" class="col-md-12 control-label" style="font-size: 14px;">Teknisi</label>
                                <div class="col-md-12">
                                    <input id="teknisi" type="text" class="form-control" name="teknisi" value="{{ $data->teknisi }}" required>
                                </div>
                            </div>
                            
                                <button type="submit" class="btn btn-primary" id="submit">
                                  Tambah
                                </button>
                          </form>
                                @endif
                              <form method="post" action="{{ route('pengajuan.update', $data->id) }}" enctype="multipart/form-data">

                          @if($data->status == 'Approved' && $data->gambar == null)
                                {{ csrf_field() }}
                                {{ method_field('put') }}
                              <input id="nama_customer" type="hidden" class="form-control" name="nama_customer" value="{{ $data->nama_customer }}" required>
                              <input id="partner" type="hidden" class="form-control" name="nama_partner" value="{{ $data->partner }}" required>
                              <input id="nama_customer" type="hidden" class="form-control" name="alamat" value="{{ $data->alamat }}" required>
                              <input id="date" type="hidden" class="form-control" name="date" value="{{$data->date}}"required>
                              <input id="waktu" type="hidden" class="form-control" name="waktu" value="{{$data->waktu}}" required>
                              <input id="pic" type="hidden" class="form-control" name="pic" value="{{$data->pic }}" required>
                              <input id="no_hp" type="hidden" class="form-control" name="no_hp" value="{{ $data->no_hp }}" required>
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <input id="teknisi" type="hidden" class="form-control" name="teknisi" value="{{ $data->teknisi }}" required>
                            
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <br>
                              <div class="form-group">
                                <label for="email" class="col-md-12 control-label" style="font-size: 14px;">Evidence</label>
                                <div class="col-md-12">
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary" id="submit">
                                            Tambah
                                </button>
                                
                                @endif
                          </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endsection