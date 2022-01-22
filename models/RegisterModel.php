<?php  
namespace app\models;
use app\core\model; 
  
class RegisterModel extends Model {  

    public string $firstname; 
    public string $lastName;
    public string $email;
    public string $password; 
    public string $confirmPassword;  

    public function register() { 

        echo "creating new modal";
    }  

    public function rules(): array {  

        return [ 
            'firstname' => [self::RULE_REQUIRED], 
            'lastName' => [self::RULE_REQUIRED], 
            'email' => [self::RULE_REQUIRED,self::RULE_EMAIL], 
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN,'min' => 8],[self::RULE_MAX,'max' => 24]], 
            'confirmPassword' => [self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']], 

    
        ]; 
    }

   
    


}

?>