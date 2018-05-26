/**
 * 链接组动画
 */
// 遍历链接开关
$(".nav .sidebar .navs").each(function(index, element) {
    $(this).click(function() {
        // 每个链接组开关点下去的时候，找到右浮动的箭头，用上箭头覆盖下箭头。
        $(this).find(".float-right").toggleClass("fa-caret-up");
        // 因为 .home 也是一个.navs，所以它占了一次索引，因此需要index-1
        $(".nav .sidebar .links").eq(index-1).slideToggle();
    });
});
/** 
 * 页面载入
*/
// 第一个参数是自己，第二个参数是地址
function loadPage(element, url) {
    // 先干掉.home 和 所有link的激活样式
    $(".nav .sidebar .home").removeClass("home-active");
    $(".nav .sidebar .links .link").removeClass("link-active");
    // 给这个link加上样式
    $(element).addClass("link-active");
    // iframe载页面
    $("#page").attr("src", url);
}