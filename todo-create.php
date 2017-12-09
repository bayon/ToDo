<?php

function sp_todo_create() {
    $id = $_POST["id"];
    $name = $_POST["name"];
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . "todo";

        $wpdb->insert(
                $table_name, //table
                array('id' => $id, 'name' => $name), //data
                array('%s', '%s') //data format
        );
        $message.="todo inserted";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/ToDo/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Add New todo</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p>Three capital letters for the ID</p>
            <table class='wp-list-table widefat fixed'>
                <tr>
                    <th class="ss-th-width">ID</th>
                    <td><input type="text" name="id" value="<?php echo $id; ?>" class="xss-field-width full-width" /></td>
                </tr>
                <tr>
                    <th class="ss-th-width">todo</th>
                    <td><input type="text" name="name" value="<?php echo $name; ?>" class="xss-field-width full-width" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
    </div>
    <?php
}
