<?php
/*
	[UCenter Home] (C) 2007-2008 Comsenz Inc.
	$Id: lang_exif.php 6565 2008-03-14 09:26:09Z liguode $
*/

if(!defined('IN_UCHOME')) {
	exit('Access Denied');
}

$_SGLOBAL['exiflang'] = array(

	'unknown'		=> '未知',//'Unknown',//
	'resolutionunit'	=> array('', '', '英寸', '厘米'),//array('', '', 'inch', 'cm'),//
	'exposureprogram'	=> array('未定义', '手动', '标准程序', '光圈先决', '快门先决', '景深先决', '运动模式', '肖像模式', '风景模式'),//array('Undefined', 'Manual', 'Standard procedure', 'Aperture Priority', 'Shutter Priority', 'Depth of field pre', 'Sports mode', 'Portrait Mode', 'Landscape mode'),//
	'meteringmode'	=> array(
		'0'	=> '未知',//'Unknown',//
		'1'	=> '平均',//'Average',//
		'2'	=> '中央重点平均测光',//'The central focus of the average metering',//
		'3'	=> '点测',//'Points test',//
		'4'	=> '分区',//'Division',//
		'5'	=> '评估',//'Evaluation',//
		'6'	=> '局部',//'Local',//
		'255'	=> '其他'//'Other'//
		),
	'lightsource'	=> array(
		'0'	=> '未知',//'Unknown',//
		'1'	=> '日光',//'Daylight',//
		'2'	=> '荧光灯',//'Fluorescent',//
		'3'	=> '钨丝灯',//'Tungsten',//
		'10'	=> '闪光灯',//'Flash',//
		'17'	=> '标准灯光A',//'Standard light A',//
		'18'	=> '标准灯光B',//'Standard light B',//
		'19'	=> '标准灯光C',//'Standard light C',//
		'20'	=> 'D55',//'D55',
		'21'	=> 'D65',//'D65',
		'22'	=> 'D75',//'D75',
		'255'	=> '其他'//'Other'//
		),
	'img_info'		=> array ('文件信息' => '没有图片EXIF信息'),//array ('file information'	=> 'No image EXIF information'),//
	
	'FileName'		=> '文件名',//'File Name',//
	'FileType'		=> '文件类型',//'File Type',//
	'MimeType'		=> '文件格式',//'Mime Type',//
	'FileSize'		=> '文件大小',//'File Size',//
	'FileDateTime'		=> '时间戳',//'File Time',//
	'ImageDescription'	=> '图片说明',//'Image Description',//
	'auto'    		=> '自动',//'Auto',//
	'Make'    		=> '制造商',//'Manufacturer',//
	'Model'   		=> '型号',//'Model',//
	'Orientation'		=> '方向',//'Orientation',//
	'XResolution'		=> '水平分辨率',//'Horizontal resolution',//
	'YResolution'		=> '垂直分辨率',//'Vertical Resolution',//
	'Software'   		=> '创建软件',//'Software',//
	'DateTime'   		=> '修改时间',//'Modified Time',//
	'Artist'     		=> '作者',//'Author',//
	'YCbCrPositioning'	=> 'YCbCr位置控制',//'YCbCr Positioning',//
	'Copyright'  		=> '版权',//'Copyright',//
	'Photographer'		=> '摄影版权',//'Photographer',//
	'Editor'     		=> '编辑版权',//'Editor',//
	'ExifVersion'		=> 'Exif版本',//'Exif version',//
	'FlashPixVersion'	=> 'FlashPix版本',//'FlashPix Version',//
	'DateTimeOriginal'	=> '拍摄时间',//'Capture time',//
	'DateTimeDigitized'	=> '数字化时间',//'Digitized time',//
	'Height'  		=> '拍摄分辨率高',//'Capture height resolution',//
	'Width'   		=> '拍摄分辨率宽',//'Capture width resolution',//
	'ApertureValue' 	=> '光圈',//'Aperture',//
	'ShutterSpeedValue'	=> '快门速度',//'Shutter speed',//
	'ApertureFNumber'  	=> '快门光圈',//'Shutter aperture',//
	'MaxApertureValue' 	=> '最大光圈值',//'Maximum aperture value',//
	'ExposureTime'     	=> '曝光时间',//'Exposure time',//
	'FNumber'          	=> 'F-Number',//'F-Number',//
	'MeteringMode'     	=> '测光模式',//'Metering Mode',//
	'LightSource'      	=> '光源',//'Light Source',//
	'Flash'            	=> '闪光灯',//'Flash',//
	'ExposureMode'	   	=> '曝光模式',//'Exposure mode',//
	'manual'           	=> '手动',//'Manual',//
	'WhiteBalance'     	=> '白平衡',//'White Balance',//
	'ExposureProgram'  	=> '曝光程序',//'Exposure Program',//
	'ExposureBiasValue'	=> '曝光补偿',//'Exposure Compensation',//
	'ISOSpeedRatings'  	=> 'ISO感光度',//'ISO sensitivity',//
	'ComponentsConfiguration'	=> '分量配置',//'Components Configuration',//
	'CompressedBitsPerPixel' 	=> '图像压缩率',//'Image compression',//
	'FocusDistance'    	=> '对焦距离',//'Focus Distance',//
	'FocalLength'      	=> '焦距',//'Focal Length',//
	'FocalLengthIn35mmFilm'	=> '等价35mm焦距',//'Equivalent 35mm focal length',//
	'UserCommentEncoding'	=> '用户注释编码',//'User Comment Encoding',//
	'UserComment'		=> '用户注释',//'User Comment',//
	'ColorSpace'		=> '色彩空间',//'Color Space',//
	'ExifImageLength'  	=> 'Exif图像宽度',//'Exif Image Width',//
	'ExifImageWidth'   	=> 'Exif图像高度',//'Exif Image Height',//
	'FileSource'       	=> '文件来源',//'File Source',//
	'SceneType'		=> '场景类型',//'Scene type',//
	'ThumbFileType'    	=> '缩略图文件格式',//'Thumbnail file format',//
	'ThumbMimeType'    	=> '缩略图Mime格式'//'Thumbnail Mime type',//
);

