<?php
    class Load {
        private static $main;
        private static $debug = false;
        /* Main is the first directory – If debug is set to true every file that has been loaded will be printed */ 
        public static function directory($main, $debug = false){
            if($debug){
                self::$debug = $debug;
            }
            /* Add directory slash at the end if there is none. */
            if(substr($main, -1)){
                $main .= "/";
            }
            if(!is_dir($main)){
                echo "Directory: ".$main." could not be found.";
                exit;
            }
            self::$main = $main;
            /* Load all files from the directory */
            self::files($main);
            /* Scan the directory for more directories */
            self::scan($main);
        }
        private function scan($directory){
            $scan = scandir($directory);
            /* Remove "." and ".." from the array */
            $scan = array_diff($scan, array(".", ".."));
            $directories = array();
            foreach($scan as $data){
                /* Check if the data is a directory */
                if(is_dir($directory.$data."/")){
                    /* If the data is a directory push it to the array */
                    array_push($directories, $directory.$data."/");
                }
            }
            /* Go through all the directories found */
            foreach($directories as $directory){
                /* Load all files from the directory */
                self::scan($directory);
                /* Scan the directory for more directories */
                self::files($directory);
            }
        }
        private function files($directory){
            /* Get all the php files from the directory */
            $files = glob($directory . '*.php');
            /* Go through all the files found */
            foreach($files as $file){
                /* Check if the file has already been included. */
                if(!in_array($file, get_included_files())){
                    /* Require the file – No need for file_exists() since if the file didn't exist it wouldn't show up in the glob() function */
                    require_once $file;
                    /* If debug is set to true, print out that the file has been loaded. */
                    if(self::$debug){
                        echo "<pre>Loaded file: <strong>".str_replace(".php", "", basename($file))."</strong>.php found in \"<i>".$directory."</i>\"</pre>";
                    }
                }
                
            }
        }
    }
?>