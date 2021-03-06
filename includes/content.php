<?php
class Page
{
    public $name, $filename;
    public static $parentDir = "../";
    public static $contentFolder = "content/";
    
    public function __construct($name, $filename)
    {
        $this->name = $name;
        $this->filename = $filename;
    }
    
    public function createMenuItem()
    {
        // Match just the name, without the .html, .php etc part
        preg_match_all("/[a-z_\-0-9]*/i", $this->filename, $out);
        $bareFilename = $out[0][0];
        
        // Print the menu item
        print ("<li class=\"link\"><a href=\"index.php?content={$bareFilename}\">" .
        $this->name . "</a></li>\n");
    }
    
    public function getFile()
    {
        return $this->filename;
    }

    public function nodir($item)
    {
        return (!is_dir(Page::$parentDir . Page::$contentFolder . $item));
    }
    
    public static function fileList()
    {
        $dirContent = scandir(Page::$parentDir . Page::$contentFolder);
        $files = (array_filter($dirContent, "Page::nodir"));
        return $files;
    }
    
    // For future-uses...
    public function getName()
    {
        return $this->name;
    }
    
}
    
?>
