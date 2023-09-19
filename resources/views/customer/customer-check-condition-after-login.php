@if (Auth::guard('customer')->check())
  {{ Auth::guard('customer')->user()->full_name }}