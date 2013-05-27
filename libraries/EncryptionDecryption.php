<?php
/*
 **************************** Creation Log *******************************
File Name                   -  EncryptionDecryption.php
Project Name                -  skillseeker
Description                 -  Encryption Decryption Model
Version                     -  1.0
Created by                  -  Ramandeep Singh
Created on                  -  May 10, 2013
***************************** Update Log ********************************
Sr.NO.		Version		Updated by           Updated on          Description
-------------------------------------------------------------------------
2            1.0        Prateek Saini           May 25, 2013    Changes in create key Hash method and 
                                                                Decryption Method.
*************************************************************************
**/
class EncryptionDecryption
{
    private $skey;
    
    private function createKey() {

        $salt = "r#s2s0e1k&3etieealmkl#e";
        $hash = mhash(MHASH_SHA224,$salt); 
        $this->skey = pack('H*', bin2hex($hash));
    }
    
    private function safe_b64encode($string) {
    
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
    
    private function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
    
    public  function encode($value){
    
        if(!$value){return false;}
    
        $this->createKey();
        $text = $value;
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $this->skey, $text, MCRYPT_MODE_ECB, $iv);
        return trim($this->safe_b64encode($crypttext));
    }
    
    public function decode($value){
    
        if(!$value){return false;}
        $this->createKey();
        $crypttext = $this->safe_b64decode($value);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $this->skey, $crypttext, MCRYPT_MODE_ECB, $iv);
        return trim($decrypttext);
    }
}

?>