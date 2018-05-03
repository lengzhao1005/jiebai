@extends('layouts._main')

@section('title','绑定手机号')

@section('css')

@endsection

@section('container')

    <form class="am-form am-form-horizontal">
        <div class="am-form-group">
            <div class="am-u-sm-12 am-form-success">
                <input type="number" class="am-form-field" maxlength="11" id="doc-phe-3" placeholder="输入你的手机号">
            </div>
        </div>

        <div class="am-form-group">
            <div class="am-u-sm-7 am-form-error">
                <input type="text" class="am-form-field" id="doc-ipt-pwd-2" placeholder="请输入6位验证码">
            </div>

            <div class="am-u-sm-5">
                <button type="button" class="am-btn am-btn-default get-code" style="width: 100%">获取验证码</button>
            </div>
        </div>


        <div class="am-form-group am-u-sm-12 am-text-center">

            <button type="submit" class="am-btn am-btn-block am-btn-default">确认绑定</button>

        </div>
    </form>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/show_msg.js') }}"></script>
    <script>
        var phone = '';

        function validatePhone() {
            phone = $('#doc-phe-3').val();
            var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
            if (!myreg.test(phone)) {
                showMsg('请输入正确的手机号');
                return false;
            } else {
                return true;
            }
        }

        $('.get-code').click(function(){

            if(!validatePhone()) return;

            if($(this).hasClass('loading')) return ;

            $(this).addClass('loading');

            var sum_time = 60;
            //this = that;
            var timer = setInterval(function () {
                --sum_time;
                if(sum_time == 0){
                    clearInterval(timer);
                    $('.get-code').html('重新发送');
                    $('.get-code').removeClass('loading')
                }else{
                    $('.get-code').html('<span style="color:red;">'+sum_time+'s</span>后重新发送');
                }
            },1000);

            $.ajax({
                url:'/send-code/bind-phone',
                type:'post',
                dataType:'json',
                data:{'__token':window.laravel_csrf_token,'phone':phone},
                success:function(res){
                    if(res.err_code==200){
                        showMsg(res.err_msg);
                    }else{
                        showMsg(res.err_msg)
                    }
                    //$('.get-code').removeClass('loading');
                    return ;
                },
                error:function(){
                    //$('.get-code').removeClass('loading');
                    alert('网络故障，请检查您的网络');
                    return ;
                }
            });
        });
    </script>
@endsection