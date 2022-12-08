$.ajax({
  url: "/wp-content/themes/planttitle/carData.php",
  type: "GET",
  dataType: "json",
  async: false,
  success: function (data) {
    window.productStorage = data;
  },
});
var purChase = document.querySelector(".purchase");
var iptName = document.querySelector(".messageName");
var erroriptName = document.querySelector(".errorName");
var yesName = document.querySelector(".nameYes");
var iptRela = document.querySelector(".messageRela");
var erroriptPhone = document.querySelector(".errorPhone");
var yesPhone = document.querySelector(".phoneYes");
var iptSite = document.querySelector(".messageSite");
var erroriptSite = document.querySelector(".errorSite");
var yesSite = document.querySelector(".siteYes");
var iptMark = document.querySelector(".messageRemark");
var erroriptMark = document.querySelector(".errorRemark");
var yesMark = document.querySelector(".remarkYes");
var aI = document.querySelectorAll(".oIAll .pay_method_radio i");
var aIleng = aI.length;
var nameVerify, relaVerify, ressVerify;
if (localStorage.getItem("userInfo")) {
  var localObj = localStorage.getItem("userInfo");
  localObj = JSON.parse(localObj);
} else {
  var localObj = {};
}
aI.forEach((item, index) => {
  item.onclick = function () {
    for (var i = 0; i < aIleng; i++) {
      aI[i].classList.remove("activeWay");
    }
    item.classList.add("activeWay");
    localObj["pay_method"] = index;
    localStorage.setItem("userInfo", JSON.stringify(localObj));
  };
});
localMap = {
  name: function () {
    erroriptName.classList.remove("displayOn");
    erroriptName.classList.add("displayOff");
    yesName.classList.remove("displayOff");
    yesName.classList.add("displayOn");
    nameVerify = true;
  },
  phone_number: function () {
    erroriptPhone.classList.remove("displayOn");
    erroriptPhone.classList.add("displayOff");
    yesPhone.classList.remove("displayOff");
    yesPhone.classList.add("displayOn");
    relaVerify = true;
  },
  address: function () {
    erroriptSite.classList.remove("displayOn");
    erroriptSite.classList.add("displayOff");
    yesSite.classList.remove("displayOff");
    yesSite.classList.add("displayOn");
    ressVerify = true;
  },
};
localIpt();
function localIpt() {
  if (localStorage.getItem("userInfo")) {
    let newObj = localStorage.getItem("userInfo");
    newObj = JSON.parse(newObj);
    let formAdd = document.querySelectorAll("form input");
    formAdd.forEach((item, index) => {
      if (item.name === "name" && newObj["name"]) {
        item.value = newObj["name"];
        localMap["name"]();
      } else if (item.name === "phone_number" && newObj["phone_number"]) {
        item.value = newObj["phone_number"];
        localMap["phone_number"]();
      } else if (item.name === "address" && newObj["address"]) {
        item.value = newObj["address"];
        localMap["address"]();
      }
    });
    if (newObj.pay_method === 1) {
      for (let i = 0; i < aI.length; i++) {
        aI[0].classList.remove("activeWay");
        aI[1].classList.add("activeWay");
      }
    } else {
      aI[0].classList.add("activeWay");
      aI[1].classList.remove("activeWay");
    }
  }
}
function verifyInput(e) {
  var newMessage = e.value;
  var name = e.name;
  if (name === "name") {
    if (newMessage.length < 2) {
      erroriptName.classList.remove("displayOff");
      erroriptName.classList.add("displayOn");
      yesName.classList.remove("displayOn");
      yesName.classList.add("displayOff");
      nameVerify = false;
    } else {
      localMap[name]();
      localObj[name] = newMessage;
      localStorage.setItem("userInfo", JSON.stringify(localObj));
    }
  }
  if (name == "phone_number") {
    if (newMessage.length < 6) {
      erroriptPhone.classList.remove("displayOff");
      erroriptPhone.classList.add("displayOn");
      yesPhone.classList.remove("displayOn");
      yesPhone.classList.add("displayOff");
      relaVerify = false;
    } else {
      localMap[name]();
      localObj[name] = newMessage;
      localStorage.setItem("userInfo", JSON.stringify(localObj));
    }
  }
  if (name == "address") {
    if (newMessage.length < 6) {
      erroriptSite.classList.remove("displayOff");
      erroriptSite.classList.add("displayOn");
      yesSite.classList.remove("displayOn");
      yesSite.classList.add("displayOff");
      ressVerify = false;
    } else {
      localMap[name]();
      localObj[name] = newMessage;
      localStorage.setItem("userInfo", JSON.stringify(localObj));
    }
  }
}
let historyBtn = document.querySelector(".historyBtn");
historyBtn.onclick = function () {
  $(this).toggleClass("icon-xia");
  $(this).toggleClass("icon-shang");
  $(".historyContent").toggleClass("heightZero");
};
purChase.addEventListener("click", submitOrder);
function submitOrder() {
  if (iptName.value.trim() === "" || !nameVerify)
    return alert("請填寫你的姓名");
  if (iptRela.value.trim() === "" || !relaVerify)
    return alert("請填寫你的電話號碼");
  if (iptSite.value.trim() === "" || !ressVerify)
    return alert("請填寫你的收貨地址");
  var thenEvent = (order_number) => {
    window.sessionStorage.removeItem("commodity");
    window.localStorage.removeItem("commodity");
    var msg = `下單成功，你的訂單號為：<br/>${order_number}<br/>我們會盡快為你發貨，祝你生活愉快`;
    showResult(msg);
  };
  var catchEvent = () => {
    showResult("下單失敗，請添加植題官方LINE，聯繫客服下單更優惠");
  };
  var postdata = {};
  var t = $("form").serializeArray();
  $.each(t, function () {
    postdata[this.name] = this.value;
  });
  var productArr = product_list_handle();
  if (productArr.length === 0) return alert("你購物車內沒有商品");
  postdata["product_list"] = JSON.stringify(productArr);
  postdata["product_num"] = product_num_handle(productArr);
  postdata["pay_method"] = pay(aI, aIleng);
  postdata["total_price"] = product_price_handle(productArr);
  postdata["brand"] = "植題Planttitle";
  $.post(
    "https://newworkbench.com/shop_order/postorder",
    postdata,
    function (res) {
      console.log(res);
      if (res.status === 200) {
        var orderHistory = window.sessionStorage.getItem("localOrderHistory");
        if (orderHistory !== null) {
          orderHistoryArr = JSON.parse(orderHistory);
        }
        if (localStorage.getItem("localOrderHistory")) {
          var orderHistoryArr = localStorage.getItem("localOrderHistory");
          orderHistoryArr = JSON.parse(orderHistoryArr);
        } else {
          var orderHistoryArr = [];
        }
        orderHistoryArr.push({
          order_number: res.order_number,
          order_date: res.order_date,
          order_list: JSON.parse(res.productList),
          order_price: Number(res.totalPrice),
        });
        window.localStorage.setItem(
          "localOrderHistory",
          JSON.stringify(orderHistoryArr)
        );
        window.sessionStorage.removeItem("commodity"),
          window.localStorage.removeItem("commodity"),
          showResult(
            `下單成功，你的訂單號為：<br/>${res.order_number}<br/>我們會盡快為你發貨，祝你生活愉快`
          );
        return;
      }
      catchEvent();
    }
  );
}
var buyArr = [];
var includesUl = document.querySelector(".buyList-ul");
var upbtn = document.querySelector(".upBtn");
var downbtn = document.querySelector(".lowBtn");
upbtn.onclick = function () {
  includesUl.classList.add("zeroHeight");
  upbtn.classList.add("displayOff");
  downbtn.classList.remove("displayOff");
};
downbtn.onclick = function () {
  includesUl.classList.remove("zeroHeight");
  upbtn.classList.remove("displayOff");
  downbtn.classList.add("displayOff");
};
var newbuyDise = JSON.parse(window.localStorage.getItem("commodity"));
var newbuysess = window.sessionStorage.getItem("commodity");
newbuysess = JSON.parse(newbuysess);
var amount = document.querySelector(".changeVal");
var priVal = 0;
var countE = document.querySelector(".carCount");
var reqData = window.productStorage;
(function () {
  var total_charge = 0;
  var total_count = 0;
  var htmlarr = product_list_handle().map((item) => {
    total_charge += item.price * item.num * 100;
    total_count += item.num;
    return `<div class="showCar"car-id=${item.id}>
                <div class="carImg">
                    <a>
                        <img src="${item.image}" decoding="async" />
                    </a>
                </div>
                <div class="carInfo">
                    <div class="carName">
                        <p>${item.name}</p>
                    </div>
                    <div class="carPrice">
                        <p>NT$&nbsp;
                            <input data-price=${item.price} value="${(item.price * item.num).toFixed(2)}" readonly />
                        </p>
                    </div>
                    <div class="calc">
                        <div id="calc-left">
                            <i class="iconfont icon-jianqu" onclick="changeProductNum(this,'-')" left-id=${item.id}></i>
                        </div>
                        <div id="center">
                            <input type="text" value="${item.num}" data-pid=${item.id} disabled="disabled">
                        </div>
                        <div id="calc-right">
                            <i class="iconfont icon-21" onclick="changeProductNum(this,'+')" right-id=${item.id}></i>
                        </div>
                    </div>
                </div>
                <div class="carOperation">
                    <i class="iconfont icon-shanchu" data-del="${item.id}" onclick="deleteProduct(${item.id})"></i>
                </div>
            </div>`;
  });
  includesUl.innerHTML = htmlarr.toString();
  amount.innerHTML = "NT$ " + (total_charge / 100).toFixed(2);
  countE.innerHTML = total_count;
  var orderHistory = window.localStorage.getItem("localOrderHistory");
  if (orderHistory) {
    orderHistoryArr = JSON.parse(orderHistory);
    var htmlarr = orderHistoryArr.map((i, idx) => {
      let tempStr = "";
      tempStr = i["order_list"].reduce((acc, curr, index) => {
        return (
            acc + `
                <div class="productList">
                    <div class="productListImg">
                        <img src="${curr.image}" decoding="async" />
                    </div>
                    <div class="productListInfo">
                        <p style="font-size: 16px;"class="productName">${curr.name}</p>
                        <p>商品單價：
                            <span class="goodCharacter">NT$${Number(curr.price).toFixed(2)}</span>
                        </p>
                    </div>
                    <p style="line-height: 60px;margin-left:10px;" class="goodCharacter productAmount">X ${curr.num}</p>
                </div>`);}, ``);
      return `<li>
                <p>訂單編號：
                    <span class="goodCharacter">${i.order_number}</span>
                </p>
                <p>购买商品信息：</p>
                ${tempStr}
                <div class="productBto">
                    <p class="orderTime">下單時間：
                        <span class="goodCharacter">${i.order_date}</span>
                    </p>
                    <p class="orderPrice">總金額：
                        <span class="goodCharacter">NT$${Number(i.order_price).toFixed(2)}</span>
                    </p>
                    </div>
                </li>`;});
    orderNumberList.innerHTML = htmlarr.join("");
  }
})();
var productId;
var closeCount = document.querySelectorAll("#center input");
var formerLocal = window.localStorage.getItem("commodity");
var formerSession = window.sessionStorage.getItem("commodity");
function pay(eleArr, arrLen) {
  for (var i = 0; i < arrLen; i++) {
    if (eleArr[i].getAttribute("class") === "activeWay") {
      return eleArr[i].parentNode.innerText;
    }
  }
}
function product_list_handle() {
  var parr = window.productStorage;
  var res = JSON.parse(window.localStorage.getItem("commodity")) || {};
  var hasarr = [];
  if (!parr) return hasarr;
  parr.forEach((item) => {
    for (var pid in res) {
      if (parseInt(item.product_id) == parseInt(pid)) {
        hasarr.push({
          id: pid,
          name: item.pro_name,
          price: item.min_price,
          num: res[pid],
          image: item.url,
        });
      }
    }
  });
  return hasarr;
}
function product_num_handle(parr) {
  var total_num = 0;
  parr.forEach((item) => {
    total_num += item.num;
  });
  return Number(total_num);
}
function product_price_handle(parr) {
  var total_price = 0;
  parr.forEach((item) => {
    total_price += item.price * item.num * 100;
  });
  return total_price / 100;
}
function showResult(msg) {
  orderpopup_msg.innerHTML = msg;
  (orderpopup.style.display = "block"),
    (loading_bg.style.display = "block"),
    (document.body.style.overflow = "hidden");
}
function closeResult() {
  (loading_bg.style.display = "none"), (document.body.style.overflow = "");
  fadeIn(orderpopup);
}
function fadeIn(el) {
  el && el.classList.add("fadeIn"),
    setTimeout(function () {
      el && el.classList.remove("fadeIn"), el && (el.style.display = "none");
      window.location.href = "/shops/";
    }, 400);
}
function changeProductNum(ele, type) {
  var numEl = ele.parentNode.parentNode.querySelector("input");
  var nowNum = parseInt(numEl.value);
  if (type === "-" && nowNum > 1) {
    nowNum--;
    countE.innerHTML = Number(countE.innerHTML) - 1;
  } else if (type === "+" && nowNum < 100) {
    nowNum++;
    countE.innerHTML = Number(countE.innerHTML) + 1;
  } else {
    return;
  }
  numEl.value = nowNum;
  var pid = parseInt(numEl.dataset.pid);
  var priceE = document
    .querySelector(".showCar[car-id='" + pid + "']")
    .querySelector(".carPrice input");
  let val = parseFloat(priceE.dataset.price) * nowNum;
  priceE.value = val.toFixed(2);
  var clickNew = JSON.parse(window.localStorage.getItem("commodity"));
  clickNew[pid] = nowNum;
  carTotalCost();
  window.localStorage.setItem("commodity", JSON.stringify(clickNew));
}
function carTotalCost() {
  var priceEs = document.querySelectorAll(".showCar .carPrice input");
  var total_cost = 0;
  priceEs.forEach((it) => {
    total_cost += parseFloat(it.value) * 100;
  });
  total_cost = total_cost / 100;
  amount.innerHTML = "NT$ " + total_cost.toFixed(2);
}
function deleteProduct(pid) {
  var ele = document.querySelector(".showCar[car-id='" + pid + "']");
  ele.parentNode.removeChild(ele);
  var newestdata = window.localStorage.getItem("commodity");
  var newobj = JSON.parse(newestdata);
  delete newobj[pid];
  window.localStorage.setItem("commodity", JSON.stringify(newobj));
  carTotal();
  carCount();
}
function carTotal() {
  var priceEs = document.querySelectorAll(".showCar .carPrice input");
  var total_cost = 0;
  priceEs.forEach((it) => {
    total_cost += parseFloat(it.value) * 100;
  });
  total_cost = total_cost / 100;
  amount.innerHTML = "NT$ " + total_cost;
}
function carCount() {
  var newData = JSON.parse(window.localStorage.getItem("commodity"));
  let carLength = 0;
  for (var key in newData) {
    carLength += newData[key];
  }
  if (countE) {
    countE.innerHTML = carLength;
  }
}
