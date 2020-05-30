@extends('layouts.master')
@section('title','Profile')
@section('menu')
<ul class="app-menu">
  @foreach($settingall as $row)
  @if(auth()->user()->level_id == '1')
  <li><a class="app-menu__item " href="{{url('/home')}}"><i class="app-menu__icon {{$row->dashboard}}"></i><span class="app-menu__label">Dashboard</span></a></li>
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->category}}"></i><span class="app-menu__label">Category</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{url('add-category')}}"><i class="icon fa fa-circle-o"></i> Add Category</a></li>
      <li><a class="treeview-item" href="{{url('all-category')}}"><i class="icon fa fa-circle-o"></i> All Category</a></li>
    </ul>
  </li>
  @endif
  @if(auth()->user()->level_id == '1')
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->ticket}}"></i><span class="app-menu__label">Ticket</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{url('add-ticket')}}"><i class="icon fa fa-circle-o"></i> Add Ticket</a></li>
      <li><a class="treeview-item" href="{{url('all-ticket')}}"><i class="icon fa fa-circle-o"></i> All Ticket</a></li>
    </ul>
  </li>
  @endif
  @if(auth()->user()->level_id == '2' || auth()->user()->level_id == '1')
  <li><a class="app-menu__item" href="{{url('/transaction')}}"><i class="app-menu__icon {{$row->transaction}}"></i><span class="app-menu__label">Transaction</span></a></li>
  @endif
  @if(auth()->user()->level_id == '3' || auth()->user()->level_id == '1')
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->report}}"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{url('/day')}}"><i class="icon fa fa-circle-o"></i> Day</a></li>
      <li><a class="treeview-item" href="{{url('/month')}}"><i class="icon fa fa-circle-o"></i> Month</a></li>
      <li><a class="treeview-item" href="{{url('/years')}}"><i class="icon fa fa-circle-o"></i> Years</a></li>

    </ul>
  </li>
  @endif
  @if(auth()->user()->level_id == '1')
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->user}}"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{('add-user')}}"><i class="icon fa fa-circle-o"></i> Add User</a></li>
      <li><a class="treeview-item" href="{{('all-user')}}"><i class="icon fa fa-circle-o"></i> All User</a></li>
    </ul>
  </li>
  @endif
  @if(auth()->user()->level_id == '1')
  <li><a class="app-menu__item" href="{{url('/edit-setting/1')}}"><i class="app-menu__icon {{$row->setting}}"></i><span class="app-menu__label">Setting</span></a></li>
 @endif
 @if(auth()->user()->level_id == '2' || auth()->user()->level_id == '1' || auth()->user()->level_id == '3')
 <li><a class="app-menu__item active" href="{{url('/profile')}}"><i class="app-menu__icon {{$row->my_profile}}"></i><span class="app-menu__label">My Profile</span></a></li>
 <li><a class="app-menu__item" href="{{url('/password')}}"><i class="app-menu__icon {{$row->change_password}}"></i><span class="app-menu__label">Change Password</span></a></li>
 @endif
 @if(auth()->user()->level_id == '1')
 <li><a class="app-menu__item" href="{{url('/logActivity')}}"><i class="app-menu__icon fa fa-bookmark"></i><span class="app-menu__label">Log Activity</span></a></li>
 @endif
 @endforeach
</ul>
@endsection
@section('content')
<main class="app-content">
    <div class="row user">
      <div class="col-md-12">
        <div class="profile">
          <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
            <h4>{{Auth()->user()->name}}</h4>
                @if(Auth()->user()->level_id==1)
                  <span class="badge badge-success">Admin</span>
                @elseif(Auth()->user()->level_id==2)
                <span class="badge badge-success">Seller</span>
                @else
                <span class="badge badge-success">Manager</span>
                @endif
                        
          </div>
          <div class="cover-image"></div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="tile p-0">
          <ul class="nav flex-column nav-tabs user-tabs">
            <li class="nav-item"><a class="nav-link " href="#user-timeline" data-toggle="tab">Timeline</a></li>
            <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">

          <div class="tab-pane fade" id="user-settings">
            <div class="tile user-settings">
              <h4 class="line-head">Settings</h4>
                <form action="{{url('/update-profile')}}" method="POST">
                @csrf
                @foreach($profile as $value)
                <div class="row mb-4">
                  <div class="col-md-4">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{$value->name}}" type="text">
                    <span class="text-danger">{{$errors->first('name')}}</span>
                  </div>
                  <div class="col-md-4">
                    <label>Email</label>
                    <input class="form-control" name="email" type="text" value="{{$value->email}}">
                    <span class="text-danger">{{$errors->first('email')}}</span>
                  </div>
                </div>
               
                @endforeach
                <div class="row mb-10">
                  <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Update</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  @include('sweetalert::alert')
@endsection