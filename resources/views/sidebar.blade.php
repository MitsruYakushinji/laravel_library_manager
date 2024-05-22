@section('sidebar')
<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="{{ url('library/index') }}" class="simple-text">
                XX  Library
            </a>
        </div>
        <ul class="nav">
            <li class="link">
                <a href="{{ url('library/index') }}">
                    <i class="ti-book"></i>
                    <p>Book List</p>
                </a>
            </li>
            <li class="link">
                <a href="{{ url('library/history') }}">
                    <i class="ti-user"></i>
                    <p>Borrow History</p>
                </a>
            </li>
        </ul>
        <ul class="nav">
            <li class="text-center">
                <p>{{ Auth::user()->name }}さんがログイン中</p>
            </li>
        </ul>
        <form class="text-center" action="{{ url('logout') }}" method="post">
            @csrf
            <button class="btn btn-default btn-sm" type="submit">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </button>
        </form>
    </div>
</div>
@endsection
