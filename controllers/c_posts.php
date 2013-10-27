<?php
class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("Members only. <a href='/users/login'>Login</a>");
        }
    } 

    # Queries for the posts that this user is following
    public function index() {

        # Set up the View
        $this->template->content = View::instance('v_posts_index');
        $this->template->title   = "All Posts";

        # Query
        $q = 'SELECT 
                posts.content,
                posts.created,
                posts.user_id AS post_user_id,
                users_users.user_id AS follower_id,
                users.first_name,
                users.last_name
            FROM posts
            INNER JOIN users_users 
                ON posts.user_id = users_users.user_id_followed
            INNER JOIN users 
                ON posts.user_id = users.user_id
            WHERE users_users.user_id = '.$this->user->user_id;

        # Run the query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->posts = $posts;

        # Render the View
        echo $this->template;

    }

    public function add() {
        # Setup view
            $this->template->content = View::instance('v_posts_add');
            $this->template->title   = "Add a Post";

        # Render template
            echo $this->template;
    }

    public function p_add() {
        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # More data we want stored with the user
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();
                
        # Insert this post into the posts table
        DB::instance(DB_NAME)->insert('posts', $_POST);

        # Question: how do you know the insert succeeded?  
        # Give feedback to user
        # tbd: put this stuff into another view and redirect to a better place
        echo "Your post has been added.<br> <a href='/posts/add'>Add another</a>";
     
    }


    public function users() {
        # Set up View   
        $this->template->content = View::instance('v_posts_users');
        $this->template->title   = "View users";

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
        Router::redirect("/posts/users");

    }

    public function unfollow($user_id_followed) {

        # Delete this connection
        $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
        DB::instance(DB_NAME)->delete('users_users', $where_condition);

        # Send them back
        Router::redirect("/posts/users");

    }

    # This gets all posts
    public function allposts() {

        # Set up the View
        $this->template->content = View::instance('v_posts_index');
        $this->template->title   = "Posts";

        # Build the query
        $q = "SELECT 
                posts .* , 
                users.first_name, 
                users.last_name
            FROM posts
            INNER JOIN users 
                ON posts.user_id = users.user_id";

        # Run the query
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass data to the View
        $this->template->content->posts = $posts;

        # Render the View
        echo $this->template;

    }

    # this gets all of my posts
    public function myposts() {
        # Set up View   
        $this->template->content = View::instance('v_posts_index');
        $this->template->title   = "View posts";

        # Query for my posts
        $q = "SELECT posts.content, posts.created,
                   users.first_name,
                   users.last_name
            FROM posts
            INNER JOIN users
              ON posts.user_id = users.user_id
            WHERE posts.user_id = ".$this->user->user_id;

        # Store the result array in the variable $users
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Pass data (user info and post) to the view
        $this->template->content->posts       = $posts;

        # Render View
        echo $this->template;
    }


} # end of the class