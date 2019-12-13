<?php
/**
 * yml-export
 *
 * @package export-yaml-markdown
 * @author zlun
 * @version 0.1
 * @link http://zlun.yijile.com
 */
 ?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&atom=&rss1=&rss2='); ?>
  </head>
  <body>
<script src="http://www.w3school.com.cn/jquery/jquery.js"></script>



<h2>文章列表</h2>
<p>全选复制，新建txt，粘贴内容并保存为`filelist.txt`</p>
<p>使用命令下载所有内容：`wget -i filelist.txt`</p>
<textarea  name="editor_post">   
    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=999999999')->to($archives);
    $year=0; $mon=0; $i=0; $j=0;
    $output = '';
    while($archives->next()):
        $year_tmp = date('Y',$archives->created);
        $mon_tmp = date('m',$archives->created);
        $y=$year; $m=$mon;
        if ($mon != $mon_tmp && $mon > 0) $output .= '';
        if ($year != $year_tmp && $year > 0) $output .= '';
        if ($year != $year_tmp) {
            $year = $year_tmp;
            $output .= ''; //输出年份
        }
        if ($mon != $mon_tmp) {
            $mon = $mon_tmp;
            $output .= ''; //输出月份
        }
        $output .= ''.$archives->permalink .'<br />'; //输出文章日期和标题
    endwhile;
    $output .= '';
    echo $output;
?>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<?php $pages->permalink(); ?>
<br />
<?php endwhile; ?>

</textarea> 

<h2>分类列表</h2>
<p>替换_config.yml中内容</p>
<P>使用多分类的文章请手动删除一个分类，不然hexo系统会自动识别成二级子分类</P>
<p>
数据验证
<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while ($category->next()): ?>
<a href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"  class="db fl t2s<?php if ($this->is('post')): ?><?php if ($this->category == $category->slug): ?> on<?php endif; ?><?php else: ?><?php if ($this->is('category', $category->slug)): ?> on<?php endif; ?><?php endif; ?>"><?php $category->name(); ?></a>
<?php endwhile; ?>
</p>

<textarea  name="editor_cat3">   
category_map:
<?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
<?php while ($category->next()): ?>
    <?php $category->name(); ?>: “<?php $category->slug(); ?>”

<?php endwhile; ?>
</textarea> 







<h2>页面</h2>
<p>替换_config.yml中内容</p>
<p>
数据验证(名称及内置链接，cid)
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
		    <?php while($pages->next()): ?>
		        <li class="fl"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>" target="_blank" class="<?php if($this->is('page', $pages->slug)): ?>on<?php endif; ?>"><?php $pages->title(); ?></a><span style="margin-left: 1em; color: green; font-size: 8px;"><?php $pages->cid(); ?></span>
		    <?php endwhile; ?>
</p>

<textarea  name="editor_cat3">   
menu:
  Home: /
  Archives: /archives
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
  <?php $pages->title(); ?>: /<?php $pages->slug(); ?>

<?php endwhile; ?>
</textarea> 



<h2>标签列表</h2>
<p>替换_config.yml中内容</p>
<textarea  name="editor_tag3">   
tag_map:
<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=999999999')->to($tags); ?><?php if($tags->have()): ?>
<?php while ($tags->next()): ?>
    <?php $tags->name(); ?>: “<?php $tags->slug(); ?>”

<?php endwhile; ?>
<?php else: ?><?php _e('# 没有任何标签'); ?><?php endif; ?>
</textarea> 


<h2>友情链接</h2>
<p>手动格式化</p>
<textarea  name="editor_links">
<?php Links_Plugin::output(); ?>
</textarea>




<h2>url验证</h2>
<p>替换_config.yml中的固定链接优化</p>
<p  name="editor_url">  
post: 
cat: 
tag: 


</p> 






<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
        CKEDITOR.replace( 'editor_post' );
        CKEDITOR.replace( 'editor_cat' );
        CKEDITOR.replace( 'editor_tag' );
</script>

<style>
textarea[name|=editor_cat3],
textarea[name|=editor_tag3],
textarea[name|=editor_links],
textarea[name|=editor_3]
{
    width: 600px; height: 200px;
}
</style>


  </body>
</html>
