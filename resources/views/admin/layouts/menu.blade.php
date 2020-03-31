<li {!! (Request::is('admin/students') || Request::is('admin/students/create') || Request::is('admin/students/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Students</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/students') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/students') }}">
                <i class="fa fa-angle-double-right"></i>
                Students
            </a>
        </li>
        <li {!! (Request::is('admin/students/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/students/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Student
            </a>
        </li>
    </ul>
</li><li {!! (Request::is('admin/students') || Request::is('admin/students/create') || Request::is('admin/students/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Students</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/students') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/students') }}">
                <i class="fa fa-angle-double-right"></i>
                Students
            </a>
        </li>
        <li {!! (Request::is('admin/students/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/students/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Student
            </a>
        </li>
    </ul>
</li><li {!! (Request::is('admin/taruns') || Request::is('admin/taruns/create') || Request::is('admin/taruns/*') ? 'class="active"' : '') !!}>
    <a href="#">
        <i class="livicon" data-name="list-ul" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
        <span class="title">Taruns</span>
        <span class="fa arrow"></span>
    </a>
    <ul class="sub-menu">
        <li {!! (Request::is('admin/taruns') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/taruns') }}">
                <i class="fa fa-angle-double-right"></i>
                Taruns
            </a>
        </li>
        <li {!! (Request::is('admin/taruns/create') ? 'class="active" id="active"' : '') !!}>
            <a href="{{ URL::to('admin/taruns/create') }}">
                <i class="fa fa-angle-double-right"></i>
                Add New Tarun
            </a>
        </li>
    </ul>
</li>