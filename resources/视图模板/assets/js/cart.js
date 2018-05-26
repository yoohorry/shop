/**
 * 基于 webSQL 的前端购物车实现
 */
$(function() {
    renderCart();
});

// 渲染购物车表单表格
function renderCart() {
    cart = window.openDatabase(dbName, dbVersion, dbDesc, dbSize);
    var selectSql = "SELECT * FROM " + tableName + ";";
    var selectSuccess = function(db, result) {
        var htmlText = "";
        for(var i=0; i<result.rows.length; i++) {
            // 先判断商品数量是否为0及0件以上
            if(result.rows.item(i).number >= 0) {
                htmlText += 
                "<tr class=\"deal-row\">" + 
                    "<td>" +
                        "<img src="+ result.rows.item(i).img +" class=\"deal-img\">" +
                    "</td>" +
                    "<td>" +
                        result.rows.item(i).name +
                    "</td>" +
                    "<td class=\"deal-price\">" + 
                        "￥" + result.rows.item(i).price + "×" + result.rows.item(i).number +
                    "</td>" +
                    "<td>" + 
                        "<div class=\"btn-group\">" +
                            "<button type=\"button\" class=\"btn btn-default btn-sm\" onclick=\"addNow(" + result.rows.item(i).id + ")\">+</button>" +
                            "<button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"deleteDealNow(" + result.rows.item(i).id + ")\">删除</button>" +
                            "<button type=\"button\" class=\"btn btn-default btn-sm\" onclick=\"minusNow(" + result.rows.item(i).id + ")\">-</button>" +
                        "</div>" +
                    "</td>" +
                    "<input type=\"hidden\" class=\"x-id\" name=\"id[]\" value=" + result.rows.item(i).id + ">" +
                    "<input type=\"hidden\" class=\"x-number\"name=\"number[]\" value=" + result.rows.item(i).number + ">" +
                    "<input type=\"hidden\" class=\"x-price\" value=" + result.rows.item(i).price + ">" +
                "</tr>"
                ;
            // 如果不是则删除掉那个商品
            }else {
                deleteDeal(result.rows.item(i).id);
            }
        }
        // 渲染表格表单
        $(".deal-list").append(htmlText);
        // 计算总价
        getTotalPrice();
    }
    var selectError = function() {
        alert("无法正常读取购物车数据！请重试！");
    }
    cart.transaction(function(db) {
        db.executeSql(selectSql, [], selectSuccess, selectError);
    });
}

// 获取总价
function getTotalPrice() {
    var totalPrice = 0;
    for(var i=0; i<$(".deal-row").length; i++) {
        if($(".x-number").eq(i).val() > 0) {    
            totalPrice += $(".x-number").eq(i).val() * $(".x-price").eq(i).val();
        }
    }
    $(".totalPrice").text(totalPrice);
}

// 删除商品 ， 添加 & 减少商品件数 ： 每次都刷新页面（重新渲染一次视图）
function deleteDealNow(id) {
    deleteDeal(id);
    location.reload();
}
function minusNow(id) {
    dealsNumberChange(id, false);
    location.reload();
}
function addNow(id) {
    dealsNumberChange(id, true);
    location.reload();
}
