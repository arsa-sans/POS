@extends('templates.layout')

@section('content')
<div class="col-9">
  @include('order.form')
</div>
<div class="col-3">
  @include('order.cart')
</div>
@endsection

@push('script')
  @include('order.script')
@endpush
