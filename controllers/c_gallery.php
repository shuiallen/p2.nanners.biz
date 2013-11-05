<?php
class gallery_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
    } 

    public function index($error = NULL) {

        # Set up the View
        $this->template->content = View::instance('v_gallery_index');
        $this->template->title   = "Nanners microblog gallery";

        # Query
        $q = 'SELECT *
            FROM photos';

        # Run the query
        $gallery = DB::instance(DB_NAME)->select_rows($q);

       // foreach($gallery as $field => $photo){
       //      foreach($photo as $field2 => $value){
       //      echo $field."=".$value;
       //      echo "<br>";
       //  }



        # Pass data to the View
        $this->template->content->gallery = $gallery;
        $this->template->content->addphoto = View::instance('v_gallery_add');
        $this->template->content->addphoto->error = $error;
        $this->template->content->error = $error;

        # Render the View
        echo $this->template;

    }

    public function add() {
        # Setup view
            $this->template->content = View::instance('v_gallery_add');
            $this->template->title   = "Add a Photo";

        # Render template
            echo $this->template;
    }

    public function p_add() {
        # Prevent SQL injection attacks by sanitizing the data the user entered in the form
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Upload the chosen filen and store in gallery directory with a timestamp for file name
        $file = Upload::upload(
                    $_FILES,
                    "/uploads/gallery/",
                    array("jpg", "jpeg", "gif", "png"),
                    Time::now());
        echo $file;
        if ($file == 'Error moving file' || $file == 'Invalid file type.') {
            Router::redirect('/gallery/index/error');
        }

        $data = Array(
            "created" => Time::now(),
            "user_id" => $this->user->user_id,
            "description" => $_POST['desc'],
            "photo" => $file
            );


        // # Insert this post into the photos table
        DB::instance(DB_NAME)->insert('photos', $data);

        Router::redirect("/gallery");
    }

} # end of the class