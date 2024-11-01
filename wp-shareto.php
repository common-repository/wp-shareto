<?php 
/***************************************************************************
Plugin Name:  wp-shareto
Plugin URI:   http://thobian.info/?p=737
Version:      1.0
Description:  <a href="http://thobian.info" target="_blank">wp-shareto</a> 插件方便访问者能分享or收藏你的文章！从而起到提高访客回头率、增加网站外链等。相比用某些‘分享到’工具，它能更好的支持主页每篇文章的分享，不受外部网络的影响，只要你的博客可以访问。
Author:       晴天打雨伞
Author URI:   http://thobian.info/

**************************************************************************/

if (!defined("WP_SHARETO_URL")) define("WP_SHARETO_URL", get_option("siteurl") . "/wp-content/plugins/wp-shareto");
if (!defined("WP_SHARETO_PAHT"))  define("WP_SHARETO_PAHT",  ABSPATH. "/wp-content/plugins/wp-shareto");


function  load_shareto_css(){
  	if(file_exists(WP_SHARETO_PAHT. "/wp-shareto.css")){
    	$css_url = WP_SHARETO_URL . "/wp-shareto.css";
		echo "\n".'<link rel="stylesheet" href="' . $css_url . '" type="text/css"  />'."\n";
  	}
	if(file_exists(WP_SHARETO_PAHT. "/wp-shareto.js")){
    	$js_url = WP_SHARETO_URL . "/wp-shareto.js";
		echo '<script type="text/javascript" src="' . $js_url . '"></script>';
	}
}

function wp_shareTo($content) {
	global $post;

	$htmltitle = $post->post_title;
	$htmlurl = $post->guid;
	$siteurl = get_option('siteurl');
	if( substr($htmlurl, strlen($siteurl),2 )=='/?' ){
		$htmlurl = str_replace($siteurl.'/?',$siteurl.'/index.php?',$htmlurl);
	}
	$shareto = '<!--===================下面是分享到代码=====================-->';
	$shareto .= '<div id="tho-shareto">';
	$shareto .= '<span class="shareto-text">分享到：</span>';
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToSina(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到新浪" class="sina"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToTengxun(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到腾讯微博" class="tengxun"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToQzone(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到QQ空间" class="qq"></a></span>';
	
	$shareto .= '<span><a href="javascript:var b=document.body;var GR________bookmarklet_domain=\'http://www.google.com\';if(b&&!document.xmlVersion){void(z=document.createElement(\'script\'));void(z.src=\'http://www.google.com/reader/ui/link-bookmarklet.js\');void(b.appendChild(z));}else{}" onclick="shareToGoogle()"  title="分享到Google Reader" class="google"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToRenren(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到人人网" class="renren"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToDouban(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到豆瓣" class="douban"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToXianguo(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到鲜果" class="xianguo"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToKaixin(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到开心" class="kaixin"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToFollow5(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到Follow5" class="follow5"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToTongxue(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到同学网" class="tongxue"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToDigu(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到嘀咕" class="digu"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToFanfou(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到饭否" class="fanfou"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToZuosa(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到做啥" class="zuosa"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToBaidu(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到百度收藏" class="baidu"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToTwitter(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="分享到twitter" class="twitter"></a></span>';
	
	$shareto .= '<span><a href="javascript:void(0);" onclick="shareToFavorite(\'' .$htmltitle. '\', \'' .$htmlurl. '\')" title="添加到收藏夹" class="favorites"></a></span>';
	
	$shareto .= '</div>';
	$shareto .= '<!--===================分享到代码结束=====================-->';
	
	return $content.$shareto;
}

add_action('the_content', 'wp_shareTo');
add_action('wp_head', 'load_shareto_css');
?>