@extends('layouts._main')

@section('title','个人中心')

@section('css')
    <style type="text/css">
        body{background-color: #ddd}
        /*抖动*/
        .shake{
            -webkit-animation-name: shake_box;
            -ms-animation-name: shake_box;
            animation-name: shake_box;
            -webkit-animation-duration: 100ms;
            -ms-animation-duration: 100ms;
            animation-duration: 100ms;
            -webkit-animation-timing-function: ease-in-out;
            -ms-animation-timing-function: ease-in-out;
            animation-timing-function: ease-in-out;
            -webkit-animation-delay: 0s;
            -ms-animation-delay: 0s;
            animation-delay: 0s;
            -webkit-animation-iteration-count: infinite;
            -ms-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
        }
        @keyframes shake_box{
            0% {transform: translate(0px, 0px) rotate(0deg)}
            20% {transform: translate(1.5px, -2.5px) rotate(-1.5deg)}
            40% {transform: translate(-2.5px, 0.5px) rotate(-0.5deg)}
        }
        @-ms-keyframes shake_box{
            0% {-ms-transform: translate(0px, 0px) rotate(0deg)}
            20% {-ms-transform: translate(1.5px, -2.5px) rotate(-1.5deg)}
            40% {transform: translate(-2.5px, 0.5px) rotate(-0.5deg)}
        }

        /*会员卡等级部分*/
        .center-card{
            /*background-image: url("/back.png");*/
            /*height: 200px;*/
            background: -webkit-linear-gradient(left top, #DCE5EC , #A5B1BD); /* Safari 5.1 - 6.0 */
            background: -o-linear-gradient(bottom right, #DCE5EC, #A5B1BD); /* Opera 11.1 - 12.0 */
            background: -moz-linear-gradient(bottom right, #DCE5EC, #A5B1BD); /* Firefox 3.6 - 15 */
            background: linear-gradient(to bottom right, #DCE5EC , #A5B1BD); /* 标准的语法（必须放在最后） */
            text-align: center;
            color: #fff;
            font-size: 12px;
        }
        .process{
            overflow-x: scroll;
            /*color:#EFEFEF;*/
            font-weight: lighter;
<<<<<<< HEAD
            padding: 5% 0 17.5% 0;
=======
            padding: 5% 0 19% 0;
>>>>>>> 80dc69f407988d97619724b3244604c21108386e
        }
        .process::-webkit-scrollbar {
            display:none
        }
        .line{
            margin-top: 10%;
            width: 190%;
            height: 0.5rem;
            background-color: #616568;
        }
        .ng{
            height: 0.5rem;
            width: 10%;
            background-color: #E9EDED;
        }

        .rank{
            height: 40px;
            text-align: center;
            margin-top: -7%;
        }
        .rank .active{
            font-size: 14px;
            font-weight: 800;
        }
        .rank-div{
            width: 66%;
            height: 6rem;
            /*background-color: #ddd;*/
            margin: 0 auto;
        }
        .rank-radius{
            width: 50px;
            height: 50px;
            border-radius: 110%;
            background-color: red;
            margin: 0 auto;
            margin-bottom: 17%;
        }
        .rank-p{
            margin-top: 5px;
        }
        .center-card>p{
            margin-top: 0.5rem;
        }
        #clock{
            font-size: 10px;
            width: 5.5rem;
            height: 20px;
            border: 1px solid #fff;
            border-radius: 4px;
            background-color: rgba(255,255,255,0);
            margin: 3% 0;
        }
        /*.rank1{
            left: 4rem;
        }
        .rank2{
            left: 8rem;
        }
        .rank3{
           left: 10rem;
        }
        .rank4{
            left: 12rem;
        }*/
        /*tap区*/
        .center-tap{
            background-color: #fff;
            text-align: center;
            padding: 2.5% 0;
            border-bottom: 1px solid #ddd;
        }
        .center-tap1,.center-tap3,.center-tap2{
            height: 2rem;
            line-height: 2rem;
            display: inline-block;
            width: 32%;
            border:none;
            text-align: center;
        }
        .center-tap2{
            width: 32%;
            border-left: 0.5px solid #ddd;
            border-right: 0.5px solid #ddd;
        }
        .center-tap1>span{
            color: #FF8738;
            font-size: 16px;
        }
        /*二维码*/
        .center-qrcode{
            background-color: #fff;
            text-align: center;
            width: 100%;
            height: 50px;
            border-bottom: 5px solid #ddd;
        }

        /*会员权益*/
        .center-prower{
            background-color: #fff;
            font-size: 16px;
            overflow: hidden;
            padding: 4% 0;
        }
        h3{
            margin-bottom: 5%;
            text-align: center;
        }
        .center-bottom{
            background-color: #fff;
            overflow: hidden;
            border-top: 5px solid #ddd;
            font-size: 14px;
            padding: 10px 20px;
        }
        .bottom-button{
            color: #FF8738;
            width: 4.5rem;
            height: 21px;
            border: 1px solid #FF8738;
            float: right;
            font-size: 12px;
            background-color: #fff;
        }
        .bottom-text{
            line-height: 21px;
        }
    </style>
@endsection

@section('container')
<div class="app">
    <div class="center-card">
        <div class="process">
            {{--进度条--}}
            <div class="line">
                <div class="ng"></div>

                <div class="rank-div">
                    {{--记分牌--}}
                    {{--`<div class="rank am-u-sm-3">
                        <div class="rank-radius rank1">aa</div>
                        <p>普通会员</p>
                        <p class="rank-p">无成长值</p>
                    </div>--}}
                    <div class="rank am-u-sm-4">
                        <div class="rank-radius rank2">bb</div>
                        <p>银卡会员</p>
                        <p class="rank-p">200</p>
                    </div>
                    <div class="rank am-u-sm-4">
                        <div class="rank-radius rank3">cc</div>
                        <p>金卡会员</p>
                        <p class="rank-p">4000</p>
                    </div>
                    <div class="rank am-u-sm-4">
                        <div class="rank-radius rank4">dd</div>
                        <p>珀金卡会员</p>
                        <p class="rank-p">100000</p>
                    </div>
                </div>
            </div>
        </div>

        <p>距离下一等级还需777成长值</p>
        <button id="clock">打卡</button>
    </div>
    {{--tap--}}
    <div class="center-tap">
        <div class="center-tap1">
            积分 <span>852</span>
        </div>

        <div class="center-tap2">
            电子钱包
        </div>

        <div class="center-tap3">
            I礼平卡区
        </div>
    </div>
    {{--二维码--}}
    <div class="center-qrcode">

    </div>
    {{--权益--}}
    <div class="center-prower">
        <h3>会员特权</h3>
        <div class="am-u-sm-3">分享有礼</div>
        <div class="am-u-sm-3">2</div>
        <div class="am-u-sm-3">2</div>
        <div class="am-u-sm-3">2</div>

        <div class="am-u-sm-3">2</div>
        <div class="am-u-sm-3">2</div>
        <div class="am-u-sm-3">2</div>
        <div class="am-u-sm-3">2</div>

    </div>

    <div class="center-bottom">
        <span class="bottom-text">个人信息</span>
        <button class="bottom-button">编辑</button>
    </div>

    <div class="center-bottom" style="margin-bottom: 5rem">
        <span class="bottom-text">积分兑换</span>
        <button class="bottom-button">兑换</button>
    </div>
</div>
@endsection

@section('js')
    <script>
        $('.box').click(function () {
            $(this).addClass('shake');
        });

        var set = $('.rank2').offset().left-$(window).width()/2;
        $(".process").animate({ scrollLeft: ($('.rank3').offset().left-$(window).width()/2+25) }, 1000);
        $(".ng").animate({ width:'55%'},1000);

    </script>
@endsection