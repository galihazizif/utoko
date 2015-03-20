<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/front';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */

	public $pageTitle;
	public $ogUrl, $ogImage, $ogDescription, $ogSiteName, $ogPrice;
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $cart;
	public $cookieId;

	public $vShortName, $vLongName, $vDescription, $vFooter;

	function init(){
		$this->cookieId = UniqueVisitor::getCookieId();
		$this->cart = KeranjangKu::hitungPesanan($this->cookieId);
		if(isset($_GET['rdr']))
			Yii::app()->user->returnUrl = base64_decode(($_GET['rdr']));

		if(Yii::app()->cache->get('text') == false){
			$model = Atribut::model()->findAll('atribut_kategori = ?',array(3));
			foreach ($model as $value) {
				$text[$value->atribut_id] = $value->atribut_isi;
			}
			Yii::app()->cache->set('text',$text,3600*24*30);
		}

		$text = Yii::app()->cache->get('text');

		$this->vShortName = $text[12];
		$this->vLongName = $text[12];
		$this->vDescription = $text[14];
		$this->vFooter = $text[13];
	}

	
}