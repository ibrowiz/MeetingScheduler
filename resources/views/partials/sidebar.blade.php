
<ul >

    @if (Gate::check('dashboard.access') || Gate::check('admin.access') )
   
        <li class="highlight dashboard">
            <a href="{{url('dashboard')}}">
                <i class="fa fa-dashboard fa-lg"></i> 
                <span> Dashboard </span>
            </a>
        </li>

    @endif

    @if (Gate::check('user.access') || Gate::check('admin.access') )

        <li class="has-sub user">
            <a href="#"> 
                <i class="fa fa-users fa-1x"></i>
                <span>  Users </span>
            </a>
            <ul>
                <li>
                    <a href="{{url('user/create')}}"> 
                        <span> New User </span> 
                    </a>
                </li>

                <li>
                    <a href="{{url('user')}}"> 
                        <span> Users </span>
                    </a>
                </li>
                
            </ul>
        </li>


    @endif

    @if (Gate::check('permission.access') || Gate::check('admin.access') )

         <li class=" permission">
            <a href="{{url('permission')}}">
                <i class="fa fa-key fa-lg"></i> 
                <span> Permission </span>
            </a>
        </li>

    @endif

    @if (Gate::check('role.access') || Gate::check('admin.access') )

        <li class=" role">
            <a href="{{url('role')}}">
                <i class="fa fa-universal-access fa-lg"></i> 
                <span> Roles </span>
            </a>
        </li>

    @endif

    @if (Gate::check('room.access') || Gate::check('admin.access') )

        <li class="has-sub room">
            <a href="#"> 
                <i class="fa fa-handshake-o fa-1x"></i>
                <span>  Rooms </span>
            </a>
            <ul>
                <li>
                    <a href="{{url('room/create')}}"> 
                        <span> New Room </span> 
                    </a>
                </li>

                <li>
                    <a href="{{url('room')}}"> 
                        <span> Rooms </span>
                    </a>
                </li>
                
            </ul>
        </li>


    @endif

    @if (Gate::check('room.access') || Gate::check('admin.access') )
    <li class="has-sub user">
            <a href="#"> 
                <i class="fa fa-users fa-1x"></i>
                <span>  Bookings </span>
            </a>
            <ul>
                <li>
                    <a href="{{url('bookings/index')}}"> 
                        <span> Book Room </span> 
                    </a>
                </li>

                <li>
                    <a href="{{url('bookings')}}"> 
                        <span> Reservations </span>
                    </a>
                </li>
            </ul>
        </li>
     @endif

    @if (Gate::check('device.access') || Gate::check('admin.access') )

    
        <li class="has-sub device">
            <a href="#"> 
                <i class="fa fa-tablet fa-1x"></i>
                <span>  Devices </span>
            </a>
            <ul>
                <li>
                    <a href="{{url('device/create')}}"> 
                        <span> New Device </span> 
                    </a>
                </li>

                <li>
                    <a href="{{url('device')}}"> 
                        <span> Devices </span>
                    </a>
                </li>
                
            </ul>
        </li>


    @endif


    @if (Gate::check('meeting.access') || Gate::check('admin.access') )
   
        <li class="highlight meeting">
            <a href="{{url('meeting')}}">
                <i class="fa fa-link fa-lg"></i> 
                <span> Meeting </span>
            </a>
        </li>

    @endif


</ul>