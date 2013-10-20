<?php

class practice_controller extends practicebase_controller {
       public function __construct() {
        parent::__construct();
    } 

	public function test1() {
        # Set up View   
        $this->template->content = View::instance('v_practice_test1');
        $this->template->title   = "Experimenting";

        // $testobj = new practice_controller();
        // echo '<pre>'; echo "test publicvar: "; echo $testobj->publicvar;
        // echo '</pre>';
        // echo '<pre>'; echo "test protectedvar:";  echo $testobj->protectedvar;
        // echo '</pre>';


        echo '<pre>'; echo "this publicvar: "; echo $this->publicvar;
        echo '</pre>';
        echo '<pre>'; echo "this protectedvar:";  echo $this->protectedvar;
        echo '</pre>';

        # Pass data to the view
        $this->template->content->publicvar = $this->publicvar;

        $this->template->content->protectedvar = $this->protectedvar;
        # cannot access privatevar here
        #    $this->template->content->privatevar = $this->$privatevar;

        # Render View
        echo $this->template;
	}

}  # end of class

?>