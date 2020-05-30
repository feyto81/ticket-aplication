@extends('layouts.master')
@section('title','Add User | Ticket')
@section('menu')
<ul class="app-menu">
  @foreach($settingall as $row)
  @if(auth()->user()->level_id == '1')
  <li><a class="app-menu__item" href="{{url('/home')}}"><i class="app-menu__icon {{$row->dashboard}}"></i><span class="app-menu__label">Dashboard</span></a></li>
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->category}}"></i><span class="app-menu__label">Category</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item active" href="{{url('add-category')}}"><i class="icon fa fa-circle-o"></i> Add Category</a></li>
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
  @if(auth()->user()->level_id == '1' || auth()->user()->level_id == '2')
  <li><a class="app-menu__item" href="{{url('/transaction')}}"><i class="app-menu__icon {{$row->transaction}}"></i><span class="app-menu__label">Transaction</span></a></li>
  @endif
  @if(auth()->user()->level_id == '1' || auth()->user()->level_id == '3')
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->report}}"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{url('/day')}}"><i class="icon fa fa-circle-o"></i> Day</a></li>
      <li><a class="treeview-item" href="{{url('/month')}}"><i class="icon fa fa-circle-o"></i> Month</a></li>
      <li><a class="treeview-item" href="{{url('/years')}}"><i class="icon fa fa-circle-o"></i> Years</a></li>

    </ul>
  </li>
  @endif
  @if(auth()->user()->level_id == '1')
  <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->user}}"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item active" href="{{url('add-user')}}"><i class="icon fa fa-circle-o"></i> Add User</a></li>
      <li><a class="treeview-item" href="{{url('all-user')}}"><i class="icon fa fa-circle-o"></i> All User</a></li>
    </ul>
  </li>
  <li><a class="app-menu__item" href="{{url('/edit-setting/1')}}"><i class="app-menu__icon {{$row->setting}}"></i><span class="app-menu__label">Setting</span></a></li>
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
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-user"></i> Add User</h1>
          <p>Fill items carefully</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="{{url('/add-barang')}}">Add User</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Add User</h3>
            <div class="tile-body">
              <form action="{{url('/save-user')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('name') ? 'has-error' : '' }}">
                  <label class="control-label">Name</label>
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter Name">
                  @if($errors->has('name'))
                    <span class="text-danger">
                        <small>{{$errors->first('name')}}</small>
                    </span>
				          @endif
                </div>
                <div class="form-group{{$errors->has('email') ? 'has-error' : '' }}">
                  <label class="control-label">Email</label>
                  <input class="form-control" name="email" id="email" type="email" placeholder="Enter email">
                  @if($errors->has('email'))
                    <span class="text-danger">
                        <small>{{$errors->first('email')}}</small>
                    </span>
				          @endif
                </div>
                <div class="form-group{{$errors->has('level_id') ? 'has-error' : '' }}">
                  <label class="control-label">Level</label>
                  <select name="level_id" class="form-control demoSelect" id="">
                    <option disabled selected>--Pilih--</option>
                    <option value="1">Admin</option>
                    <option value="2">Seller</option>
                    <option value="3">Manager</option>
  
                  </select>
                  @if($errors->has('level_id'))
                    <span class="text-danger">
                        <small>{{$errors->first('level_id')}}</small>
                    </span>
				          @endif
                </div>
                <div class="form-group{{$errors->has('password') ? 'has-error' : '' }}">
                  <label class="control-label">Password</label>
                  <input class="form-control" name="password" id="password" type="password" placeholder="Enter Password">
                  @if($errors->has('password'))
                    <span class="text-danger">
                        <small>{{$errors->first('password')}}</small>
                    </span>
				          @endif
                </div>
                
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>
                    &nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{url('/all-user')}}" class="btn btn-primary"><i class="fa fa-backward"></i>Back</a>

                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    </main>
    @include('sweetalert::alert')

@endsection