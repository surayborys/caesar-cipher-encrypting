<?php 

namespace surayborys\caesar;

/**
* (PHP7)
* <p>a sample of Caesar's cipher work</p> 
*
* @author Borys Suray <surayborys@gmail.com>    
*/
class Caesar {
    
    /**
    * (PHP7)<br/>
    * <p>to encrypt the string $string with latin characters using Caesar's cipher</p>
    * <p><b>usage</b>: $encrypted_string = encrypt_with_caesar($string);</p>
    * 
    * @param string $string - a string, that must be encrypted
    * @param int $key - a positive number, each string's <br/>  
    *   character is shifted to its value
    * 
    * @return string <p>returns encrypted string if the string was<br/> successfully 
    * encrypted or error: error text if there were some errors</p>
    */
   public function encrypt_with_caesar(string $string, int $key = 1):string
   {        
       if($key < 1)
       {
           return 'error: wrong key. choose additional integer';
       }
       
       $array_of_string_chars = str_split($string);
       $array_of_encrypted_chars = array();
      
       foreach ($array_of_string_chars as $ch) 
       {
           //get ascii code
           $code = ord($ch);
         
           if($this->is_lowercase_leter($code)){
               //position of the first lowercase letter in ascii is 97
               $position_shifted = (($code - 97) + $key)%26 + 97;
               $code = $position_shifted;  
               
          }elseif ($this->is_uppercase_leter($code)) {
              //position of the first lowercase letter in ascii is 65
              $position_shifted = (($code - 65) + $key)%26 + 65;
              $code = $position_shifted;
               
           }elseif ($this->is_ascii_number($code)) {
               //position of the first additional number in ascii is 48
               $position_shifted = (($code - 48) + $key)%10 + 48;
               $code = $position_shifted;
               
           }
           
           //get character by ascii-code
           $ch = chr($code);
           
           array_push($array_of_encrypted_chars, $ch);
           
       }
       
       $encrypted_word = implode($array_of_encrypted_chars);
      
       return $encrypted_word;
       
   }
   
   /**
    * (PHP7)<br>
    * to check if the decimal ascii code is the code of lowercase letter
    * @param int $code - the code value for checking
    * @return bool returns TRUE if int $code<br/> is the code of letter or FALSE if is not
    */
   protected function is_lowercase_leter(int $code):bool
   {
       
       return ($code>=97 && $code<=122) ? true : false;
       
   }
   
   /**
    * (PHP7)<br>
    * to check if the decimal ascii code is the code of uppercase letter
    * @param int $code - the code value for checking
    * @return bool returns TRUE if int $code<br/> is the code of letter or FALSE if is not
    */
   protected function is_uppercase_leter(int $code):bool
   {
       
       return ($code>=65 && $code<=90) ? true : false;
       
   }
   
   /**
    * (PHP7)<br>
    * to check if the decimal ascii code is the code of number
    * @param int $code - the code value for checking
    * @return bool returns TRUE if int $code<br/> is the code of number or FALSE if is not
    */
   protected function is_ascii_number(int $code):bool
   {
       
       return ($code>=48 && $code<=57) ? true : false;
       
   }
}