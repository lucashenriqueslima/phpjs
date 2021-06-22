<?php

    namespace Source\Controllers;

    use Source\Models\User; 

    class Auth extends Controller
    {
        public function __construct($router)
        {
            parent::__construct($router);
        }

        public function login ($data): void
        {
            $login = $data["email"];
            $passwd = filter_var($data["passwd"]);
            
            if(!$passwd || !$login){
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "Preencha todos os campos!"
                ]);
                return;
            }

        /*        $l=2;

            $userEmail = (new User())->find("email = :e AND level = :l" , "e={$login}&l={$l}")->fetch();
            
            if ($userEmail && password_verify($passwd, $userEmail->passwd)) {
                
                echo $this->ajaxResponse("redirect", ["url" => $this->router->route("appadmin.home")]);
                $_SESSION["userAdmin"] = $userEmail->id;
                $_SESSION["emailAdmin"] = $userEmail->email;
                $_SESSION["nameAdmin"] = $userEmail->first_name." ".$userEmail->last_name;

                if(!empty($_SESSION["nameAdmin"])){
                flash("blue darken-3", "Seja bem-vindo ao painel de controle {$_SESSION["nameAdmin"]}  :-)");
                }
                return;
                
            } 
*/

if ($login === "admin" && $passwd === "12345") {
                
    echo $this->ajaxResponse("redirect", ["url" => $this->router->route("app.home")]);
    /*$_SESSION["userAdmin"] = $userEmail->id;
    $_SESSION["emailAdmin"] = $userEmail->email;*/
    $_SESSION["nameAdmin"] = "Lucas";

    if(!empty($_SESSION["nameAdmin"])){
    flash("success", "Seja bem-vindo {$_SESSION["nameAdmin"]}  :-)");
    }
    return;
    
} 
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Login ou senha incorreto(s)"
            ]);
          
            return;       
        }

        public function login_admin ($data): void
        {
            $login = $data["email"];
            $passwd = filter_var($data["passwd"]);
            
            if(!$passwd || !$login){
                echo $this->ajaxResponse("message", [
                    "type" => "error",
                    "message" => "Preencha todos os campos!"
                ]);
                return;
            }

        /*        $l=2;

            $userEmail = (new User())->find("email = :e AND level = :l" , "e={$login}&l={$l}")->fetch();
            
            if ($userEmail && password_verify($passwd, $userEmail->passwd)) {
                
                echo $this->ajaxResponse("redirect", ["url" => $this->router->route("appadmin.home")]);
                $_SESSION["userAdmin"] = $userEmail->id;
                $_SESSION["emailAdmin"] = $userEmail->email;
                $_SESSION["nameAdmin"] = $userEmail->first_name." ".$userEmail->last_name;

                if(!empty($_SESSION["nameAdmin"])){
                flash("blue darken-3", "Seja bem-vindo ao painel de controle {$_SESSION["nameAdmin"]}  :-)");
                }
                return;
                
            } 
*/

if ($login === "admin" && $passwd === "12345") {
                
    echo $this->ajaxResponse("redirect", ["url" => $this->router->route("appadmin.home")]);
    $_SESSION["userAdmin"] = $userEmail->id;
    $_SESSION["emailAdmin"] = $userEmail->email;
    $_SESSION["nameAdmin"] = "Lucas";

    if(!empty($_SESSION["nameAdmin"])){
    flash("success", "Seja bem-vindo ao painel de controle {$_SESSION["nameAdmin"]}  :-)");
    }
    return;
    
} 
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Login ou senha incorreto(s)"
            ]);
          
            return;
                
        }
 
        
        public function register_admin($data): void
        {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
         #verifica se tem algum campo em branco!
            if(in_array("", $data)){
                echo $this->ajaxResponse("message", [
                    "type" => "red",
                    "message" => "Favor, preencha todos os campos para efetuar cadastro!"
                ]);

                return;
            }
            

            if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
                echo $this->ajaxResponse("messsage", [
                    "type" => "red",
                    "message" => "Favor, preencha todos os campos para efetuar cadastro!"
                ]);
                return;
            }

            $checkEmail = (new User())->find("email = :e", "e={$data["email"]}")->count();

            if($checkEmail){
                echo $this->ajaxResponse("message", [
                    "type" => "red",
                    "message" => "E-mail já cadastrado"
                ]);
                return;
            }

            $checkCPF = (new User())->find("cpf = :c", "c={$data["cpf"]}")->count();

            if($checkCPF){
                echo $this->ajaxResponse("message", [
                    "type" => "red",
                    "message" => "CPF já cadastrado"
                ]);
                return;
            }

            
            if (empty($data["passwd"]) || strlen($data["passwd"]) < 6){
                echo $this->ajaxResponse("message", [
                    "type" => "red",
                    "message" => "Insira uma senha com pelo menos 6 caracteres"
                ]);
                return;
            }




            
            $user = new User();
            $user->first_name = $data["first_name"];
            $user->last_name = $data["last_name"];
            $user->email = $data["email"];
            $user->cpf = $data["cpf"];
            $user->level = 1;
            $user->passwd = password_hash($data["passwd"], PASSWORD_DEFAULT);

            $user->save(); 

            echo $this->ajaxResponse("redirect", [
                "url"=>$this->router->route("appadmin.register")
            ]);
            flash("green", "Usuário cadastrado com sucesso");

            return;
        }

        public function delete_admin(array $data): void
        {
            if(empty($data["id"])){
                return;
            }

            $id = filter_var ($data["id"], FILTER_VALIDATE_INT);
            $user = (new User())->findById($id);
            if($user){
                $user->destroy();
            }

            $callback["remove"] = true;
            echo json_encode($callback);
        }
    }