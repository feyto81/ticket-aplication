<!DOCTYPE html>
<html>
<head>
    <title>Cetak</title>
</head>
<body onload="javascript:window.print()">
     <center>
<table style="text-align: center;">
    <tr>
        <td><img src=""></td>
        <td style="font-family: sans-serif;text-align: center;">
            <div style="text-align: center;margin-left: 100px">
                <h2>Report Sale Ticket Bulan {{Request::get('bulan')}}</h2>
                <h2>CV Sejahtera</h2>
            </div>
            <p style="text-align: center;margin-left: 130px;">Jl. Kelet Ploso KM 36, Kelet, Keling, Jepara, Jawa Tengah 59454</p>
        </td>
        <td><img src=""></td>
    </tr>
</table>
</center>
<br>
<table class="table table-hover table-striped table-bordered" cellspacing="0" width="100%" border="1">
                <thead>
                    <tr >
                        <th>No</th>
                        <th>Ticket Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; $total=0; ?>
                    @foreach($data as $in => $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{ $item->ticket->ticket_name }}</td>
                        <td>{{ $item->qty }}</td>
                        @php ($harga = str_replace('.','',$item->ticket->ticket_price))
                        <td>{{ "Rp.".number_format($harga) }}</td>
                        <td>{{ "Rp.".number_format($harga*$item->qty) }}</td>
                        <td>{{$item->date}}</td>
                        <?php $no++ ?>
                        <?php $total=$total+($harga*$item->qty) ?>
                        
                    </tr>
                    @endforeach
                </tbody>
                                               
</table>
<table style="text-align: center;">
    <tr>
        <td style="font-family: sans-serif;text-align: center;">
            <div style="text-align: right;float: right;margin-left: 1170px;margin-top: 25px;">
                Jepara, {{date('Y-m-d')}}
            </div>
        </td>
    </tr>
</table>
<table style="text-align: center;">
    <tr>
        <td style="font-family: sans-serif;text-align: center;">
            <div style="text-align: center;float: right;margin-left: 1220px;margin-top: 40px;">
                {{Auth::user()->name}}
            </div>
        </td>
    </tr>
</table>
</center>
</body>
</html>