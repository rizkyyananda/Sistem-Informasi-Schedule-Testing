<ul class="nav">
  <li class="nav-item nav-profile">
    <div class="nav-link">
      <div class="user-wrapper">
        <div class="profile-image">
          @if(Auth::user()->gambar == '')

          <img src="{{asset('images/user/default.png')}}" alt="profile image">
          @else

          <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
          @endif
        </div>
        <div class="text-wrapper">
          <p class="profile-name">{{Auth::user()->name}}</p>
          <div>
            <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
            <span class="status-indicator online"></span>
          </div>
        </div>
      </div>
    </div>
  </li>
  <li class="nav-item {{ setActive(['/', 'home']) }}"> 
    <a class="nav-link" href="{{url('/')}}">
      <i class="menu-icon mdi mdi-television"></i>
      <span class="menu-title">Home</span>
    </a>
  </li>
   @if(Auth::user()->level == 'Admin')
   <li class="nav-item {{ setActive(['anggota*', 'buku*', 'user*']) }}">
    <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
      <i class="menu-icon mdi mdi-content-copy"></i>
      <span class="menu-title">Master Data</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse {{ setShow(['anggota*', 'buku*', 'user*']) }}" id="ui-basic">
      <ul class="nav flex-column sub-menu">
       <li class="nav-item">
        <a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}">Data User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ setActive(['user*']) }}" href="{{route('partner.index')}}">Data Partner</a>
      </li>
    </ul>
  </div>
</li>
@endif
<li class="nav-item">
    <a href="{{route('pengajuan.index')}}" class="nav-link ">
      <i class="menu-icon fa fa-paper-plane"></i>
      <span class="menu-title">Pengajuan Schetes</span>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('tracking.index')}}" class="nav-link ">
      <i class="menu-icon fa fa-send-o"></i>
      <span class="menu-title">Tracking Tes</span>
    </a>
</li>
</ul>