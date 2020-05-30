@extends('layouts.master')
@section('title','Transaction | Ticket')
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
  @if(auth()->user()->level_id == '1' || auth()->user()->level_id == '2') 
  <li><a class="app-menu__item active" href="{{url('/transaction')}}"><i class="app-menu__icon {{$row->transaction}}"></i><span class="app-menu__label">Transaction</span></a></li>
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
<main class="app-content">
    <div class="app-title">
        <div>
          <h1><i class="fa fa-shopping-cart"></i> Transaction</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="{{url('/add-ticket')}}">Transaction</a></li>
        </ul>
      </div>
      <form action="{{url('/save-transaction')}}" method="POST">
        {{csrf_field()}}

      <div class="row">
         <div class="col-md-6">
            <div class="tile">
              <div class="tile-body">
                  <div class="form-group row">
                    <label class="control-label col-md-3">Date</label>
                    <div class="col-md-8">
                      <input class="form-control" readonly name="date" type="date" value="{{date('Y-m-d')}}" placeholder="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Seller</label>
                    <div class="col-md-8">
                      <input class="form-control" value="{{ Auth::user()->name }}" name="seller" readonly type="text" placeholder="Enter email address">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Customer</label>
                    <div class="col-md-8">
                      <input class="form-control" value="" name="customer" required  type="text" placeholder="Enter Customer Name">
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="tile">
              <div class="tile-body">
                  <div class="form-group row">
                    <label class="control-label col-md-3">Ticket Name</label>
                    <div class="col-md-8">
                      <select name="ticket_id" id="ticket_id" class="form-control demoSelect">
                        <option disabled selected>--Select Ticket --</option>
                        @foreach ($ticket as $row)
                          <option value="{{$row->id}}">{{$row->ticket_name}}</option>
                        @endforeach
                        </select>
                        @if($errors->has('ticket_id'))
                        <span class="text-danger">
                            <small>{{$errors->first('ticket_id')}}</small>
                        </span>
                     @endif
                      
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Qty</label>
                    <div class="col-md-8">
                      <input class="form-control" required value="0" name="qty"  type="number" placeholder="Enter Qty">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-8">
                      <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-cart-plus"></i> Add
                      </button>
                      <a href="{{url('transaction_finish')}}" class="btn btn-danger"><i class="fa fa-paper-plane-o"></i> Finish</a>
                    </div>
                  </div>
                </form>
              </div>

            </div>
          </div>
        
      </div>
    </form>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="">
                  <thead>
                    <tr class="success"><th colspan="6" style="text-align: center">Transaction Details</th></tr>
                    <tr>
                      <th>No</th>
                      <th>Ticket Name</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Sub Total</th>
                      <th>Cancel</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; $total=0; ?>
                         @foreach ($transaction as $item)
                        <tr>
                                <td>{{$no}}</td>
                                <td>{{ $item->ticket->ticket_name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>Rp.{{ $item->ticket->ticket_price }}</td>
                                @php($harga = str_replace('.','',$item->ticket->ticket_price))
                                <td>{{ "Rp.".number_format($harga*$item->qty).",-"}}</td>
                                <td><a href="#" transaction-id="{{$item->id}}" title="Hapus Data" class="btn btn-sm btn-danger btn-delete">Delete</a> </td>
                               <?php $no++ ?>
                                <?php $total=$total+($harga*$item->qty) ?>
                       @endforeach
                                <tr><td colspan="5"><p align="right">Total</p></td><td>{{ "Rp.".number_format($total).",-"}}</td></tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    </main>
    @include('sweetalert::alert')

@endsection
@push('bottom')
<script type="text/javascript">
    $(document).ready(function(){
       $('.uang').mask('000.000.000', {reverse:true});
    });
</script>
<script type="text/javascript">
  $('.btn-delete').click(function(){
    var transaction_id = $(this).attr('transaction-id');
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Yakin Mau Dihapus',
        text: "Mau dihapus data Transaction",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          window.location = "/delete-transaction/"+transaction_id+"";
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
  });
      
</script>
@endpush
