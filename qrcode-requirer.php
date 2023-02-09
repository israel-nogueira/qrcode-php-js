<?php
/**
 *      QRCode Requirer
 *      NOTE: Requer que a API  https://api.qrserver.com esteja 100% online
 *      @package QRCode Requirer
 *      @author Israel Nogueira
 *      @copyright 2023 - Israel Nogueira
 *      @license Public License
 */
	class qrcode{
			static public $PARAMS	= [];
			static public $MIME		= 'image/svg+xml';
			static public $TYPE		= 'svg';
			static public $BG		= 'FFFFFF';
			static public $COLOR	= '000000';
			static public $HEIGHT	= 100;
			static public $WIDTH	= 100;
			static public $MARGIN	= 3;
			static public $QZONE	= 3;
			static public $ECC		= 'H';
			static public $DATA		= 'CONTEUDO QRCODE';

			static public function data($data) {try{
				self::$DATA =$data;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
				
			static public function margin($margin) {try{
				self::$MARGIN =$margin;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function ecc($ecc) {try{
				self::$ECC =$ecc;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function qzone($qzone) {try{
				self::$QZONE =$qzone;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function height($height) {try{
				self::$HEIGHT =$height;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function width($width) {try{
				self::$WIDTH =$width;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function color($color) {try{
				self::$COLOR =$color;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function bg($BG) {try{
				self::$BG =$BG;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function headers() {try{
				header("Cache-Control: no-cache");
				header("Pragma: no-cache");
				clearstatcache();
				header("Content-type:".self::$MIME);
				header("Content-Disposition: inline; filename=qrcode.".self::$TYPE);
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}


			static public function png() {try{
				self::$MIME ='image/png';
				self::$TYPE = 'png';
				self::$PARAMS['FORMAT'] = self::$TYPE;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function gif() {try{
				self::$MIME ='image/gif';
				self::$TYPE = 'gif';
				self::$PARAMS['FORMAT'] = self::$TYPE;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function jpg() {try{
				self::$MIME ='image/jpg';
				self::$TYPE = 'jpg';
				self::$PARAMS['FORMAT'] = self::$TYPE;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function svg() {try{
				self::$MIME ='image/svg+xml';
				self::$TYPE = 'svg';
				self::$PARAMS['FORMAT'] = self::$TYPE;
				return new static;
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function base64() {try{
				return 'data:'.self::$MIME.';base64,'.base64_encode(self::curl());
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function string() {try{
				return self::curl();
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			
			static public function render() {try{
				if (headers_sent()) {
					foreach (headers_list() as $header) {
						header_remove($header);
					}
				}
				ob_clean();
				self::headers();
				die(self::curl());
			} catch (\Throwable $erro) {die($erro->getMessage());}}
			


		static public function url() {try{
			return "https://api.qrserver.com/v1/create-qr-code/?data=" 
					.urlencode(self::$DATA) 
					."&margin=".self::$MARGIN
					."&color=".self::$COLOR
					."&bgcolor=".self::$BG
					."&format=".self::$TYPE
					."&qzone=".self::$QZONE
					."&ecc=".self::$ECC
					."&size=".self::$WIDTH."x".self::$HEIGHT;

		} catch (\Throwable $erro) {die($erro->getMessage());}}

		static public function curl() {try{
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, self::url());
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
				$data = curl_exec($curl);
				curl_close($curl);
				return $data;
	
		} catch (\Throwable $erro) {die($erro->getMessage());}}
	}