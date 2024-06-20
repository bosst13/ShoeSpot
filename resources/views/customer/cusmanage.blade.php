@extends('layouts.header')
@section('content')

<form action="{{ route('customer.profile.update', ['customer' => $customer->customer_id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="customer_name">Name</label>
    <input type="text" name="customer_name" value="{{ $customer->customer_name ?? '' }}" required>

    <label for="phone_number">Phone Number</label>
    <input type="text" name="phone_number" value="{{ $customer->phone_number ?? '' }}" required>

    <label for="email">Email</label>
    <input type="email" name="email" value="{{ $customer->email ?? '' }}" required>

    <label for="profile_picture">Profile Picture</label>
    <input type="text" name="">

    <button type="submit">Update Profile</button>
</form>

@endsection
