<link rel="stylesheet" href="//at.alicdn.com/t/font_2665170_fqybvhdd2pb.css">
<style>
    body>.carandtop {
        display: none;
    }

    .carandtop {
        z-index: 9;

    }

    .container .carandtop .carBtn i {
        color: #9c27b0;
    }

    .push button {
        background: none;
        color: #fff;
    }
</style>
<script src="/wp-content/themes/planttitle/assets/js/jquery.min.js"></script>
<div class="buyCar">
    <div class="carContent">
        <div class="carHead">
            <h2>我的購物車</h2>
            <!-- 關閉按鈕 -->
            <i class="iconfont icon-guanbi"></i>
        </div>
        <!-- 如果購物車沒有商品顯示這個div -->
        <div class="hideCar displayOff">
            <span>你的購物車還沒有東西喔</span>
        </div>
        <!-- 購物車內容 -->
        <div class="carCen">

        </div>
        <!-- 購物車合計 -->
        <div class="carTotal">
            <ul>
                <li class="carTotal-li1">
                    <div class="catTotal-li1-div1">
                        <a>繼續購物</a>
                    </div>
                    <div class="catTotal-li1-div2">
                    </div>
                </li>
                <li class="carTotal-li2">
                    <div class="catTotal-li2-div1">
                    </div>
                    <div class="catTotal-li2-div2">
                        <a data-url="/clearing/">結算</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="historyOrderContent">
        <div class="historyOrderHeader">
            <h2>我的歷史訂單</h2>
        </div>
        <div class="historyOrderBody">
            <ul class="historyOrderBodyUl">
            </ul>
        </div>
    </div>

    <!-- 購物車遮罩層 -->
    <div class="layer"></div>

    <!-- 彈窗是否確定刪除商品 -->
    <div class="dialog">
        <div class="dialogHead">
            <p>删除商品</p>
            <i class="iconfont icon-guanbi noDialog"></i>
        </div>
        <div class="dialogBody">
            <p>您確定要删除該商品嗎？</p>
        </div>
        <div class="dialogFoot">
            <input type="button" value="確定" class="ensure">
            <input type="button" value="關閉" class="shut">
        </div>
    </div>

</div>

<ul class="carandtop">
    <li>
        <div class="carBtn">
            <i class="iconfont icon-gwc"></i>
        </div>
    </li>
</ul>