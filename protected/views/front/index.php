<?php
/* @var $this FrontController */

$this->breadcrumbs=array(
	'Front',
);

$this->pageTitle = "Daftar produk ".Yii::app()->name;

$produkView = 'grid';
$grid = $gridL = $list = $listL = '';
if(isset($_GET['layout'])){
	switch ($_GET['layout']) {
		case 'list':
			$produkView = 'list';
			$list = 'disabled';
			break;
		default:
			$produkView = 'grid';
			$grid = 'disabled';
			break;
	}
}

?>

<div class="row">
					<div class="col-md-10 alert headerbar">
						Berikut ini produk unggulan yang kami miliki.
						<div class="btn-group pull-right" role="group">
						<a class="btn btn-default btn-default btn-xs <?php echo $grid;?>" href="<?php echo $this->createUrl('front/index',array('layout'=>'grid'));?>"><span class="glyphicon glyphicon-th-large"></span> Grid</a>
						<a class="btn btn-default btn-default btn-xs <?php echo $list;?>" href="<?php echo $this->createUrl('front/index',array('layout'=>'list'));?>"><span class="glyphicon glyphicon-th-list"></span> List</a>
						</div>
					</div>
				</div>
<div class="row">
<?php
$this->widget('zii.widgets.CListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_front_product_'.$produkView,
	'pager'=>array(
				'class'=>'CLinkPager',
				'maxButtonCount'=>4,
				'header'=>' ',
				'firstPageCssClass'=>'',
				'nextPageLabel'=>'>',
				'prevPageLabel'=>'<',
				'firstPageLabel'=>'<<',
				'lastPageLabel'=>'>>',
				'hiddenPageCssClass'=>'disabled',
				'selectedPageCssClass'=>'active',
				'htmlOptions'=>array('class'=>'pagination')
				),
	'pagerCssClass'=>'col-md-10',
	'summaryText'=>'',
	'htmlOptions'=>array('class'=>''),
	)
);


?>
</div>

