 <!--###Title Begin, By Lc.###-->
<?php if ( is_home() ) { ?><title><?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_search() ) { ?><title>搜索结果 | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_single() ) { ?><title><?php echo trim(wp_title('',0)); ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_page() ) { ?><title><?php echo trim(wp_title('',0)); ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_category() ) { ?><title><?php single_cat_title(); ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_month() ) { ?><title><?php the_time('F'); ?> | <?php bloginfo('name'); ?></title><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><title><?php  single_tag_title("", true); ?> | <?php bloginfo('name'); ?></title><?php } ?> <?php } ?>
<?php
##定义一个函数.解决截取中文乱码的问题###
if (!function_exists('utf8Substr')) {
 function utf8Substr($str, $from, $len)
 {
     return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
          '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
          '$1',$str);
 }
}
if ( is_home() ){
    $description = "happyyezi的个人博客。以小明大，见一叶落而知岁之将暮，睹瓶中之冰而知天下之寒。关注Linux，Python，Wordpress，Web等各种计算机及互联网编程和应用";
    $keywords = "一叶知秋,happyyezi,Linux,Python,Web,Wordpress";
}
elseif ( is_single() ){
    if ($post->post_excerpt) {
        $description  = $post->post_excerpt;
    } else {
   if(preg_match('/<p>(.*)<\/p>/iU',trim(strip_tags($post->post_content,"<p>")),$result)){
    $post_content = $result['1'];
   } else {
    $post_content_r = explode("\n",trim(strip_tags($post->post_content)));
    $post_content = $post_content_r['0'];
   }
         $description = utf8Substr($post_content,0,220);  
  }
 
    $keywords = "";     
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {
        $keywords = $keywords . $tag->name . ",";
    }
}
###这里是分类页面。自行改变is_category的ID。###
/***
elseif ( is_category(34) ){
    $description = "生物信息学(Bioinformatics)是一门利用计算机技术研究生物系统之规律的学科。通过实例分析，介绍生物信息学的入学知识，包含生物信息学的数据库等。重点是NCBI的中文教程。";
    $keywords = "生物信息学,Bioinformatics,NCBI,影响因子";
}
###这里是Page页。同上。多个页面的话自行添加就是###
elseif ( is_page(2) ){
    $description = "关于柳城博客（Lc.）的介绍，联系方式，以及网站历程。柳城博客（LIUCHENG.NAME）∷努力在数据的海洋里畅游。";
    $keywords = "生物信息学,Perl,Bioperl,PHP,Mysql,Linux,NCBI,摄影";
}
elseif ( is_page(135) ){
    $description = "柳城博客(Lc.)的留言板。有什么问题或建议请在这里留言! 我会尽快回复~ 感谢您的支持！！";
    $keywords = "柳城博客,Lc.,留言板,留言本";
}
***/
?>
<?php echo "\n"; ?>
<meta name="description" content="<?php echo trim($description); ?>" />
<meta name="keywords" content="<?php echo rtrim($keywords,','); ?>" />
<!--###Description & Keywords End, By Lc.###-->