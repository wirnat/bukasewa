@component('mail::message')
<h4>Invoice Code: {{$data->id_invoice}}</h4>
Someone want to buy your item, please contact or confirm the order.
<hr>
<h4>Item: {{$data->name}}</h4>
<h4>Customer info : </h4>
 Name: {{$data->firstname}},{{$data->lastname}} 
 <br>
 Email: {{$data->email}}
 <br>
 Phone: {{$data->phone}}
 <br>
 Country:{{$data->country}}
 <br>
 Address:{{$data->address}}
 <br>
 City:{{$data->city}}
 <br>
 Order date:{{$data->created_at}}
 <br>
<hr>
<h4>Payment method : {{$data->payment}}</h4>

@component('mail::button', ['url' => "indoartssfbali.com/order/".$data->id_item, 'color' => 'success'])
View Order
@endcomponent
<br>
Thanks for attention :) . indoartssfbali.com
@endcomponent
