@extends('layouts.master')
@section('title','Report || Ticket')
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
  @if(auth()->user()->level_id == '1' || auth()->user()->level_id == '2')
  <li><a class="app-menu__item" href="{{url('/transaction')}}"><i class="app-menu__icon {{$row->transaction}}"></i><span class="app-menu__label">Transaction</span></a></li>
  @endif
  @if(auth()->user()->level_id == '1' || auth()->user()->level_id == '3')
  <li class="treeview  is-expanded"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon {{$row->report}}"></i><span class="app-menu__label">Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item active" href="{{url('/day')}}"><i class="icon fa fa-circle-o"></i> Day</a></li>
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
          <h1><i class="fa fa-th-list"></i> Report Day</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Report</li>
          <li class="breadcrumb-item active"><a href="#">Day</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-body">
                    <form class="navbar-form navbar-right" role="search" action="{{url('dayreport')}}">
                        <div class="input-group">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>From Date </label>
                                        <input type="date" id=""  name="date1"  class="form-control ">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">For Date</label>
                                            <input type="date"  name="date2"  class="form-control ">                                            
                                    </div>
                                </div>                            
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label></label>
                                        <button  style="margin-top: 30px" class="btn btn-success" type="submit"><i class="fa fa-search"></i> </button> 
                                    </div>
                                </div>
                                             <!--/span-->
                            </div>
                
                            </div>
                        
                    </form>
                    <a href="{{url('/printdaypdf?date1='.Request::get('date1').'&date2='.Request::get('date2'))}}"
                     class="btn btn-sm btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Cetak PDF</a>

                     <a href="{{url('/printdaygoogle?date1='.Request::get('date1').
                     '&date2='.Request::get('date2'))}}"
                      class="btn btn-success btn-sm" target="_blank"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
                      <a href="{{url('day')}}"><button type="button" class="btn btn-danger btn-sm">
                        <i class="fa fa-sw fa-refresh">  Reload</i></button></a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Ticket Name</th>
                      <th>Qty</th>
                      <th>Ticket Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; $total=0; ?>
                    @foreach ($data as $item)
                <tr>
                        <td>{{$no}}</td>
                        <td>{{ $item->ticket->ticket_name }}</td>
                        <td>{{ $item->qty }}</td>
                        @php ($harga = str_replace('.','',$item->ticket->ticket_price))
                        <td>{{ "Rp.".number_format($harga) }}</td>
                        <td>{{ "Rp.".number_format($harga*$item->qty) }}</td>
                        <?php $no++ ?>
                @endforeach
                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      @include('sweetalert::alert')
    </main>
    

@endsection
@push('bottom')
   
@endpush