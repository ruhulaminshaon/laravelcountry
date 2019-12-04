<div class="sidebar-wrapper">
    <div class="logo">
        <a href="" class="simple-text">
            Creative Tim
        </a>
    </div>

    <ul class="nav">
        <li class="{{Request::is('dashboard') ? 'active' : ''}}">
            <a href="{{route('dashboard')}}">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="{{Request::is('country')?'active':''}}">
            <a href="{{route('country')}}">
                <i class="pe-7s-user"></i>
                <p>Country</p>
            </a>
        </li>
        <li class="{{Request::is('todolist')?'active':''}}">
            <a href="{{route('todolist')}}">
                <i class="pe-7s-album"></i>
                <p>Jquery list</p>
            </a>
        </li>
        
    </ul>
</div>