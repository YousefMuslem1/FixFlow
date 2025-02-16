<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{ auth()->user()->unReadnotifications()->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right notifications-menu" id="dlDropDown" style="overflow-y: auto; max-height: 240px">
        <span class="dropdown-header">{{ auth()->user()->unReadnotifications()->count() }} Notifications</span>
        @foreach(Auth::user()->unreadNotifications as $notification)
            <div class="dropdown-divider"></div>
            <div class="menu" >
                <form action="" class="paymentRequest">
                    <a href="#"   class="dropdown-item" style=" font-size: .85em; overflow-wrap:break-word!important;">
                        {!!  \Illuminate\Support\Str::limit($notification->data['company_name'] . ' Send a Payment Request', 70, '') !!}
                        <span class="text-muted text-sm d-block" style=" font-size: .77em!important; ">
                                    {{ $notification->created_at->diffForHumans() }}
                                    at {{ $notification->created_at->format(' d M Y h:i:s a')}}
                                </span>
                    </a>
                    <input type="hidden" value="{{ $notification->id }}" name="payment">
                </form>
            </div>
        @endforeach
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer fixed">See All Notifications</a>
    </div>
</li>
