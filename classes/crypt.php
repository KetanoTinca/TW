<?php
class Crypt
{
    private $key;
    private $string;

    public function __construct($string,$key)
		{
            $this->string=crypt($string,$key);
            //echo $this->string;
		}
    public function getString()
        {
            return $this->string;
        }

}
?>