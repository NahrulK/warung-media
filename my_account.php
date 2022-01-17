<style>

.user_container {
    /* width: 100%; */
    /* float: left; */
    padding: 20px;
}

.user_content {
    width: 73%;
    float: left;
}

.user_sidebar {
    width: 25%;
    float: left;
    background: #fff;
    margin-left: 19px;
    box-shadow: 0 1px 4px 0 rgba(0,0,0,0.2), 0 2px 10px 0 rgba(0,0,0,0.19); 
}

.user_sidebar ul {
    list-style: none;
    padding: 15px;
    width:auto;
    float: left;
}

.user_sidebar ul li {
    padding: 3px 0;
}

.user_sidebar a {
    color: rgba(0,0,0,0.5);
    padding: 8px;
    margin: 5px;
    font-size: 20px;
    text-decoration: none;
}

.user_sidebar a:hover {
    color: orange;
    text-decoration: underline;
    font-weight: bolder;
}

</style>

<?php
include ('includes/header.php');
?>
       
        <div class="content_wrapper">

            <div class="user_container">
                <div class="user_content">
                    <p>User content</p>
                </div>
                <div class="user_sidebar">
                    
                    <ul>
                        <li><a href="my_account.php?action=my_order">My Order</a></li>
                        <li><a href="my_account.php?action=edit_account">Edit Account</a></li>
                        <li><a href="my_account.php?action=change_password">Change Password</a></li>  
                        <li><a href="my_account.php?action=delete_account">Delete Account</a></li>
                        <li><a href="my_account.php?action=logout">Logout</a></li>
                    </ul>

                </div>
            </div>

        </div><!--Content Wrapper-->
            
    <?php
    include ('includes/footer.php');
    ?>