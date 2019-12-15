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

    <form method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
    <div class="row">
                <div class="col-md-12 d-flex align-items-stretch grid-margin">
                  <div class="row flex-grow">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <h4 class="card-title">Tambah Pengajuan Schedule</h4>

                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                    <label for="level" class="col-md-4 control-label">Nama Partner</label>

                                    <div class="col-md-12">
                                    
                                    <select class="form-control" name="nama_partner" required="">
                                    <option value="">==Pilih Nama Partner==</option>
                                    @foreach($datas as $data)
                                    <option value="{{$data->nama_partner}}">{{$data->nama_partner}}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama Costumer</label>
                                <div class="col-md-12">
                                    <input id="nama_customer" type="text" class="form-control" name="nama_customer" value="{{ old('name') }}" required>
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
                                    <input id="nama_customer" type="text" class="form-control" name="alamat" value="{{ old('name') }}" required>
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
                                    <input id="name" type="date" class="form-control" name="date" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Waktu</label>
                                <div class="col-md-12">
                                    <input id="waktu" type="time" class="form-control" name="waktu" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">PIC</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="pic" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">No Hp</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="nohp" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                             <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Tipe Test</label>
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="tipetest" value="{{ old('name') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
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