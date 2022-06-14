
@component('mail::message')
Hello **{{$name}}**,  
Your order has been dispatched to you

Click below to view the order details
@component('mail::button', ['url' => $link])
Order
@endcomponent
Sincerely,
Fikisha LTD.
@endcomponent