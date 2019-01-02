<!DOCTYPE html>
<!-- saved from url=(0047)http://static.sucaihuo.com/modals/11/1124/demo/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>后台登录</title>
    <meta name="author" content="DeathGhost">

    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/cus_plat/style.css") }}">
    <style>
        body{height:100%;background:#16a085;overflow:hidden;}
        canvas{z-index:-1;position:absolute;}
    </style>

    <script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}} "></script>

    <script src="{{ admin_asset("/vendor/laravel-admin/cus_plat/verificationNumbers.js")}} "></script>
    <script src="{{ admin_asset("/vendor/laravel-admin/cus_plat/Particleground.js")}} "></script>

    <script>
        $(document).ready(function() {
            //粒子背景特效
            $('body').particleground({
                dotColor: '#5cbdaa',
                lineColor: '#5cbdaa'
            });
            //验证码
            createCode();
            //测试提交，对接程序删除即可
            $(".submit_btn").click(function(){
                location.href="javascrpt:;"/*tpa=http://***index.html*/;
            });
        });
    </script>
    <style id="tsbrowser_video_independent_player_style" type="text/css">                                                            [tsbrowser_force_max_size] {                                                   width: 100% !important;                                                      height: 100% !important;                                                     left: 0px !important;                                                        top: 0px !important;                                                         margin: 0px !important;                                                      padding: 0px !important;                                                   }                                                                            [tsbrowser_force_fixed] {                                                      position: fixed !important;                                                  z-index: 9999 !important;                                                    background: black !important;                                              }                                                                            [tsbrowser_force_hidden] {                                                     opacity: 0 !important;                                                       z-index: 0 !important;                                                     }                                                                            [tsbrowser_hide_scrollbar] {                                                   overflow: hidden !important;                                               }</style></head>
<body style=""><canvas class="pg-canvas" width="1920" height="947"></canvas>
<form action="{{ admin_base_path('auth/login') }}" method="post">
<dl class="admin_login">
    <dt>
        <strong>韩诀广告后台管理系统</strong>
        <em>Management System</em>
    </dt>
    <dd class="user_icon">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <input type="text" placeholder="账号" name="username" class="login_txtbx">

    </dd>
    @if($errors->has('username'))
        @foreach($errors->get('username') as $message)
            <p>{{$message}}</p>
        @endforeach
    @endif


    <dd class="pwd_icon">
        <input type="password" placeholder="密码" name="password" class="login_txtbx"> <span>sdewqeqw</span>

    </dd>
    @if($errors->has('password'))
        @foreach($errors->get('password') as $message)
            <p>{{$message}}</p>
        @endforeach
    @endif
    <dd class="val_icon">
        <div class="checkcode">
            <input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
            <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
        </div>
        <input style="color: red" id="hj_yzm" type="button" value="请点击核验验证" class="ver_btn" onclick="validate();">

        <input type="hidden" id="y_codetext" name="y_codetext" value="0">
    </dd>
    <dd>
        <input type="submit" value="立即登陆" class="submit_btn ">
    </dd>
    <dd>
        <p  style="display: none;color: red" id="error-login"></p>
    </dd>
</dl>

</form>

<div style="position: static; width: 0px; height: 0px; border: none; padding: 0px; margin: 0px;"><div id="trans-tooltip"><div id="tip-left-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-left-top.png&quot;);"></div><div id="tip-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-top.png&quot;) repeat-x;"></div><div id="tip-right-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-right-top.png&quot;);"></div><div id="tip-right" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-right.png&quot;) repeat-y;"></div><div id="tip-right-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-right-bottom.png&quot;);"></div><div id="tip-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-bottom.png&quot;) repeat-x;"></div><div id="tip-left-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-left-bottom.png&quot;);"></div><div id="tip-left" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-left.png&quot;);"></div><div id="trans-content"></div></div><div id="tip-arrow-bottom" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-arrow-bottom.png&quot;);"></div><div id="tip-arrow-top" style="background: url(&quot;chrome-extension://ikkepelhgbcgmhhmcmpfkjmchccjblkd/imgs/map/tip-arrow-top.png&quot;);"></div></div></body></html>


<script>



    $(".cus-login").click(function ()
    {
        var res=validate();
        if(res==false){
            $("#error-login").html('验证码错误');
            return false;
        }
        var url='{{admin_base_path('auth/login')}}';
        var username=$('input[name="a_name"]').val() ;
        var password=$('input[name="a_password"]').val() ;
        var a_code="" ;
        var login_token=$('input[name="login-token"]').val();
        $.post(url,{
            username:username,
            password:password,
            a_code:a_code,
            _token:login_token,
        },function(result){
            if(result.code==200)
            {
                location="/";

            }else{
                $("#error-login").html(result.msg);
                $("#error-login").show();
            }


        },'JSON');


    })
</script>