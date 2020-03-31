<li class="dropdown notifications-menu">
    <?php
    $notifications = DB::table('notifications')->where('status', 1)->orderby('created_at', 'desc')->limit(20)->get();
    $cnt = 0;
    if(!empty($notifications)){
        $cnt = count($notifications);
    }
    ?>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f"
           data-hovercolor="#e9573f" data-size="28"></i>
        <span id="noticnt" class="label label-warning">{{ $cnt }}</span>
    </a>
    <ul class=" notifications dropdown-menu">

        <li class="dropdown-title">{{ _t('You have '.$cnt.' notifications.', [], $_SESSION['lang']) }}</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <?php
                date_default_timezone_set("Asia/Tokyo");
                foreach($notifications as $notification){
                    $date_a = new DateTime(date('Y-m-d'));
                    $date_b = new DateTime($notification->created_at);

                    $interval = date_diff($date_a,$date_b);
                    $h = $interval->format('%h');
                    $i = $interval->format('%i');
                    $s = $interval->format('%s');
                    $d = $interval->format('%d');
                    $val = '';
                    if($d != 0){
                        $val = $d.' days ago';
                    }else if($h != 0){
                        $val = $h.' hours ago';
                    }else if($i != 0){
                        $val = $i.' minutes ago';
                    }else {
                        $val = 'Just Now';
                    }
                    $user = DB::table('users')->where('id', $notification->user_id)->first();
                    $username = '';
                    if(!empty($user)) $username = $user->first_name.' '.$user->last_name;
                ?>
                <li id="noti{{ $notification->id }}">
                    <div class="row">
                    <div class="col-md-6">
                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                        {{ $username }}
                    </div>
                    <div class="col-md-6">
                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                        {{ $val }}
                    </div>
                    </div>

                    <div class="row" style="vertical-align: middle;border-bottom: 1px solid #c2cce0;">
                        <i class="livicon success" data-n="hand-right" data-s="15" data-c="white" style="padding: 5px 20px 20px 5px;"
                                                      data-hc="white"></i>
                        <div style="margin-top: 5px;">{{ $notification->content }}<span class="fa fa-close" style="float: right;margin-right:10px;cursor: pointer" onclick="deleteNotification('{{ $notification->id }}')"></span></div>
                    </div>

                </li>
                <?php } ?>
            </ul>
        </li>
        <li class="footer">
            <!--<a href="#">View all</a>-->
        </li>
    </ul>
</li>
<script>
    function deleteNotification(id){
        var token = $('#_token').val();
        var data = {
            id: id,
            _token: '{{ csrf_token() }}'
        };
        //console.log(data);
        $.ajax({
            url: '/admin/remove-noti',
            data: data,
            type: 'POST',
            success: function(data){
                $('#noti'+id).remove();
                var cnt = $('#noticnt').html() - 1;
                $('#noticnt').html(cnt);
                $('.dropdown-title').html('You have '+cnt+' notifications.');
            }
        });
    }
</script>