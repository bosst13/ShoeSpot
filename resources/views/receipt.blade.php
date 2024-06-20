@component('mail::message')
    

Good day, {{$customer->customer_name}}. Your order #{{$orderinfo->orderinfo_id}} has been confirmed.
@endcomponent
