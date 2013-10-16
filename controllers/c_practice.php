<?php

class practice_controller extends base_controller {
	public function test1() {
//		require (APP_PATH.'/libraries/image.php');

            $imageObj = new Image('http://placekitten.com/1000/1000');

            /*
            Call the resize method on this object using the object operator (single arrow ->) 
            which is used to access methods and properties of an object
            */
            $imageObj->resize(200,200);

            # Display the resized image
            $imageObj->display();


	}

}  # end of class

?>