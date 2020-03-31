<ul id="menu" class="page-sidebar-menu">
    <li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
        <a href="{{ route('dashboard') }}">
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">{{ _t(config('Convert.dashboard')[0], [], $_SESSION['lang']) }}</span>
        </a>
    </li>
    <?php
    $role_id = DB::table('role_users')->where('user_id', Sentinel::getuser()->id)->first()->role_id;

    if($role_id == 1){
        $str = array();
        $sections = DB::table('findmiin_section')->get();
        array_push($str,'cardfinds');
        foreach ($sections as $section){
            array_push($str,$section->name);
        }
        //array_push($str,'jobs');
        $privilege_r = $str;
        $privilege_w = $str;
    }else{
        $privilege_r = explode(",", Sentinel::getuser()->privilege_r);
        $privilege_w = explode(",", Sentinel::getuser()->privilege_w);
    }

    if($role_id == 1 || $role_id == 2 ){
    ?>
    {{--<li {!! (Request::is('admin/merchant') || Request::is('admin/merchant/create') || Request::is('admin/merchant_profile') || Request::is('admin/merchant/*') || Request::is('admin/deleted_merchant') ? 'class="active"' : '') !!}>--}}
        {{--<a href="#">--}}
            {{--<i class="livicon" data-name="user-flag" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ _t('Merchants', [], $_SESSION['lang']) }}</span>--}}
            {{--<span class="fa arrow"></span>--}}
        {{--</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--<li {!! (Request::is('admin/merchant') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/merchant') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Merchants', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/deleted_merchant') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/deleted_merchant') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Deleted Merchants', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li {!! (Request::is('admin/request') ? 'class="active"' : '') !!}>--}}
        {{--<a href="{{ URL::to('admin/request') }}">--}}
            {{--<i class="livicon" data-name="shopping-cart" data-size="18" data-c="#F89A14" data-hc="#F89A14"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ _t('Request Merchant', [], $_SESSION['lang']) }}</span>--}}
        {{--</a>--}}
    {{--</li>--}}

    <li {!! (Request::is('admin/cardfinds') || Request::is('admin/cardfinds/create') || Request::is('admin/cardfinds/*') || Request::is('admin/tag') ? 'class="active"' : '') !!}
         style="display: {{in_array('cardfinds', $privilege_w)? 'block':(in_array('cardfinds', $privilege_r)? 'block':'none')}}">
        <a href="#">
            <i class="livicon" data-name="credit-card" data-size="18" data-c="#e9573f" data-hc="#e9573f"
               data-loop="true"></i>
            <span class="title">Cardfinds</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/cardfinds/1') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/cardfinds/1') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Clients Actives', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/cardfinds/2') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/cardfinds/2') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Clients inactives', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/cardfinds/create/1') ? 'class="active" id="active"' : '') !!}
                    {{in_array('cardfinds', $privilege_w)? 'block':'none'}}>
                <a href="{{ URL::to('admin/cardfinds/create/1') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ 'Add New Client', [], $_SESSION['lang'] }}
                </a>
            </li>
            <li {!! (Request::is('admin/tag') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/tag') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Add New Category', [], $_SESSION['lang']) }}
                </a>
            </li>
        </ul>
    </li>
    <?php } ?>
    <li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">{{ _t('Users', [], $_SESSION['lang']) }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Users', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/deleted_users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Deleted Users', [], $_SESSION['lang']) }}
                </a>
            </li>
        </ul>
    </li>
    {{--<li {!! (Request::is('admin/invitehistory') ? 'class="active"' : '') !!}>--}}
        {{--<a href="{{ URL::to('admin/invitehistory') }}">--}}
            {{--<i class="livicon" data-name="barchart" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ _t('Invite History', [], $_SESSION['lang']) }}</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    {{--<li {!! (Request::is('admin/staffs') || Request::is('admin/staffs/create') || Request::is('admin/staff_profile') || Request::is('admin/staffs/*') || Request::is('admin/deleted_staffs') ? 'class="active"' : '') !!}>--}}
        {{--<a href="#">--}}
            {{--<i class="livicon" data-name="user" data-size="18" data-c="#e9573f" data-hc="#e9573f"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ _t('Security', [], $_SESSION['lang']) }}</span>--}}
            {{--<span class="fa arrow"></span>--}}
        {{--</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--<li {!! (Request::is('admin/staffs') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/staffs') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Admin', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/staffs/create') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/staffs/create') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Server Users', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/deleted_staffs') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/deleted_staffs') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Add New Server User', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}



    {{--<li {!! (Request::is('admin/advertise') || Request::is('admin/advertise/create') || Request::is('admin/advertise/*') ? 'class="active"' : '') !!}>--}}
        {{--<a href="#">--}}
            {{--<i class="livicon" data-name="flag" data-size="18" data-c="#e9573f" data-hc="#e9573f"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ config('Convert.advertises')[0] }}</span>--}}
            {{--<span class="fa arrow"></span>--}}
        {{--</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--<li {!! (Request::is('admin/advertise/1') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/advertise/1') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t(config('Convert.top_advertises')[0], [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/advertise/2') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/advertise/2') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t(config('Convert.middle_advertises')[0], [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/advertise/3') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/advertise/3') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t(config('Convert.bottom_advertises')[0], [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
    {{--<li {!! (Request::is('admin/notification') ? 'class="active"' : '') !!}>--}}
        {{--<a href="{{ URL::to('admin/notification') }}">--}}
            {{--<i class="livicon" data-name="wifi-alt" data-size="18" data-c="#F89A14" data-hc="#F89A14"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ _t('Notifications', [], $_SESSION['lang']) }}</span>--}}
        {{--</a>--}}
    {{--</li>--}}
    {{--<li {!! (Request::is('admin/advertisement') ? 'class="active"' : '') !!}>--}}
        {{--<a href="{{ URL::to('admin/advertisement') }}">--}}
            {{--<i class="livicon" data-name="sun" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ _t('Advertisements', [], $_SESSION['lang']) }}</span>--}}
        {{--</a>--}}
    {{--</li>--}}

    <li {!! (Request::is('admin/section') || Request::is('admin/section/*') || Request::is('admin/category') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="address-book" data-size="18" data-c="#F89A14" data-hc="#F89A14"
               data-loop="true"></i>
            <span class="title">{{ _t('Localfinds', [], $_SESSION['lang']) }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <?php
            $sections = \DB::table('findmiin_section')->select(['name'])->get();
            $num = 0;
            foreach($sections as $section){
            $num++;
            ?>
            <li {!! ( isset($_SESSION['sectionType'])?($_SESSION['sectionType'] == $section->name ? 'class="active" id="active"' : ''):'') !!}
                style="display: {{in_array($section->name, $privilege_w)? 'block':(in_array($section->name, $privilege_r)? 'block':'none')}}">
                <a href="{{ URL::to('admin/section/?sectionType='.$section->name) }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t($section->name, [], $_SESSION['lang']) }}
                </a>
            </li>
            <?php } ?>
            {{--<li {!! ( isset($_SESSION['sectionType'])?($_SESSION['sectionType'] == 'jobs' ? 'class="active" id="active"' : ''):'') !!}--}}
                {{--style="display: {{in_array('jobs', $privilege_w)? 'block':(in_array('jobs', $privilege_r)? 'block':'none')}}">--}}
                {{--<a href="{{ URL::to('admin/section/?sectionType=jobs') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Jobs', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            <li {!! (Request::is('admin/category') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/category') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Add New Section', [], $_SESSION['lang']) }}
                </a>
            </li>
        </ul>
    </li>
    {{--<li {!! (Request::is('admin/news') || Request::is('admin/news/*') ? 'class="active"' : '') !!}>--}}
        {{--<a href="#">--}}
            {{--<i class="livicon" data-name="address-book" data-size="18" data-c="#F89A14" data-hc="#F89A14"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">{{ _t('Localfinds', [], $_SESSION['lang']) }}</span>--}}
            {{--<span class="fa arrow"></span>--}}
        {{--</a>--}}
        {{--<ul class="sub-menu">--}}
            {{--<li {!! (Request::is('admin/news') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/news') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('News', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/comments') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/comments/0') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Add New Localfinds &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}

    {{--<li {!! (Request::is('admin/activities') ? 'class="active"' : '') !!}>--}}
        {{--<a href="{{ URL::to('admin/activities') }}">--}}
            {{--<i class="livicon" data-name="alarm" data-size="18" data-c="#418BCA" data-hc="#418BCA"--}}
               {{--data-loop="true"></i>--}}
            {{--<span class="title">Activities</span>--}}
        {{--</a>--}}
    {{--</li>--}}

    <li {!! (Request::is('admin/plans') || Request::is('admin/city') || Request::is('admin/types') || Request::is('admin/thirdparty') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="location" data-size="18" data-c="#418BCA" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">{{ _t('City/Location', [], $_SESSION['lang']) }}</span>
            <span class="fa arrow"></span>
        </a>

        <ul class="sub-menu">
            {{--<li {!! (Request::is('admin/plans') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/plans') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Merchant Plan', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/category') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/category') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Category', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/types') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/types') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Type', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            <li {!! (Request::is('admin/city') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/city') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Add New City', [], $_SESSION['lang']) }}
                </a>
            </li>
            {{--<li {!! (Request::is('admin/tag') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/tag') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Tags', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/thirdparty') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/thirdparty') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--{{ _t('Third Party', [], $_SESSION['lang']) }}--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/business') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/business') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--Business Options--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li {!! (Request::is('admin/pointtype') ? 'class="active" id="active"' : '') !!}>--}}
                {{--<a href="{{ URL::to('admin/pointtype') }}">--}}
                    {{--<i class="fa fa-angle-double-right"></i>--}}
                    {{--Point Types--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </li>
    <?php
        if($role_id == 1){
    ?>
    <li {!! (Request::is('admin/staffs') || Request::is('admin/staffs/create') || Request::is('admin/staff_profile') || Request::is('admin/staffs/*') || Request::is('admin/deleted_staffs') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user-flag" data-size="18" data-c="#e9573f" data-hc="#e9573f"
               data-loop="true"></i>
            <span class="title">{{ _t('Security', [], $_SESSION['lang']) }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <?php
            $admin = \DB::table('users')->select(['users.id'])
                    ->join('role_users', 'role_users.user_id', '=', 'users.id')
                    ->where('role_users.role_id', 1)->first();
            ?>
            <li {!! (Request::is('admin/staffs/'.$admin->id) ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/staffs/'.$admin->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Admin', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/staffs') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/staffs') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Server Users', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/deleted_staffs') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/deleted_staffs') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Deleted Server Users', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/staffs/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/staffs/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Add New Server User', [], $_SESSION['lang']) }}
                </a>
            </li>
        </ul>
    </li>
    <?php
    }
    ?>
    <li {!! (Request::is('admin/charts') || Request::is('admin/piecharts') || Request::is('admin/charts_animation') || Request::is('admin/jscharts') || Request::is('admin/sparklinecharts') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="barchart" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">{{ _t('Reports', [], $_SESSION['lang']) }}</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/charts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/reports/charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Sales Reports', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/piecharts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/reports/piecharts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('User Report', [], $_SESSION['lang']) }}
                </a>
            </li>
            <li {!! (Request::is('admin/charts_animation') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/reports/charts_animation') }}">
                    <i class="fa fa-angle-double-right"></i>
                    {{ _t('Activity Report', [], $_SESSION['lang']) }}
                </a>
            </li>
        </ul>
    </li>
</ul>