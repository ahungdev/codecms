<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function title_slug($text)
{
	$translate = array(
		'à' => 'a', 'á' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẫ' => 'a',
		'ẩ' => 'a', 'ậ' => 'a', 'ú' => 'a', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'à' => 'a', 'á' => 'a',
		'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o',
		'õ' => 'o', 'ọ' => 'o', 'ẽ' => 'e', 'ê' => 'e', 'è' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i',
		'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ơ' => 'o', 'ớ' => 'o', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y',
		'ỹ' => 'y', 'ỵ' => 'y', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u',
		'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'đ' => 'd', 'ẹ' => 'e', 'À' => 'A', 'Á' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A',
		'Â' => 'A', 'Ấ' => 'A', 'À' => 'A', 'Ẫ' => 'A', 'Ẩ' => 'A', 'Ậ' => 'A', 'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U',
		'Ũ' => 'U', 'Ụ' => 'U', 'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ê' => 'E',
		'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I',
		'Ị' => 'I', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O', 'Ư' => 'U', 'Ừ' => 'U',
		'Ứ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'Đ' => 'D', 'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y',
		'Ỵ' => 'Y', 'Ằ' => 'A', 'Ầ' => 'A', 'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a',
		'ắ' => 'a', 'ằ' => 'a', 'ẻ' => 'e', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a',
		'ẫ' => 'a', 'ậ' => 'a', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u',
		'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
		'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ổ' => 'o',
		'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'đ' => 'd',
		'Đ' => 'D', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y', 'Á' => 'A', 'À' => 'A', 'Ả' => 'A',
		'Ã' => 'A', 'Ạ' => 'A', 'Ă' => 'A', 'Ắ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A', 'Â' => 'A', 'Ấ' => 'A',
		'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A', 'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E', 'Ế' => 'E',
		'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E', 'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U',
		'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U', 'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I',
		'Ĩ' => 'I', 'Ị' => 'I', 'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O', 'Ô' => 'O', 'Ố' => 'O',
		'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O', 'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O',
		'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y', ' ' => '-', '----' => '-', '---' => '-', '--' => '-',
	);

	$text_convert = strtr($text, $translate);
	$text_convert = str_replace('"', '', $text_convert);
	$text_convert = str_replace('&#39;', '', $text_convert);
	$text_convert = str_replace(',', '', $text_convert);
	$text_convert = str_replace(':', '', $text_convert);
	$text_convert = str_replace('(', '', $text_convert);
	$text_convert = str_replace(')', '', $text_convert);
	$text_convert = str_replace('“', '', $text_convert);
	$text_convert = str_replace('”', '', $text_convert);
	$text_convert = str_replace('/', '-', $text_convert);
	$text_convert = str_replace('.', '', $text_convert);
	$text_convert = str_replace('!', '', $text_convert);
	$text_convert = str_replace('@', '', $text_convert);
	$text_convert = str_replace('#', '', $text_convert);
	$text_convert = str_replace('$', '', $text_convert);
	$text_convert = str_replace('%', '', $text_convert);
	$text_convert = str_replace('^', '', $text_convert);
	$text_convert = str_replace('*', '', $text_convert);
	$text_convert = str_replace('&', '', $text_convert);
	$text_convert = str_replace('{', '', $text_convert);
	$text_convert = str_replace('}', '', $text_convert);
	$text_convert = str_replace('[', '', $text_convert);
	$text_convert = str_replace(']', '', $text_convert);
	$text_convert = str_replace('|', '', $text_convert);
	$text_convert = str_replace('é', 'e', $text_convert);
	$text_convert = str_replace('!', '', $text_convert);
	$text_convert = str_replace('?', '', $text_convert);
	$text_convert = str_replace('%', '', $text_convert);
	$text_convert = str_replace('+', '', $text_convert);
	$text_convert = str_replace('*', '', $text_convert);
	$text_convert = str_replace('&', '', $text_convert);
	$text_convert = str_replace('^', '', $text_convert);
	$text_convert = str_replace(',', '', $text_convert);
	$text_convert = str_replace('---', '-', $text_convert);
	$text_convert = str_replace('&#39;', '', $text_convert);
	$text_convert = str_replace("'", "", $text_convert);
	$text_convert = str_replace("~", "", $text_convert);
	$text_convert = str_replace("`", "", $text_convert);
	$text_convert = strtolower($text_convert);
	$text_convert = preg_replace("/( |!|#|$|%|')/", '', $text_convert);
	$text_convert = preg_replace("/(̀|́|̉|$|>)/", '', $text_convert);
	$text_convert = preg_replace("'<[/!]*?[^<>]*?>'si", "", $text_convert);
	$text_convert = str_replace('"', '', $text_convert);
	$text_convert = str_replace("----", "-", $text_convert);
	$text_convert = str_replace("---", "-", $text_convert);
	$text_convert = str_replace("--", "-", $text_convert);
	return $text_convert;
}
