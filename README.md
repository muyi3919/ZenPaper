这是 ZenPaper 主题的详细 README.md 文档：

---

# ZenPaper

极致极简的 WordPress 主题，剥离所有非必要功能，只保留纯粹的文章阅读体验。

## 设计理念

ZenPaper 是一个为极简主义者设计的 WordPress 主题。我们相信，阅读的本质是文字与思想的交流，而非被侧边栏、评论框、社交按钮所干扰。

在这个主题中，我们移除了 WordPress 的绝大多数功能，只留下最核心的：写文章、读文章。

## 特性

- **无评论系统** - 没有评论框、没有 pingback、没有 trackback
- **无侧边栏** - 单栏布局，全宽阅读
- **无搜索功能** - 访问搜索页自动跳转首页
- **无分类/标签显示** - 前台不显示，后台仍可组织
- **无作者信息** - 不显示作者名、头像、简介
- **无相关文章** - 文章底部不显示推荐
- **无社交分享** - 没有分享按钮
- **阅读进度条** - 顶部细线显示阅读进度
- **首字下沉** - 文章首段首字放大排版
- **纸张纹理** - 微妙的背景噪点质感
- **响应式设计** - 适配手机、平板、桌面

## 安装

### 方法一：ZIP 上传

1. 将主题文件夹压缩为 `zenpaper.zip`
2. WordPress 后台 → 外观 → 主题 → 添加新主题 → 上传主题
3. 选择 `zenpaper.zip` → 立即安装 → 启用

### 方法二：FTP 上传

1. 解压 `zenpaper.zip`
2. 将 `zenpaper` 文件夹上传到 `/wp-content/themes/`
3. WordPress 后台 → 外观 → 主题 → 启用 ZenPaper

## 使用指南

### 写文章

1. 登录 WordPress 后台
2. 文章 → 新建文章
3. 填写标题
4. 填写内容
5. 点击发布

**不需要做的：**
- 选择分类
- 添加标签
- 设置特色图片
- 填写摘要
- 选择作者

后台已隐藏这些选项，只保留标题和内容编辑器。

### 创建关于页面

主题导航栏会自动显示一个"关于"链接，需要手动创建：

1. 页面 → 新建页面
2. 标题填写：`关于`
3. 固定链接（别名）填写：`about`
4. 内容填写个人介绍
5. 发布

发布后，导航栏会自动出现"关于"链接。

### 修改网站标题

设置 → 常规 → 站点标题

站点标题会显示在导航栏左侧。

## 文件结构

```
zenpaper/
├── style.css              # 主题信息头 + 全部 CSS 样式
├── index.php              # 首页/文章列表模板
├── single.php             # 单篇文章模板
├── page.php               # 单页面模板（如关于页）
├── 404.php                # 404 错误页面
├── functions.php          # 功能函数（禁用 WP 功能）
├── header.php             # 共用头部（导航栏）
├── footer.php             # 共用底部（页脚）
├── screenshot.png         # 主题预览图（1200×900）
└── assets/
    └── js/
        └── main.js        # 阅读进度条 + 导航阴影
```

## 禁用功能清单

| 功能 | 处理方式 | 说明 |
|------|---------|------|
| 评论 | 完全禁用 | 前台不显示，后台移除菜单 |
| Trackback/Pingback | 完全禁用 | 关闭 pingback 接收和发送 |
| 分类 | 前台隐藏 | 后台可组织，文章页不显示 |
| 标签 | 前台隐藏 | 同上 |
| 搜索 | 跳转首页 | 访问 /?s=关键词 自动跳转首页 |
| 作者存档 | 跳转首页 | 访问 /author/用户名 自动跳转首页 |
| RSS Feed | 完全禁用 | 所有 feed 类型返回 302 跳转 |
| XML-RPC | 完全禁用 | 关闭远程发布接口 |
| Emoji 脚本 | 完全移除 | 不加载 WP Emoji JS/CSS |
| 自动保存 | 完全禁用 | 写文章时不自动保存草稿 |
| 文章修订 | 完全禁用 | 只保存最终版本，不保留历史 |
| 预览按钮 | 后台隐藏 | 发布框中移除预览按钮 |
| 屏幕选项 | 后台隐藏 | 移除右上角的屏幕选项 |
| 帮助选项卡 | 后台隐藏 | 移除右上角的帮助 |
| 工具菜单 | 后台移除 | 左侧菜单不显示工具 |

## 保留功能

- 文章发布/编辑/删除
- 页面发布/编辑/删除
- 媒体上传（文章内插图）
- 站点标题/副标题设置
- 站点图标（favicon）设置
- 固定链接设置

## 技术规格

- **PHP 版本**：7.4+
- **WordPress 版本**：5.8+
- **浏览器支持**：
  - Chrome 90+
  - Firefox 88+
  - Safari 14+
  - Edge 90+
  - 不支持 IE 11

## 样式说明

### 颜色

| 用途 | 色值 |
|------|------|
| 背景色 | `#fafaf9` |
| 主文字 | `#292524` |
| 次要文字 | `#57534e` |
| 辅助文字 | `#78716c` |
| 浅色文字 | `#a8a29e` |
| 边框/线条 | `#e7e5e4` |
| 强调色 | `#1c1917` |

### 字体

- **标题**：Noto Serif SC（谷歌字体）
- **正文**：Noto Serif SC（谷歌字体）
- **导航/UI**：系统默认无衬线字体

### 布局

- **最大宽度**：680px
- **正文字号**：18px
- **行高**：1.8
- **段落间距**：1.8em

## 常见问题（Q&A）

### Q: 如何恢复评论功能？

编辑 `functions.php`，删除或注释掉以下代码：

```php
// 删除这三行
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);

// 删除这个 action
add_action('init', function () {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
});
```

### Q: 如何添加网站图标（favicon）？

WordPress 后台 → 外观 → 自定义 → 站点身份 → 站点图标

上传 512×512 像素的图片即可。

### Q: 文章可以配图吗？

可以。在文章编辑器中正常插入图片，主题会自动适配为全宽显示。

图片建议宽度不小于 680px，以获得最佳效果。

### Q: 如何修改主题颜色？

编辑 `style.css`，搜索并替换以下颜色值：

- 背景色：`#fafaf9`
- 主文字：`#292524`
- 强调色：`#1c1917`

### Q: 如何修改字体？

编辑 `functions.php`，找到：

```php
wp_enqueue_style(
    'zenpaper-fonts',
    'https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@400;700&display=swap',
    array(),
    null
);
```

替换为其他 Google Fonts 链接，或删除以使用系统字体。

### Q: 导航栏的"关于"链接不显示？

检查以下几点：

1. 是否创建了页面（页面 → 所有页面）
2. 页面别名是否为 `about`（编辑页面 → 固定链接）
3. 页面是否已发布（不是草稿）

### Q: 如何添加统计代码（如百度统计）？

编辑 `footer.php`，在 `</body>` 标签前添加统计代码：

```php
<!-- 百度统计代码 -->
<script>   < script>
// 你的代码
</script>   < / script>
<?php wp_footer(); ?>   & lt; ?php wp_footer ();比;
</body>   < / body>
```

### Q: 如何添加自定义 CSS？

WordPress 后台 → 外观 → 自定义 → 额外 CSSWordPress 后台 → 外观 → 自定义 → 额外 CSS

在此处添加的 CSS 会覆盖主题默认样式。

### Q: 首页显示"还没有发布任何文章"？

说明网站还没有文章。去写文章 → 新建文章，发布后即可显示。

### Q: 如何设置固定链接？

推荐设置：设置 → 固定链接 → 文章名

这样文章 URL 会是 `yoursite.com/hello-world` 的形式，最简洁。

### Q: 如何备份文章？

由于禁用了修订功能，建议：

1. 本地先用编辑器写好
2. 再复制到 WordPress 发布
3. 或定期导出 WordPress 数据（工具 → 导出）

### Q: 可以添加插件吗？

可以，但以下类型插件可能冲突：

- 评论相关插件（主题已禁用评论）
- 页面构建器插件（如 Elementor）
- 缓存插件（如 W3 Total Cache，需要清除缓存）

### Q: 移动端显示不正常？

确保没有安装以下插件：

- 移动端主题切换插件
- 页面构建器插件
- 缓存插件（需要清除缓存）

### Q: 阅读进度条不显示？

检查：

1. `assets/js/main.js` 文件是否存在
2. 浏览器控制台是否有 JS 错误
3. 是否使用了优化插件合并了 JS（需要排除 main.js）

## 更新日志

### 1.0.0 (2024-12-15)

- 初始版本发布
- 完成基础文章阅读功能
- 禁用评论、搜索、Feed 等功能
- 实现阅读进度条
- 实现首字下沉排版
- 添加纸张纹理背景

## 许可证

GNU General Public License v2.0 or later

## 致谢

- [Noto Serif SC](https://fonts.google.com/noto/specimen/Noto+Serif+SC) - Google Fonts 开源中文字体
- [WordPress](https://wordpress.org/) - 开源博客平台
