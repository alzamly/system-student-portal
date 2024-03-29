<?php

class Application
{
    /** @var null The controller */
    private $url_controller = null;

    /** @var null The method (of the above controller), often also named "action" */
    private $url_action = null;

    /** @var array URL parameters */
    private $url_params = array();


    // arrays 
    private $admin_pages = [
                                "home",
                                "logout",
                                "new_employee",
                                "employees",
                                "new_class",
                                "departments_foundation",
                                "classes_view",
                                "new_school",
                                "schools",
                                "classes",
                                "divisions",
                                "add_tuition_fees",
                                "tuition_fees",
                                "add_school_year",
                                "school_years"
                            ];

    private $sp_account_pages = [
                                    "home",
                                    "logout",
                                    "new_student",
                                    "students_search",
                                    "add_outly",
                                    "outly",
                                    "outly_types",
                                    "student_tuition_fees",
                                    "classes",
                                    "students"
                                ];

    private $sp_nurs_pages = [
                                "home",
                                "logout"
                            ];

    private $school_pages = [
                                "home",
                                "classes",
                                "divisions",
                                "students",
                                "logout"
                            ];


    private function checkPages($type, $page)
    {
        $true_page = "page_not_found";

        if (@$_SESSION['sp_perm'] == 'sp_admin') {
            for ($i=0; $i < count($this->admin_pages); $i++) { 
                if ($page == $this->admin_pages[$i]) {
                    $true_page = $page;
                }
            }
        }

        if (@$_SESSION['sp_perm'] == 'sp_account') {
            for ($i=0; $i < count($this->sp_account_pages); $i++) { 
                if ($page == $this->sp_account_pages[$i]) {
                    $true_page = $page;
                }
            }
        }

        if (@$_SESSION['sp_perm'] == 'sp_nurs') {
            for ($i=0; $i < count($this->sp_nurs_pages); $i++) { 
                if ($page == $this->sp_nurs_pages[$i]) {
                    $true_page = $page;
                }
            }
        }

        if (@$_SESSION['sp_perm'] == 'sp_school') {
            for ($i=0; $i < count($this->school_pages); $i++) { 
                if ($page == $this->school_pages[$i]) {
                    $true_page = $page;
                }
            }
        }

        return $true_page;
    }

    /**
     * "Start" the application:
     * Analyze the URL elements and calls the according controller/method or the fallback
     */
    public function __construct()
    {
        // create array with URL parts in $url
        $this->splitUrl();

        if ($this->url_controller != null && @$_SESSION['control_pq'] == "control") {
            if ($this->url_controller != $this->checkPages(@$_SESSION['sp_perm'], $this->url_controller)) {
                $this->url_controller = $this->checkPages(@$_SESSION['sp_perm'], $this->url_controller);
            }
        }

        // check for controller: does such a controller exist ?
        if (file_exists('../app2/controller/' . @$_SESSION['control_pq'] . '/' . $this->url_controller . '.php')) {

            // if so, then load this file and create this controller
            // example: if controller would be "car", then this line would translate into: $this->car = new car();
            require '../app2/controller/'. @$_SESSION['control_pq'] . '/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

            // check for method: does such a method exist in the controller ?
            if (method_exists($this->url_controller, $this->url_action)) {

                if(!empty($this->url_params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array($this->url_controller, $this->url_action), $this->url_params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->url_controller->{$this->url_action}();
                }

            } else {
                // default/fallback: call the index() method of a selected controller
                $this->url_controller->index();
            }
        } else {
            // invalid URL, so simply show home/index
            require '../app2/controller/' . @$_SESSION['control_pq'] . '/home.php';
            $home = new Home();
            $home->index();

        }
    }

    /**
     * Get and split the URL
     */
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            // split URL
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->url_controller = isset($url[0]) ? $url[0] : null;
            $this->url_action = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);

            // for debugging. uncomment this if you have problems with the URL
            //echo 'Controller: ' . $this->url_controller . '<br>';
            //echo 'Action: ' . $this->url_action . '<br>';
            //echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
        }
    }
}
