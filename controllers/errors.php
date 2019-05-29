<?php
class errors extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->ViewObject->render(__class__, 'index', error_get_last());
    }
    public function logic_error($errorno, $errorcomment, $errfile = null, $errline = null)
    {
        $this->ViewObject->render(__class__, 'syntaxerror', array('type' => $errorno, 'message' => $errorcomment, 'erfile' => $errfile, 'line' => $errline), 1);
    }


    // set_error_handler("customError");
    public function customError($errorno, $errorcomment)
    {
        echo "Error : [$errorno] $errorcomment";
        // $this->ViewObject->render(__class__, 'syntaxerror', array('type' => $errorno, 'message' => $errorcomment));
    }
}
