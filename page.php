---
layout: page 
title: "<?php $this->title() ?>" 
date: <?php $this->date('Y-m-d H:i'); ?> 
updated: 
typecho_cid: <?php $this->cid() ?><?php /** 预留CID 应对后期神奇操作 **/ ?> 
permalink: <?php $this->slug() ?><?php /** 固定链接比较复杂，每个人处理方式不同，所以这里需要自己完善，这行针对用slug设定的固定链接 自行修改 **/ ?>
<?php /** permalink:  $this->permalink() **/ ?><?php /** 固定链接比较复杂，每个人处理方式不同，所以这里需要自己完善 通过这行的处理方式 需要下载后用notepad++手动删除多余部分，比如http://你的域名.com/ **/ ?> 
---
<?php /** 以上参数每行末端留一个空格，不然会连行 **/ ?> 
<?php /** $this->content(); **/ ?>
<?php $this->text(); ?> 
<?php /** 如果使用了自定义页面请将模板拷入主题目录，不然无法渲染，下载后会是纯html，如果要直接导出markdown请后台取消该页面自定义模板 **/ ?>