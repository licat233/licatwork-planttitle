<div class="buyAndmessage">
    <h1 class="buyAndmessage-h1">結算頁面</h1>
<div class="accountBox">
    <!-- 填寫你個人信息的列表 -->
    <div class="messageList">
        <form>
            <div class="menuHead">
                <p class="menuhead-h1">填寫個人資訊</p>
            </div>
            <!-- 姓名 -->
            <div class="messageContact" id="messageboxName">
                <label required>姓名</label>
                <div class="phoneContent">
                    <input name="name" oninput="verifyInput(this)" class="messageName" type="text" placeholder="填寫你的姓名">
                    <!-- <input name="iptName" class="messageName" type="text" placeholder="填寫你的姓名"> -->
                    <span class="errorName displayOff">請正確填寫你的姓名</span>
                    <i class="iconfont icon-dui nameYes displayOff"></i>
                </div>
            </div>
            <!-- 聯繫方式 -->
            <div class="messageContact" id="messageboxRelation">
                <label required>電話號碼</label>
                <div class="phoneContent">
                    <input class="messageRela" name="phone_number" oninput="verifyInput(this)" placeholder="填寫你的電話號碼">
                    <!-- <input class="messageRela" name="iptRela" placeholder="填寫你的電話號碼"> -->
                    <span class="errorPhone displayOff">請正確填寫你的電話號碼</span>
                    <i class="iconfont icon-dui phoneYes displayOff"></i>
                </div>
            </div>
            <!-- 送貨地址 -->
            <div class="messageContact" id="messageSite">
                <label required>收貨地址</label>
                <div class="phoneContent">
                    <input class="messageSite" type="text" oninput="verifyInput(this)" placeholder="你的詳細住址或便利商店地址取貨"
                        name="address">
                    <span class="displayOff errorSite">請正確填寫你的收貨地址</span>
                    <i class="iconfont icon-dui siteYes displayOff"></i>
                </div>
            </div>
            <!-- 支付方式 -->
            <div class="messageContact" id="messageTextarea">
                <label>支付方式</label>
                <div class="phoneContent oIAll">
                    <label class="pay_method_radio" for="pay_method" style="display:flex">
                        <input type="radio" class="messageSite" id="pay_method" name="pay_method" value="貨到付款" checked
                            style="width:28px"><i class="activeWay"></i>貨到付款
                    </label>
                    
                      <label class="pay_method_radio iMartop" for="pay_method" style="display:flex">
                        <input type="radio" class="messageSite" id="pay_method" name="pay_method" value="貨到付款" checked
                            style="width:28px"><i></i>便利商店取貨
                    </label>
                    
                    <span class="displayOff errorRemark">請正確填寫你的支付方式</span>
                    <i class="iconfont icon-dui remarkYes displayOff"></i>
                </div>
            </div>
            <!-- 送貨備註 -->
            <div class="messageContact" id="messageTextarea">
                <label>送貨備註</label>
                <div class="phoneContent">
                    <textarea class="messageRemark" cols="50" rows="5" placeholder="填寫你的送貨備註" name="remark"></textarea>
                    <span class="displayOff errorRemark">請正確填寫你的送貨備註</span>
                    <i class="iconfont icon-dui remarkYes displayOff"></i>
                </div>
            </div>

            <!-- 商品信息 -->
            <!--<input class="productInfo" type="text" value="" name="product_list" />-->

            <!-- 點擊按鈕選擇購買或者返回列表頁 -->
            <div class="buyAndBack">
                <button class="purchase" type="button">
                    <a>立即下單</a>
                </button>
                <button class="lookAgain">
                    <a class="lookAgain-a" href="/shops">繼續選購</a>
                </button>
            </div>
        </form>
        <div class="orderHistoryList">
            <div style="display:flex;align-items:center;">
                <p class="history">歷史訂單</p>
                <i class="historyBtn iconfont icon-xia" class="historyI"></i>
            </div>
            <div class="historyContent">
                <ul id="orderNumberList"></ul>
            </div>
        </div>
    </div>
    <!-- 你購買的東西列表 -->
    <div class="buyList" id="hold">
        <div class="buyListHead">
            <i class="carIcon iconfont icon-gwc"></i>
            <p class="buyList-ul-h1">你要購買的產品</p>
            <i class="upBtn iconfont icon-shang"></i>
            <i class="lowBtn iconfont icon-xia displayOff"></i>
        </div>
        <ul class="buyList-ul">

        </ul>
        <!-- 總計 -->
        <div class="aggregate" style="margin-top: 5px;text-align: right">
            <span>總件數：</span>
            <span class="carCount"></span>&emsp;&emsp;&emsp;
            <span>總金額：</span>
            <span class="changeVal"></span>
        </div>
    </div>
</div>
</div>
</main>
</div>
<div id="loading_bg"
    style="width: 100%;height: 100%;position: fixed;top: 0px;left: 0px;z-index: 2000;background-color: rgb(239, 239, 239);opacity: 0.6;display: none;">
</div>
<div id="orderpopup" class="fadeOut"
    style="width: 100%; height: 100%; position: fixed; top: 120px; left: 0px; z-index: 2002; border: 0px solid rgb(255, 0, 0);display:none;">
    <table width="90%" border="0" cellpadding="4" cellspacing="8" align="center"
        style="border:1px solid #666666;border-radius:10px;background-color:#CCCCCC;max-width:500px;">
        <tbody>
            <tr>
                <td style="color:#666666;font-weight:bold;text-align:left;"><span
                        style="color:#FFFFFF;font-size:12px;font-weight:bold;background-color:#468e43;padding:2px 9px 2px 9px;border-radius:20px;">!</span>&nbsp;&nbsp;提示訊息
                </td>
            </tr>
            <tr>
                <td style="background-color:#FFFFFF;padding-top:20px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td style="text-align:center;vertical-align:top;"><span
                                        style="line-height:30px;font-size: 1rem;" id="orderpopup_msg"></span></td>
                            </tr>
                            <tr>
                                <td style="text-align:center;padding:15px 0px;">
                                    <div style="text-align:center;padding:10px;cursor:pointer;" onclick="closeResult()">
                                        <span
                                            style="padding:5px 10px;color:#666666;border:1px solid #CCCCCC;background-color:#EEEEEE;">OK</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>