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
        </script>
        @stop

        @extends('layouts.app')

        @section('content')

        <form method="post" action="{{ route('pengajuan.update', $data->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
        <div class="row">
                    <div class="col-md-12 d-flex align-items-stretch grid-margin">
                      <div class="row flex-grow">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Edit Pengajuan</h4>
                             <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Nama Partner</label>

                                    <div class="col-md-12">
                                    
                                    <select class="form-control" name="nama_partner" required="">
                                    @foreach($datas as $dataa)
                                    <option value="{{$dataa->nama_partner}}">{{$dataa->nama_partner}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Nama Costumer</label>
                                    <div class="col-md-12">
                                        <input id="nama_customer" type="text" class="form-control" name="nama_customer" value="{{ $dataa->nama_customer }}" required>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Alamat</label>
                                    <div class="col-md-12">
                                        <input id="nama_customer" type="text" class="form-control" name="alamat" value="{{ $dataa->alamat }}" required>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Date</label>
                                    <div class="col-md-12">
                                        <input id="date" type="date" class="form-control" name="date" value="{{$data->date}}"required>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Waktu</label>
                                    <div class="col-md-12">
                                        <input id="waktu" type="time" class="form-control" name="waktu" value="{{$data->waktu}}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">PIC</label>
                                    <div class="col-md-12">
                                        <input id="pic" type="text" class="form-control" name="pic" value="{{$data->pic }}" required>
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">No Hp</label>
                                    <div class="col-md-12">
                                        <input id="no_hp" type="number" class="form-control" name="no_hp" value="{{ $data->no_hp }}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submit">
                                            Tambah
                                </button>
                                <button type="reset" class="btn btn-danger">
                                            Reset
                                </button>
                                <a href="{{route('pengajuan.index')}}" class="btn btn-light pull-right">Back</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

        </div>
        </form>
        @endsection