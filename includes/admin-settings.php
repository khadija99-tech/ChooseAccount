<?php

// Register the admin menu
add_action('admin_menu', 'ptp_admin_menu');

function ptp_admin_menu() {
    add_menu_page(
        'Pricing Table Settings',
        'Pricing Table',
        'manage_options',
        'ptp-settings',
        'ptp_render_admin_page',
        'dashicons-admin-generic',
        30
    );
}

// Render the admin page
function ptp_render_admin_page() {
    // Get saved table data
    $rows = get_option('ptp_table_rows', []);

    // Handle form submission
    if (isset($_POST['ptp_save'])) {
        if (isset($_POST['rows']) && is_array($_POST['rows'])) {
            update_option('ptp_table_rows', $_POST['rows']);
            echo '<div class="updated"><p>Saved!</p></div>';
            $rows = $_POST['rows'];
        }
    }

    ?>
    <div class="wrap">
        <h1>Pricing Table Settings</h1>
        <form method="post">
            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Phase 1</th>
                        <th>Phase 2</th>
                        <th>Funded Account</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="ptp-table-body">
                    <?php if (!empty($rows)): ?>
                        <?php foreach ($rows as $index => $row): ?>
                            <tr>
                                <td><input type="text" name="rows[<?php echo $index; ?>][label]" value="<?php echo esc_attr($row['label']); ?>" /></td>
                                <td><input type="text" name="rows[<?php echo $index; ?>][phase1]" value="<?php echo esc_attr($row['phase1']); ?>" /></td>
                                <td><input type="text" name="rows[<?php echo $index; ?>][phase2]" value="<?php echo esc_attr($row['phase2']); ?>" /></td>
                                <td><input type="text" name="rows[<?php echo $index; ?>][funded]" value="<?php echo esc_attr($row['funded']); ?>" /></td>
                                <td><button class="button ptp-remove-row">Remove</button></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <br>
            <button type="button" class="button" id="ptp-add-row">Add Row</button>
            <br><br>
            <input type="submit" name="ptp_save" class="button button-primary" value="Save Table" />
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('ptp-add-row').addEventListener('click', function() {
            const tbody = document.getElementById('ptp-table-body');
            const index = tbody.rows.length;
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="text" name="rows[${index}][label]" value="" /></td>
                <td><input type="text" name="rows[${index}][phase1]" value="" /></td>
                <td><input type="text" name="rows[${index}][phase2]" value="" /></td>
                <td><input type="text" name="rows[${index}][funded]" value="" /></td>
                <td><button class="button ptp-remove-row">Remove</button></td>
            `;
            tbody.appendChild(row);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('ptp-remove-row')) {
                e.preventDefault();
                e.target.closest('tr').remove();
            }
        });
    });
    </script>
    <?php
}
