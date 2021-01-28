<?php
    class App {

        protected $handlers;
        public $db;

        function __construct() {
            $this->handlers = [];
            $this->db = new SafeMySQL([
                'host'      => '2.59.42.52 ',
                'user'      => 'anime',
                'pass'      => 'lrZAgFa8NOPLOZMjZYf9ZurV',
                'db'        => 'questionnaire'
            ]);
        }

        public function add($action, $callback) {
            $this->handlers[$action] = $callback;
        }

        public function run($action) {
            if(isset($this->handlers[$action])) {
                call_user_func($this->handlers[$action]);
            } else {
                throw new HttpException("Not Found");
            }
        }

        public static function render($template, $data = []) {
            ob_start();
                extract($data);
                include("template/$template.view.php");
            echo ob_get_clean();
        }

        public function redirect($action) {
            header("Location: index.php?a=$action");
        }

        public function refresh() {
            header("Refresh: 0");
        }

        public function is($method, $callback) {
            if(strtolower($_SERVER['REQUEST_METHOD']) === strtolower($method)) {
                 call_user_func($callback);
            }
        }

        public function isAdmin() {
            return isset($_SESSION['admin']);
        }

        public static function flashPush($name, $message) {
            $_SESSION["flash_$name"] = $message;
        }

        public static function flashGet($name) {
            if(isset($_SESSION["flash_$name"])) {
                $tmp = $_SESSION["flash_$name"];
                unset($_SESSION["flash_$name"]);
                return $tmp;
            }
        }        

        public static function isAuth() {
            return isset($_SESSION['auth']);
        }

        public static function login($name, $id) {
            $_SESSION['name'] = $name;
            $_SESSION['id'] = $id;
            $_SESSION['auth'] = true;
        }

        public static function logout() {
            unset($_SESSION['name']);
            unset($_SESSION['id']);
            unset($_SESSION['auth']);
        }   

        public static function getFileExtension($filename) {
            $tmp = explode('.', $filename);
            return end($tmp);
        }
        
        public static function uploadImage($image) {
            $filename = md5(time()) . '.' . App::getFileExtension($image['name']);
            move_uploaded_file($image['tmp_name'], "res/$filename");
            return $filename;
        }              
    }

    class HttpException extends Exception {}
?>