$(function() {
    console.log("后台管理模板, Copyright: horry.lookout@outlook.com");
});

/**
 * 图片上传
 */
$("#uploadImage").fileinput({
/* 上传配置 */
    // 接口地址
    uploadUrl: API.uploadPhoto,
    // 附带数据
    //uploadExtraData:{"比如二次上传可以带上地址": "然后通过地址在接口里面把老图片干掉"},
    // 是否异步上传 默认异步true
    uploadAsync: true,
    // 允许后缀
    allowedFileExtensions: ['jpg', 'gif', 'png'],

/* 配置 */
    // 设置语言
    language: 'zh',
    // 文件选择图标
    browseIcon: '<i class="fa fa-file-image-o" aria-hidden="true"></i>',
    // 文件选择文字
    browseLabel: '选择图片',
    // 按钮样式
    browseClass: 'btn btn-primary',
    // 是否显示上传按钮
    showUpload: true, 
    // 上传按钮图标
    uploadIcon: '<i class="fa fa-cloud-upload" aria-hidden="true"></i>',
    // 上传按钮文字
    uploadLable: '确认上传',
    // 上传按钮样式
    uploadClass: 'btn btn-success',
    // 是否显示移除按钮
    showRemove: true,
    // 移除按钮图标
    removeIcon: '<i class="fa fa-ban" aria-hidden="true"></i>', 
    // 移除按钮文字
    removeLabel: '关闭',
    // 移除按钮样式
    removeClass: 'btn btn-danger',
    // 是否显示文件名（一个输入框里面是上传的文件本地名称）
    showCaption: false,
    // 是否显示预览
    showPreview: true,
    // 预览模式设置
    fileActionSettings: {
        // 显示 上传/移除/详情按钮
        showUpload: true,
        showRemove: true,
        showZoom: true,
        // 分别配置图标 样式 标题
        removeIcon: '<i class="fa fa-ban" aria-hidden="true"></i>',
        removeClass: 'btn btn-xs btn-danger',
        removeTitle: '移除',
        uploadIcon: '<i class="fa fa-cloud-upload" aria-hidden="true"></i>',
        uploadClass: 'btn btn-xs btn-success',
        uploadTitle: '上传',
        zoomIcon: '<i class="fa fa-info-circle" aria-hidden="true"></i>',
        zoomClass: 'btn btn-xs btn-primary',
        zoomTitle: '查看图片详情',
    },
    // 详情模式下图标
    previewZoomButtonIcons: {
        // 上一张 下一张
        prev: '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
        next: '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
        // 标题开关
        toggleheader: '<i class="fa fa-toggle-on" aria-hidden="true"></i>',
        // 全屏开关
        fullscreen: '<i class="fa fa-search-plus" aria-hidden="true"></i>',
        // 去边框开关
        borderless: '<i class="fa fa-arrows-alt" aria-hidden="true"></i>',
        // 关闭按钮
        close: '<i class="fa fa-times" aria-hidden="true"></i>'
    },
    // 再次上传时，是否自动替换当前图片
    autoReplace: true,
    // 是否显示拖拽区域
    dropZoneEnabled: false,
    // 图片最小宽度
    //minImageWidth: 50,
    // 图片的最小高度
    //minImageHeight: 50,
    // 图片的最大宽度
    //maxImageWidth: 1000,
    // 图片的最大高度
    //maxImageHeight: 1000,
    // 最大文件大小 单位为kb，如果为0表示不限制文件大小
    //maxFileSize:0,
    // 检测文件上传数量
    validateInitialCount: true,
    // 最少上传文件
    //minFileCount: 0,
    // 最多同时上传文件
    maxFileCount: 1,
    // 必须
    enctype:'multipart/form-data',
    msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",

// 上传成功后的回调函数
}).on("fileuploaded", function (event, data, previewId, index) {
    console.log(event);
    console.log(data);
    console.log(previewId);
    console.log(index);
});