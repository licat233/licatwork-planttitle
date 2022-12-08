$.ajax({
  url: "/wp-content/themes/planttitle/carData.php",
  type: "GET",
  dataType: "json",
  async: false,
  success: function (data) {
    window.productStorage = data;
  },
});
var round = (n, decimals = 0) =>
  Number(`${Math.floor(`${n}e${decimals}`)}e-${decimals}`);
var orignalSetItem = localStorage.setItem;
localStorage.setItem = function (key, newValue) {
  var setItemEvent = new Event("setItemEvent");
  setItemEvent.key = key;
  setItemEvent.newValue = newValue;
  window.dispatchEvent(setItemEvent);
  orignalSetItem.apply(this, arguments);
};
function esti(dat) {
  var datArr = Object.keys(dat);
}
function carValue(page) {
  if (page === null) return;
  let newPage = JSON.parse(page);
  let carCen = document.querySelector(".carCen");
  var productArr = [];
  for (var k in newPage) {
    window.productStorage.forEach((item) => {
      if (parseInt(item.product_id) === parseInt(k)) {
        item["num"] = newPage[k];
        productArr.push(item);
      }
    });
  }
  if (productArr.length === 0) return;
  var htmlarr = productArr.map((item, index) => {
    let cost = item.min_price * 1 * item.num;
    return `<div class="showCar" car-id=${item.product_id}>
                <div class="carImg">
                    <a>
                        <img src="${item.url}" alt="${item.pro_name}"  decoding="async" />
                    </a>
                </div>
                <div class="carInfo">
                    <div class="carName">
                        <p>${item.pro_name}</p>
                    </div>
                    <div class="carPrice">
                        <p>NT$
                            <input
                                readonly="readonly"
                                data-price='${item.min_price * 1}' 
                                value="${round(cost, 2).toFixed(2)}"
                            />
                        </p>
                    </div>
                    <div class="calc">
                        <div id="calc-left">
                            <i class="iconfont icon-jianqu"onclick="carleftCount(this)"left-id=${item.product_id}></i>
                        </div>
                        <div id="center">
                            <input type="text" value="${item.num} "readonly="readonly" data-pid=${item.product_id}>
                        </div>
                        <div id="calc-right">
                            <i class="iconfont icon-21"onclick="carrightCount(this)" right-id=${item.product_id}></i>
                        </div>
                    </div>
                </div>
                <div class="carOperation">
                    <i class="iconfont icon-shanchu" data-del=${item.product_id} onclick="deleteProduct(${item.product_id})"></i>
                </div>
            </div>`;
  });
  carCen.innerHTML = htmlarr.toString();
  window.lastpage = newPage;
}
function carHeight() {
  $(".buyCar").resize(function () {
    var windowHeight = $(window).height();
    if ($(".buyCar").height() > windowHeight) {
      $(".buyCar").css({ height: "100%", overflow: "scroll" });
      showHideflag(false);
    }
  });
}
carHeight();
var dialogEnsure = document.querySelector(".ensure");
var dialogBox = document.querySelector(".dialog");
var nodialog = document.querySelector(".noDialog");
var offdialog = document.querySelector(".shut");
var layer = document.querySelector(".layer");
offdialog.onclick = function () {
  dialogBox.classList.remove("visib");
  layer.classList.remove("confirm");
};
nodialog.onclick = function () {
  dialogBox.classList.remove("visib");
  layer.classList.remove("confirm");
};
function deleteProduct(pid) {
  var ele = document.querySelector(".showCar[car-id='" + pid + "']");
  ele.parentNode.removeChild(ele);
  var newestdata = window.localStorage.getItem("commodity");
  var newobj = JSON.parse(newestdata);
  delete newobj[pid];
  window.localStorage.setItem("commodity", JSON.stringify(newobj));
  carTotal();
  carCount(newestdata);
}
function dialog(index, productSt) {
  console.log("index", index, "productSt", productSt);
  Object.getOwnPropertyNames(productSt).forEach((item, inde) => {
    dialogEnsure.onclick = function () {
      delete productSt[index];
      window.localStorage.setItem("commodity", JSON.stringify(productSt));
      layer.classList.remove("confirm");
      dialogBox.classList.remove("visib");
    };
  });
}
var carOff = document.querySelector(".carHead i");
var buyCarBox = document.querySelector(".buyCar");
carOff.onclick = function () {
  buyCarBox.classList.remove("carHeightOff");
  buyCarBox.classList.add("carHeight");
  showHideflag(false);
  document.querySelector(".carCen").innerHTML = "";
};
var carOff2 = document.querySelector(".catTotal-li1-div1");
carOff2.onclick = function () {
  buyCarBox.classList.remove("carHeightOff");
  buyCarBox.classList.add("carHeight");
  showHideflag(false);
};
var flag = false;
var carOnmove = document.querySelector(".headCaricon");
var carOn = document.querySelector(".carBtn i");
carOn.onclick = function () {
  var newestdata = window.localStorage.getItem("commodity");
  carValue(newestdata);
  carTotal();
  carCount(newestdata);
  buyCarBox.classList.remove("carHeight");
  buyCarBox.classList.add("carHeightOff");
  showHideflag(true);
};
function showHideflag(boolean) {
  if (boolean) {
    $("body").addClass("posi");
  } else if (!boolean) {
    $("body").removeClass("posi");
  }
}
function carleftCount(ele) {
  var numEl = ele.parentNode.parentNode.querySelector("input");
  var nowNum = parseInt(numEl.value);
  if (nowNum <= 1) return;
  numEl.value = nowNum - 1;
  var pid = parseInt(numEl.dataset.pid);
  var priceE = document
    .querySelector(".showCar[car-id='" + pid + "']")
    .querySelector(".carPrice input");
  let tempVal = parseFloat(priceE.dataset.price) * (nowNum - 1);
  priceE.value = tempVal.toFixed(2);
  var clickNew = JSON.parse(window.localStorage.getItem("commodity"));
  --clickNew[pid];
  carTotal();
  window.localStorage.setItem("commodity", JSON.stringify(clickNew));
}
function carrightCount(ele) {
  var numEl = ele.parentNode.parentNode.querySelector("input");
  var nowNum = parseInt(numEl.value);
  if (nowNum >= 100) return;
  numEl.value = nowNum + 1;
  var pid = parseInt(numEl.dataset.pid);
  var priceE = document
    .querySelector(".showCar[car-id='" + pid + "']")
    .querySelector(".carPrice input");
  let tempValue = parseFloat(priceE.dataset.price) * (nowNum + 1);
  priceE.value = tempValue.toFixed(2);
  var clickNew = JSON.parse(window.localStorage.getItem("commodity"));
  ++clickNew[pid];
  carTotal();
  window.localStorage.setItem("commodity", JSON.stringify(clickNew));
}
function carTotal() {
  var totalE = document.querySelector(".catTotal-li2-div1");
  var priceEs = document.querySelectorAll(".showCar .carPrice input");
  var total_cost = 0;
  priceEs.forEach((it) => {
    total_cost += parseFloat(it.value) * 100;
  });
  total_cost = (total_cost / 100).toFixed(2);
  totalE.innerHTML = `<p>合計：<a>${"NT$ " + total_cost}</a></p>`;
}
function carCount(countData) {
  var newData = JSON.parse(window.localStorage.getItem("commodity"));
  let carLength = 0;
  for (var key in newData) {
    carLength += newData[key];
  }
  carCount.innerHTML = `<span>共&nbsp;<a>${carLength}</a>&nbsp;件商品</span>`;
}
var closeAcc = document.querySelector(".catTotal-li2-div2 a");
var newData;
closeAcc.onclick = function () {
  window.sessionStorage.clear();
  newData = JSON.parse(window.localStorage.getItem("commodity"));
  if (window.localStorage.getItem("commodity") == null) {
    alert("你的購物車還沒有商品，不能結帳");
    return false;
  }
  var newdataArr = Object.keys(newData);
  if (newdataArr.length == 0) {
    alert("你的購物車還沒有商品，不能結帳");
    return false;
  } else {
    location.href = this.dataset.url;
  }
};
var bHoverXg = [];
bHoverXg = $(".container .aboutPage .productList li .btn .BuyAc");
bHoverXg.each(function () {
  $(this).click(function () {
    $(this)
      .addClass("animate__headShake")
      .siblings()
      .removeClass("animate__headShake");
  });
});
var artbybtn = document.querySelector(".btnBuy");
artbybtn && artbybtn.addEventListener("click", buyhandle.bind(artbybtn));
function topage(id) {
  location.href = "product-con.html?id=" + id;
}
var yesCar = document.querySelectorAll(".addinForm");
var carAll = document.querySelectorAll(".addCar");
var nobjArr = [];
var addive = true;
carAll.forEach((item, index) => {
  item.onclick = function (e) {
    e.stopPropagation();
    if (addive) {
      addive = false;
      var newLocal = JSON.parse(window.localStorage.getItem("commodity"));
      var numLocal = item.getAttribute("data-id");
      if (newLocal == null) {
        newLocal = {};
        newLocal[numLocal] = 1;
      } else if (newLocal[numLocal]) {
        newLocal[numLocal]++;
      }
      if (newLocal[numLocal] == null || newLocal[numLocal] == undefined) {
        newLocal[numLocal] = 1;
      }
      window.localStorage.setItem("commodity", JSON.stringify(newLocal));
      yesCar.forEach((it) => {
        if (it.dataset.id === item.dataset.id) {
          it.classList.add("addinformAnima");
          setTimeout(() => {
            it.classList.remove("addinformAnima");
          }, 1000);
        }
      });
      setTimeout(function () {
        addive = true;
      }, 1000);
      item.classList.add("animate__headShake");
      setTimeout(function () {
        item.classList.remove("animate__headShake");
      }, 1000);
    }
  };
});
var proBuyAll = document.querySelectorAll(".push .popup a");
proBuyAll.forEach((item, index) => {
  item.onclick = buyhandle.bind(item);
});
function buyhandle(e) {
  var itemId = this.dataset.id;
  var localVal = JSON.parse(window.localStorage.getItem("commodity"));
  if (localVal === null) {
    localVal = {};
    localVal[itemId] = 1;
  } else {
    localVal[itemId] = localVal[itemId] || 1;
  }
  window.localStorage.setItem("commodity", JSON.stringify(localVal));
  location.href = "/clearing/";
  e.stopPropagation();
}
var countIpt = document.querySelector(".calc #center .countValue");
$("#calc-left i").click(function () {
  if (countIpt.value <= 1) {
    return;
  } else {
    countIpt.value--;
  }
});
$("#calc-right i").click(function () {
  if (countIpt.value >= 100) {
    return alert("一次最多購買100件");
  } else {
    countIpt.value++;
  }
});
var addShopping = document.querySelector(".additionCar");
if (addShopping) {
  addShoppingStyleHandle();
  addShopping.addEventListener("click", function () {
    var newLocal = JSON.parse(window.localStorage.getItem("commodity"));
    var pid = addShopping.dataset.id;
    if (newLocal === null) {
      newLocal = {};
      newLocal[pid] = countIpt.value;
    } else {
      newLocal[pid]
        ? (newLocal[pid] = parseInt(newLocal[pid]) + parseInt(countIpt.value))
        : (newLocal[pid] = parseInt(countIpt.value));
    }
    var txtstr = addShopping.querySelector("a").innerHTML;
    txtstr = txtstr.split("+")[0];
    addShopping.querySelector("a").innerHTML = txtstr + "+" + newLocal[pid];
    window.localStorage.setItem("commodity", JSON.stringify(newLocal));
  });
}
function addShoppingStyleHandle() {
  var newLocal = JSON.parse(window.localStorage.getItem("commodity"));
  var pid = addShopping.dataset.id;
  if (newLocal !== null && newLocal[pid]) {
    var txtstr = addShopping.querySelector("a").innerHTML;
    txtstr = txtstr.split("+")[0];
    addShopping.querySelector("a").innerHTML = txtstr + "+" + newLocal[pid];
  }
}
historyOrder();
function historyOrder() {
  let orderHistoryUser = window.localStorage.getItem("userInfo");
  orderHistoryUser = JSON.parse(orderHistoryUser);
  if (!orderHistoryUser) return false;
  let uPhoneNumber = orderHistoryUser.phone_number;
  $.ajax({
    url: "https://newworkbench.com/shop_order/searchOrder",
    type: "POST",
    data: { phone_number: uPhoneNumber },
    dataType: "json",
    async: false,
    success: function (result) {
      applyHistoryOrder(result);
    },
  });
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
    }, 400);
}
function applyHistoryOrder(orderData) {
  let tempData = orderData.data;
  let htmlGather = "";
  let historyOrderContentBox = document.querySelector(".historyOrderBodyUl");
  let statusArr = ["倉庫備貨中…", "已發貨", "訂單已取消"];
  window.cancelOrderList = tempData;
  htmlGather = tempData.map((item, index) => {
    let smallStr = "";
    let productListData = JSON.parse(item.product_list);
    smallStr = productListData.reduce((acc, curr, index) => {
      return (acc += `<div class="productList"><div class="productListImg"><img src="${
        curr.image
      }" decoding="async" /></div><div class="productListInfo"><p style="font-size: 16px;"class="productName">${
        curr.name
      }</p><p class="goodCharacter productAmount">商品數量：<span class="goodCharacter">X ${
        curr.num
      }</span></p><p>商品單價：<span class="goodCharacter">NT$${Number(
        curr.price
      ).toFixed(2)}</span></p></div></div>`);
    }, "");
    return `<li><div class="orderHead"><p>訂單編號：<span class="goodCharacter">${
      item.order_number
    }</span></p><span>${
      statusArr[item.status]
    }</span></div><p>购买商品信息：</p>${smallStr}<div class="productBto"><p class="orderTime">下單時間：<span class="goodCharacter">${
      item.submit_at
    }</span></p><p class="orderPrice">總金額：<span class="goodCharacter">NT$${
      item.total_price
    }</span></p></div>${(function () {
      if (item.status == 0) {
        return `<button class="cancelOrder greenBtn"id="oInquireButton"onClick="shopOrderCancel(${index})">取消訂單</button>`;
      } else if (item.status == 1) {
        return `<button class="cancelOrder grayBtn"id="oInquireButton"onClick="noOrderCancel()">取消訂單</button>`;
      } else {
        return "";
      }
    })()}</li>`;
  });
  historyOrderContentBox.innerHTML = htmlGather.join("");
}
function shopOrderCancel(idx) {
  let presentOrderNum = window.cancelOrderList[idx].order_number;
  $.ajax({
    url: "https://newworkbench.com/shop_order/cancelOrder",
    type: "POST",
    dataType: "json",
    async: false,
    data: { order_number: presentOrderNum },
    success: function (result) {
      console.log(result);
      if (result.code === 200) {
        showResult("訂單取消成功，如對產品或其他問題不滿意<br />請聯系客服");
        historyOrder();
      } else {
        showResult("訂單取消失敗，如需取消或對其他方面不滿意<br />請聯系客服");
      }
    },
  });
}
function noOrderCancel(idx) {
  showResult("訂單已發貨，如需取消訂單<br />請聯系客服");
}
