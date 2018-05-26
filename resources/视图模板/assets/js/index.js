/* 城市切换 */
$("#show-cities").click(function() {
    $("#cities").toggle();
});
/* 第一屏 侧边栏动画 */
// 侧边栏鼠标移入
$(".section-one .navs").each(function(index, element) {
    $(this).mouseenter(function() {
        // 背景颜色
        $(".section-one .navs").removeClass("active");
        $(this).addClass("active");
        // 显示链接组
        $(".links").hide().eq(index).show();
    });
});
// 链接组鼠标离开
$(".section-one .links").mouseleave(function() {
    // 移除侧边栏背景颜色 隐藏链接组
    $(".section-one .navs").removeClass("active");
    $(".section-one .links").hide();
});
// 第一节鼠标离开
$(".section-one").mouseleave(function() {
    // 移除侧边栏背景颜色 隐藏链接组
    $(".section-one .navs").removeClass("active");
    $(".section-one .links").hide();
});

/**
 * 基于 webSQL 的前端购物车实现
 * 
 * @author horry
 */
// 配置数据库
var cart;
var dbName = 'cart';
var dbVersion = 1.0;
var dbDesc = '前台webSql购物车';
var dbSize = 1024 * 1024 * 10;
// 统一数据表名
var tableName = 'deals';

// 页面载入时：建库建表查询一次数据库有没有内容
$(function() {
    // 判断是否支持
    if(!window.openDatabase){ 
        alert("您的浏览器不支持本站的购物车功能，建议您使用Chrome / FireFox / Safari进行浏览和消费。否则您将无法成功购买物品。");
    }
    // 建库
    cart = window.openDatabase(dbName, dbVersion, dbDesc, dbSize);
    console.log('数据库创建成功');
    // 配置建表SQL语句
    var createTableSql = 
    "CREATE TABLE IF NOT EXISTS " + tableName +"(" +
        "id INTEGER UNIQUE," + 
        "img TEXT," +
        "name TEXT," +
        "price TEXT," +
        "number INTEGER" +
    ")";
    // 成功回调
    var createTabelSuccess = function(db, result) {
        console.log('创建数据表成功');
    }
    // 失败回调
    var createTableError = function(db, error) {
        console.log('创建数据表失败：' + error);
    }
    // 建表
    cart.transaction(function(db) {
        db.executeSql(createTableSql, [], createTabelSuccess, createTableError);
    });
    // 查询一次（因为有可能用户本地有数据），改变购物车标志前的商品种类数量
    getCartGoodsNumber();
});

// 查询数据：购物车中商品种类数量获取
function getCartGoodsNumber() {
    cart = window.openDatabase(dbName, dbVersion, dbDesc, dbSize);
    var selectSql = "SELECT * FROM " + tableName + ";";
    var selectSuccess = function(db, result) {
        var goodsNumber = result.rows.length;
        console.log("当前购物车中一共有"+goodsNumber+"种商品");
        $(".goods-number").text(goodsNumber);
    }
    var selectError = function(db, error) {
        console.log('查询数据失败：' + error);
    }
    cart.transaction(function(db) {
        db.executeSql(selectSql, [], selectSuccess, selectError);
    });
}

// 插入数据：添加进购物车的方法
function putIntoCart(insertData) {
    cart = window.openDatabase(dbName, dbVersion, dbDesc, dbSize);
    var insertSql = "INSERT INTO " + tableName + " VALUES (?, ?, ?, ?, ?);";
    var insertSuccess = function() {
        alert("商品已经扔进购物车了！再次点击可以增加数量");
        getCartGoodsNumber();
    }
    var insertError = function() {
        dealsNumberChange(insertData[0], true);
    }

    cart.transaction(function(db) {
        db.executeSql(insertSql, insertData, insertSuccess, insertError);
    });
}

// 更新数据：商品增加或减少
function dealsNumberChange(id, flag) {
    cart = window.openDatabase(dbName, dbVersion, dbDesc, dbSize);
    if(flag == true) {
        var updateSql = "UPDATE " +  tableName + " SET number=number+1 WHERE id = ?;";
    }else {
        var updateSql = "UPDATE " +  tableName + " SET number=number-1 WHERE id = ?;";
    }
    var updateSuccess = function(db, result) {
        if(flag == true) {
            alert("增加成功！");
        }else {
            alert("减少成功！");
        }
    }
    var updateError = function() {
        console.log("增加商品失败");
    }

    cart.transaction(function(db) {
        db.executeSql(updateSql, [id], updateSuccess, updateError);
    });
}

// 删除数据：从购物车中删除商品
function deleteDeal(id) {
    cart = window.openDatabase(dbName, dbVersion, dbDesc, dbSize);
    var deleteSql = "DELETE FROM " +  tableName + " WHERE id = ?;";
    var delSuccess = function() {
        alert("商品已从购物车中清除！");
        getCartGoodsNumber();
    }
    var delError = function() {
        console.log("商品从购物车清除失败");
    }
    
    cart.transaction(function(db) {
        db.executeSql(deleteSql, [id], delSuccess, delError);
    });
}

// 主页按钮事件绑定
$(".put-into-cart-index").each(function(index, element) {
    $(this).click(function() {
        // 获取数据
        var id = $(".goods-id").eq(index).val();
        var img = $(".goods-img").attr("src");
        var name = $(".goods-name").eq(index).text();
        var price = $(".goods-price").eq(index).text();
        var number = 1;
        // 组装成数组
        var insertData = [id, img, name, price, number];
        // 调用插入数据的方法
        putIntoCart(insertData);
    });
});