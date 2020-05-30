@extends('layouts.master')
@section('title','Setting | POS')
@section('content')
@section('menu')
<ul class="app-menu">
  @foreach($settingall as $row)
  @if(auth()->user()->level_id == '1')
  
  <li><a class="app-menu__item" href="{{url('/home')}}"><i class="app-menu__icon {{$row->dashboard}}"></i><span class="app-menu__label">Dashboard</span></a></li>
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->category}}"></i><span class="app-menu__label">Category</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{url('add-category')}}"><i class="icon fa fa-circle-o"></i> Add Category</a></li>
      <li><a class="treeview-item" href="{{url('all-category')}}"><i class="icon fa fa-circle-o"></i> All Category</a></li>
    </ul>
  </li>
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
      <li><a class="treeview-item" href="{{url('add-user')}}"><i class="icon fa fa-circle-o"></i> Add User</a></li>
      <li><a class="treeview-item" href="{{url('all-user')}}"><i class="icon fa fa-circle-o"></i> All User</a></li>
    </ul>
  </li>
  <li><a class="app-menu__item active" href="{{url('/edit-setting/1')}}"><i class="app-menu__icon {{$row->setting}}"></i><span class="app-menu__label">Setting</span></a></li>
  @endif
  @if(auth()->user()->level_id == '2' || auth()->user()->level_id == '1' || auth()->user()->level_id == '3')
 <li><a class="app-menu__item" href="{{url('/profile')}}"><i class="app-menu__icon {{$row->my_profile}}"></i><span class="app-menu__label">My Profile</span></a></li>
 <li><a class="app-menu__item" href="{{url('/password')}}"><i class="app-menu__icon {{$row->change_password}}"></i><span class="app-menu__label">Change Password</span></a></li>
 
 @endif
 @if(auth()->user()->level_id == '1')
 <li><a class="app-menu__item" href="{{url('/logActivity')}}"><i class="app-menu__icon fa fa-bookmark"></i><span class="app-menu__label">Log Activity</span></a></li>
 @endif
 @endforeach
</ul>
@endsection
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Setting</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="">Setting</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Setting</h3>
            <div class="tile-body">
              <form role="form" action="{{url('/update-setting/'.$setting->id)}}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('title_admin') ? 'has-error' : '' }}">
                  <label class="control-label" for="title_admin">Admin Title</label>
                  <input class="form-control" name="title_admin" id="title_admin" type="text" autofocus="" placeholder="Enter Setting" value="{{$setting->title_admin}}">
                  @if($errors->has('title_admin'))
                    <span class="text-danger">
                        <small>{{$errors->first('title_admin')}}</small>
                    </span>
				          @endif
                </div>
                <div class="form-group{{$errors->has('navbar_right') ? 'has-error' : '' }}">
                  <label class="control-label" for="navbar_right">Navbar Code Right Color</label>
                  <input class="form-control" required="" name="navbar_right" id="navbar_right" type="text" autofocus="" placeholder="Enter Navbar Color Right" value="{{$setting->navbar_right}}">
                  @if($errors->has('navbar_right'))
                    <span class="text-danger">
                        <small>{{$errors->first('navbar_right')}}</small>
                    </span>
                  @endif
                </div>
                <div class="form-group{{$errors->has('navbar_left') ? 'has-error' : '' }}">
                  <label class="control-label" for="navbar_left">Navbar Code Left Color</label>
                  <input class="form-control" name="navbar_left" id="navbar_left" type="text" autofocus="" placeholder="Enter Navbar Color Left" required="" value="{{$setting->navbar_left}}">
                  @if($errors->has('navbar_left'))
                    <span class="text-danger">
                        <small>{{$errors->first('navbar_left')}}</small>
                    </span>
                  @endif
                </div>
                <div class="form-group{{$errors->has('title_login') ? 'has-error' : '' }}">
                  <label class="control-label" for="title_login">Login Title</label>
                  <input class="form-control" name="title_login" id="title_login" type="text" placeholder="Enter title login" value="{{$setting->title_login}}">
                  @if($errors->has('title_login'))
                    <span class="text-danger">
                        <small>{{$errors->first('title_login')}}</small>
                    </span>
                  @endif
                </div>
                <div class="form-group{{$errors->has('dashboard') ? 'has-error' : '' }}">
                  <label class="control-label" for="dashboard">Dashboard Icon</label>
                  <input class="form-control" name="dashboard" id="dashboard" type="text" placeholder="Enter Dashboard" value="{{$setting->dashboard}}">
                  @if($errors->has('dashboard'))
                    <span class="text-danger">
                        <small>{{$errors->first('dashboard')}}</small>
                    </span>
                  @endif
                </div>
                <div class="form-group{{$errors->has('category') ? 'has-error' : '' }}">
                  <label class="control-label">Category Icon</label>
                  <input class="form-control" name="category" id="category" type="text" placeholder="Enter Category" value="{{$setting->category}}">
                  @if($errors->has('category'))
                    <span class="text-danger">
                        <small>{{$errors->first('category')}}</small>
                    </span>
                  @endif
                </div>
                 <div class="form-group{{$errors->has('ticket') ? 'has-error' : '' }}">
                  <label class="control-label">Ticket Icon</label>
                  <input class="form-control" name="ticket" id="ticket" type="text" placeholder="Enter Ticket" value="{{$setting->ticket}}">
                  @if($errors->has('ticket'))
                    <span class="text-danger">
                        <small>{{$errors->first('ticket')}}</small>
                    </span>
                  @endif
                </div>
            </div>
            
          </div>
        </div>
         <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Setting</h3>
            <div class="tile-body">

                
                <div class="form-group{{$errors->has('transaction') ? 'has-error' : '' }}">
                  <label class="control-label">Transaction Icon</label>
                  <input class="form-control" name="transaction" id="transaction" type="text" placeholder="Enter Transaction" value="{{$setting->transaction}}">
                  @if($errors->has('transaction'))
                    <span class="text-danger">
                        <small>{{$errors->first('transaction')}}</small>
                    </span>
                  @endif
                </div>
                 <div class="form-group{{$errors->has('report') ? 'has-error' : '' }}">
                  <label class="control-label">Report Icon</label>
                  <input class="form-control" name="report" id="report" type="text" placeholder="Enter Report" value="{{$setting->report}}">
                  @if($errors->has('report'))
                    <span class="text-danger">
                        <small>{{$errors->first('report')}}</small>
                    </span>
                  @endif
                </div>
                 <div class="form-group{{$errors->has('user') ? 'has-error' : '' }}">
                  <label class="control-label">User Icon</label>
                  <input class="form-control" name="user" id="user" type="text" placeholder="Enter User" value="{{$setting->user}}">
                  @if($errors->has('user'))
                    <span class="text-danger">
                        <small>{{$errors->first('user')}}</small>
                    </span>
                  @endif
                </div>
                 <div class="form-group{{$errors->has('setting') ? 'has-error' : '' }}">
                  <label class="control-label">Setting Icon</label>
                  <input class="form-control" name="setting" id="setting" type="text" placeholder="Enter Setting" value="{{$setting->setting}}">
                  @if($errors->has('setting'))
                    <span class="text-danger">
                        <small>{{$errors->first('setting')}}</small>
                    </span>
                  @endif
                </div>
                 <div class="form-group{{$errors->has('my_profile') ? 'has-error' : '' }}">
                  <label class="control-label">My Profile Icon</label>
                  <input class="form-control" name="my_profile" id="my_profile" type="text" placeholder="Enter my Profile" value="{{$setting->my_profile}}">
                  @if($errors->has('my_profile'))
                    <span class="text-danger">
                        <small>{{$errors->first('my_profile')}}</small>
                    </span>
                  @endif
                </div>
                 <div class="form-group{{$errors->has('change_password') ? 'has-error' : '' }}">
                  <label class="control-label">Change Password Icon</label>
                  <input class="form-control" name="change_password" id="change_password" type="text" placeholder="Enter Change Password" value="{{$setting->change_password}}">
                  @if($errors->has('change_password'))
                    <span class="text-danger">
                        <small>{{$errors->first('change_password')}}</small>
                    </span>
                  @endif
                </div>


                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    &nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button>
                    &nbsp;&nbsp;&nbsp;
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    @include('sweetalert::alert')

    </main>

@endsection