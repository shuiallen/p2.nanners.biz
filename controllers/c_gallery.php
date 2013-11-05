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


  // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  // echo "Type: " . $_FILES["file"]["type"] . "<br>";
  // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  // echo "Stored in: " . $_FILES["file"]["tmp_name"];

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

        # Question: how do you know the insert succeeded?  
        Router::redirect("/gallery");
    }


    public function users() {
        # Set up View   
        $this->template->content = View::instance('v_gallery_users');
        $this->template->title   = "Nanners microblog users";

        # Query for all users
        $q = "SELECT * 
                FROM users";

        # Store the result array in the variable $users
        $users = DB::instance(DB_NAME)->select_rows($q);

        # Query for the user's connections, i.e. who are they following?
        $q = "SELECT * 
            FROM users_users
            WHERE user_id = ".$this->user->user_id;

        # Store our results $connections indexed by user_id_followed
        $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

        # Pass data (users and connections) to the view
        $this->template->content->users       = $users;
        $this->template->content->connections = $connections;
        
        # Render View
        echo $this->template;
    }

    public function follow($user_id_followed) {

        # Prepare the data array to be inserted
        $data = Array(
            "created" => Time::now(),
            "user_id" => $this->user->user_id,
            "user_id_followed" => $user_id_followed
            );

        # Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);

        # Send them back
        Router::redirect("/gallery/users");

    }

    public function unfollow($user_id_followed) {

        # Delete this connection
        $where_condition = 'WHERE user_id = '.$this->user->user_id.' 
                            AND user_id_followed = '.$user_id_followed;

        DB::instance(DB_NAME)->delete('users_users', $where_condition);

        # Send them back
        Router::redirect("/gallery/users");

    }

    # This gets all gallery
    public function allgallery() {

        # Set up the View
        $this->template->content = View::instance('v_gallery_index');
        $this->template->title   = "Nanners microblog gallery";

        # Build the query
        $q = "SELECT 
                gallery .* , 
                users.first_name, 
                users.last_name
            FROM gallery
            INNER JOIN users 
                ON gallery.user_id = users.user_id";

        # Run the query
        $gallery = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->gallery = $gallery;

        # Render the View
        echo $this->template;

    }

    # This gets all logged-in user's gallery (my gallery)
    public function mygallery() {
        # Set up View   
        $this->template->content = View::instance('v_gallery_index');
        $this->template->title   = "Nanners microblog gallery";

        # Query for my gallery
        $q = "SELECT gallery.content, gallery.created,
                   users.first_name,
                   users.last_name
            FROM gallery
            INNER JOIN users
              ON gallery.user_id = users.user_id
            WHERE gallery.user_id = ".$this->user->user_id."
              ORDER BY gallery.created DESC";

        # Store the result array in the variable $gallery
        $gallery = DB::instance(DB_NAME)->select_rows($q);

        # Pass data (user info and post) to the view
        $this->template->content->gallery       = $gallery;

        # Render View
        echo $this->template;
    }


} # end of the class