@extends('layouts.master')
@section('title','Edit Ticket | POS')
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
  <li class="treeview is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->ticket}}"></i><span class="app-menu__label">Ticket</span><i class="treeview-indicator fa fa-angle-right"></i></a>
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
          <h1><i class="fa fa-dashboard"></i> Edit Category</h1>
          <p>Fill items carefully</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="">Edit Category</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Edit Ticket</h3>
            <div class="tile-body">
              <form role="form" action="{{url('/update-ticket/'.$ticket->id)}}" method="post">
                {{ csrf_field() }}
                <div class="form-group{{$errors->has('ticket_name') ? 'has-error' : '' }}">
                  <label class="control-label">Ticket Name</label>
                  <input class="form-control" name="ticket_name" id="ticket_name" type="text" placeholder="Enter Ticket Name" value="{{$ticket->ticket_name}}">
                  @if($errors->has('ticket_name'))
                    <span class="text-danger">
                        <small>{{$errors->first('ticket_name')}}</small>
                    </span>
				  @endif
                </div>
                <div class="form-group{{$errors->has('ticket_type') ? 'has-error' : '' }}">
                    <label class="control-label">Ticket Type</label>
                    <input class="form-control" name="ticket_type" id="ticket_type" type="text" placeholder="Enter Ticket Type" value="{{$ticket->ticket_type}}">
                    @if($errors->has('ticket_type'))
                      <span class="text-danger">
                          <small>{{$errors->first('ticket_type')}}</small>
                      </span>
                    @endif
                  </div>
                  <div class="form-group{{$errors->has('category_id') ? 'has-error' : '' }}">
                    <label class="control-label">Category</label>
                    <select name="category_id" class="form-control demoSelect" id="category_id">
                      <option disabled selected>-- Pilih Category -- </option>
                      @foreach ($category as $row)
                      <option @if($row->id==$ticket->category_id) selected @endif value="{{ $row->id}}">{{$row->category_name }}</option>
                    @endforeach
                      
                    </select>
                  </div>
                <div class="form-group{{$errors->has('number_of_tickets') ? 'has-error' : '' }}">
                    <label class="control-label">Amount</label>
                    <input class="form-control" name="number_of_tickets" id="number_of_tickets" type="number" placeholder="Enter Amout" value="{{$ticket->number_of_tickets}}">
                    @if($errors->has('number_of_tickets'))
                      <span class="text-danger">
                          <small>{{$errors->first('number_of_tickets')}}</small>
                      </span>
                    @endif
                </div>
                <div class="form-group{{$errors->has('ticket_price') ? 'has-error' : '' }}">
                    <label class="control-label" for="ticket_price">Price</label>
                    <input class="form-control uang" name="ticket_price" id="ticket_price" type="number" placeholder="Enter Price" value="{{$ticket->ticket_price}}">
                    @if($errors->has('ticket_price'))
                      <span class="text-danger">
                          <small>{{$errors->first('ticket_price')}}</small>
                      </span>
                    @endif
                </div>
                
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                    &nbsp;&nbsp;&nbsp;
                    <button type="reset" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button>
                    &nbsp;&nbsp;&nbsp;
                <a href="{{url('/all-ticket')}}" class="btn btn-primary"><i class="fa fa-backward"></i>Back</a>
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
    @include('sweetalert::alert')

    </main>

@endsection
@push('bottom')

<script type="text/javascript">
    $(document).ready(function(){
       $('.uang').mask('000.000.000', {reverse:true});
    });
</script>

@endpush