<?php
class view
{
    public function __contruct()
    {
    }

    /**
     * rendering view
     */
    public function render($folder, $file, $output = array(), $load = 0)
    {
        if ($load == 0) {
            $this->header();
        }

        extract($output);
        require_once("views/" . $folder . "/" . $file . ".php");

        if ($load == 0) {
            $this->footer();
        }
    }
    public function header()
    {
        require_once("views/header.php");
    }
    public function footer()
    {
        require_once("views/footer.php");
    }
}