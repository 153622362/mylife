<?php

namespace frontend\models\form;

use Chumper\Zipper\Zipper;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SiteForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

	/**
	 * @param $file 文件名
	 * @param string $file_folder_router 保存文件的路径
	 * @return array
	 */
	public static function unzipIpa($file,$file_folder_router = '/data')
	{
			$zipper = new Zipper();
			$unzipfile = $zipper->make($file)->listFiles('/Info\.plist$/i');
			if ($unzipfile)
			{
				foreach ($unzipfile as $k => $filePath) {
					// 正则匹配包根目录中的Info.plist文件

					if (preg_match("/Payload\/([^\/]*)\/Info\.plist$/i", $filePath, $matches)) {
						$app_floder = $matches[1];
						// 将plist文件解压到$file_folder_router.'/'.$app_floder.'/'目录中
						$zipper->make($file)->folder('Payload/'.$app_floder)->extractMatchingRegex($file_folder_router.'/'.$app_floder.'/', "/Info\.plist$/i");

						// 拼接plist文件完整路径
						$fp = $file_folder_router.'/'.$app_floder.'/Info.plist';
						// 获取plist文件内容
						$content = file_get_contents($fp);
						// 解析plist成数组
						$ipa = new \CFPropertyList\CFPropertyList();
						$ipa->parse($content);
						$ipaInfo = $ipa->toArray();

						// ipa 解包信息
						$ipa_info[] = json_encode($ipaInfo);

						// 包名
						$ipa_info['bundle_id'] = $ipaInfo['CFBundleIdentifier'];

						// 版本名
						$ipa_info[] = $ipaInfo['CFBundleShortVersionString'];

						// 版本号
						$ipa_info[] = str_replace('.', '', $ipaInfo['CFBundleShortVersionString']);

						// 别名
						$ipa_info[] = $ipaInfo['CFBundleName'];

						// 显示名称
						$ipa_info['app_name'] =  $ipaInfo['CFBundleDisplayName'];
						return $ipa_info;
					}
				}

			}else{
				echo '无';
			}
	}

}
